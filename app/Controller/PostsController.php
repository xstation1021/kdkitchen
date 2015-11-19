<?php

/*
App::uses('AppController', 'Controller');

class PostsController extends AppController {

    public $actsAs = array('Uploader.Attachment');
    var $uses = array('Media', 'Post', 'PostsTag', 'Tag', 'Category', 'CategoriesPost');
    
    public $name = 'Posts';
    /*
    public $paginate = array(
        'recursive'=>-1,
        'order' => array(
            'Post.id' => 'desc'
        ),
        'limit' => 5,
        'joins'=>array(
            array('table'=>'categories_posts', 
                'alias'=>'CategoriesPost', 
                'type'=>'inner', 
                'conditions'=>array('Post.id = CategoriesPost.post_id')), 
            array('table'=>'posts_tags', 
                'alias'=>'PostsTag', 
                'type'=>'left', 
                'conditions'=>array('Post.id = PostsTag.post_id')), 
            array('table'=>'tags', 
                'alias'=>'Tag', 
                'type'=>'left', 
                'conditions'=>array('Tag.id = PostsTag.tag_id')), 
        ),
        'fields'=>array('Post.*', 'CategoriesPost.*', 'PostsTag.*', 'Tag.*')
    );
    public $paginate = array(
        'recursive'=>-1,
        'order' => array(
            'Post.id' => 'desc'
        ),
        'limit' => 5,
        'joins'=>array(
            array('table'=>'categories_posts', 
                'alias'=>'CategoriesPost', 
                'type'=>'inner', 
                'conditions'=>array('Post.id = CategoriesPost.post_id')) 
        ),
        'contain'=>array('Tag'),
        'fields'=>array('Post.*', 'CategoriesPost.*')
    );


    function index($category_code='') {
        //$contain = array('Category');
        //$this->data = $this->Post->find('all', array('contain'=>$contain));
        $category = $this->Category->find('first', array('conditions'=>array('Category.code'=>$category_code)));
        
        $settings = $this->paginate;
        if($category) {
            foreach($settings['joins'] as $index=>$table) {
                if('CategoriesPost' == $table['alias']) {
                    $settings['joins'][$index]['conditions'] = array(
                        'Post.id = CategoriesPost.post_id', 
                        'Post.is_published = 1',
                        "CategoriesPost.category_id = '".$category['Category']['id']."'");
                }
            }
        }

        $this->paginate = $settings;
        $data = $this->paginate('Post');
        $this->set('data', $data);
        
        $title = 'All Posts';
        if($category) {
            $title = $category['Category']['name'];
        }
        $this->set('category_code', $category_code);
        $this->set('title', $title);
    }
    
    function toggle_publish($id) {
        $this->_auth();

        $this->Post->id = $id;
        $post = $this->Post->read();
        $is_published = !$post['Post']['is_published'];
        $this->Post->set('is_published', $is_published);
        if($this->Post->save()) {
            $this->Session->setFlash('Success.', 'default', array('class'=>'message success'));
        } else {
            $this->Session->setFlash('Failed.', 'default', array('class'=>'message error'));
        }
        $this->redirect($this->referer());
        exit;
    }
    
    function admin_index($category_code='') {
        $this->_auth();
        $settings = $this->paginate;

        $settings['joins'] = array(
            array('table'=>'categories_posts', 
                'alias'=>'CategoriesPost', 
                'type'=>'inner', 
                'conditions'=>array('Post.id = CategoriesPost.post_id')),
            array('table'=>'categories',
                'alias'=>'Category',
                'type'=>'left',
                'conditions'=>array('Category.id = CategoriesPost.category_id')
            ) 
        );
        $settings['fields'] = array('Post.*', 'CategoriesPost.*', 'Category.*');
        $this->paginate = $settings;

        $data = $this->paginate('Post');
        $this->set('data', $data);
        
    }

    //TODO Split this function.
    function __saveTagData($post_id, $validation_only=False) {

        if($post_id == NULL && !$validation_only) {
            throw Exception('Post ID is required.');
        }

        $tags = $this->data['Post']['tag'];
        $tags = trim($tags, '["]');
        $tags = explode('","', $tags);

        $existing_tag_ids = array();
        $formatted_data = array();
        foreach($tags as $tag) {
            $conditions = array('Tag.tag'=>$tag);
            $existing_id = $this->Tag->field('id', $conditions);
            if($tag=='' || $existing_id) {
                $existing_tag_ids[] = $existing_id;
                continue;
            }
            $formatted_data[] = array('Tag'=>array('tag'=>$tag));
        }
        
        if(!empty($formatted_data)) {
            $options = array();
            if($validation_only) {
                $options = array('validate'=>'only');
            }

            $this->Tag->saveAll($formatted_data, $options);
            if(!empty($this->Tag->validationErrors)) {
                $this->Post->invalidate('tag', $this->Tag->validationErrors[0]['tag'][0]);
                $this->_persistValidation();
                return False;
            }
        }

        if($validation_only) {
            return True;
        }

        $post_tag_ids = array_merge($existing_tag_ids, $this->Tag->inserted_ids);
        if(!empty($post_tag_ids)) {
            $data = array();
            foreach($post_tag_ids as $tag_id) {
                $conditions = array('PostsTag.tag_id'=>$tag_id, 'PostsTag.post_id'=>$post_id);
                if($tag_id == '' || $this->PostsTag->hasAny($conditions)) {
                    continue;
                }
                $data[] = array('PostsTag'=>array('tag_id'=>$tag_id, 'post_id'=>$post_id));
            }
            $this->PostsTag->saveAll($data);
        }

        $this->PostsTag->recursive = 1;
        $post_tags = $this->PostsTag->find('all', array('conditions'=>array('PostsTag.post_id'=>$post_id)));
        foreach($post_tags as $post_tag) {
            if(!isset($post_tag['Tag']['tag'])) {
                continue;
            }
            if(!in_array($post_tag['Tag']['tag'], $tags)) {
                $this->PostsTag->delete($post_tag['PostsTag']['id']);
            }
        }

        return $this->Tag->inserted_ids;
    }

    function add($category_code='') {
        $this->_auth('chef');    
        
        if($category_code=='') {
            throw Exception('Missing category.');
        }
        $conditions = array('Category.code'=>$category_code);
        $category = $this->Category->find('first', array('conditions'=>$conditions));
        $category_id = $category['Category']['id'];

        if($this->request->is('Post')) {
            if($this->__saveTagData(NULL, $validation_only=True) && $saved = $this->Post->save($this->data)) {
                $post_id = $this->Post->getLastInsertID();
                $this->CategoriesPost->save(array('CategoriesPost'=>array('category_id'=>$category_id, 'post_id'=>$post_id)));
                $this->__saveTagData($post_id);
                
                $this->Session->setFlash('Successfully saved post.', 'default', array('class'=>'message success'));
                $this->redirect(array('controller'=>'posts', 'action'=>'view', $post_id));
                exit;
            } else {
                $this->Session->setFlash('Error saving post.', 'default', array('class'=>'message error'));
            }
        } 
        $this->set('category_id', $category_id);
        $this->set('tag_suggestions', $this->__get_tag_suggestions());
    }

    function __get_tag_suggestions() {
        $all_tags = $this->Tag->find('all');
        $tags = array();
        foreach($all_tags as $tag) {
            $tags[] = $tag['Tag']['tag'];
        }
        $suggestions = '';
        if(!empty($tags)) {
            $suggestions = '"'.implode('","', $tags).'"';
        }
        return $suggestions;
    }

    function edit($id) {
        $this->_auth('chef');    
        
        $this->Post->id = $id;
        if($this->request->is('Put') || $this->request->is('Post')) {
            if($this->__saveTagData($id, $validation_only=True) && $saved = $this->Post->save($this->data)) {
                $this->__saveTagData($id);
                $this->Session->setFlash('Successfully saved post.', 'default', array('class'=>'message success'));
                $this->redirect($this->referer());
                exit;
            } else {
                $this->Session->setFlash('Error saving post.', 'default', array('class'=>'message error'));
            }
            $this->redirect($this->referer());
            exit;
        } 
        $this->Post->recursive = 1;
        $this->data = $this->Post->read();
        $this->set('tag_suggestions', $this->__get_tag_suggestions());
    }
    
    function view($id) {
        $this->Post->recursive = 1;

        $this->Post->id = $id;
        $this->data = $this->Post->read();
        if(!$this->data) {
            $this->redirect('/');
        }

        $this->data = $this->__nest_comments($this->data);
        $this->set('category_code', $this->data['Category'][0]['code']);
    }

    //TODO move to comment model?
    private function __nest_comments($data) {
        $tmp = array();
        $child_to_parent_map = array();
        if(isset($data['Comment'])) {
            foreach($data['Comment'] as $comment) {
                if(!isset($comment['parent_id'])) {
                    $tmp[$comment['id']] = $comment;
                    $tmp[$comment['id']]['children'] = array();
                } else {
                    if(isset($child_to_parent_map[$comment['parent_id']])) {
                        $child_to_parent_map[$comment['id']] = $child_to_parent_map[$comment['parent_id']];
                    } else {
                        $child_to_parent_map[$comment['id']] = $comment['parent_id'];
                    }
                    
                    array_push($tmp[$child_to_parent_map[$comment['id']]]['children'], $comment);
                }
            }
        }
        $data['Comment'] = $tmp;
        return $data;
    }

    function delete($id) {
        if($this->Post->delete($id)) {
            $this->Session->setFlash('Successfully deleted post.', 'default', array('class'=>'message success'));
        } else {
            $this->Session->setFlash('Error deleting post.', 'default', array('class'=>'message error'));
        }
        $this->redirect($this->referer());
        exit;
    }
}
*/
