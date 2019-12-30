<?php $this->load->view('_parts/head-rpt')?>
</style>
</head>
<body>
    <h2>Laporan Ayam Masuk</h2>
    <b><h3><?php echo $ket; ?></h3></b><br /><br />
    
    <table id="ayam_masuk" class="table datatable">
        <thead>
            <tr>
                <th>Id Input</th>
                <th>Jenis Ayam</th>
                <th>Nama Supplier</th>
                <th>Kandang Asal</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php  if( ! empty($ayam_masuk)){ ?>
            <?php foreach ($ayam_masuk as $data): ?>
                <?php $tgl = date('d-m-Y', strtotime($data->tgl_masuk)) ?>
            <tr>
                <td><?= $data->id_input ?></td>
                <td><?= $data->jenis ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->nama_kandang ?></td>
                <td><?= $tgl ?></td>
                <td><?= $data->jumlah ?></td>
                <td><?= "Rp" . number_format("$data->harga",0, '', '.') ?></td>
                <td><?= "Rp" . number_format("$data->total_harga",0, '', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        <?php }  ?>
        </tbody>
    </table>   
</body>
</html>