<?php 

/**
 * home class
 */
	// FOR ADMIN
	define('ADMIN_KEY', 'adminKey');
	define('ADMIN_PASSWORD', '$2y$10$I.uwiwfA7j9Kyi1wYiJ1eu.n.xf9z0UCouHeA.SNsbAeU8Oj5d1jq');
	

class Admin extends Controller
{
    public static $is_auth = false;
	
	public function index()
	{   
	
        if(!empty($_SESSION['user']))
        {
            if($_SESSION['user'] == 'admin'){
                $data['title'] = "Admin";
                return $this->view('admin',$data);
            }
        }

        redirect('?url=admin/auth');
	}

	public function auth()
	{   
		if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $adminKey = $_POST['admin-key'];
            $adminPassword = $_POST['admin-password'];
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
        $userDB = new User();
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
    
}