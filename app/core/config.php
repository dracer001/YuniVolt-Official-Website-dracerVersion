<?php 


/****
* app info
*/
define('APP_NAME', 'YuniVolt');
define('APP_DESC', 'Power And Security');

/****
* database config
*/
if($_SERVER['SERVER_NAME'] == 'localhost')
{
	//database config for local server
	define('DBHOST', 'localhost:3306');
	define('DBNAME', 'yunivolt');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');

	//root path e.g localhost/
	define('ROOT', 'http://localhost/yunivolt/public');
}else
{
	//database config for live server
	define('DBHOST', 'localhost');
	define('DBNAME', 'id21274299_yunivolt');
	define('DBUSER', 'id21274299_root');
	define('DBPASS', 'MaxWonder@10');
	define('DBDRIVER', 'mysql');

	//root path e.g https://www.yourwebsite.com
	define('ROOT', 'https://ibtsociety.000webhostapp.com');


}

