<?php 

/**
 * home class
 */
class Services extends Controller
{
	
	public function index()
	{   
	    
     //_______________CLOSED_________________________
		$data['title'] = "Prpduct&Services";

		$this->view('services',$data);
	}

	public function bookService(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$response = $this->validate_form($_POST);
			if(!$response["success"]){
				returnJson([
					"status" => "error",
					"error" => $response["errors"]
				]);
				exit;
			}

			$bookingDB = new Booking();
			$_POST["user_id"] = $_SESSION["USER_DATA"]->id;
			$response = $bookingDB->insert($_POST);
			($response) ? returnJson([
				"status" => "success",
				"message" => $response
			]) : ([
				"status" => "error",
				"error" => $response
			]);
			exit;

		}
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

        // Validate name fields
        $checkRequired('response_email', 'Response Email');
        $checkRequired('service', 'Service');

        // Return validation result
        return empty($errors) ? ['success' => true, 'message' => "Validation successful."]
                            : ['success' => false, 'errors' => $errors];
    }
       
}