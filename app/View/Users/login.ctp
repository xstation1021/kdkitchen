<div class="container-slim">

    <div class="login-title">
        <h3>ログイン</h3>
    </div>

    <div class="login">
        <?php
        echo $this->Form->create('User', array('action'=>'login'));
        ?>
        

        <?php
        echo $this->Form->input($imap['username'], array('label'=>'ユーザー名またはメールアドレス'));
        echo $this->Form->input($imap['password'], array('type'=>'password', 'label'=>'パスワード'));
        echo $this->Html->link('パスワードを忘れた方', array('controller'=>'password_resets', 'action'=>'add'));
        echo $this->Form->submit('ログインする', array('class'=>'btn btn-login'));
        ?>
        <div class="hidden">
            <!-- $pam check -->
            <div class="dummy">
                <input name="username" type="text" value="">
                <input name="password" type="password" value="">
            </div>
        </div>
        <?php 
        echo $this->Form->end();
        ?>
    </div>

</div>
