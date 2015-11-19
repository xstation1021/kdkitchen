
<div class="container-slim">

    <div class="login-title">
        <h3>パスワード変更</h3>
    </div>
<div>

</div>

    <div class="login">
        <div class="input text"><label>登録されているメールアドレスにパスワードのリセット手順を記載したメッセージが送信されます。</label></div>
        <?php
        echo $this->Form->create('User', array('action'=>'login'));
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

        <?php
        echo $this->Form->create('PasswordReset', array('action'=>'add'));
        echo $this->Form->input($imap['username'], array('label'=>'ユーザー名またはメールアドレス'));
        echo $this->Form->submit('送信する', array('class'=>'btn btn-login'));
        echo $this->Form->end();
        ?>
    </div>

</div>
