<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Transaksi Telur Harian</h2>
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
                                    <a class="btn btn-success btn-condensed" href="<?php echo site_url('telur/tambah') ?>"><i class="fa fa-plus"></i> Input Telur Harian</a>
                                </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#telur').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url('img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#telur').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url('img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#telur').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url('img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="telur" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Input</th>
                                                    <th>Tanggal Input</th>
                                                    <th>Penanggung Jawab</th>
                                                    <th>Kandang</th>
                                                    <th>Jumlah (Kg)</th>
                                                    <th>Sehat (Butir)</th>
                                                    <th>Cacat (Butir)</th>
                                                    <th>Kalkulasi Butir</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($telurs as $telur): ?>
                                                <tr>
                                                    <td><?= $telur->id_input ?></td>
                                                    <td><?= $telur->tgl_input ?></td>
                                                    <td><?= $telur->nama ?></td>
                                                    <td><?= $telur->nama_kandang ?></td>
                                                    <td><?= $telur->jumlah ?></td>
                                                    <td><?= $telur->telur_sehat ?></td>
                                                    <td><?= $telur->telur_cacat ?></td>
                                                    <td><?= $telur->kalkulasi_butir ?></td>
                                                    <td width="250">
                                                        <a href="<?php echo site_url('telur/ubah/'.$telur->id_input) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('telur/hapus/'.$telur->id_input) ?>')"
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