<?php 

/**
 * signup class
 */
class Signup
{
	
	public function index()
	{  
	    //__________________________________
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
			$this->proccess_form();
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
		$user = new User(); 
		$response = $user->insert($formData);
		returnJson($response);
		exit;
	}


	private function validate_form($data)
	{
		$errors = [];
		// Helper function for required fields
		$checkRequired = function ($field, $label) use ($data, &$errors) {
			if (!isset($data[$field]) || empty(trim($data[$field]))) {
				$errors[] = "$label is required.";
				return false;
			}
			return trim($data[$field]);
		};

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
		$firstname = $checkRequired('firstname', 'First name');
		$lastname = $checkRequired('lastname', 'Last name');
		if ($firstname) $validateString($firstname, 'First name');
		if ($lastname) $validateString($lastname, 'Last name');

		// Validate email
		$email = $checkRequired('email', 'Email');
		if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors[] = "Invalid email format.";
		}

		// Validate password fields
		$password = $checkRequired('password', 'Password');
		if ($password && strlen($password) < 6) {
			$errors[] = "Password must be at least 6 characters long.";
		}

		// Return validation result
		return empty($errors) ? ['success' => true, 'message' => "Validation successful."]
							: ['success' => false, 'errors' => $errors];
	}

}