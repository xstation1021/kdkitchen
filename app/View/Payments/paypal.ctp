<div class="container-slim">
    <div class="page-heading">
        <h1><?php echo $title;?></h1>
        <div class="dot-container">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <div class="container-slim profile">
         <?php
            $data = $this->data['Recipe'];
            $img_path ="/uploads/recipe/" . $data['hash'] . "/recipe" . $data['id'] . ".jpg"; 
         ?>
         <img src="<?php echo $img_path;?>"  height="360" width="540">
         <br>
         <a href="/recipes/paybypaypal/paypal">
             <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_200x51.png" alt="PayPal" />
         </a>
         <br>
<a href="http://www.credit-card-logos.com"><img alt="" title="" src="http://www.credit-card-logos.com/images/multiple_credit-card-logos-1/paypal_mc_visa_amex_disc_210x80.gif" width="210" height="80" border="0" /></a>    
</div>
