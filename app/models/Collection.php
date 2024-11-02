<?php 

/**
 * Gallary Collection model
 */
class Collection extends Model
{ 
	public $errors = [];
	public $table = "collection";

	protected $allowedColumns = [
		'name',
		'create_date'
	];

	public function create_table()
	{
		//users table
		$query = "
		CREATE TABLE IF NOT EXISTS `collection` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(100) NOT NULL,
			`create_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			UNIQUE KEY `name` (`name`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
		";

		return $this->query($query);
	} 
}