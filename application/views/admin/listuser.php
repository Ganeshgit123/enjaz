 <?php $this->load->view('admin/header');?>
<body>
<?php $this->load->view('admin/top_header');?>
<?php $this->load->view('admin/side_header');?>


<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>User List</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
         <a href="<?php echo base_url(); ?>admin/newuser"><button class="btn btn-warning"> Add New</button></a> 
 
    </div>
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No</th>
<!-- <th>User Id</th> -->
<th>Name</th>
<th> Email </th>
<th>Phone</th>
<th>Action</th>
<th>Delete User</th>
</tr>
      
</thead>
<tbody>
<?php 
$i=0;

foreach ($userdet as $value) {
  $i++;
  ?>
 <tr>
<th><?php echo $i ?></th>
<!-- <th>User Id</th> -->
<th><?php echo $value['uname'] ?></th>
<th> <?php echo $value['uemail'] ?> </th>
<th><?php echo $value['uphone'] ?></th>
  
<th> <a href="<?php echo base_url()?>admin/edituser/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a> 

  <?php 
$session = $this->session->userdata('username');
if($session['user_type']=='admin'){ ?>

    <a href="<?php echo base_url()?>admin/changepassword/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-success  btn-xs waves-effect waves-light">Change Password</button></a>

 <?php } 
  else{
  redirect('admin');
 }  ?></th>


 <th>
     <?php 
$session = $this->session->userdata('username');
if($session['user_type']=='admin'){ ?>

    <a href="#">&nbsp;&nbsp;<button type="button" onclick="func(<?php echo $value['id'] ?>)" class="btn btn-danger  btn-xs waves-effect waves-light">Delete</button></a>

 <?php }
 else{
  redirect('admin');
 }  ?>

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
</div>





 <?php $this->load->view('admin/footer');?>
 <script type="text/javascript">
   
  function func(val){

var id = val;

$.ajax({
type: "POST",
url: "<?php echo base_url(); ?>"+'admin/delete_user',
data: {'id': id},
}).done(function(response){

location.reload();

});
}
 </script>