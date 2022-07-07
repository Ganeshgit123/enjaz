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
<div class='col-md-4'><h4>Services</h4></div>
<div class='col-md-6'></div>

</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No</th>
<!-- <th>User Id</th> -->
<th>Services </th>
<th>Images</th>
<th>Action</th> 
</tr>
      
</thead>
<tbody>
<?php $i=0;
foreach ($cateringdet as $value) {
$i++;
  ?>
 <tr>
<td><?php echo $i ?></td>
<td> <?php echo $value['ser_desc'] ?> </td>
<td><?php if($value['ser_img']!='' && $value['ser_img']!='no file') {?>
          <img   class="img-thumb" src="<?php echo base_url().'assets/images/'.$value['ser_img'];?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url()?>download?type=assets/images/&filename=<?php echo $value['ser_img'];?>">Download</a>
          <?php } else {?>
          <p>&nbsp;</p>
          <?php } ?> </td>
 <th> <a href="<?php echo base_url()?>admin/edit_catering/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>
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
</div></div></div>


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
window.location.href="<?php echo base_url();?>admin/list_catering";
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