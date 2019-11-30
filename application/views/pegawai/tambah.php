<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('pegawai') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form id="jvalidate" action="<?php base_url('pegawai/tambah') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Tambah</strong> Pegawai</h3>
                            <div class="panel-body">      

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="nama" required/>
                                        </div>        
                                        <span class="help-block">Masukan nama pegawai</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">No. HP</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('no_hp') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan No. HP</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="alamat" required></textarea>  
                                        <span class="help-block">Masukan alamat</span>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-default">Clear Form</button>                                    
                                <button class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                </div>                    
                
            </div>
            <!-- END PAGE CONTENT WRAPPER -->                                                
        </div>            
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

    <?php $this->load->view('_parts/javascript')?> 
    <script type="text/javascript" src="<?= base_url('js/plugins/validationengine/languages/jquery.validationEngine-en.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/plugins/validationengine/jquery.validationEngine.js') ?>"></script>  

    <script type="text/javascript" src="<?= base_url('js/plugins/jquery-validation/jquery.validate.js') ?>"></script>  

    <script type="text/javascript" src="<?= base_url('js/plugins/dropzone/dropzone.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('js/plugins/fileinput/fileinput.min.js') ?>"></script>  
        
    <script type="text/javascript" src="<?= base_url('js/plugins/cropper/cropper.min.js') ?>"></script>
        
    <script type="text/javascript" src="js/plugins/jstree/jstree.min.js"></script>
    <script>
         var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        password: {
                                required: true,
                                minlength: 5,
                                maxlength: 10
                        },
                        're_password': {
                                required: true,
                                minlength: 5,
                                maxlength: 10,
                                equalTo: "#password2"
                        }
                    }                                        
                }); 
    </script>
    <?php $this->load->view('_parts/footer')?> 