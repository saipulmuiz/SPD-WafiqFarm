<?php $this->load->view('_parts/head-rpt')?>
</style>
</head>
<body>
    <h2>Laporan Pakan Masuk</h2>
    <b><h3><?php echo $ket; ?></h3></b><br /><br />
    
    <table id="pakan_masuk" class="table">
        <thead>
            <tr>
                <th>Id Input</th>
                <th>Merk</th>
                <th>Nama Supplier</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php  if( ! empty($pakan_masuk)){ ?>
                <?php foreach ($pakan_masuk as $data): ?>
                    <?php $tgl = date('d-m-Y', strtotime($data->tgl_masuk)) ?>
                <tr>
                    <td><?= $data->id_input ?></td>
                    <td><?= $data->merk ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $tgl ?></td>
                    <td><?= $data->jumlah ?></td>
                    <td><?= $data->harga ?></td>
                    <td><?= $data->total_harga ?></td>
                </tr>
                <?php endforeach; ?>
            <?php }  ?>
        </tbody>
    </table>
</body>
</html>