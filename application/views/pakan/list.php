<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Data Pakan</h2>
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
                                    <a class="btn btn-success btn-condensed" href="<?php echo site_url('pakan/tambah') ?>"><i class="fa fa-plus"></i> Tambah Pakan</a>
                                </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#pakan').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url('img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#pakan').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url('img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#pakan').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url('img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="pakan" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Kode Pakan</th>
                                                    <th>Jenis Pakan</th>
                                                    <th>Merk Pakan</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pakans as $pakan): ?>
                                                <tr>
                                                    <td><?= $pakan->kd_pakan ?></td>
                                                    <td><?= $pakan->jenis ?></td>
                                                    <td><?= $pakan->merk ?></td>
                                                    <td><?= $pakan->nama ?></td>
                                                    <td><?= "Rp" . number_format("$pakan->harga",0, '', '.') ?></td>
                                                    <td><?= $pakan->stok ?></td>
                                                    <td><?= $pakan->tgl_masuk ?></td>
                                                    <td width="250">
                                                        <a href="<?php echo site_url('pakan/ubah/'.$pakan->kd_pakan) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('pakan/hapus/'.$pakan->kd_pakan) ?>')"
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
            function deleteConfirm(url){
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>
        <?php $this->load->view("_parts/modal") ?>
        <?php $this->load->view('_parts/footer')?> 