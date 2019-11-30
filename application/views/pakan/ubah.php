<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('pakan') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form action="<?php base_url('pakan/ubah') ?>" method="post" class="form-horizontal">

                        <input type="hidden" name="id" value="<?php echo $pakan->kd_pakan?>" />

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ubah</strong> Pakan</h3>
                            <div class="panel-body">  
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jenis</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="jenis" value="<?= $pakan->jenis ?>" required/>
                                        </div>        
                                        <span class="help-block">Masukan jenis pakan ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Merk</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="merk" value="<?= $pakan->merk ?>" required/>
                                        </div>        
                                        <span class="help-block">Masukan merk pakan ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Supplier</label>
                                    <div class="col-md-6 col-xs-12">  
                                                                                                                                                                            
                                    <select class="form-control select" name="id_supplier">
                                        <?php foreach ($suppliers as $supplier): ?>
                                            <option value="<?= $supplier->id_supplier ?>"<?php if($supplier->id_supplier == $pakan->id_supplier) echo 'selected' ?>><?= $supplier->nama ?></option>
                                        <?php endforeach; ?>
                                        </select>                                  
                                        <span class="help-block">Masukan nama supplier</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Harga</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control" name="harga" value="<?= $pakan->harga ?>" required/>
                                        </div>        
                                        <span class="help-block">Masukan harga pakan ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Stok</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control spinner_default <?php echo form_error('stok') ? 'is-invalid':'' ?>" name="stok" value="<?= $pakan->stok ?>" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('stok') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan Stok pakan (Kg)</span>
                                    </div>
                                </div>

                                <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Masuk</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" value="<?= $pakan->tgl_masuk ?>" name="tgl_masuk">                                            
                                        </div>
                                        <span class="help-block">Masukan tanggal masuk pakan</span>
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