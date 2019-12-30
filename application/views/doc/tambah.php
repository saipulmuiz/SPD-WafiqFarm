<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('doc') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form id="jvalidate" action="<?php base_url('doc/tambah') ?>" method="post" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Tambah</strong> DOC</h3>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jenis</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="jenis" required/>
                                        </div>        
                                        <span class="help-block">Masukan jenis doc ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Supplier</label>
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
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Masuk</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" value="<?= date('Y-m-d'); ?>" name="tgl_masuk">                                            
                                        </div>
                                        <span class="help-block">Masukan tanggal masuk doc</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Usia</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('umur') ? 'is-invalid':'' ?>" name="umur" value="1" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('umur') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan usia doc ayam (hari)</span>
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
                                        <span class="help-block">Masukan jumlah doc ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Harga</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" oninput="totalHarga()" class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" name="harga" required/>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('harga') ?>
                                        </div>      
                                        <span class="help-block">Masukan harga doc ayam</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Total Harga</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-dollar"></span></span>
                                            <input type="text" class="form-control <?php echo form_error('total_harga') ? 'is-invalid':'' ?>" name="total_harga" readonly/>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('total_harga') ?>
                                        </div>      
                                        <span class="help-block">Total harga doc ayam</span>
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
    <script type="text/javascript">
        function totalHarga(){
        let num1 = document.getElementsByName("jumlah")[0].value;
        let num2 = document.getElementsByName("harga")[0].value;
        let sum = Number(num1) * Number(num2);
        document.getElementsByName("total_harga")[0].value = sum;
    }
    </script>
    <?php $this->load->view('_parts/footer')?> 