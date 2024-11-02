<?php 

/**
 * main controller class
 */
class Controller
{
	
	public function view($view,$data = [])
	{

		extract($data);
        $courseDB = new Course();
		$response = $courseDB->all();
		$all_courses = ($response["success"]) ? $response["data"] : [];
		$filename = "../app/views/".$view.".view.php";
		//echo "Attempting to load: " . $filename; 
		if(file_exists($filename))
		{
			require $filename;
		}else{
			echo "could not find view file: ". $filename;
		}
	}
}