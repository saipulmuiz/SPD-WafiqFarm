<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title><?= $title ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('css/theme-default.css') ?>"/>
        <!-- EOF CSS INCLUDE -->                   
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?= base_url() ?>">Wafiq Farm</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?php echo base_url('assets/images/users/avatar.jpg') ?>" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?= base_url('assets/uploads/') . $this->session->userdata('foto') ?>" alt="<?= $this->session->userdata('nama') ?>" title="<?= $this->session->userdata('nama') ?>"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $this->session->userdata('nama') ?></div>
                                <div class="profile-data-title"><?php if($this->session->userdata('level') == '1') echo 'Admin'; else echo 'Pegawai'?></div>
                            </div>
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                    <li <?php if($this->uri->segment(1)=="overview"){echo 'class="active"';}?>>
                        <a href="<?=base_url('overview');?>"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
                    </li>                                       
                    <li class="xn-openable <?php $url_aktif = $this->uri->segment(1); if($url_aktif=="pegawai" || $url_aktif=="kandang" || $url_aktif=="supplier" || $url_aktif=="pakan" || $url_aktif=="doc" || $url_aktif=="user" || $url_aktif=="vitamin"){echo 'active';}else{echo '';}?>">
                        <a href="#"><span class="fa fa-archive"></span> <span class="xn-text">Data Master</span></a>
                        <ul>
                            <li <?php if($this->uri->segment(1)=="pegawai"){echo 'class="active"';}?>><a href="<?=base_url('pegawai/');?>"><span class="fa fa-group"></span> Data Pegawai</a></li>
                            <li <?php if($this->uri->segment(1)=="kandang"){echo 'class="active"';}?>><a href="<?=base_url('kandang/');?>"><span class="fa fa-home"></span> Data Kandang</a></li>
                            <li <?php if($this->uri->segment(1)=="supplier"){echo 'class="active"';}?>><a href="<?=base_url('supplier/');?>"><span class="fa fa-users"></span> Data Supplier</a></li>
                            <li <?php if($this->uri->segment(1)=="pakan"){echo 'class="active"';}?>><a href="<?=base_url('pakan/');?>"><span class="fa fa-bitbucket"></span> Data Pakan</a></li>
                            <li <?php if($this->uri->segment(1)=="vitamin"){echo 'class="active"';}?>><a href="<?=base_url('vitamin/');?>"><span class="fa fa-bitbucket"></span> Data Vitamin</a></li>
                            <li <?php if($this->uri->segment(1)=="doc"){echo 'class="active"';}?>><a href="<?=base_url('doc/');?>"><span class="fa fa-twitter"></span> Data DOC</a></li>                       
                            <li <?php if($this->uri->segment(1)=="user"){echo 'class="active"';}?>><a href="<?=base_url('user/');?>"><span class="fa fa-user"></span> Data User</a></li>                          
                        </ul>
                    </li>
                    <li class="xn-openable <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="telur" && $url_aktif2!=="laporan" || $url_aktif=="pakan_harian" && $url_aktif2!=="laporan" || $url_aktif=="pakan_masuk" && $url_aktif2!=="laporan" || $url_aktif=="vitamin_masuk" && $url_aktif2!=="laporan" || $url_aktif=="vitamin_pakai" && $url_aktif2!=="laporan" || $url_aktif=="ayam" && $url_aktif2!=="laporan" || $url_aktif=="ayam_mati" && $url_aktif2!=="laporan"){echo 'active';}else{echo '';}?>">
                        <a href="#"><span class="fa fa-archive"></span> <span class="xn-text">Transaksi</span></a>
                        <ul>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="vitamin_masuk" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('vitamin_masuk/');?>"><span class="fa fa-bitbucket"></span> Vitamin Masuk</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="vitamin_pakai" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('vitamin_pakai/');?>"><span class="fa fa-bitbucket"></span> Pemakaian Vitamin</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="pakan_masuk" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('pakan_masuk/');?>"><span class="fa fa-bitbucket"></span> Pakan Masuk</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="pakan_harian" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('pakan_harian/');?>"><span class="fa fa-bitbucket"></span> Beri Pakan</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="telur" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('telur/');?>"><span class="fa fa-circle"></span><span class="xn-text"> Telur Harian</span></a></li>                          
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="ayam" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('ayam/');?>"><span class="fa fa-twitter"></span> Ayam Masuk</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="ayam_mati" && $url_aktif2!=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('ayam_mati/');?>"><span class="fa fa-twitter"></span> Data Ayam Mati</a></li>
                        </ul>
                    </li>
                    <li class="xn-openable <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="ayam_mati" && $url_aktif2=="laporan" || $url_aktif=="ayam" && $url_aktif2=="laporan" || $url_aktif=="pakan_masuk" && $url_aktif2=="laporan " || $url_aktif=="pakan_harian" && $url_aktif2=="laporan "){echo 'active';}else{echo '';}?>">
                        <a href="#"><span class="fa fa-archive"></span> <span class="xn-text">Laporan</span></a>
                        <ul>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="ayam_mati" && $url_aktif2=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('ayam_mati/laporan');?>"><span class="fa fa-bitbucket"></span> Ayam Mati</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="ayam" && $url_aktif2=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('ayam/laporan');?>"><span class="fa fa-bitbucket"></span> Ayam Masuk</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="pakan_masuk" && $url_aktif2=="laporan"){echo 'class="active"';}?>><a href="<?=base_url('pakan_masuk/laporan');?>"><span class="fa fa-bitbucket"></span> Pakan Masuk</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="pakan_harian" && $url_aktif2=="laporan"){echo 'class="active"';}?>"><span class="fa fa-bitbucket"></span> Beri Pakan</a></li>
                            <li <?php $url_aktif = $this->uri->segment(1);$url_aktif2 = $this->uri->segment(2); if($url_aktif=="telur" && $url_aktif2=="laporan"){echo 'class="active"';}?>"><span class="fa fa-bitbucket"></span> Telur Harian</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="<?= base_url('assets/images/users/user2.jpg') ?>" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="<?= base_url('assets/images/users/user.jpg') ?>" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="<?= base_url('assets/images/users/user3.jpg') ?>" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2015 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2015 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2015 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2015 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                    <!-- LANG BAR -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="flag flag-gb"></span></a>
                        <ul class="xn-drop-left xn-drop-white animated zoomIn">
                            <li><a href="#"><span class="flag flag-gb"></span> English</a></li>
                            <li><a href="#"><span class="flag flag-de"></span> Deutsch</a></li>
                            <li><a href="#"><span class="flag flag-cn"></span> Chinese</a></li>
                        </ul>                        
                    </li> 
                    <!-- END LANG BAR -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                <?php $this->load->view("_parts/breadcrumb.php") ?>                   
                                             
            