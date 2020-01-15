<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('supplier') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form id="jvalidate" action="<?php base_url('supplier/tambah') ?>" method="post" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Tambah</strong> Supplier</h3>
                            <div class="panel-body">                                                                        
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="nama" required/>
                                        </div>        
                                        <span class="help-block">Masukan nama supplier ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">No. Telepon</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>" name="no_telp" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('no_telp') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan no. telepon</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jenis Supply</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="jenis_supply">
                                            <option value="Pakan Ayam">Pakan Ayam</option>
                                            <option value="Bibit Ayam/DOC">Bibit Ayam/DOC</option>
                                            <option value="Vaksin/Vitamin">Vaksin/Vitamin</option>
                                        </select>                                   
                                        <span class="help-block">Masukan jenis supply</span>
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
    <script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap-select.js') ?>"></script> 
    <?php $this->load->view('_parts/footer')?> 