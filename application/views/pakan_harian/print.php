<?php $this->load->view('_parts/head-rpt')?>
</style>
</head>
<body>
    <h2>Laporan Pemberian Pakan</h2>
    <b><h3><?php echo $ket; ?></h3></b><br /><br />
    
    <table id="pakan_harian" class="table datatable">
        <thead>
            <tr>
                <th>Id Input</th>
                <th>Merk</th>
                <th>Tanggal Input</th>
                <th>Waktu Input</th>
                <th>Penanggung Jawab</th>
                <th>Kandang</th>
                <th>Jumlah(Kg)</th>
            </tr>
        </thead>
        <tbody>
        <?php  if( ! empty($pakan_harian)){ ?>
            <?php foreach ($pakan_harian as $data): ?>
                <?php $tgl = date('d-m-Y', strtotime($data->tgl_input)) ?>
            <tr>
                <td><?= $data->id_input ?></td>
                <td><?= $data->merk ?></td>
                <td><?= $tgl ?></td>
                <td><?= $data->waktu_input ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->nama_kandang ?></td>
                <td><?= $data->jumlah ?></td>
            </tr>
            <?php endforeach; ?>
        <?php }  ?>
        </tbody>
    </table>   
</body>
</html>