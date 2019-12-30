<script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap-select.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/plugins/bootstrap/bootstrap-datepicker.js') ?>"></script>
<script type="text/javascript">
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