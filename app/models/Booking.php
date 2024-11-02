<?php 

/**
 * users model
 */
class Booking extends Model
{ 
	public $errors = [];
	protected $table = "booking";

	protected $allowedColumns = [
		'user_id',
		'response_email',
		'service',
		'message',
		'book_date'	
	];

	public function create_table()
	{
		//users table
		$query = "
        CREATE TABLE IF NOT EXISTS `booking` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `response_email` varchar(100) NOT NULL,
            `service` varchar(50) NOT NULL,
            `message` varchar(500) NULL,  -- Explicitly allow NULL
            `book_date` datetime DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ";

		return $this->query($query);
	} 
}