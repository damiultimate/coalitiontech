<?php 

// This is the class that actually carries out all the necessary

// processes involved in saving, updating and the like...


class FunctionClass{

	public function __construct(){

	}

	public function Process($data){

		$this->Save($data);
	}

	public function Save($data){

		if(!file_exists("result.json")){
			$json_var = json_encode($data);	
			file_put_contents("result.json", $json_var);

		}else{
			$empty = false;
			$new_data = file_get_contents("result.json");
			$new_json_var = array();
			$json_var = json_decode($new_data, true);
			$counter = sizeof($json_var);
			for($i=0; $i < $counter; $i++){
				if(!empty($json_var[$i])){
				$new_json_var[]	= $json_var[$i];
			}else{
				$empty = true;
				break;
			}
			}
			if($empty){
				$new_json_var[] = $json_var;
			}

			$new_json_var[]	= $data;

			file_put_contents("result.json", json_encode($new_json_var));
		}

		echo "file saved successfully";
	}


	public function Update($data){

		$quantity = $data["quantity"];

		$price = $data["price"];

		$index = $data["index"];

		$raw_data = file_get_contents("result.json");

		$json_data = json_decode($raw_data,true);

		$json_data[intval($index)]["quantity"] = $quantity;
		$json_data[intval($index)]["price"] = $price;

		$json_data = json_encode($json_data);

		file_put_contents("result.json", $json_data);

		echo "Successful";
	}

}

 ?>