<!-- jQuery -->
<script src="<?=base_url('tambahan/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('tambahan/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- tambahan App -->
<script src="<?=base_url('tambahan/dist/js/styleku.js')?>"></script>
<script src="<?=base_url('tambahan/plugins/sweetalert2/sweetalert2.min.js')?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?=base_url('tambahan/plugins/inputmask/jquery.inputmask.min.js')?>"></script>
<?if(session()->getFlashData('success')){?>
<script>
  Swal.fire('Sukses','','success')
</script>
<?}?>
<?if(session()->getFlashData('danger')){?>
<script>
  Swal.fire('Gagal','','error')
</script>
<?}?>
<script type="text/javascript">
  $(document).ready(function () {
    $('#produk-table').DataTable({
        "language": {
                buttons: {
                    pageLength: {
                        '_': "Halaman %d Linhas",
                    }
                },
                "zeroRecords": "Tidak Ada Data Produk Yang Dicari",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ produk",
                "infoEmpty": "Belum Ada produk",
                "infoFiltered": "(Filter data produk dari _MAX_ total produk)",
                "decimal": ",",
                "thousands": ".",
                "sSearch": "Pencarian",
                "oPaginate": {
                    "sNext": "Selanjutnya",
                    "sPrevious": "Sebelumnya",
                    "sFirst": "Awal",
                    "sLast": "Akhir"
                },
            },
      });
    
  });
  $(document).ready(function(){
  
  $("[data-inputmask]").inputmask({removeMaskOnSubmit: true});
  
  });
</script>

</body>

</html>

<script type="text/javascript">
  function hapus(id){
    Swal.fire({
  title: 'Anda Yakin Ingin Menghapus Data ?',
  showDenyButton: true,
  confirmButtonText: 'Hapus',
  denyButtonText: 'Batal',
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
        url: "/hapusproduk/"+id,
        type: 'DELETE',
        success: function(result) {
          Swal.fire({ title: 'Berhasil',
                      text: "Data Berhasil Dihapus",
                      icon: 'success',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                           location.reload();
                        }
                      });
         
        },error: function(){
            Swal.fire('Data gagal Dihapus', '', 'info')
          }
      });

  } else if (result.isDenied) {
    Swal.fire('Data Tidak Sihapus', '', 'info')
  }
})
  }
</script>