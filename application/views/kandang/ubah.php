<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('kandang') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form action="<?php base_url('kandang/ubah') ?>" method="post" class="form-horizontal">

                        <input type="hidden" name="id" value="<?php echo $kandang->id_kandang?>" />

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ubah</strong> Kandang</h3>
                            <div class="panel-body">   
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama kandang</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="nama_kandang" value="<?= $kandang->nama_kandang ?>" required/>
                                        </div>                                     
                                        <span class="help-block">Masukan nama kandang ayam</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Kapasitas</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('kapasitas') ? 'is-invalid':'' ?>" name="kapasitas" value="<?= $kandang->kapasitas ?>" required/>
                                        </div>       
                                        <div class="invalid-feedback">
                                            <?php echo form_error('kapasitas') ?>
                                        </div>                                     
                                        <span class="help-block">Masukan kapasitas kandang ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jumlah Ayam</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('jml_ayam') ? 'is-invalid':'' ?>" name="jml_ayam" value="<?= $kandang->jml_ayam ?>" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('jml_ayam') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan jumlah ayam</span>
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