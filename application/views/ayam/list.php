<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Transaksi Ayam Masuk</h2>
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
                                    <a class="btn btn-success btn-condensed" href="<?php echo site_url('ayam/tambah') ?>"><i class="fa fa-plus"></i> Tambah Ayam</a>
                                    <a class="btn btn-info btn-condensed" href="<?php echo site_url('ayam/laporan') ?>"><i class="fa fa-book"></i> Laporan Ayam Mati</a>
                                </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#ayam').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url('img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#ayam').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url('img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#ayam').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url('img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="ayam" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Input</th>
                                                    <th>Jenis Ayam</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Kandang Tujuan</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Usia</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Total Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ayams as $ayam): ?>
                                                <tr>
                                                    <td><?= $ayam->id_input ?></td>
                                                    <td><?= $ayam->jenis ?></td>
                                                    <td><?= $ayam->nama ?></td>
                                                    <td><?= $ayam->nama_kandang ?></td>
                                                    <td><?= $ayam->tgl_masuk ?></td>
                                                    <td><?= $ayam->umur . ' Hari'?></td>
                                                    <td><?= $ayam->jumlah ?></td>
                                                    <td><?= "Rp" . number_format("$ayam->harga",0, '', '.') ?></td>
                                                    <td><?= "Rp" . number_format("$ayam->total_harga",0, '', '.') ?></td>
                                                    <td width="250">
                                                    <?php $tglIn = $ayam->tgl_masuk;$tglNow = date('Y-m-d'); if ($tglIn !== $tglNow) {echo "<p align='center'><b>Arsip</b></p>";}; ?>
                                                        <a <?php   $tglIn = $ayam->tgl_masuk;$tglNow = date('Y-m-d');
                                                     if ($tglIn !== $tglNow) {echo "style='display: none';";}; ?> href="<?php echo site_url('ayam/ubah/'.$ayam->id_input) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a style='display: none' onclick="deleteConfirm('<?php echo site_url('ayam/hapus/'.$ayam->id_input) ?>')"
                                                        href="#!" class="btn btn-small text-danger"><i class="fa fa-trash"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
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
        <?php $this->load->view('_parts/javascript')?> 
        <?php $this->load->view('_parts/js_table')?> 
        <script>
            if($(".datatable").length > 0){                
                $(".datatable").dataTable({order: [[0, 'desc']]});
                $(".datatable").on('page.dt',function () {
                    onresize(100);
                });
            }
            function deleteConfirm(url){
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>
        <?php $this->load->view("_parts/modal") ?>
        <?php $this->load->view('_parts/footer')?> 