<?php
App::uses('AppModel', 'Model');

class PasswordReset extends AppModel {

    function saveValidHash($userId) {
        
        $result = $this->findByUserId($userId);
        $hash = $this->hashString($userId.time(), 'sha1');
        
        if($result) {
            $this->id = $result['PasswordReset']['id'];
        } else {
            $this->create();
        }

        $this->data = array(
            'PasswordReset'=>array(
                'user_id'   => $userId,
                'hash'      => $hash,
                'is_valid'  => 1
            )
        );
        
        return $this->save();
        
    }

    function matchValidHash($hash) {
        $hours_ago = date('Y-m-d H:i:s', strtotime('-3 hour'));
        $conditions = array(
            'PasswordReset.hash'            => $hash,
            'PasswordReset.is_valid'        => 1,
            'PasswordReset.modified >'      => $hours_ago
        );
        $result = $this->find('first', array('conditions'=>$conditions));
        if($result) {
            return $result;
        }
        return false;
    }

    function invalidateHash($hash) {
        $conditions = array(
            'PasswordReset.hash' => $hash,
        );
        $result = $this->find('first', array('conditions'=>$conditions));
        $result['PasswordReset']['is_valid'] = 0;
        return $this->save($result);

    }
}
