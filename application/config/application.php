<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site Name
|--------------------------------------------------------------------------
|
| Name of your site/application, e.g:
|
|	My First Website
|
*/
$config['site_name'] = 'MoneyLog';

/*
|--------------------------------------------------------------------------
| Template Option
|--------------------------------------------------------------------------
|
| Enable you to configure template option
| Default template: <your-site>/public/styles/<theme>/<filename>.html
*/

$config['template']['theme'] = 'default';
$config['template']['filename'] = 'index.html';

/*
|--------------------------------------------------------------------------
| Option Table Schema
|--------------------------------------------------------------------------
|
| Enable you to set/get option value from your database
|
*/
$config['option']['enable'] = FALSE;
$config['option']['table'] = '';
$config['option']['attribute'] = '';
$config['option']['value'] = '';

/*
|--------------------------------------------------------------------------
| User Session/Authentication
|--------------------------------------------------------------------------
|
| Enable you to validate logged-in user
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
| REQUIRED VARIABLES:
|	['enable']				TRUE/FALSE - Whether to enable Authentication
|	['table']				User/member database table name
|	['column']['id']		'user_id' column (INTEGER) PRIMARY KEY
|	['column']['name']		'user_name' column (VARCHAR) UNIQUE
|	['column']['pass']		'user_pass' column (VARCHAR)
|	['column']['role']		'user_role' column (INTEGER)
|
| OPTIONAL VARIABLES:
|	['table_meta']			User/member additional database table name 
							 (if you separate some of required data in different table)
|	['column']['key']		foreign key in 'table_meta' to map with 'table'
|	['column']['fullname']	'user_fullname' column (VARCHAR/TEXT)
|	['column']['email']		'user_email' column (VARCHAR)
|	['column']['status']	'user_status' column (INTEGER)
*/
$config['auth']['enable'] = FALSE;
$config['auth']['cookie'] = 'auth';
$config['auth']['table'] = '';
$config['auth']['table_meta'] = '';
$config['auth']['column']['id'] = '';
$config['auth']['column']['key'] = '';
$config['auth']['column']['name'] = '';
$config['auth']['column']['email'] = '';
$config['auth']['column']['pass'] = '';
$config['auth']['column']['fullname'] = '';
$config['auth']['column']['role'] = '';
$config['auth']['column']['status'] = '';
$config['auth']['expire'] = 0;


/*
|--------------------------------------------------------------------------
| Default QueryString URI Segmentation
|--------------------------------------------------------------------------
|
| Enable you to assign a key for $_GET to parse URI Segmentation
| e.g: http://your-domain.com/?p=/controller/module
|
*/
$config['node_segment'] = 'p';
