<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
 <style>
.toltip{position:relative;display:inline-block;color: #4690ff;}.toltip .toltiptext{visibility:hidden;width:120px;background-color:#555;color:#fff;text-align:center;border-radius:6px;padding:5px 0;position:absolute;z-index:1;bottom:125%;left:50%;margin-left:-60px;opacity:0;transition:opacity .3s}.toltip .toltiptext::after{content:"";position:absolute;top:100%;left:50%;margin-left:-5px;border-width:5px;border-style:solid;border-color:#555 transparent transparent transparent}.toltip:hover .toltiptext{visibility:visible;opacity:1}
</style>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Data Kandang</h2>
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
                                    <a class="btn btn-success btn-condensed" href="<?php echo site_url('kandang/tambah') ?>"><i class="fa fa-plus"></i> Tambah Kandang</a>
                                </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#kandang').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url('img/icons/csv.png') ?>' width="24"/> CSV</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#kandang').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url('img/icons/xls.png') ?>' width="24"/> XLS</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#kandang').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url('img/icons/pdf.png') ?>' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="kandang" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Kandang</th>
                                                    <th>Nama Kandang</th>
                                                    <th>Kapasitas</th>
                                                    <th>Jumlah Ayam</th>
                                                    <th>Terakhir Update</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($kandangs as $kandang): ?>
                                                <tr>
                                                    <td><?= $kandang->id_kandang ?></td>
                                                    <td><?= $kandang->nama_kandang ?></td>
                                                    <td><?= $kandang->kapasitas ?></td>
                                                    <td><?= $kandang->jml_ayam ?></td>
                                                    <td>
                                                        <div class="toltip">
                                                            <b><?php $dt = new DateTime($kandang->tgl_update);
                                                            echo $dt->format('Y-m-d'); ?></b>
                                                            <span class="toltiptext"><?= $kandang->tgl_update ?></span>
                                                        </div>
                                                    </td>
                                                    <td width="250">
                                                        <a href="<?php echo site_url('kandang/ubah/'.$kandang->id_kandang) ?>"
                                                        class="btn btn-small"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('kandang/hapus/'.$kandang->id_kandang) ?>')"
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