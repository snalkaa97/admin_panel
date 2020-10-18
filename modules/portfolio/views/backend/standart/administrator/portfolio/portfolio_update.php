

<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Portfolio        <small>Edit Portfolio</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/portfolio'); ?>">Portfolio</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Portfolio</h3>
                            <h5 class="widget-user-desc">Edit Portfolio</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/portfolio/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_portfolio', 
                            'class'   => 'form-horizontal form-step', 
                            'id'      => 'form_portfolio', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="name" class="col-sm-2 control-label">Name 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= set_value('name', $portfolio->name); ?>">
                                <small class="info help-block">
                                <b>Input Name</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="client" class="col-sm-2 control-label">Client 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="client" id="client" placeholder="Client" value="<?= set_value('client', $portfolio->client); ?>">
                                <small class="info help-block">
                                <b>Input Client</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group  wrapper-options-crud">
                            <label for="id_category" class="col-sm-2 control-label">Id Category 
                            </label>
                            <div class="col-sm-8">
                                    <?php foreach (db_get_all_data('t_category') as $row): ?>
                                    <div class="col-md-3 padding-left-0">
                                    <label>
                                    <input <?=  in_array($row->id, explode(',', $portfolio->id_category)) ? 'checked' : ''; ?> type="checkbox" class="flat-red" name="id_category[]" value="<?= $row->id ?>"> <?= $row->name; ?>
                                    </label>
                                    </div>
                                    <?php endforeach; ?>  
                                    <div class="row-fluid clear-both">
                                    <small class="info help-block">
                                    </small>
                                    </div>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="description" class="col-sm-2 control-label">Description 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="description" name="description" rows="10" cols="80"> <?= set_value('description', $portfolio->description); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="image" class="col-sm-2 control-label">Image 
                            </label>
                            <div class="col-sm-8">
                                <div id="portfolio_image_galery"></div>
                                <div id="portfolio_image_galery_listed">
                                <?php foreach ((array) explode(',', $portfolio->image) as $idx => $filename): ?>
                                    <input type="hidden" class="listed_file_uuid" name="portfolio_image_uuid[<?= $idx ?>]" value="" /><input type="hidden" class="listed_file_name" name="portfolio_image_name[<?= $idx ?>]" value="<?= $filename; ?>" />
                                <?php endforeach; ?>
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                         
                                                <div class="form-group ">
                            <label for="link_demo" class="col-sm-2 control-label">Link Demo 
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="link_demo" id="link_demo" placeholder="Link Demo" value="<?= set_value('link_demo', $portfolio->link_demo); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                         
                                                <div class="form-group ">
                            <label for="created_at" class="col-sm-2 control-label">Created At 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datetimepicker" name="created_at"  placeholder="Created At" id="created_at" value="<?= set_value('created_at', $portfolio->created_at); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                                                 
                         
                        
                                                 <div class="message"></div>
                                                <div class="row-fluid col-md-7 container-button-bottom">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                                                 <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function(){
       
      
      CKEDITOR.replace('description'); 
      var description = CKEDITOR.instances.description;
                   
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/portfolio';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
        $('#description').val(description.getData());
                    
        var form_portfolio = $('#form_portfolio');
        var data_post = form_portfolio.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_portfolio.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          $('form').find('.form-group').removeClass('has-error');
          $('form').find('.error-input').remove();
          $('.steps li').removeClass('error');
          if(res.success) {
            var id = $('#portfolio_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            if (res.errors) {
               parseErrorField(res.errors);
            }
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
              var params = {};
       params[csrf] = token;

       $('#portfolio_image_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/portfolio/upload_image_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/portfolio/delete_image_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/portfolio/get_image_file/<?= $portfolio->id; ?>',
             refreshOnRequest:true
           },
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#portfolio_image_galery').fineUploader('getUuid', id);
                   $('#portfolio_image_galery_listed').append('<input type="hidden" class="listed_file_uuid" name="portfolio_image_uuid['+id+']" value="'+uuid+'" /><input type="hidden" class="listed_file_name" name="portfolio_image_name['+id+']" value="'+xhr.uploadName+'" />');
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#portfolio_image_galery_listed').find('.listed_file_uuid[name="portfolio_image_uuid['+id+']"]').remove();
                  $('#portfolio_image_galery_listed').find('.listed_file_name[name="portfolio_image_name['+id+']"]').remove();
                }
              }
          }
      }); /*end image galery*/
              

      async function chain(){
      }
       
      chain();


    
    
    }); /*end doc ready*/
</script>