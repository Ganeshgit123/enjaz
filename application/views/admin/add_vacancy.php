<?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>

<?php $session = $this->session->userdata('username');?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<div class="box-content card white">
<div class="box-title row">
<div class='col-md-4'><h4>Add Vacancies</h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/list_vacancy"><button class="btn btn-warning">Vacancies List</button></a>
</div>
</div>

<div class="card-content">
<?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_vacancy', $attributes, $hidden);?>
<div class="form-body">


<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="xin_employee_password">Title</label>
<input class="form-control" placeholder="Vacancy Title" name="title" type="text" value="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="confirm_password" class="control-label">Description</label>
 
<textarea  class="form-control" placeholder="Vacancy Description"  name="description"></textarea>


</div>
</div>
</div>




<div class="row"> 
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
<?php echo form_close(); ?> </div></div></div></div></div></div></div>



<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>

 

<script type="text/javascript">
/* Add data */ /*Form Submit*/

$(document).ready(function(){


/* Add data */ /*Form Submit*/
$("#xin-form").submit(function(e){
var fd = new FormData(this);
var obj = $(this), action = obj.attr('name');
fd.append("is_ajax", 1);

fd.append("form", action);
e.preventDefault();
$('.save').prop('disabled', true);

$.ajax({
url: e.target.action,
type: "POST",
data:  fd,
contentType: false,
cache: false,
processData:false,
success: function(JSON)
{
if (JSON.error != '') {
toastr.error(JSON.error);
$('.save').prop('disabled', false);
} else {
toastr.success(JSON.result);
$('.save').prop('disabled', false);
window.location.href="<?php echo base_url();?>admin/list_vacancy";
}
},
error: function() 
{
toastr.error(JSON.error);

$('.save').prop('disabled', false);
} 	        
});
});

});
</script>
 


</body>
</html>