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
<div class='col-md-4'><h4>Home-Banner</h4></div>
<div class='col-md-6'></div>
<!-- <div class='col-md-2'> 
<a href="<?php //echo base_url(); ?>admin/services"><button class="btn btn-warning">Services List</button></a>
</div> -->
</div>


<div class="card-content">
<?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off');?>
<?php $hidden = array('_user' => $session['user_id']);?>
<?php echo form_open('admin/add_bannner', $attributes, $hidden);?>
<div class="form-body">


<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="" class="control-label">Banner Description Line 1</label>
<textarea  class="form-control" placeholder="Description"  name="description"></textarea>

</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label for="About Banner" class="control-label"> Banner Description Line 2</label>
<textarea  class="form-control" name="description1"></textarea>

</div>
</div>
</div>

<div class="row"> 
<div class="col-md-6">
<div class="form-group">
<label for="confirm_password" class="control-label">Banner Image</label>
 

  <fieldset class="form-group">
                        
                        <input type="file" class="form-control-file" id="service_image" name="service_image" onchange="readURL(this);">
                        <small>Upload files only: gif,png,jpg,jpeg</small>
                      </fieldset>

                       <img id="image" src="#" alt="No image"  />


</div>
</div>
</div>



<div class="row"> 


</div>
<div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
<?php echo form_close(); ?> </div>

</div></div></div>




     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>Added Items</h4></div>
    <div class='col-md-6'></div>
    <!-- <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/new_service"><button class="btn btn-warning"> Add New</button></a> 
 
    </div> -->
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No</th>
<!-- <th>User Id</th> -->
<th>Status</th>
<th>Description Line 1</th>
<th>Description Line 2 </th>
<th>Image</th>
<th>Action</th> 
</tr>
      
</thead>
<tbody>
<?php $i=0;
foreach ($bannerdet as $value) {
$i++;
  ?>
 <tr>
<td><?php echo $i ?></td>
<td>
  <div class="switch success"><input type="checkbox" class="chkswitch" <?php if($value['status']=='A'){echo "checked" ; }  ?>
   class="switch" id="switch-<?php echo $value['id'] ?>"  ><label for="switch-<?php echo $value['id'] ?>"></label></div></td>
<td> <?php echo $value['banner_desc'] ?> </td>
<td> <?php echo $value['banner_desc1'] ?> </td>
<td><?php if($value['banner_img']!='' && $value['banner_img']!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'upload/images/'.$value['banner_img'];?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url()?>download?type=upload/images&filename=<?php echo $value['banner_img'];?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?> </td>
 <th> <a href="<?php echo base_url()?>admin/edit_banner/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>
  </th>


</tr>

  <?php
} ?>
  

</tbody>
    
    </table>
</div>
<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div></div></div></div>





<!-- ================================================== -->
<?php $this->load->view('admin/footer');?>

 <script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

jQuery('#image').removeAttr('src')
jQuery('#image').show();



reader.onload = function (e) {
$('#image').attr('src', e.target.result);
$('#image').attr('style', "height:200px !important;width:200px !important;");

}

reader.readAsDataURL(input.files[0]);
}
}
</script>

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
window.location.href="<?php echo base_url();?>admin/home_banner";
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
 
 <script type="text/javascript">
   

   $(document).ready(function(){


 // $("input[type=checkbox]").click(function () {
  $('#example').on("change", ".chkswitch", function () {
    var id=$(this).attr('id');

    var bid = id.split("-");

   // alert(vid[1]);
      $.ajax({
          type: "POST",
          url: "<?php echo base_url() ?>admin/bannerstatus",
          data: {
              value: $(this).prop("checked") ? 1 : 0,id:bid[1]
          },
         success: function(JSON)
      {
        if (JSON.error != '') {
        toastr.error(JSON.error);
        //$('.save').prop('disabled', false);
        } else {
        toastr.success(JSON.result);
        //$('.save').prop('disabled', false);
        window.location.href="<?php echo base_url();?>admin/home_banner";
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

    function reload(){
      alert("hello");
    $("#example").table.ajax.reload();
    //table.ajax.reload();
      alert("gello");
    }
   

 </script>

</body>
</html>