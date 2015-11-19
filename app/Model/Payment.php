<?php
App::uses ( 'AppModel', 'Model' );
class Payment extends AppModel {
    public function checkIfBuyable($item_id, $category = null) {
        $item_category = $category;
        
        if (is_numeric ( $item_id ) == false) {
            $item_category = substr ( $item_id, 1, 1 );
            if ($item_category == 'R') {
                $item_category = 'Recipe';
            }
            $item_id = substr ( $item_id, 2 );
        }
        
        if ($this->_logged_user ['is_admin'] == 1) {
            return false;
        }
        
        $data = $this->find ( 'count', array (
                'conditions' => array (
                        'Payment.user_id' => $this->_logged_user['id'],
                        'Payment.category' => $item_category,
                        'Payment.item_id' => $item_id,
                        'Payment.isDeleted' => 0
                ) 
        ));
        if (empty ( $data )) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deletePaymentsOutOfPeirods($toDate, $user_id){
        $toDate = $toDate->format("Y-m-d");
        $options = array (
                'joins' => array (
                        array (
                                'table' => 'recipes',
                                'alias' => 'Recipe',
                                'type' => 'right',
                                'conditions' => array (
                                        'Payment.Category' => 'Recipe',
                                        'Payment.item_id = Recipe.id'
                                )
                        ),
                        array (
                                'table' => 'recipe_summaries',
                                'alias' => 'RecipeSummary',
                                'type' => 'inner',
                                'conditions' => array (
                                        'Recipe.summary_id = RecipeSummary.id'
                                )
                        ),
                        array (
                                'table' => 'user_subscriptions',
                                'alias' => 'UserSubscription',
                                'type' => 'inner',
                                'conditions' => array (
                                        'RecipeSummary.publish_month > ' => $toDate,
                                        'UserSubscription.from_date <' => $toDate
                                )
                        )
                         
                ),
                'fields' => array('Payment.id')
        
        );
        if($user_id != null){
            $options['conditions']['Payment.user_id'] = $user_id;
        }
        $data = $this->find ( 'all', $options );
        return $data;
    }
    
    
    public function getPaymentToDelete($user_id = null) {
        $options = array (
                'joins' => array (
                        array (
                                'table' => 'recipes',
                                'alias' => 'Recipe',
                                'type' => 'right',
                                'conditions' => array (
                                        'Payment.Category' => 'Recipe',
                                        'Payment.item_id = Recipe.id' 
                                ) 
                        ),
                        array (
                                'table' => 'recipe_summaries',
                                'alias' => 'RecipeSummary',
                                'type' => 'inner',
                                'conditions' => array (
                                        'Recipe.summary_id = RecipeSummary.id' 
                                ) 
                        ),
                        array (
                                'table' => 'user_subscriptions',
                                'alias' => 'UserSubscription',
                                'type' => 'left',
                                'conditions' => array (
                                        'UserSubscription.from_date <= RecipeSummary.publish_month',
                                        'or' => array (
                                                'UserSubscription.to_date is null',
                                                'UserSubscription.to_date >=RecipeSummary.publish_month' 
                                        ) 
                                ) 
                        )
                         
                ),
                'conditions' => array('UserSubscription.id is null'),
                'fields' => array('Payment.id')
                
        );
        if($user_id != null){
            $options['conditions']['Payment.user_id'] = $user_id;
        }
        $data = $this->find ( 'all', $options );
        
        return $data;
    }
}
