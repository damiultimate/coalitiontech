<?php 

file_put_contents("result.json", "");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Coalition Technologies</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="new-parent">
	<form method="" action="javascript:submit()" class="form">
		<h2 class="form-identity">Coalition Technologies Test</h2>
	  <div class="form-group">
	    <label for="name">Product Name</label>
	    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Product Name" required="">
	  </div>
	  <div class="form-group">
	    <label for="quantity">Quantity In Stock</label>
	    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity In Stock" required="">
	  </div>
	  <div class="form-group">
	    <label for="price">Price Per Item</label>
	    <input type="number" class="form-control" name="price" id="price" placeholder="Price Per Item" required="">
	  </div>
	  <button type="submit" class="btn btn-primary submit-form">Submit</button>
	</form>
</section>

<section class="new-parent">
	 <a href="result.json" target="_blank"> <button class="btn btn-primary json_file">View Generated JSON file</button></a>
</section>

<section class="new-parent">
	<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Index</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity In Stock</th>
      <th scope="col">Price Per Item</th>
      <th scope="col">Datetime Submitted</th>
      <th scope="col">Total Value Number</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row" class="index"></td>
      <td class="prodnm"></td>
      <td class="qis"></td>
      <td class="ppi"></td>
      <td class="date"></td>
      <td class="tvn_all">Total = 0.00</td>
      <td class="edit-table"></td>
    </tr>
  </tbody>
</table>
</section>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>