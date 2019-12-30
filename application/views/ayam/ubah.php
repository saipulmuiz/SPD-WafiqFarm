<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('ayam') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                    
                        <form action="<?php base_url('ayam/ubah') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $ayam->id_ayam?>" />
                        <input type="hidden" class="form-control" value="<?= $ayam->jumlah ?>" name="old_jml">
                        <input type="hidden" name="old_foto" value="<?php echo $ayam->foto ?>">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Jenis</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" class="form-control" name="jenis" value="<?= $ayam->jenis ?>" required/>
                                    </div>        
                                    <span class="help-block">Masukan jenis ayam</span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Jumlah</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input type="text" oninput="jumlahAyam()" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" name="jumlah" value="<?= $ayam->jumlah ?>" required/>
                                    </div><input type="text" id="fix_jml" class="form-control" name="fix_jml" value="0" readonly/>    
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jumlah') ?>
                                    </div>                                          
                                    <span class="help-block">Masukan jumlah ayam</span>
                                </div>
                            </div>

                            <div id="foto" class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Foto Ayam</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                    <img src="<?= base_url('assets/uploads/ayam/') . $ayam->foto ?>" width="70" alt="<?= $ayam->jenis ?>" title="<?= $ayam->jenis ?>">
                                    </div>
                                    <button type="button" class="btn btn-primary" id="ganti">Ganti Foto</button>
                                </div>
                            </div>

                            <div id="tbl_ganti" class="form-group" style="display: none">
                                <label class="col-md-3 col-xs-12 control-label">Upload Foto Ayam</label>
                                <div class="col-md-6 col-xs-12">                                            
                                    <div class="input-group">
                                        <input type="file" multiple id="file-simple" name="foto"/>
                                    </div>        
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
    <script type="text/javascript" src="<?= base_url('js/plugins/fileinput/fileinput.min.js') ?>"></script>
    <script type="text/javascript">
        $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
        }); 
        function jumlahAyam(){
        let num1n = document.getElementsByName("old_jml")[0].value;
        let num2n= document.getElementsByName("jumlah")[0].value;
        let sumn = Number(num1n) - Number(num2n);
        document.getElementsByName("fix_jml")[0].value = sumn;
    }
        $("#ganti").click(function(){
            document.getElementById("tbl_ganti").style.display = "block";
            document.getElementById("ganti").style.display = "none";
            document.getElementById("foto").style.display = "none";
        });
    </script>
    <?php $this->load->view('_parts/footer')?> 