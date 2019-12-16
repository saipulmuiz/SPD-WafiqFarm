<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Transaksi Pakan Masuk</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <div class="card-header">
                                    <a class="btn btn-success btn-condensed" href="<?php echo site_url('pakan_masuk/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pakan Masuk</a>
                                </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#pakan_masuk').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url('img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#pakan_masuk').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url('img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#pakan_masuk').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url('img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="pakan_masuk" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Input</th>
                                                    <th>Merk Pakan</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Harga /kg</th>
                                                    <th>Jumlah (Kg)</th>
                                                    <th>Total Harga</th>
                                                    <th class="aksi">Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" id="kode_pakan_masuk" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" id="nama_pakan_masuk" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-9">
                            <input name="harga" id="harga" class="form-control" type="text" placeholder="Harga" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Pakan Masuk</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Id Input</label>
                        <div class="col-xs-9">
                            <input name="kobar_edit" id="kode_pakan_masuk2" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar_edit" id="nama_pakan_masuk2" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-9">
                            <input name="harga_edit" id="harga2" class="form-control" type="text" placeholder="Harga" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                          
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau memhapus pakan_masuk ini?</p></div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->
        <?php $this->load->view('_parts/javascript')?> 
        <?php $this->load->view('_parts/js_table')?> 
        <script>
            tampil_pakan_masuk();	//pemanggilan fungsi tampil pakan_masuk.
            
            
            //fungsi tampil pakan_masuk
            function tampil_pakan_masuk(){
                // Setup datatables
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };
        
            var table = $("#pakan_masuk").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#pakan_masuk_filter input')
                        .off('.DT')
                        .on('input.DT', function() {
                            api.search(this.value).draw();
                    });
                },
                    oLanguage: {
                    sProcessing: "Tunggu Sebentar..."
                },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?php echo base_url().'index.php/pakan_masuk/get_pakan_masuk_json'?>", "type": "POST"},
                            columns: [
                                                        {"data": "id_input"},
                                                        {"data": "merk"},
                                                        {"data": "nama"},
                                                        {"data": "tgl_masuk"},
                                                        //render harga dengan format angka
                                {"data": "harga", render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp')},
                                {"data": "jumlah"},
                                {"data": "total_harga", render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp')},
                                {"data": "view"}
                        ],
                        order: [[0, 'desc']],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    $('td:eq(0)', row).html();
                }
        
            });
            }
            // end setup datatables
            
            // //GET UPDATE
            // $('#show_data').on('click','.item_edit',function(){
            //     var id=$(this).attr('data');
            //     $.ajax({
            //         type : "GET",
            //         url  : "<?php echo base_url('index.php/pakan_masuk/get_pakan_masuk')?>",
            //         dataType : "JSON",
            //         data : {id:id},
            //         success: function(data){
            //             $.each(data,function(id_input, merk, id_supplier){
            //                 $('#ModalaEdit').modal('show');
            //                 $('[name="kobar_edit"]').val(data.id_input);
            //                 $('[name="nabar_edit"]').val(data.merk);
            //                 $('[name="harga_edit"]').val(data.id_supplier);
            //             });
            //         }
            //     });
            //     return false;
            // });


            // //GET HAPUS
            // $('#show_data').on('click','.item_hapus',function(){
            //     var id=$(this).attr('data');
            //     $('#ModalHapus').modal('show');
            //     $('[name="kode"]').val(id);
            // });

            // //Simpan Barang
            // $('#btn_simpan').on('click',function(){
            //     var kobar=$('#kode_pakan_masuk').val();
            //     var nabar=$('#nama_pakan_masuk').val();
            //     var harga=$('#harga').val();
            //     $.ajax({
            //         type : "POST",
            //         url  : "<?php echo base_url('index.php/pakan_masuk/simpan_pakan_masuk')?>",
            //         dataType : "JSON",
            //         data : {kobar:kobar , nabar:nabar, harga:harga},
            //         success: function(data){
            //             $('[name="kobar"]').val("");
            //             $('[name="nabar"]').val("");
            //             $('[name="harga"]').val("");
            //             $('#ModalaAdd').modal('hide');
            //             tampil_pakan_masuk();
            //         }
            //     });
            //     return false;
            // });

            // //Update Barang
            // $('#btn_update').on('click',function(){
            //     var kobar=$('#kode_pakan_masuk2').val();
            //     var nabar=$('#nama_pakan_masuk2').val();
            //     var harga=$('#harga2').val();
            //     $.ajax({
            //         type : "POST",
            //         url  : "<?php echo base_url('index.php/pakan_masuk/update_pakan_masuk')?>",
            //         dataType : "JSON",
            //         data : {kobar:kobar , nabar:nabar, harga:harga},
            //         success: function(data){
            //             $('[name="kobar_edit"]').val("");
            //             $('[name="nabar_edit"]').val("");
            //             $('[name="harga_edit"]').val("");
            //             $('#ModalaEdit').modal('hide');
            //             tampil_pakan_masuk();
            //         }
            //     });
            //     return false;
            // });

            // //Hapus Barang
            // $('#btn_hapus').on('click',function(){
            //     var kode=$('#textkode').val();
            //     $.ajax({
            //     type : "POST",
            //     url  : "<?php echo base_url('index.php/pakan_masuk/hapus_pakan_masuk')?>",
            //     dataType : "JSON",
            //             data : {kode: kode},
            //             success: function(data){
            //                     $('#ModalHapus').modal('hide');
            //                     tampil_pakan_masuk();
            //             }
            //         });
            //         return false;
            //     });
        </script>
        <?php $this->load->view("_parts/modal") ?>
        <?php $this->load->view('_parts/footer')?> 