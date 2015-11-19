<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/addemail', array('controller' => 'pages', 'action' => 'addEmailToNewsLetter'));
	Router::connect('/find/area/*', array('controller' => 'user_pages', 'action' => 'area'));
	Router::connect('/find/recipe/*', array('controller' => 'recipes', 'action' => 'index'));
	Router::connect('/services/kdkplus', array('controller' => 'services', 'action' => 'kdkplus'));
	Router::connect('/services/*', array('controller' => 'services', 'action' => 'kdkservice'));
	Router::connect('/services/*', array('controller' => 'services', 'action' => 'kdkservice'));
	
    Router::connect('/images', array('controller' => 'media', 'action' => 'index'));
    Router::connect('/images/', array('controller' => 'media', 'action' => 'index'));
    Router::connect('/images/index', array('controller' => 'media', 'action' => 'index'));
    Router::connect('/images/add', array('controller' => 'media', 'action' => 'add'));
    Router::connect('/recipecategories/add', array('controller' => 'recipecategories', 'action' => 'edit'));
    Router::connect('/users/subscription_edit/*', array('controller' => 'users', 'action' => 'subscription_edit'));
    Router::connect('/users/subscription_add/*', array('controller' => 'users', 'action' => 'subscription_edit'));
    Router::connect('/pages/downloadfile', array('controller' => 'pages', 'action' => 'downloadfile'));
    Router::connect('/admin/oauth2callback', array('controller' => 'user_pages', 'action' => 'oauth2callback'));
    

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
