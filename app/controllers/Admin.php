<?php 

/**
 * home class
 */
	// FOR ADMIN
define('ADMIN_KEY', 'adminKey');
define('ADMIN_PASSWORD', '$2y$10$I.uwiwfA7j9Kyi1wYiJ1eu.n.xf9z0UCouHeA.SNsbAeU8Oj5d1jq');


class Admin extends Controller
{
    protected $userDB, $collectionDB, $gallaryDB, $courseDB, $academyDB;

    public function __construct()
    {
        // Initialize the $user property here
        $this->userDB = new User();
        $this->collectionDB = new Collection();
        $this->gallaryDB = new Gallary();
        $this->bookingDB = new Booking();
        $this->academyDB = new CourseRegistration();
        $this->courseDB = new Course();
    }
	
	public function index()
	{   
	
        if(!empty($_SESSION['user']))
        {
            if($_SESSION['user'] == 'admin'){
                $data['title'] = "Admin";
                $response = $this->collectionDB->all();
                if ($response["success"]) {
                    $data["collections"] = $response["data"];
                }else{
                    $data["coollections"] = NULL;
                }
                return $this->view('admin',$data);
            }
        }

        redirect('?url=admin/auth');
	}

	public function auth()
	{   
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $adminKey = $_POST['admin-key'] ?? '';
            $adminPassword = $_POST['admin-password'] ?? '';
            if ($adminKey == ADMIN_KEY && password_verify($adminPassword, ADMIN_PASSWORD)){
                $_SESSION['user'] = 'admin';
                message("login success");
                redirect('?url=admin');
            } else {
                message("admin-key/password not correct");
                redirect('?url=admin/auth');
            }
      }
      else {

		$data['title'] = "Admin Login";

		$this->view('admin.auth',$data);
      }

	}

	private function InitApp()
	{   
        // create user table
        $response = $this->userDB->createDatabase();
        if($response !== true) return $response;

        // create user table
        $response = $this->userDB->create_table();
        if(!$response["success"] ) return $response;

        // create Service Booking table
        $response = $this->bookingDB->create_table();
        if(!$response["success"] ) return $response;

        // create Academy table
        $response = $this->academyDB->create_table();
        if(!$response["success"] ) return $response;

        // create Course table
        $response = $this->courseDB->create_table();
        if(!$response["success"] ) return $response;

        // create Gallry Collection table
        $response = $this->collectionDB->create_table();
        if(!$response["success"] ) return $response;

        
        return $this->gallaryDB->create_table();
    }

    private function InitGallary()
	{   
        // create user table
        $response = $userDB->createDatabase();
        if($response !== true) return $response;
        return $userDB->create_table();
    }
    public function app_setup()
    {   
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Set the response as JSON format
            $message = $this->InitApp();
            if ($message === true || $message["success"]) {

                $response =
                [
                    "status" => "success",
                    "message" => "Initialization Successful"
                ];
            } else {
                $response =
                [
                    "status" => "error",
                    "message" => $message
                ];
            }
            
            // Set the content type to JSON
            header('Content-Type: application/json');
            
            // Echo the JSON response
            echo json_encode($response);
        } else {
            return redirect('?url=admin');
        }
    }

    function uploadGallary()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $validation = $this->validate_form($_POST);
            if (!$validation["success"]) {
                returnJson([
                    "status"=> "error",
                    "errors" => $validation["errors"]
                ]);
                exit;
            }
            $caption = trim( $_POST["caption"]);
            $collection = trim($_POST["collection"]);

            // Handle file uploads
            if (!empty($_FILES['images']['name'][0])) {
                 
                $uploadDir = '../public/assets/media/uploads/gallary/';
                $fileNames = $_FILES['images']['name'];
                $fileTmpNames = $_FILES['images']['tmp_name'];
                var_dump($fileNames);
                var_dump($fileTmpNames);
                foreach ($fileTmpNames as $index => $tmpName) {
                    $fileName = basename($fileNames[$index]);
                    $uploadFilePath = $uploadDir . $fileName;

                    if (move_uploaded_file($tmpName, $uploadFilePath)) {
                        $response = $this->collectionDB->where(["name" => $collection]);
                        if($response["success"]){
                            if(!empty($response["data"])){
                                $collection_id = $response["data"][0]->id;
                            }else{
                                $response = $this->collectionDB->insert(["name"=>$collection]);
                                if ($response) {
                                    $response = $this->collectionDB->where(["name" => $collection]);
                                    if($response["success"] && !empty($response["data"])){
                                        $collection_id = $response["data"][0]->id;
                                    }else{
                                        returnJson(["status" => "error", "message" => "server error"]);
                                        exit;
                                    }
                                }else{
                                    returnJson(["status" => "error", "message" => "server error"]);
                                    exit;
                                }
                            }
                        }else{
                            returnJson(["status" => "error", "message" => "server error in searching for collection",
                        "response"=>$response]);
                            exit;
                        }
                        $response = $this->gallaryDB->insert([
			                "collection_id"=>$collection_id,
                            "filename"=>$fileName,
                            "caption"=>$caption
                        ]);
                        if ($response) {
                            returnJson(["status" => "success", "message" => "image added to gallary"]);
                        }else{
                            returnJson(["status" => "error", "message" => "server error"]);
                            exit;
                        }
                    } else {
                        returnJson(["status" => "error", "message" => "failed to upload file"]);
                        exit;
                    }
                }
            } else {
                returnJson(["status" => "error", "message" => "no file available"]);
                exit;
            }

            // Respond with a success message
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
        $checkRequired('caption', 'Caption');
        $checkRequired('collection', 'Image Collection');

        // Return validation result
        return empty($errors) ? ['success' => true, 'message' => "Validation successful."]
                            : ['success' => false, 'errors' => $errors];
    }
        
}


