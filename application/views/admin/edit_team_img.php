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
<div class='col-md-4'><h4>Edit Banner</h4></div>
<div class='col-md-6'></div>

</div>

<div class="card-content">
<?php $attributes = array('name' => 'edit_service', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/update_team_img', $attributes, $hidden);?>
<div class="form-body">

<input type="hidden" name="id" value="<?php echo $id ?>">

      


<div class="row"> 


<div class="col-md-6">
 <div class="col-md-6">

<div class="form-group">
<label for="confirm_password" class="control-label">Image</label>
 
 <input type="file" class="form-control-file" id="img" name="img" onchange="readURL(this);" >
</div> 
</div>

 <div class="col-md-6">
        <div class='form-group'>
          <?php if($img!='' && $img!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'assets/images/home/'.$img;?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url()?>download?type=images&filename=<?php echo $img;?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?>
        </div>
      </div>
          
</div>
</div>



<div class="row"> 


</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
<?php echo form_close(); ?> </div>



<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#u_file').removeAttr('src')
jQuery('#u_file').show();



reader.onload = function (e) {
$('#u_file').attr('src', e.target.result);
$('#u_file').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>

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
window.location.href="<?php echo base_url();?>admin/new_team_img";
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