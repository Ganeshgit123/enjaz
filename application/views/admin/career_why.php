<?php $this->load->view('admin/header'); ?>

<body>
  <?php $this->load->view('admin/top_header'); ?>
  <?php $this->load->view('admin/side_header'); ?>


  <!-- TinyMCE -->
  <!--  TinyMCE   -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <!--    Must include this script FIRST  -->
  <script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
  <?php $session = $this->session->userdata('username'); ?>



  <div id="wrapper">
    <div class="main-content">
      <div class="row small-spacing">

        <div class="box-content card white">
          <div class="box-title row">
            <div class='col-md-4'>
              <h4>Career</h4>
            </div>


          </div>

          <div class="card-content">
            <?php $attributes = array('name' => 'add_staff', 'id' => 'xin-form', 'autocomplete' => 'off'); ?>
            <?php $hidden = array('_user' => $session['user_id']); ?>
            <?php echo form_open('admin/update_career', $attributes, $hidden); ?>
            <div class="col-md-6">
              <div class="form-group">
                <label for="title" class="control-label">Title</label>
                <input class="form-control" name="title" value="<?php echo $title ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="title" class="control-label">Arabic Title</label>
                <input class="form-control" name="title_ar" value="<?php echo $title_ar ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Description</label>
                <textarea id="content1" class="form-control" name="description"><?php echo $description ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Arabic Description</label>
                <textarea id="content2" class="form-control" name="description_ar"><?php echo $description_ar ?></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="title" class="control-label">Title</label>
                <input class="form-control" name="know_more" value="<?php echo $know_more ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="title" class="control-label">Arabic Title</label>
                <input class="form-control" name="know_more_ar" value="<?php echo $know_more_ar ?>">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Image</label>

                <input type="file" class="form-control-file" id="desc_img" name="desc_img" onchange="readURL(this);">
              </div>
            </div>

            <div class="col-md-6">
              <div class='form-group'>
                <?php if ($desc_img != '' && $desc_img != 'no file') { ?>
                  <img class="img-thumb" src="<?php echo base_url() . 'assets/images/' . $desc_img; ?>" style="height:200px !important;width:200px !important;" id="u_file"> <a href="<?php echo site_url() ?>download?type=assets/images&filename=<?php echo $desc_img; ?>">Download</a>
                <?php } else { ?>
                  <p>&nbsp;</p>
                <?php } ?>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Upload_Title</label>
                <input class="form-control" name="upload_title" value="<?php echo $upload_title ?>">
                <br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Arabic Upload_Title</label>
                <input class="form-control" name="upload_title_ar" value="<?php echo $upload_title_ar ?>">
                <br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Upload_Description</label>
                <textarea id="content3" class="form-control" name="upload_desc"><?php echo $upload_desc ?></textarea>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Arabic Upload_Description</label>
                <textarea id="content4" class="form-control" name="upload_desc_ar"><?php echo $upload_desc_ar ?></textarea>
              </div>

            </div>
            <div class="col-md-6">
              <label for="confirm_password" class="control-label">Icon_Image</label>
              <input type="file" class="form-control-file" id="upload_img" name="upload_img" onchange="readURL2(this);">
            </div>
            <div class="col-md-6">
              <div class='form-group'>
                <?php if ($upload_img != '' && $upload_img != 'no file') { ?>
                  <img class="img-thumb" src="<?php echo base_url() . 'assets/images/' . $upload_img; ?>" style="height:200px !important;width:200px !important;" id="u_file0"> <a href="<?php echo site_url() ?>download?type=assets/images&filename=<?php echo $upload_img; ?>">Download</a>
                <?php } else { ?>
                  <p>&nbsp;</p>
                <?php } ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Search Title</label>
                <input class="form-control" name="search_title" value="<?php echo $search_title ?>">
                <br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Arabic Title</label>
                <input class="form-control" name="search_title_ar" value="<?php echo $search_title_ar ?>">
                <br>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Search Description</label>
                <textarea id="content5" class="form-control" name="search_desc"><?php echo $search_desc ?></textarea>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="confirm_password" class="control-label">Arabic Search Description</label>
                <textarea id="content6" class="form-control" name="search_desc_ar"><?php echo $search_desc_ar ?></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <label for="confirm_password" class="control-label">Icon_Image</label>
              <input type="file" class="form-control-file" id="search_img" name="search_img" onchange="readURL3(this);">
            </div>
            <div class="col-md-6">
              <div class='form-group'>
                <?php if ($search_img != '' && $search_img != 'no file') { ?>
                  <img class="img-thumb" src="<?php echo base_url() . 'assets/images/' . $search_img; ?>" style="height:200px !important;width:200px !important;" id="u_file1"> <a href="<?php echo site_url() ?>download?type=assets/images&filename=<?php echo $search_img; ?>">Download</a>
                <?php } else { ?>
                  <p>&nbsp;</p>
                <?php } ?>
              </div>
            </div>

            <div class="col-lg-12">
              <div class="box-content card white">
                <div class="box-title row">
                  <div class='col-md-4'>
                    <h4>List</h4>
                  </div>
                  <div class='col-md-6'></div>
                  <div class='col-md-2'>
                  </div>
                </div>
                <div class="box-content">
                  <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Arabic Title</th>
                          <th>location</th>
                          <th>location_ar</th>
                          <th>desc</th>
                          <th>desc_ar</th>
                          <th>apply</th>
                          <th>apply_ar</th>
                          <th>Action</th>
                        </tr>

                      </thead>
                      <tbody>
                        <?php
                        $i = 0;
                        foreach ($sec2 as $value) {

                          $i++;
                        ?>
                          <tr>
                            <td><?php echo $i ?></td>

                            <td><?php echo $value['acc_title'] ?></td>
                            <td><?php echo $value['acc_title_ar'] ?></td>
                            <td><?php echo $value['acc_location'] ?></td>
                            <td><?php echo $value['acc_location_ar'] ?></td>
                            <td><?php echo $value['acc_desc'] ?></td>
                            <td><?php echo $value['acc_desc_ar'] ?></td>
                            <td><?php echo $value['apply'] ?></td>
                            <td><?php echo $value['apply_ar'] ?></td>


                            <th> <a href="<?php echo base_url() ?>admin/edit_careerlist/<?php echo $value['id'] ?>">&nbsp;&nbsp;<button type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a>
                            </th>
                          </tr>

                        <?php
                        } ?>


                      </tbody>

                    </table>

                  </div>
                </div>
                <!-- /.col-lg-6 col-xs-12 -->
              </div>

              <div class="form-actions"> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>Save')); ?> </div>
              </form>
            </div>
          </div>
          <!--<!card content..> -->
        </div>
        <!--<!box content..> -->
      </div>
      <!--<!row content..> -->
    </div>
    <!--<!main content..> -->
  </div>
  <!--<!wrapper content..> -->

  <!-- ================================================== -->


  <?php $this->load->view('admin/footer'); ?>

  <!-- TinyMCE -->
  <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/advlist/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/anchor/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autolink/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autoresize/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/autosave/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/bbcode/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/charmap/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/code/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/codesample/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/colorpicker/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/contextmenu/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/directionality/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/emoticons/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/example_dependency/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullpage/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/fullscreen/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/hr/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/image/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/imagetools/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/importcss/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/insertdatetime/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/layer/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/legacyoutput/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/link/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/lists/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/media/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/nonbreaking/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/noneditable/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/pagebreak/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/paste/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/preview/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/print/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/save/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/searchreplace/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/spellchecker/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/tabfocus/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/table/plugin.min.js "></script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/template/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textcolor/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/textpattern/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualblocks/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/visualchars/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/plugins/wordcount/plugin.min.js ">
  </script>
  <script src="<?php echo base_url() ?>assets/plugin/tinymce/themes/modern/theme.min.js"></script>
  <!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

  <script src="<?php echo base_url() ?>assets/scripts/tinymce.init.min.js"></script>





  <script type="text/javascript">
    /* Add data */ /*Form Submit*/
    function initMCEexact(e) {
      tinyMCE.init({
        skin: false,
        mode: "exact",
        elements: e,
      })
    }
    $(document).ready(function() {
      initMCEexact("content1");
      initMCEexact("content2");
      initMCEexact("content3");
      initMCEexact("content4");
      initMCEexact("content5");
      initMCEexact("content6");
      initMCEexact("content7");
      initMCEexact("content8");
      initMCEexact("content9");
      initMCEexact("content10");
      initMCEexact("content11");
      initMCEexact("content12");
      initMCEexact("content13");
      initMCEexact("content14");
      initMCEexact("content15");
      initMCEexact("content16");
      initMCEexact("content17");
      initMCEexact("content18");
      initMCEexact("content19");
      initMCEexact("content20");
      initMCEexact("content21");
      initMCEexact("content22");
      initMCEexact("content23");
      initMCEexact("content24");
      initMCEexact("content25");
      initMCEexact("content26");
      initMCEexact("content27");
      initMCEexact("content28");
      initMCEexact("content29");
      initMCEexact("content30");
      initMCEexact("content31");
      initMCEexact("content32");
      initMCEexact("content33");
      initMCEexact("content34");
      initMCEexact("content35");
      initMCEexact("content36");
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    });
  </script>


  <!-- <script type="text/javascript">
 
  tinyMCE.init({
  selector: '#tinymce',
  setup: function(editor) {
    editor.on('init', function(e) {
      console.log('The Editor has initialized.');
    });
  }
});


</script> -->

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        jQuery('#u_file').removeAttr('src')
        jQuery('#u_file').show();



        reader.onload = function(e) {
          $('#u_file').attr('src', e.target.result);
          $('#u_file').attr('style', "height:200px !important;width:200px !important;");

        }

        reader.readAsDataURL(input.files[0]);
      }

    }
  </script>
  <script type="text/javascript">
    function readURL1(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        jQuery('#u_file0').removeAttr('src')
        jQuery('#u_file0').show();



        reader.onload = function(e) {
          $('#u_file0').attr('src', e.target.result);
          $('#u_file0').attr('style', "height:200px !important;width:200px !important;");

        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

  <script type="text/javascript">
    function readURL3(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        jQuery('#u_file1').removeAttr('src')
        jQuery('#u_file1').show();



        reader.onload = function(e) {
          $('#u_file1').attr('src', e.target.result);
          $('#u_file1').attr('style', "height:200px !important;width:200px !important;");

        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>


</body>

</html>