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
                        <form action="<?php base_url('pegawai/ubah') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $pegawai->id_pegawai?>" />

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ubah</strong> Pegawai</h3>
                            <div class="panel-body">                                                                        
                                
                            <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="nama" value="<?= $pegawai->nama ?>" required/>
                                        </div>       
                                        <span class="help-block">Masukan nama pegawai ayam</span>
                                    </div>
                                </div>
                                
                            <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">No. HP</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" name="no_hp" value="<?= $pegawai->no_hp ?>" required/>
                                        </div>       
                                        <div class="invalid-feedback">
                                            <?php echo form_error('no_hp') ?>
                                        </div>                                     
                                        <span class="help-block">Masukan No. Telepon pegawai ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                            <textarea class="form-control" rows="5" name="alamat" required><?= $pegawai->alamat ?></textarea>                 
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
    <?php $this->load->view('_parts/footer')?> 