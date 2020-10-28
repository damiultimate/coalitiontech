<?php 

// This is the file that the javascript ajax code 

// calls that will submit form to the JSON file also invoke the FunctionClass object

// and perform the required operation

include("classes/FunctionClass.php");

$saveFile = new FunctionClass();

$saveFile->Process($_GET);

// 			$new_data = file_get_contents("result.json");
// print_r(json_decode($new_data,true)[0]["quantity"]);
 ?>
