<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('telur') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form action="<?php base_url('telur/ubah') ?>" method="post" class="form-horizontal">

                        <input type="hidden" name="id" value="<?php echo $telur->id_input?>" />
                        <input type="hidden" class="form-control" value="<?= $telur->jumlah ?>" name="old_jml">
                        <input type="hidden" class="form-control" value="<?= $telur->telur_sehat ?>" name="old_jml_telur">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ubah</strong> Transaksi Telur Harian</h3>
                            <div class="panel-body">                                                                        
                                
                            <div class="form-group">                                        
                                    <label class="col-md-3 col-xs-12 control-label">Tanggal Input</label>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control datepicker" value="<?= $telur->tgl_input ?>" name="tgl_input">
                                        </div>
                                        <span class="help-block">Masukan tanggal input telur</span>
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
                                            <option value="<?= $kandang->id_kandang ?>"<?php if($kandang->id_kandang == $telur->id_kandang) echo 'selected' ?>><?= $kandang->nama_kandang ?></option>
                                        <?php endforeach; ?>
                                        </select>                                   
                                        <span class="help-block">Masukan nama kandang</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Jumlah (Kg)</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" oninput="beratTelur()" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" name="jumlah" value="<?= $telur->jumlah ?>" required/>
                                        </div><input type="text" id="fix_jml" class="form-control" name="fix_jml" value="0" readonly/> 
                                        <div class="invalid-feedback">
                                            <?php echo form_error('jumlah') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan jumlah Kg telur</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Telur Sehat (Butir)</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" oninput="kalkulasiButir()" class="form-control <?php echo form_error('telur_sehat') ? 'is-invalid':'' ?>" name="telur_sehat" value="<?= $telur->telur_sehat ?>" required/>
                                        </div><input type="text" id="fix_sehat" class="form-control" name="fix_sehat" value="0" readonly/> 
                                        <div class="invalid-feedback">
                                            <?php echo form_error('telur_sehat') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan jumlah butir telur sehat</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Telur Cacat (Butir)</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" oninput="kalkulasiButir()" class="form-control <?php echo form_error('telur_cacat') ? 'is-invalid':'' ?>" name="telur_cacat" value="<?= $telur->telur_cacat ?>" required/>
                                        </div>    
                                        <div class="invalid-feedback">
                                            <?php echo form_error('telur_cacat') ?>
                                        </div>                                          
                                        <span class="help-block">Masukan jumlah butir telur cacat</span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Kalkulasi (Butir)</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="kalkulasi_butir" value="<?= $telur->kalkulasi_butir ?>" readonly/>
                                        </div>                                      
                                        <span class="help-block">Kalkulasi telur keseluruhan</span>
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
        function kalkulasiButir(){
        let num1 = document.getElementsByName("telur_sehat")[0].value;
        let num2 = document.getElementsByName("telur_cacat")[0].value;
        let sum = Number(num1) + Number(num2);
        document.getElementsByName("kalkulasi_butir")[0].value = sum;

        let num1n = document.getElementsByName("old_jml_telur")[0].value;
        let num2n= document.getElementsByName("telur_sehat")[0].value;
        let sumn = Number(num1n) - Number(num2n);
        document.getElementsByName("fix_sehat")[0].value = sumn;
    }
    function beratTelur(){
        let num1n = document.getElementsByName("old_jml")[0].value;
        let num2n= document.getElementsByName("jumlah")[0].value;
        let sumn = Number(num1n) - Number(num2n);
        document.getElementsByName("fix_jml")[0].value = sumn;
    }
    </script>
    <?php $this->load->view('_parts/footer')?> 