<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('vitamin_pakai') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form action="<?php base_url('vitamin_pakai/ubah') ?>" method="post" class="form-horizontal">

                        <input type="hidden" name="id" value="<?php echo $vitamin_pakai->id_input?>" />
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <input type="hidden" class="form-control" value="<?= date('Y-m-d H:i:s'); ?>" name="tgl_update">
                        <input type="hidden" class="form-control" value="<?= $vitamin_pakai->jumlah ?>" name="old_jml">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ubah</strong> Transaksi Pemakaian Vitamin</h3>
                            <div class="panel-body">                                                                        
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Input</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" value="<?= $vitamin_pakai->tgl_input ?>" name="tgl_input">                                            
                                        </div>
                                        <span class="help-block">Masukan tanggal input pemakaian vitamin</span>
                                    </div>
                                </div>

                                <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Waktu Input</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            <input type="text" class="form-control timepicker24" value="<?= $vitamin_pakai->waktu_input ?>" name="waktu_input">                                            
                                        </div>
                                        <span class="help-block">Masukan waktu input pemakaian vitamin</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">ID Penanggung Jawab</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="id_user" value="<?= $this->session->userdata('id_user') ?>" readonly/>
                                        </div>                                        
                                        <span class="help-block">ID Penanggung Jawab</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Kandang</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="id_kandang">
                                        <?php foreach ($kandangs as $kandang): ?>
                                            <option value="<?= $kandang->id_kandang ?>"<?php if($kandang->id_kandang == $vitamin_pakai->id_kandang) echo 'selected' ?>><?= $kandang->nama_kandang ?></option>
                                        <?php endforeach; ?>
                                        </select>                                   
                                        <span class="help-block">Masukan nama kandang</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Merk</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="merk">
                                        <?php foreach ($merks as $merk): ?>
                                            <option value="<?= $merk->merk ?>" <?php if($merk->merk == $vitamin_pakai->merk) echo 'selected' ?>><?= $merk->merk ?></option>
                                        <?php endforeach; ?>
                                        </select>                                   
                                        <span class="help-block">Pilih merk vitamin yang digunakan</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jumlah Pemakaian Vitamin</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" oninput="rangeJml()" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" name="jumlah" value="<?= $vitamin_pakai->jumlah ?>" required/>
                                        </div><input type="text" id="fix_jml" class="form-control" name="fix_jml" value="0" readonly/>
                                        <div class="invalid-feedback">
                                            <?php echo form_error('jumlah') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan jumlah pemakaian vitamin (Pcs)</span>
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
    <script type="text/javascript" src="<?= base_url('js/plugins/bootstrap/bootstrap-timepicker.min.js') ?>"></script>
    <script type="text/javascript">
        function rangeJml(){
        let num1n = document.getElementsByName("old_jml")[0].value;
        let num2n= document.getElementsByName("jumlah")[0].value;
        let sumn = Number(num1n) - Number(num2n);
        document.getElementsByName("fix_jml")[0].value = sumn;
    }
    </script>
    <?php $this->load->view('_parts/footer')?> 