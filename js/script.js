
$(document).ready(function(){

//Changes the edit button to a save button when clicked

$("body").on("click",".edit-table-data", function(){
	$(this).parent().parent().find(".qis").css({"border":"2px solid black","background-color":"white"}).attr("contenteditable","true");
	$(this).parent().parent().find(".ppi").css({"border":"2px solid black","background-color":"white"}).attr("contenteditable","true");
	$(this).text("Save").removeClass("edit-table-data");
	$(this).addClass("save-table-data");
});


$("body").on("click",".save-table-data", function(){
var parent= $(this).parent().parent();
var new_this = $(this);

//Allows editing priviledge to the table data by using the HTML contenteditable

parent.find(".qis").attr("contenteditable","false");
parent.find(".ppi").attr("contenteditable","false");

var qis = parent.find(".qis").text();
var ppi = parent.find(".ppi").text();

if(isNaN(qis) == true){

	alert("Cannot change value, Please make sure the Quantity in Stock is a valid number");
	parent.find(".qis").attr("contenteditable","true");
	parent.find(".ppi").attr("contenteditable","true");
}

if(isNaN(ppi) == true){

	alert("Cannot change value, Please make sure the Price per Item is a valid number");
	parent.find(".qis").attr("contenteditable","true");
	parent.find(".ppi").attr("contenteditable","true");
}


var string = "quantity="+parent.find(".qis").text()+"&price="+parent.find(".ppi").text()+"&index="+parent.find(".index").text();

string = string.replace("<br>","");


if(isNaN(qis) == false && isNaN(ppi) == false){

//Updates the changed field within the table

$.get("update.php", string, function(data, status){

	if(status == "success"){
		parent.find(".qis").css({"border":"1px solid #dee2e6","background-color":"inherit"}).attr("contenteditable","false");
		parent.find(".ppi").css({"border":"1px solid #dee2e6","background-color":"inherit"}).attr("contenteditable","false");
		parent.find(".tvn").text(parseFloat(qis)*parseFloat(ppi));
		new_this.text("Edit").removeClass("save-table-data");
		new_this.addClass("edit-table-data");
		CalculateTotalValue();
	}
	else{
		alert("Could not save data, please try again");
	}

});

}


});

});

var index = 0;
var counter =0;

function submit(){

//Submits the form to the include.php and creates or updates the JSON file

	$(".submit-form").prepend('<div class="spinner-border text-light spinner-border-sm" role="status"> &nbsp;<span class="sr-only">Loading...</span></div>');

	var serializedVar = $(".form").serialize();

	$.get("include.php", serializedVar, function(data, status){
		if(status == 'success'){
		$("tbody").prepend('<tr><td scope="row" class="index">'+index+'</td><td class="prodnm">'+$("#name").val()+'</td><td class="qis">'+$("#quantity").val()+'</td><td class="ppi">'+$("#price").val()+'</td><td class="date">'+Date().toString()+'</td><td class="tvn">'+parseFloat($("#quantity").val())*parseFloat($("#price").val())+'</td><td class="edit-table"><button class="btn btn-primary edit-table-data">Edit</button></td></tr>');

		$(".spinner-border").remove();

		index++;
		$(".json_file").css("display","inline-block");
		CalculateTotalValue();
	}else{
		alert("Faulure to submit, Please try again");
	}
	});


}


function CalculateTotalValue(){

//Calculates the total value number
 
	var total = $(".tvn").length;

	for(var i=0; i<total; i++){
		counter += parseFloat($(".tvn").eq(i).html());
		if(i == total-1){
			break;
		}
	}

	$(".tvn_all").html("Total = "+counter);

	counter=0;
}
