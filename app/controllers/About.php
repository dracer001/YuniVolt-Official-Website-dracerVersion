<?php 

/**
 * home class
 */
class About extends Controller
{
	protected $userDB, $collectionDB, $gallaryDB;

    public function __construct()
    {
        // Initialize the $user property here
        $this->collectionDB = new Collection();
        $this->gallaryDB = new Gallary();
    }

	public function index()
	{   
	    
     //_______________CLOSED_________________________
		$data['title'] = "About";
		$gallary_data = $this->getGallaries();
		$data["gallaries"] = (is_array($gallary_data)) ? $gallary_data : NULL;
		$this->view('about',$data);
	}
	
	
	private function getGallaries()
	{
		//users table
		$query = "SELECT filename, caption, name FROM ".$this->gallaryDB->table." INNER JOIN ".$this->collectionDB->table." ON collection_id=collection.id;" ;
		$response =  $this->gallaryDB->query($query);
		if ($response["success"]) {
			$gallaries = $response["data"];
			$response_data = [];
			foreach ($gallaries as $gallary) {
				$gallary_data = [
					"filename" => $gallary->filename,
					"caption" => $gallary->caption
				];
				if(!array_key_exists($gallary->name, $response_data)){
					$response_data[$gallary->name] = [$gallary_data];
				}else{
					array_push($response_data[$gallary->name], $gallary_data);
				}
			}
		}else{
			$response_data = $response["error"];
		}
		return $response_data;
	} 
}
