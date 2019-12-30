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
                                    <a class="btn btn-info btn-condensed" href="<?php echo site_url('pakan_masuk/laporan') ?>"><i class="fa fa-book"></i> Laporan Pakan Masuk</a>
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
                                            <tbody id="show_data">
                                                <?php foreach ($pakan_masuk as $pakan): ?>
                                                    
                                                <tr>
                                                    <td><?= $pakan->id_input ?></td>
                                                    <td><?= $pakan->merk ?></td>
                                                    <td><?= $pakan->nama ?></td>
                                                    <td><?= $pakan->tgl_masuk ?></td>
                                                    <td><?= "Rp" . number_format("$pakan->harga",0, '', '.') ?></td>
                                                    <td><?= $pakan->jumlah ?></td>
                                                    <td><?= "Rp" . number_format("$pakan->total_harga",0, '', '.') ?></td>
                                                    <td width="250">
                                                        <?php $tglIn = $pakan->tgl_masuk;$tglNow = date('Y-m-d'); if ($tglIn !== $tglNow) {echo "<p align='center'><b>Arsip</b></p>";}; ?>
                                                        <a <?php   $tglIn = $pakan->tgl_masuk;$tglNow = date('Y-m-d');
                                                     if ($tglIn !== $tglNow) {echo "style='display: none';";}; ?> href="<?php echo site_url('pakan_masuk/ubah/'.$pakan->id_input) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('pakan_masuk/upStok/'.'?jumlah='.$pakan->jumlah . '?tgl_update='.date('Y-m-d') . '?merk='. $pakan->merk) ?>')"
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
        <!-- Logout Delete Confirmation-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
            </div>
        </div>
        </div>
        <?php $this->load->view('_parts/footer')?> 