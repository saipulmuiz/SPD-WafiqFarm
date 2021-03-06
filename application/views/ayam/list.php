<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Data Ayam</h2>
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
                                                    <th>Id Ayam</th>
                                                    <th>Jenis Ayam</th>
                                                    <th>Jumlah</th>
                                                    <th>Foto Ayam</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ayams as $ayam): ?>
                                                <tr>
                                                    <td><?= $ayam->id_ayam ?></td>
                                                    <td><?= $ayam->jenis ?></td>
                                                    <td><?= $ayam->jumlah ?></td>
                                                    <td><div class="bulat"><img src="<?= base_url('assets/uploads/ayam/') . $ayam->foto ?>" alt="<?= $ayam->jenis ?>" title="<?= $ayam->jenis ?>" width="80"></div></td>
                                                    <td width="250">
                                                        <a href="<?php echo site_url('ayam/ubah/'.$ayam->id_ayam) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('ayam/hapus/'.$ayam->id_ayam) ?>')"
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
                $(".datatable").dataTable({order: [[0, 'asc']]});
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