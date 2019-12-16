<?php $this->load->view('_parts/header')?>
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>
                                        <?php foreach ($total_ayam as $total): ?>                                 
                                        <div class="widget-title">Total Ayam</div>                                                                        
                                        <div class="widget-subtitle"><?= $total->tgl_update ?></div>
                                        <div class="widget-int"><?= $total->jumlah . ' Ekor' ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div>                                    
                                    <?php foreach ($total_kandang as $total): ?>                                 
                                        <div class="widget-title">Total Kandang</div>                                                                        
                                        <div class="widget-subtitle"><?= ' Kapasitas ' . '<b>'.$total->kapasitas.'</b>' . ' Ekor' ?></div>
                                        <div class="widget-int"><?= $total->jumlah . ' Kandang' ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>         
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET PEGAWAI -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $jml_pegawai ?></div>
                                    <div class="widget-title">Pegawai</div>
                                    <div class="widget-subtitle">Di peternakan</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET PEGAWAI -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SUPPLIER -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-users"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $jml_supplier ?></div>
                                    <div class="widget-title">Supplier Terdaftar</div>
                                    <div class="widget-subtitle">Di sistem ini</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET SUPPLIER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                    <div class="row">
                        <div class="col-md-3">                        
                            <a href="<?php echo site_url('pakan') ?>" class="tile tile-default">
                                <?php foreach ($stok_pakan as $stok): ?>
                                <?= $stok->jml_stok.' Kg' ?>
                                <p>Stok Pakan</p>
                                <div class="informer informer-primary"><?= $stok->tgl_update ?></div>
                                <div class="informer informer-warning dir-tr"><span class="fa fa-bitbucket"></span></div>
                                <?php endforeach; ?>
                            </a>                        
                        </div>
                        <div class="col-md-3">                        
                            <a href="<?php echo site_url('vitamin') ?>" class="tile tile-default">
                                <?php foreach ($stok_vitamin as $stok): ?>
                                <?= $stok->jml_stok.' Pcs' ?>
                                <p>Stok Vitamin</p>
                                <div class="informer informer-primary"><?= $stok->tgl_update ?></div>
                                <div class="informer informer-info dir-tr"><span class="fa fa-bitbucket"></span></div>
                                <?php endforeach; ?>
                            </a>                        
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            
                            <!-- START Grafik Jumlah (Kg) Telur Harian -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Grafik Telur Harian</h3>
                                        <span>Jumlah Telur Harian /Kg</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="chart_telur_jumlah" style="height: 300px;"></div>
                                </div>
                            </div>
                            <!-- END Grafik Jumlah (Kg) Telur Harian -->
                            
                        </div>
                        
                        <div class="col-md-6">
                            
                            <!-- START KALKULASI TELUR HARIAN -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Kalkulasi Telur Harian</h3>
                                        <span>Telur Sehat X Telur Cacat</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="kalkulasi_telur" style="height: 300px;"></div>
                                </div>                                    
                            </div>
                            <!-- END KALKULASI TELUR HARIAN -->
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <!-- START Grafik Pakan Masuk -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Grafik Pembelian Pakan</h3>
                                            <span>Jumlah Pakan Masuk</span>
                                        </div>
                                        <ul class="panel-controls" style="margin-top: 2px;">
                                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                                </ul>                                        
                                            </li>                                        
                                        </ul>
                                    </div>
                                    <div class="panel-body padding-0">
                                        <div class="chart-holder" id="chart_pakan_masuk" style="height: 250px;"></div>
                                    </div>
                                </div>
                                <!-- END Grafik Pakan Masuk -->
                                
                            </div>
                            <div class="col-md-6">
                            
                            <!-- START Grafik Pakan Keluar -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Grafik Pemberian Pakan Harian</h3>
                                        <span>Jumlah Pakan Harian</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="chart_pakan_harian" style="height: 250px;"></div>
                                </div>
                            </div>
                            <!-- END Grafik Pakan Keluar -->
                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <!-- START Grafik Ayam Masuk -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title-box">
                                            <h3>Grafik Pembelian Ayam</h3>
                                            <span>Jumlah Ayam Masuk</span>
                                        </div>
                                        <ul class="panel-controls" style="margin-top: 2px;">
                                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                                </ul>                                        
                                            </li>                                        
                                        </ul>
                                    </div>
                                    <div class="panel-body padding-0">
                                        <div class="chart-holder" id="chart_ayam_masuk" style="height: 250px;"></div>
                                    </div>
                                </div>
                                <!-- END Grafik Ayam Masuk -->
                                
                            </div>
                            <div class="col-md-6">
                            
                            <!-- START Grafik Ayam Mati -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Grafik Ayam Mati</h3>
                                        <span>Jumlah Ayam Mati</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="chart_ayam_mati" style="height: 250px;"></div>
                                </div>
                            </div>
                            <!-- END Grafik Ayam Mati -->
                            
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
<?php $this->load->view('_parts/javascript')?>
<script>
    /* Line telur harian chart */
    Morris.Line({
      element: 'chart_telur_jumlah',
      data: <?php echo $jml_telur_harian;?>,
      xkey: 'tgl_input',
      ykeys: ['jumlah', 'kalkulasi_butir'],
      labels: ['Jumlah', 'Kalkulasi Telur'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#3FBAE4','#33414E'],
      gridLineColor: '#E5E5E5'
    });

    /* Line ayam mati chart */
    Morris.Line({
      element: 'chart_ayam_mati',
      data: <?php echo $jml_ayam_mati;?>,
      xkey: 'tgl_mati',
      ykeys: ['jumlah'],
      labels: ['Jumlah'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#3FBAE4','#33414E'],
      gridLineColor: '#E5E5E5'
    });

    /* Line ayam masuk chart */
    Morris.Line({
      element: 'chart_ayam_masuk',
      data: <?php echo $jml_ayam_masuk;?>,
      xkey: 'tgl_masuk',
      ykeys: ['jumlah'],
      labels: ['Jumlah'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#3FBAE4','#33414E'],
      gridLineColor: '#E5E5E5'
    });

    /* Line pakan masuk chart */
    Morris.Line({
      element: 'chart_pakan_masuk',
      data: <?php echo $jml_pakan_masuk;?>,
      xkey: 'tgl_masuk',
      ykeys: ['jumlah'],
      labels: ['Jumlah'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#3FBAE4','#33414E'],
      gridLineColor: '#E5E5E5'
    });

    /* Line pakan harian chart */
    Morris.Line({
      element: 'chart_pakan_harian',
      data: <?php echo $jml_pakan_harian;?>,
      xkey: 'tgl_input',
      ykeys: ['jml_harian'],
      labels: ['Jumlah'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#3FBAE4','#33414E'],
      gridLineColor: '#E5E5E5'
    });

    /* Bar kalkulasi telur chart */
    Morris.Bar({
        element: 'kalkulasi_telur',
        data: <?php echo $kalkulasi_telur_harian;?>,
        xkey: 'tgl_input',
        ykeys: ['telur_sehat', 'telur_cacat'],
        labels: ['Telur Sehat', 'Telur Cacat'],
        barColors: ['#33414E', '#3FBAE4'],
        gridTextSize: '10px',
        hideHover: true,
        resize: true,
        gridLineColor: '#E5E5E5'
    });
    /* END Bar dashboard chart */
</script>
<?php $this->load->view('_parts/footer')?> 