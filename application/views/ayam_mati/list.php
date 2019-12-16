<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Data Ayam Mati</h2>
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
                                    <a class="btn btn-success btn-condensed" href="<?php echo site_url('ayam_mati/tambah') ?>"><i class="fa fa-plus"></i> Tambah Data Ayam Mati</a>
                                    <a class="btn btn-info btn-condensed" href="<?php echo site_url('ayam_mati/laporan') ?>"><i class="fa fa-book"></i> Laporan Ayam Mati</a>
                                </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#ayam_mati').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url('img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#ayam_mati').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url('img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#ayam_mati').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url('img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="ayam_mati" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Input</th>
                                                    <th>Jenis Ayam</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Kandang Asal</th>
                                                    <th>Tanggal Mati</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ayam_matis as $ayam_mati): ?>
                                                <tr>
                                                    <td><?= $ayam_mati->id_input ?></td>
                                                    <td><?= $ayam_mati->jenis ?></td>
                                                    <td><?= $ayam_mati->nama ?></td>
                                                    <td><?= $ayam_mati->nama_kandang ?></td>
                                                    <td><?= $ayam_mati->tgl_mati ?></td>
                                                    <td><?= $ayam_mati->jumlah ?></td>
                                                    <td width="250">
                                                    <?php $tglIn = $ayam_mati->tgl_mati;$tglNow = date('Y-m-d'); if ($tglIn !== $tglNow) {echo "<p align='center'><b>Arsip</b></p>";}; ?>
                                                        <a <?php   $tglIn = $ayam_mati->tgl_mati;$tglNow = date('Y-m-d');
                                                     if ($tglIn !== $tglNow) {echo "style='display: none';";}; ?> href="<?php echo site_url('ayam_mati/ubah/'.$ayam_mati->id_input) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a style='display: none' onclick="deleteConfirm('<?php echo site_url('ayam_mati/hapus/'.$ayam_mati->id_input) ?>')"
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