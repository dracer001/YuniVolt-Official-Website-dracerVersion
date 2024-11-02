<?php 

/**
 * users model
 */
class Course extends Model
{ 
	public $errors = [];
	protected $table = "course";

	protected $allowedColumns = [
        'img_thumbnail',
        'title',
		'description'
	];

	public function create_table()
	{
		//users table
		$query = "
        CREATE TABLE IF NOT EXISTS `course` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `img_thumbnail` varchar(50) NOT NULL,
            `title` varchar(50) NOT NULL,
            `description` datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            UNIQUE KEY (`title`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

		return $this->query($query);
	} 
}