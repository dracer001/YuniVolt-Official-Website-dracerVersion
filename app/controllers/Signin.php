<?php 

/**
 * signup class
 */
class Signin
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
			$user_info =$this->user->firstItem(["email"=>trim($_POST["email"])]);
			if ($user_info["success"]) {
				$user_info = $user_info["data"][0] ?? '';
				if (empty($user_info)) {
					returnJson(["success" => false, "message" => "Invalid email"]);
					exit;
				}else if (password_verify($_POST["password"], $user_info->password)) {
					Auth::authenticate($user_info); 
					returnJson(["success" => true, "message" => "Login Successful"]);
				} else {
					returnJson(["success" => false, "message" => "Invalid password"]);
				}
			} else {
				returnJson($user_info);
			}
			exit;
		}
	}

}