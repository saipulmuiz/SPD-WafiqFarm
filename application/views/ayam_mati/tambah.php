<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('ayam_mati') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form id="jvalidate" action="<?php base_url('ayam_mati/tambah') ?>" method="post" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Tambah</strong> Data Ayam Mati</h3>
                            <div class="panel-body">

                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <input type="hidden" class="form-control" value="<?= date('Y-m-d H:i:s'); ?>" name="tgl_update">
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jenis Ayam</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="jenis">
                                        <?php foreach ($jenis_ayam as $jenis): ?>
                                            <option value="<?= $jenis->jenis ?>"><?= $jenis->jenis ?></option>
                                        <?php endforeach; ?>
                                        </select>                                   
                                        <span class="help-block">Masukan jenis ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Pilih Supplier</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="id_supplier">
                                        <?php foreach ($suppliers as $supplier): ?>
                                            <option value="<?= $supplier->id_supplier ?>"><?= $supplier->nama ?></option>
                                        <?php endforeach; ?>
                                        </select>                                   
                                        <span class="help-block">Masukan id supplier</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Pilih Kandang Asal</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="id_kandang">
                                        <?php foreach ($kandangs as $kandang): ?>
                                            <option value="<?= $kandang->id_kandang ?>"><?= $kandang->nama_kandang ?></option>
                                        <?php endforeach; ?>
                                        </select>                                   
                                        <span class="help-block">Masukan kandang asal</span>
                                    </div>
                                </div>

                                <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Mati</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" value="<?= date('Y-m-d'); ?>" name="tgl_mati">                                            
                                        </div>
                                        <span class="help-block">Masukan tanggal ayam mati</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jumlah</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" oninput="totalHarga()" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" name="jumlah" value="1" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('jumlah') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan jumlah ayam_mati</span>
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
    <script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap-datepicker.js') ?>"></script>
    <?php $this->load->view('_parts/footer')?> 