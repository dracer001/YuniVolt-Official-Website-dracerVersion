<?php 

/**
 * users model
 */
class User extends Model
{ 
	public $errors = [];
	protected $table = "users";

	protected $allowedColumns = [
		'firstname',
		'lastname',
		'email',
		'password',
		'reg_date'	
	];

	public function create_table()
	{
		//users table
		$query = "
		CREATE TABLE IF NOT EXISTS `users` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`email` varchar(100) NOT NULL,
			`firstname` varchar(30) NOT NULL,
			`lastname` varchar(30) NOT NULL, 
			`password` varchar(255) NOT NULL,
			`reg_date` datetime DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			UNIQUE KEY `email` (`email`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;		
		";

		return $this->query($query);
	} 
}