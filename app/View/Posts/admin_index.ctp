<div class="container">
    <div class="page-heading">
        <h1>ブログ一覧</h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="blog-front cf">
            
        <table>
            <tr>
                <th><?php echo $this->Paginator->sort('id', 'id');?></th>
                <th><?php echo $this->Paginator->sort('Category.name', 'category');?></th>
                <th><?php echo $this->Paginator->sort('title', 'title');?></th>
                <th><?php echo $this->paginator->sort('created', 'created');?></th>
                <th><?php echo $this->paginator->sort('modified', 'updated');?></th>
                <th><?php echo $this->paginator->sort('is_published', 'published');?></th>
                <th></th>
            </tr>
            
            <?php foreach($data as $node) { ?>
            <?php $post = $node['Post'];?>
            <?php $category = isset($node['Category']) ? $node['Category']: array('name'=>'');?>
            <tr>
                <td>
                    <?php echo $post['id']; ?>      
                </td>
                <td>
                    <?php echo $category['name']; ?>
                </td>
                <td>
                    <?php echo $this->Html->link($post['title'], array('controller'=>'posts', 'action'=>'view', $post['id'])); ?>      
                </td>
                <td>
                    <?php echo $post['created']; ?>
                </td>
                <td>
                    <?php echo $post['modified']; ?>
                </td>
                <td>
                    <?php echo $post['is_published'] ? '&#10003':'';?>
                </td>
                <td>
                    <?php echo $this->Html->link('edit', array('controller'=>'posts', 'action'=>'edit', $post['id']));?>
                    <?php echo $this->Html->link('publish', array('controller'=>'posts', 'action'=>'toggle_publish', $post['id']), $options=array(), $confirmMessage = 'Publish '.$post['id'].'?');?>
                    <?php echo $this->Html->link('delete', array('controller'=>'posts', 'action'=>'delete', $post['id']), $options=array(), $confirmMessage = 'Delete '.$post['id'].'?');?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php echo $this->element('paginator');?>
    </div>
</div>
