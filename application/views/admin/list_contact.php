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
    <div class='col-md-4'><h4>Contact List</h4></div>
    <div class='col-md-6'></div>
 
</div>

 
<div class="box-content">
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>No</th>
<!-- <th>User Id</th> -->
<th width="10%">Date</th>
<th> Name</th>
<th>Email </th>
<th>Phone</th>
<th>Message</th> 
</tr>
      
</thead>
<tbody>
<?php 
$i=0;
foreach ($userdet as $value) {
$i++;

  $date = strtotime($value['date']);
 $date1 = date('d-m-Y',$date);
  ?>
 <tr>
<td><?php echo $i ?></td>
<td><?php echo $date1 ?></td>
<td><?php echo $value['name'] ?></td>
<td> <?php echo $value['email'] ?> </td>
<td> <?php echo $value['phone'] ?> </td>
<td> <?php echo $value['message'] ?> </td>


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