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
<div class='col-md-4'><h4>Vancancies List</h4></div>
<div class='col-md-6'></div>
<div class='col-md-2'> 
<a href="<?php echo base_url(); ?>admin/new_vacancy"><button class="btn btn-warning"> Add New</button></a> 

</div>
</div>


<div class="box-content">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>No</th>
<th>Title</th>
<th>Description </th>
<th>Action</th>
<!-- <th>Keyword/Image/Video</th> -->
</tr>

</thead>
<tbody>
<?php 
$i=0;
foreach ($vancancydet as $value) {
$i++;
	?>

<tr>
<td><?php echo $i ?></td>
<td><?php echo $value['title'] ?></td>
<td> <?php echo $value['vacancy_desc'] ?> </td>
 

<td><a href="<?php echo base_url()?>admin/edit_vacancy/<?php echo $value['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a></td>
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