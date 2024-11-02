<?php 

/**
 * Gallary model
 */
class Gallary extends Model
{ 
	public $errors = [];
	public $table = "gallary";

	protected $allowedColumns = [
		'filename',
		'caption',
		'collection_id',
		'create_date',
	];

	public function create_table()
	{
		//users table
		$query = "
		CREATE TABLE IF NOT EXISTS `gallary` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`collection_id` int(11) NOT NULL,
			`filename` varchar(100) NOT NULL,
			`caption` varchar(30) NOT NULL,
			`create_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			PRIMARY KEY (`id`),
			FOREIGN KEY (`collection_id`) REFERENCES `collection`(`id`),
			UNIQUE KEY `filename` (`filename`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
		";

		return $this->query($query);
	} 
}
