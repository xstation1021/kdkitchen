<?php
/* General */
$config['project_dir'] = '/Users/takuto/Work/personal/kdkitchen/app';

$config['input_name_map'] = array(
                        'email'         =>'e_s8v9d0',
                        'sender_email'  =>'se_s8v9d0',
                        'receiver_email'=>'re_s8v9d0',
                        'subject'       =>'s_cm1oa7',
                        'body'          =>'b_fuu33w',
                        'created_by'    =>'c_fuu33w',
                        'username'  =>'u_oao10d',
                        'name'      =>'n_df660c',
                        'password'  =>'p_7r34iu',
                       );

$config['email'] = array(
                    'info'      => 'info@kdkitchen.com',
                    'contact'   => 'info@kdkitchen.com',
                    'admin'   => 'marikuroda@kdkitchen.com',
                   );

$config['url'] = 'http://www.kdkitchen.com/';                   

/* Email Data */
$config['contact_chef_subject'] = 'KD KITCHEN メッセージ';
$config['kd_kitchen_certification_contact'] = 'KD KITCHEN 資格取得問合せ';
$config['kd_kitchen_workshops_contact'] = 'KD KITCHEN ワークショップ問合わせ';
$config['kd_kitchen_Payment'] = '商品が購入されました';
$config['kd_kitchen_Payment_contact'] = 'レシピ購入の問い合わせ';

/* Login Config */
$config['login_inspection_interval_min'] = 10;
$config['login_attempt_limit'] = 8;
$config['login_lockout_min'] = 60;

/* Constant Contact*/
$config['constant_contact_key'] = 'hfbpz3f52ghbfch8thtr27ry';
$config['constant_contact_token'] = 'b7a92ce1-c3ca-44a6-9360-92077c2e3be3';


/* Google API */

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $config['google_client_id'] = "743678348542-lbp6ocm5ggrobkiggj0mo3dhrtkgs2bm.apps.googleusercontent.com";
    $config['google_client_secret'] = "GOsNa5FrLgZOvLbkQbR3xmXY";
    $config['google_client_scope'] = "https://www.googleapis.com/auth/calendar.readonly";
    $config['google_redirect_url'] = "http://local.kdkitchen.com/user_pages/oauth2callback";
} else {
    $config['google_client_id'] = "284016348316-3af1hjqng73mc3t76b2cf2vfvb3lja5a.apps.googleusercontent.com";
    $config['google_client_secret'] = "QW5NRVqA9QSTVuWCEVMuf3r-";
    $config['google_client_scope'] = "https://www.googleapis.com/auth/calendar.readonly";
    $config['google_redirect_url'] = "http://www.kdkitchen.com/admin/oauth2callback";
}


/* Paypal API */
$config['recipe_price'] = 3.50;
$config['us_tax'] = 0.08875;
 if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
//	$config['paypal_api_username'] = 'kdkitchen.api-facilitator_api1.gmail.com';
//    $config['paypal_api_password'] = '4FZQXECDAZKNH68G';
//    $config['paypal_api_signature'] = 'AFcWxV21C7fd0v3bYYYRCpSSRl31ALwiex5gAE6ys5LrevdeKICbIhni';
//    $config['paypal_url'] = 'https://api-3t.sandbox.paypal.com/nvp';
//    $config['paypal_returnUrl'] = 'https://local.kdkitchen.com/payments/review';
//    $config['paypal_cancelUrl'] = 'http://local.kdkitchen.com/recipes/index';
//    $config['paypal_url2'] = 'https://www.sandbox.paypal.com';

    // nakamura local setting
	$config['paypal_api_username'] = 'yasuk100+sell_api1.gmail.com';
    $config['paypal_api_password'] = 'AXC7KJWSZUM8VTXS';
    $config['paypal_api_signature'] = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AAYPZzO9wQf.52r-dXwnDxH.eNic';
    $config['paypal_url'] = 'https://api-3t.sandbox.paypal.com/nvp';
    $config['paypal_returnUrl'] = 'https://local.kdkitchen.com/payments/review';
    $config['paypal_cancelUrl'] = 'http://local.kdkitchen.com/recipes/index';
    $config['paypal_url2'] = 'https://www.sandbox.paypal.com';
 } else{
     $config['paypal_api_username'] = 'mari_api1.karadadetox.com';
     $config['paypal_api_password'] = '7V4PLRD4RWXURWMQ';
     $config['paypal_api_signature'] = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AhQJmhx1NXc3UjGXMbn7J9a4Xoaw';
     $config['paypal_url'] = 'https://api-3t.paypal.com/nvp';
     $config['paypal_returnUrl'] = 'https://kdkitchen.com/payments/review';
     $config['paypal_cancelUrl'] = 'http://kdkitchen.com/recipes/index';
     $config['paypal_url2'] = 'https://www.paypal.com';
 }

$config['shopping_category_to_full'] = array('recipe'=>'Recipe');
$config['shopping_category_to_initial'] = array('Recipe'=>'R');