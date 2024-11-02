<?php 

/**
 * signup class
 */
// require_once '../app/middleware/google-api-php-client-main/src/Client.php';
// app\middleware\google-api-php-client-main\src\Client.php

class Signup
{
    protected $user;

    public function __construct()
    {
        // Initialize the $user property here
        $this->user = new User();
    }

	public function index()
	{  
	    //__________________________________
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
			$duplicate = $this->user->where(["email"=>trim($_POST["email"])]);
			if($duplicate["success"]){
				if(!empty($duplicate["data"])){
					returnJson([
						"success" => false,
						"message" => "email already exists"
					]);
					exit;
				}else{
					$this->proccess_form();
				}
			}else{
				returnJson($duplicate);
			}
		}
	}

	private function proccess_form()
	{
		// Retrieve form data
		$formData = [
			'firstname' => $_POST['firstname'] ?? '',
			'lastname' => $_POST['lastname'] ?? '',
			'email' => $_POST['email'] ?? '',
			'password' => $_POST['password'] ?? '',
		];

		// Validate the data
		$validationResult = $this->validate_form($formData);

		// Check for validation errors
		if (!$validationResult['success']) {
			returnJson($validationResult);
			exit;
		}

		// Hash the password and store user in the database
		$formData['password'] = password_hash($formData['password'], PASSWORD_DEFAULT);
		$formData['reg-date'] = date("Y-m-d H:i:s");
		$response = $this->user->insert($formData);

		Auth::authenticate($formData); 
		returnJson($response);
		exit;
	}


	private function validate_form($data)
	{
		$errors = [];
		// Helper function for string validation
		$validateString = function ($fieldValue, $label, $minLength = 3) use (&$errors) {
			if (strlen($fieldValue) < $minLength) {
				$errors[] = "$label must be at least $minLength characters long.";
			}
			if (!preg_match("/^[A-Za-z]+$/", $fieldValue)) {
				$errors[] = "$label must contain only letters.";
			}
		};

		// Validate name fields
		$firstname = checkRequired('firstname', 'First name', $data, $errors);
		$lastname = checkRequired('lastname', 'Last name', $data, $errors);
		if ($firstname) $validateString($firstname, 'First name');
		if ($lastname) $validateString($lastname, 'Last name');

		// Validate email
		$email = checkRequired('email', 'Email', $data, $errors);
		if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Invalid email format.";
		}

		// Validate password fields
		$password = checkRequired('password', 'Password', $data, $errors);
		if ($password && strlen($password) < 6) {
			$errors[] = "Password must be at least 6 characters long.";
		}

		// Return validation result
		return empty($errors) ? ['success' => true, 'message' => "Validation successful."]
							: ['success' => false, 'message' => $errors];
	}

	public function google()
	{
		// use Google\Client;
		
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data = json_decode(file_get_contents("php://input"), true);
			$token = $data['token'];

			$client = new Google_Client(['client_id' => '856091974883-ras3bsdnkqu91gfp55846ovmpop7jnrk.apps.googleusercontent.com']);  // Specify your CLIENT_ID
			$payload = $client->verifyIdToken($token);
			// var_dump($payload);
			if ($payload) {
				$userid = $payload['sub'];
				$email = $payload['email'];
				// // Token is valid, extract user info
				$user_info = $this->user->firstItem(["email"=>$email]);
				// var_dump($user_info);
				if($user_info["success"]){
					$user_info = $user_info["data"][0] ?? '';
					if (empty($user_info)) {
						$formData = [
							"lastname" => $payload["family_name"] ?? '',
							"firstname" => $payload["given_name"] ?? '',
							"email" => $payload["email"],
							"password" => "",
							"auth_type" => "google"
						];
						$response = $this->user->insert($formData);
						if($response["success"]){
							$new_user = $this->user->where(["email"=>$email]);
							if($new_user["success"]){
								Auth::authenticate($new_user["data"][0]); 
								returnJson(["success" => true, "message" => "Registration Successful"]);
								exit;
							}
							returnJson($new_user);
							exit;
						}
						returnJson(["success" => false, "message" => $response]);
						exit;
					}else{
						Auth::authenticate($user_info); 
						returnJson(["success" => true, "message" => "Login Successful"]);
						exit;
					}
				}else{
					returnJson($user_info);
					exit;
				}
			} else {
				// Invalid ID token
				returnJson($user_info);([
					'success' => false,
				 	'message' => 'Invalid token',
					'payload' => $payload
				]);
				exit;
			}
		}

	}




}