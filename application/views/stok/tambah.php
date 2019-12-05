<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('stok') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form id="jvalidate" action="<?php base_url('stok/tambah') ?>" method="post" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Tambah</strong> Jenis Stok</h3>
                            <div class="panel-body">                                                                        
                                
                            <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jenis Stok</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <input type="text" class="form-control" name="jenis" required/>               
                                        <span class="help-block">Masukan jenis stok</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Satuan</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="satuan" required/>
                                        </div>                                   
                                        <span class="help-block">Masukan satuan stok</span>
                                    </div>
                                </div>


                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Update</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control" value="<?= date('Y-m-d H:i:s'); ?>" name="tgl_update" readonly>
                                        </div>
                                        <span class="help-block">Masukan tanggal update stok</span>
                                    </div>
                                </div>

                                    <input type="hidden" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" name="jumlah" value="0" readonly />

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