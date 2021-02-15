<html>
<head>

<title>Address Book</title>
</head>
<body>
<table width="600"border="1">
<thead>
<style>
.addbtn{
    padding: 5px;
    display: flex;
    left: 550px;
    position: relative;
    bottom: 30px;
}
</style>
<tr>
<th> S.no </th>
<th> Firstname </th>
<th> Lastname </th>
<th> Email </th>
<th> Address </th>
<th> Actions </th>
</tr>
</thead>
<tbody>
<h3><center>Address Book </center></h3>
<h5>List Contact </h5>

<a name="addBtn" class="addbtn" href="index.php/add"> ADD </a>
<?php
$i = 1;
foreach($data as $resp)
	{
		$id = $resp->id;
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$resp->firstName."</td>";
		echo "<td>".$resp->lastName."</td>";
		echo "<td>".$resp->emailAddress."</td>";
		echo "<td>".$resp->street .", ".$resp->city."</td>";
		echo "<td><button class='updateBtn' id=$id>Update</button></td><td><button  class='delBtn' id=$id> Delete</button></td><td><button  class='viewBtn' id=$id> View</button></td>";
		$i++;
	}
?>
</tbody>
</table>
</body>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
$('.delBtn').on('click',function(){
	var id = $(this).attr('id');
	if(confirm("Are you sure to delete?")){
	$.ajax({
		type:"POST",
		url: 'index.php/delete',
		dataType : 'json',
		data : {"id":id},
		success: function (response){
			return response;
		},
		error : function(err){
			return err;
		}
	});
	}
	
});

$('.viewBtn').on('click',function(){
	var id = $(this).attr('id');
	$.ajax({
		type:"POST",
		url: 'index.php/view',
		dataType : 'json',
		data : {"id":id},
		success: function (response){
			console.log(response);
		},
		error : function(err){
			return err;
		}
	});
});

$('.updateBtn').on('click',function(){
	var id = $(this).attr('id');
	$.ajax({
	type:"POST",
		url: 'index.php/update',
		dataType : 'json',
		data : {"id":id},
		success: function (response){
			return response;
		},
		error : function(err){
			return err;
		}	
	});
});
});



</script>