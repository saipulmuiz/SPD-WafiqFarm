<?php $this->load->view('_parts/header')?>
 <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Laporan Ayam Masuk</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                <div class="container">
                <div class="card-header">
                    <h4><a href="<?php echo site_url('ayam') ?>"><i class="fa fa-arrow-left"></i> Data Ayam Masuk</a></h4>
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
                                    <input type="text" class="form-control datepicker" autocomplete="off" name="tgl_awal" id="tanggal" value="<?= date('Y-m-d'); ?>">
                                    <span class="input-group-addon add-on"> - </span>
                                    <input type="text" class="form-control datepicker" autocomplete="off" name="tgl_akhir" id="tanggal" value="<?= date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success" type="submit">Tampilkan</button>
                        <a class="btn btn-primary" href="<?php echo base_url('ayam/laporan'); ?>">Reset Filter</a>
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
                                        <table id="ayam" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Id Input</th>
                                                    <th>Jenis Ayam</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Kandang Asal</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Usia</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  if( ! empty($ayam)){ ?>
                                                <?php foreach ($ayam as $data): ?>
                                                    <?php $tgl = date('d-m-Y', strtotime($data->tgl_masuk)) ?>
                                                <tr>
                                                    <td><?= $data->id_input ?></td>
                                                    <td><?= $data->jenis ?></td>
                                                    <td><?= $data->nama ?></td>
                                                    <td><?= $data->nama_kandang ?></td>
                                                    <td><?= $tgl ?></td>
                                                    <td><?= $data->umur ?></td>
                                                    <td><?= $data->jumlah ?></td>
                                                    <td><?= $data->harga ?></td>
                                                    <td><?= $data->total_harga ?></td>
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
        <script>
            if($(".datatable").length > 0){                
                $(".datatable").dataTable({order: [[0, 'desc']]});
                $(".datatable").on('page.dt',function () {
                    onresize(100);
                });
            }

        $('#form-tanggal, #form-bulan, #form-tahun, #form-interval').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun, #form-interval').hide(); // Sembunyikan form bulan, tahun dan interval
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal, #form-interval').hide(); // Sembunyikan form tanggal dan form interval
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else if($(this).val() == '3'){ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan, #form-interval').hide(); // Sembunyikan form tanggal, bulan dan interval
                $('#form-tahun').show(); // Tampilkan form tahun
            }else{
                $('#form-tanggal, #form-bulan, #form-tahun').hide();
                $('#form-interval').show(); // Tampilkan form interval
            }

            $('#form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });
        </script>
        <?php $this->load->view('_parts/footer')?> 