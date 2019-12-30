<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Laporan Transaksi Telur Harian</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                <div class="container">
                <div class="card-header">
                    <h4><a href="<?php echo site_url('telur') ?>"><i class="fa fa-arrow-left"></i> Data Telur Harian</a></h4>
                </div>
                <br>
                    <form method="get" action="">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label">Filter Berdasarkan</label>
                            <div class="col-md-3">   
                                <select class="form-control select" name="filter" id="filter">
                                    <option value="">Pilih</option>
                                    <option value="1">Per Tanggal</option>
                                    <option value="2">Per Bulan</option>
                                    <option value="3">Per Tahun</option>
                                    <option value="4">Interval</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="form-tanggal" class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label">Tanggal</label>
                            <div class="col-md-3">   
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker input-tanggal" autocomplete="off" name="tanggal" id="tanggal" value="<?= date('Y-m-d'); ?>">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="form-bulan" class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label">Bulan</label>
                            <div class="col-md-3">   
                                <select class="form-control select" name="bulan">
                                    <option value="">Pilih</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="form-tahun" class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label">Tahun</label>
                            <div class="col-md-3">   
                                <select class="form-control select" name="tahun">
                                    <option value="">Pilih</option>
                                    <?php
                                    foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                        echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="form-interval" class="form-group">
                        <div class="row">
                            <label class="col-md-2 control-label">Pilih Interval Tanggal</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" autocomplete="off" name="tgl_awal" id="tgl_awal" value="<?= date('Y-m-d'); ?>">
                                    <span class="input-group-addon add-on"> - </span>
                                    <input type="text" class="form-control datepicker" autocomplete="off" name="tgl_akhir" id="tgl_akhir" value="<?= date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success" type="submit">Tampilkan</button>
                        <a class="btn btn-primary" href="<?php echo base_url('telur/laporan'); ?>">Reset Filter</a>
                        <a class="btn btn-info" href="<?php echo $url_cetak; ?>" target="blank">CETAK PDF</a>
                    </div>
                    </form>
                    <br>
                    <div class="row">
                        <h3><?php echo $ket; ?></h3>
                    </div>
                </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                            
                                    
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
                                                    <th>Berat(Kg)</th>
                                                    <th>Telur Sehat</th>
                                                    <th>Telur Cacat</th>
                                                    <th>Kalkulasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  if( ! empty($telur)){ ?>
                                                <?php foreach ($telur as $data): ?>
                                                    <?php $tgl = date('d-m-Y', strtotime($data->tgl_input)) ?>
                                                <tr>
                                                    <td><?= $data->id_input ?></td>
                                                    <td><?= $tgl ?></td>
                                                    <td><?= $data->nama ?></td>
                                                    <td><?= $data->nama_kandang ?></td>
                                                    <td><?= $data->jumlah ?></td>
                                                    <td><?= $data->telur_sehat ?></td>
                                                    <td><?= $data->telur_cacat ?></td>
                                                    <td><?= $data->kalkulasi_butir ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            <?php }  ?>
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
        <?php $this->load->view('_parts/js_laporan')?>
        <?php $this->load->view('_parts/footer')?> 