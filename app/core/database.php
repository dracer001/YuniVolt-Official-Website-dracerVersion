<?php 


/**
 * database class
 */
class Database
{ 

	private function connectServer()
	{
	    $str = DBDRIVER.":host=".DBHOST;
	    return new PDO($str,DBUSER,DBPASS); 

	}

	private function connect()
	{
	    $str = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;
	    return new PDO($str,DBUSER,DBPASS); 

	}

	public function connect2()
	{
	    $con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME); 
        if ($con->connect_error) {
	         die("Connection failed: " .  $con->connect_error);
        } 
		return $con;
	}

	public function createDatabase()
	{
		// Connect to the MySQL server without specifying a database
		$pdo = $this->connectServer();

		// SQL query to create the database
		$sql = "CREATE DATABASE IF NOT EXISTS " . DBNAME;

		try {
			// Execute the query to create the database
			$pdo->exec($sql);
			return true;
		} catch (PDOException $e) {
			// Handle errors
			return "Error creating database: " . $e->getMessage();
		}
	}


	public function query($query, $data = [], $type = 'object')
	{
		try {
			// Connect to the database
			$con = $this->connect();

			// Prepare the SQL query
			$stm = $con->prepare($query);
			if ($stm === false) {
				return [
					'success' => false,
					'error' => 'Failed to prepare the SQL statement.'
				];
			}

			// Execute the query with the provided data
			$check = $stm->execute($data);
			if ($check === false) {
				return [
					'success' => false,
					'error' => 'Failed to execute the SQL statement.'
				];
			}

			// Determine the fetch type
			$fetchType = ($type === 'object') ? PDO::FETCH_OBJ : PDO::FETCH_ASSOC;

			// Fetch all results
			$result = $stm->fetchAll($fetchType);
			if ($result === false) {
				return [
					'success' => false,
					'error' => 'Failed to fetch results.'
				];
			}

			// Return results if any
			return [
				'success' => true,
				'data' => $result
			];
		} catch (PDOException $e) {
			// Return error message for PDO exceptions
			return [
				'success' => false,
				'error' => 'Database error: ' . $e->getMessage()
			];
		} catch (Exception $e) {
			// Return error message for general exceptions
			return [
				'success' => false,
				'error' => 'An unexpected error occurred: ' . $e->getMessage()
			];
		}
	}



	// public function query($query, $data = [], $type = 'object')
	// {
	// 	try {
	// 		// Connect to the database
	// 		$con = $this->connect();
	
	// 		// Prepare the SQL query
	// 		$stm = $con->prepare($query);
	// 		if ($stm === false) {
	// 			throw new PDOException('Failed to prepare the SQL statement.');
	// 		}

	// 		// Execute the query with the provided data
	// 		$check = $stm->execute($data);
	// 		if ($check === false) {
	// 			throw new PDOException('Failed to execute the SQL statement.');
	// 		}

	// 		// Determine the fetch type
	// 		$fetchType = ($type === 'object') ? PDO::FETCH_OBJ : PDO::FETCH_ASSOC;

	// 		// Fetch all results
	// 		$result = $stm->fetchAll($fetchType);
	// 		if ($result === false) {
	// 			throw new PDOException('Failed to fetch results.');
	// 		}

	// 		// Return results if any
	// 		if (is_array($result) && count($result) > 0) {
	// 			return $result;
	// 		} else {
	// 			return []; // Return an empty array if no results
	// 		}
	// 	} catch (PDOException $e) {
	// 		// Return error message
	// 		return 'Database error: ' . $e->getMessage();
	// 	} catch (Exception $e) {
	// 		// Return general error message
	// 		return 'An unexpected error occurred: ' . $e->getMessage();
	// 	}
	// }


	// public function query($query,$data = [],$type = 'object')
	// {
	// 	$con = $this->connect();

	// 	$stm = $con->prepare($query);
	// 	if($stm)
	// 	{
	// 		$check = $stm->execute($data);
	// 		if($check)
	// 		{
	// 			if($type == 'object')
	// 			{
	// 				$type = PDO::FETCH_OBJ;
	// 			}else{
	// 				$type = PDO::FETCH_ASSOC;
	// 			}

	// 			$result = $stm->fetchAll($type);

	// 			if(is_array($result) && count($result) > 0)
	// 			{
	// 				return $result;
	// 			}
	// 		}
	// 	}

	// 	return false;
	// }	
}