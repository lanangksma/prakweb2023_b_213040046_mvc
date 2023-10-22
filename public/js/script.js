$(function() {

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    }); 

    $('.tampilModalUbah').on('click', function(){

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/prakweb2023_b_213040045_mvc/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost:8080/prakweb2023_b_213040045_mvc/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });

});