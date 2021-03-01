<div class="container">
    <!-- Display status message -->
    <div class="statusMsg"></div>
    
    <div class="row">
        <div class="col-md-12 head">
            <h5><?php echo $title; ?></h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalUserAddEdit"><i class="plus"></i> Add Details</a>
            </div>
        </div>
    
<!-- Data list table --> 
        <table class="table table-striped table-bordered" border="1">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
				<th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
		<tbody id="listData">
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
				echo "<td>".$resp->street .", ".$resp->city."</td>"; ?>
				<td>
                    <a href="javascript:void(0);" class="btn btn-warning" rowID="<?php echo $resp->id; ?>" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit">edit</a>
                    <a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?userAction('delete', '<?php echo $resp->id; ?>'):false;">delete</a>
                </td>
			    <?php $i++; 
		  }
		?>
		</tbody>
        </table>
    </div>
</div>

<!-- Modal Add and Edit Form -->
<div class="modal fade" id="modalUserAddEdit" role="dialog" hidden>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span id="hlabel">Add Details</span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="statusMsg"></div>
                <form role="form">
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" >
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" >
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="gender1" name="gender" class="custom-control-input" value="Male" checked="checked" >
                            <label class="custom-control-label" for="gender1">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="gender2" name="gender" class="custom-control-input" value="Female" >
                            <label class="custom-control-label" for="gender2">Female</label>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id"/>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="userSubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
// Update the members data list
function getList(){
    $.post( "<?php echo base_url('book/index/'); ?>", function( data ){
		console.log(data);
        $('#listData').html(data);
    });
}
// Send CRUD requests to the server-side script
function userAction(type, id){
    id = (typeof id == "undefined")?'':id;
    var userData = '', frmElement = '';
    if(type == 'add'){
        frmElement = $("#modalUserAddEdit");
        userData = frmElement.find('form').serialize();
    }else if (type == 'edit'){
        frmElement = $("#modalUserAddEdit");
        userData = frmElement.find('form').serialize();
    }else{
        frmElement = $(".row");
        userData = 'id='+id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('book/'); ?>'+type,
        dataType: 'JSON',
        data: userData,
        beforeSend: function(){
            frmElement.find('form').css("opacity", "0.5");
        },
        success:function(resp){
            frmElement.find('.statusMsg').html(resp.msg);
            if(resp.status == 1){
                if(type == 'add'){
                    frmElement.find('form')[0].reset();
                }
                getList();
            }
            frmElement.find('form').css("opacity", "");
        }
    });
}
// Fill the user's data in the edit form
function editUser(id){
    $.post( "<?php echo base_url('book/memData/'); ?>", {id: id}, function( data ){
        $('#id').val(data.id);
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#email').val(data.email);
        $('input:radio[name="gender"]').filter('[value="'+data.gender+'"]').attr('checked', true);
        $('#country').val(data.country);
    }, "json");
}

// Actions on modal show and hidden events
$(function(){
    $('#modalUserAddEdit').on('show.bs.modal', function(e){
        var type = $(e.relatedTarget).attr('data-type');
        var userFunc = "userAction('add');";
        $('#hlabel').text('Add New');
        if(type == 'edit'){
            userFunc = "userAction('edit');";
            var rowId = $(e.relatedTarget).attr('rowID');
            editUser(rowId);
            $('#hlabel').text('Edit');
        }
        $('#userSubmit').attr("onclick", userFunc);
    });
    
    $('#modalUserAddEdit').on('hidden.bs.modal', function(){
        $('#userSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});
</script>