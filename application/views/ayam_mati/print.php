<?php $this->load->view('_parts/head-rpt')?>
    <h2>Laporan Ayam Mati</h2>
    <b><h3><?php echo $ket; ?></h3></b><br /><br />
    
    <table id="ayam_mati" class="table datatable">
        <thead>
            <tr>
                <th>Id Input</th>
                <th>Jenis Ayam</th>
                <th>Nama Supplier</th>
                <th>Kandang Asal</th>
                <th>Tanggal Mati</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
        <?php  if( ! empty($ayam_mati)){ ?>
            <?php foreach ($ayam_mati as $data): ?>
                <?php $tgl = date('d-m-Y', strtotime($data->tgl_mati)) ?>
            <tr>
                <td><?= $data->id_input ?></td>
                <td><?= $data->jenis ?></td>
                <td><?= $data->id_supplier ?></td>
                <td><?= $data->id_kandang ?></td>
                <td><?= $tgl ?></td>
                <td><?= $data->jumlah ?></td>
            </tr>
            <?php endforeach; ?>
        <?php }  ?>
        </tbody>
    </table>   
</body>
</html>