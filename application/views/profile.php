<?php $this->load->view('_parts/header') ?>
<!-- PAGE CONTENT WRAPPER -->
 <div class="page-content-wrap">  
                    
                    <div class="row">
                                     
                        <div class="col-md-3 col-sm-4 col-xs-5">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user"></span> <?= $this->session->userdata('nama') ?></h3>
                                    <p><?php if($this->session->userdata('level') == '1') echo 'Admin'; else echo 'Pegawai'?></p>
                                    <div class="text-center" id="user_image">
                                        <img src="<?= base_url('assets/uploads/') . $this->session->userdata('foto') ?>" alt="<?= $this->session->userdata('nama') ?>" title="<?= $this->session->userdata('nama') ?>" class="img-thumbnail"/>
                                    </div>                                    
                                </div>
                                <div class="panel-body form-group-separated">
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">#ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $this->session->userdata('id_user') ?>" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Username</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $this->session->userdata('username') ?>" class="form-control" readonly/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">                                        
                                        <div class="col-md-12 col-xs-12">
                                            <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-7">
                            
                            <form action="<?php echo base_url('profile/ubahProfile') ?>" method="post" class="form-horizontal">
                            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id_user') ?>"/>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>Informasi tentang user</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Nama</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php echo $this->session->userdata('nama') ?>" name="nama" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Level</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="<?php if($this->session->userdata('level') == '1') echo 'Admin'; else echo 'Pegawai'?>" class="form-control" readonly/>
                                        </div>
                                    </div>                                       
                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-primary btn-rounded pull-right">Save</button>
                                        </div>
                                    </div>
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
        <script type="text/javascript" src="<?php echo base_url('js/plugins/sweetalert/sweetalert2.all.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('js/plugins/fileinput/fileinput.min.js') ?>"></script>  
        <script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap-file-input.js') ?>"></script>
        <!-- MODALS -->
        <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Change photo</h4>
                    </div>
                    <form id="cp_upload" method="post" enctype="multipart/form-data" action="<?php echo base_url('profile/updateFoto') ?>">
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
                        <input type="hidden" name="old_foto" value="<?php echo $this->session->userdata('foto') ?>">
                            <div class="form-group">
                            <label class="col-md-4 control-label">New Photo</label>
                                <div class="col-md-4">                                            
                                    <div class="input-group">
                                        <input type="file" multiple id="file-simple" accept=".gif, .jpg, .png, .jpeg" name="foto"/>
                                    </div>        
                                </div>
                            </div>                     
                        </div>                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" id="simpan_foto">Simpan</button>
                    </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Change password</h4>
                    </div>
                    <div class="modal-body">
                        <p id="informasi">Masukan password lama dan tekan Enter</p>
                        <p id="info" style="color:red;display:none">Password lama salah!</p>
                    </div>
                    <div class="modal-body form-horizontal form-group-separated">                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Old Password</label>
                            <div class="col-md-9">
                                <input type="hidden" id="username" name="username" value="<?php echo $this->session->userdata('username') ?>"/>
                                <input type="password" class="form-control" id="old_password" name="oldpass"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">New Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="newpass" name="newpass" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Repeat New</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="repass" name="repass" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="simpan" class="btn btn-danger" data-dismiss="modal" disabled>Simpan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- EOF MODALS -->
        <?php if ($this->session->flashdata('success')): ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '<?php echo $this->session->flashdata('success') ?>',
                        showConfirmButton: false,
                        timer: 1700
                    });
                </script>
        <?php endif; ?>
        <script>
            // cek event change id old_password 
            $('#old_password').change(function(){    
            var fopassword = $('#old_password').val();  
            var fusername = $('#username').val();  
                //mengirimkan old_password dan mengecek ke database ketersediaanya.
                    $.ajax({       
                    method: "POST",      
                    dataType: 'json',
                    url: "<?php echo base_url(); ?>index.php/profile/check_account", 
                    data: { opassword: fopassword, username:fusername} ,  
                    success:function(data){
                        //jika tersedia maka ambil data. data yang dikirimkan controller berupa nilai TRUE or FALSE
                            document.getElementById("newpass").disabled = data;
                            document.getElementById("repass").disabled = data;
                        if(data==1){
                            document.getElementById("info").style.display="block";
                            document.getElementById("informasi").innerHTML="Masukan password lama dan tekan Enter";
                            return true;
                        }else{
                            document.getElementById("info").style.display="none";
                            document.getElementById("informasi").innerHTML="Masukan password baru dan ulangi lagi dengan benar!";
                            return false;
                        }
                        //fungsinya untuk memanipulasi input text id new dan confirm
                    }
                    });

                    //fungsi ini digunakan untuk cek kesamaan nilai antara inputan new dan confirm
                    $('#repass').keyup(function(){    
                    var fnew = $('#newpass').val();  
                    var fconfirm = $('#repass').val();  
                        if(fnew==fconfirm){
                            document.getElementById("simpan").disabled = false;
                        }else{
                            document.getElementById("simpan").disabled = true;
                        }
                    
                });

                //Update Password
                $('#simpan').on('click',function(){
                    var username=$('#username').val();
                    var newpass=$('#newpass').val();
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/profile/ubahPass')?>",
                        dataType : "JSON",
                        data : {username:username , newpass:newpass},
                        success: function(data){
                            $('#modal_change_password').modal('hide');
                            $('[name="username"]').val("");
                            $('[name="oldpass"]').val("");
                            $('[name="newpass"]').val("");
                            $('[name="repass"]').val("");
                            function timedRefresh(timeoutPeriod) {
                                setTimeout("location.reload(true);",timeoutPeriod);
                            }
                            window.onload = timedRefresh(100);
                        }
                    });
                    return false;
                });

        
            });

            
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
            // if ($(".file-preview").css('display') === 'none'){
            //     $("#simpan_foto").prop("disabled",true).addClass("disabled");
            // }else{
            //     $("#simpan_foto").prop("disabled",false).removeClass("disabled");
            // }

// $(function(){
    
//     function onSuccess(){
//         $("#cp_photo").parent("a").find("span").html("Choose another photo");
        
//         var img = $("#cp_target").find("#crop_image")
        
//         if(img.length === 1){            
//             $("#cp_img_path").val(img.attr("src"));
            
//             img.cropper({aspectRatio: 1,
//                         done: function(data) {
//                             $("#ic_x").val(data.x);
//                             $("#ic_y").val(data.y);
//                             $("#ic_h").val(data.height);
//                             $("#ic_w").val(data.width);
//                         }
//             });
            
//             $("#simpan_foto").prop("disabled",false).removeClass("disabled");
            
//             $("#simpan_foto").on("click",function(){                
//                 $("#user_image").html('<img src="img/loaders/default.gif"/>');
//                 $("#modal_change_photo").modal("hide");
                
//                 $("#cp_crop").ajaxForm({target: '#user_image'}).submit();
//                 $("#cp_target").html("Use form below to upload file. Only .jpg files.");
//                 $("#cp_photo").val("").parent("a").find("span").html("Select file");
//                 $("#simpan_foto").prop("disabled",true).addClass("disabled");
//                 $("#cp_img_path").val("");
//             });           
//         }
//     }
    
//     $("#cp_photo").on("change",function(){
        
//         if($("#cp_photo").val() == '') return false;
        
//         $("#cp_target").html('<img src="img/loaders/default.gif"/>');        
//         $("#cp_upload").ajaxForm({target: '#cp_target',success: onSuccess}).submit();        
//     });
    
    
// });      
        </script>
<?php $this->load->view('_parts/footer')?>