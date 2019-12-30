<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">
                    <div class="card-header">
						<a href="<?php echo site_url('user') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                        <form action="<?php base_url('user/ubah') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $user->id_user?>" />

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Ubah</strong> User</h3>
                            <div class="panel-body">                                                                        
                                
                            <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" required/>
                                        </div>       
                                        <span class="help-block">Masukan nama user</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">User Level</label>
                                    <div class="col-md-6 col-xs-12">                                                                                                                                       
                                        <select class="form-control select" name="level">
                                            <option value="<?= $user->level ?>"><?php if($user->level == '1') echo 'Pemilik'; else echo 'Pegawai'?></option>
                                            <option value="1">Pemilik</option>
                                            <option value="2">Pegawai</option>
                                        </select>                                   
                                        <span class="help-block">Masukan user level</span>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Foto</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <div class="input-group">
                                        <input type="file" multiple id="file-simple" name="foto"/>
                                        <input type="hidden" name="old_foto" value="" />
                                        </div>        
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-12 control-label">Foto</label>
                                    <div class="col-md-6 col-xs-12">                                            
                                        <img src="<?= base_url('assets/uploads/') . $user->foto ?>" width="70" alt="<?= $user->foto ?>" title="<?= $user->foto ?>">
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
    <script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap-select.js') ?>"></script>
    <?php $this->load->view('_parts/footer')?> 