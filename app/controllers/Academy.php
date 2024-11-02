<?php 

/**
 * Academy class
 */
class Academy extends Controller
{
	
	private $courseDB, $course_regDB;
	public function __construct()
    {
        $this->course_regDB = new CourseRegistration();
        $this->courseDB = new Course();
    }

	public function index()
	{   
	    
     //_______________CLOSED_________________________
		$data['title'] = "Academy";
		
		$user_id = (isset($_SESSION["USER_DATA"])) ? $_SESSION["USER_DATA"]->id : 0;
		// get all courses
		$response = $this->courseDB->query("
			SELECT 
				c.*,
				CASE 
					WHEN cr.user_id IS NOT NULL THEN true 
					ELSE false 
				END AS registered
			FROM 
				course AS c
			LEFT JOIN 
				course_registration AS cr ON c.course_id = cr.course_id AND cr.user_id = $user_id;
		");
		// print_r($response);
		$data["courses"] = ($response["success"]) ? $response["data"] : NULL;

		$this->view('academy',$data);
	}

	public function registerCourse(){
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$_POST["user_id"] = $_SESSION["USER_DATA"]->id ?? '';
			$response = $this->validate_form($_POST);
			if(!$response["success"]){
				returnJson($response);
				exit;
			}
			
			$response = $this->course_regDB->insert($_POST);
			returnJson($response);
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
        $checkRequired('user_id', 'User');
        $checkRequired('course_id', 'course_id');

        // Return validation result
        return empty($errors) ? ['success' => true, 'message' => "Validation successful."]
                            : ['success' => false, 'errors' => $errors];
    }
       
}