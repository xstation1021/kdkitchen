<div class="one-third">
    <h4>アカウント設定</h4>
    <div class="arrow dotted">
    <ul>
        <li>
            <?php echo $this->Html->link('アカウント設定', array('controller'=>'users', 'action'=>'edit'));?>
        </li>
        <li>
            <?php echo $this->Html->link('パスワード変更', array('controller'=>'users', 'action'=>'password'));?>
        </li>
    </ul>
    </div>
</div>
<div class="one-third <?php if(!$logged_user['is_admin']){echo 'last';}?>">
    <h4>マイページ編集</h4>
    <div class="arrow dotted">
    <ul>
        <li>
            <?php echo $this->Html->link('マイページ編集', array('controller'=>'user_pages', 'action'=>'edit', $data['UserPage']['id']));?>
        </li>
        
            <?php
            if($logged_user['is_admin'] != 1){
                echo "<li>";
                echo $this->Html->link('購入履歴', array('controller'=>'payments', 'action'=>'view_transaction', $logged_user['id']));
                echo "</li>";
                 }
                ?>
        
    </ul>
    </div>
</div>
<?php if(isset($logged_user['is_admin']) && $logged_user['is_admin'] == True) {?>
<div class="one-third <?php if($logged_user['is_admin']){echo 'last';}?>">
    <h4>アドミン</h4>
    <div class="arrow dotted">
    <ul>
        <li>
            <?php echo $this->Html->link('インストラクター一覧', array('controller'=>'users', 'action'=>'index'));?>
        </li>
        <li>
            <?php echo $this->Html->link('サブスクリプション', array('controller'=>'users', 'action'=>'subscription_list'));?>
        </li>
        <li>
            <?php echo $this->Html->link('イメージファイル一覧', array('controller'=>'images', 'action'=>'index'));?>
        </li>
        <li>
            <?php echo $this->Html->link('イメージファイルの追加', array('controller'=>'images', 'action'=>'add'));?>
        </li>
        <li>
            <?php echo $this->Html->link('ウェブサイトイメージの設定', array('controller'=>'featured_images', 'action'=>'edit'));?>
        </li>
        
        <li>
            <?php echo $this->Html->link('レシピの一覧', array('controller'=>'recipes', 'action'=>'admin_index'));?>
        </li>
        <li>
            <?php echo $this->Html->link('レシピカテゴリーの一覧', array('controller'=>'recipecategories', 'action'=>'index'));?>
        </li>
        <li>
            <?php echo $this->Html->link('購入履歴', array('controller'=>'payments', 'action'=>'user_recipe'));?>
        </li>
        <li>
            <?php echo $this->Html->link('よくある質問の一覧', array('controller'=>'questions', 'action'=>'admin_index'));?>
        </li>
        <li>
            <?php echo $this->Html->link('コンテンツの一覧', array('controller'=>'contents', 'action'=>'admin_index'));?>
        </li>
    </ul>
    </div>
</div>
<?php }?>
