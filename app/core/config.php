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
	define('DBHOST', 'localhost:3308');
	define('DBNAME', 'yunivolt');
	define('DBUSER', 'dracer');
	define('DBPASS', 'mysql_password');
	define('DBDRIVER', 'mysql');

	//root path e.g localhost/
	define('ROOT', 'http://localhost/yunivolt/public');
}else
{
	//database config for live server
	define('DBHOST', 'localhost');
	define('DBNAME', 'yunivolt');
	define('DBUSER', 'root');
	define('DBPASS', 'mysql_password');
	define('DBDRIVER', 'mysql');

	//root path e.g https://www.yourwebsite.com
	define('ROOT', 'http://192.168.142.184/yunivolt/public');


}

