<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['login'] = 'login/index';
$route['register'] = 'register/index';

$route['logout'] = 'login/logout';


/*
	Admin Module Routes
*/
$route['admin'] = 'admin/index';

//Users
$route['admin/users'] = 'users/index';
$route['admin/add-user'] = 'users/add';
$route['admin/insert-user'] = 'users/insert';
$route['admin/edit-user/(:any)'] = 'users/edit/$1';
$route['admin/user-detail/(:any)'] = 'users/view/$1';
$route['admin/update-user'] = 'users/update';
$route['admin/delete-user/(:any)'] = 'users/delete/$1';

//Authors
$route['admin/authors'] = 'authors/index';
$route['admin/add-author'] = 'authors/add';
$route['admin/insert-author'] = 'authors/insert';
$route['admin/edit-author/(:any)'] = 'authors/edit/$1';
$route['admin/author-detail/(:any)'] = 'authors/view/$1';
$route['admin/update-author'] = 'authors/update';
$route['admin/delete-author/(:any)'] = 'authors/delete/$1';

//Articles
$route['admin/articles'] = 'articles/index';
$route['admin/add-article'] = 'articles/add';
$route['admin/publish-article/(:any)'] = 'articles/publish/$1';
$route['admin/insert-article'] = 'articles/insert';
$route['admin/edit-article/(:any)'] = 'articles/edit/$1';
$route['admin/article-detail/(:any)'] = 'articles/view/$1';
$route['admin/update-article'] = 'articles/update';
$route['admin/delete-article/(:any)'] = 'articles/delete/$1';

//Volumes
$route['admin/volumes'] = 'volumes/index';
$route['admin/add-volume'] = 'volumes/add';
$route['admin/publish-volume/(:any)'] = 'volumes/publish/$1';
$route['admin/insert-volume'] = 'volumes/insert';
$route['admin/edit-volume/(:any)'] = 'volumes/edit/$1';
$route['admin/update-volume'] = 'volumes/update';
$route['admin/delete-volume/(:any)'] = 'volumes/delete/$1';
$route['admin/archive-volume/(:any)'] = 'volumes/archive/$1';


$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;