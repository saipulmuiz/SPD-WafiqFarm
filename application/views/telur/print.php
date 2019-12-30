<?php $this->load->view('_parts/head-rpt')?>
</style>
</head>
<body>
    <h2>Laporan Transaksi Telur Harian</h2>
    <b><h3><?php echo $ket; ?></h3></b><br /><br />
    
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
</body>
</html>