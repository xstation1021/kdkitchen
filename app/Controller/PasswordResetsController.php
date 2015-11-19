<?php

App::uses('AppController', 'Controller');

class PasswordResetsController extends AppController {

    
    var $uses = array('PasswordReset', 'User', 'Email');

    function add() {

        if($this->request->is('POST')) {
            
            $username_or_email = $this->data['PasswordReset'][$this->User->_imap['username']];
            $conditions = array('OR'=>array('User.username'=>$username_or_email, 'User.email'=>$username_or_email));
            $user = $this->User->find('first', array('conditions'=>$conditions));

            if(!$user) {

                $this->Session->setFlash('パスワード変更のリンクを'.$email.'に送信しました。', 'default', array('class'=>'message success'));
                return;
            }

            $hash = $this->PasswordReset->hashString(uniqid());
            $data = $this->data;
            $data['PasswordReset']['user_id'] = $user['User']['id'];
            $data['PasswordReset']['hash'] = $hash;
            if($this->PasswordReset->save($data)) {

                $from = Configure::read('email');
                $from = $from['info'];
                $email = $user['User']['email'];

                $subject = 'KD KITCHENパスワードの変更';
                $msg = '<p>KD KITCHENパスワードの再設定は、下記リンクをクリックし新しいパスワードの変更画面で行って下さい。</p>'.Configure::read('url').'users/password/'.$hash.'<p>このリンクの有効期限は一時間です。</p>';
                
                $this->Email->send($from, $email, $subject, $msg);

                $this->Session->setFlash($email.'にパスワード変更のリンクを送信しました。', 'default', array('class'=>'message success'));
            }
        }
        $this->set('title', 'パスワードを忘れた方');
    }

}
