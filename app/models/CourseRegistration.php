<?php 

/**
 * Academy model
 */
class CourseRegistration extends Model
{ 
	public $errors = [];
	protected $table = "course_registration";

	protected $allowedColumns = [
		'user_id',
		'course_id',
		'reg_date'	
	];

	public function create_table()
	{
		//users table
		$query = "
        CREATE TABLE IF NOT EXISTS `course_registration` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `course` varchar(50) NOT NULL,
            `book_date` datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

		return $this->query($query);
	} 
}