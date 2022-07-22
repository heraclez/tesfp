
<div class="row">

<h1><?=$title?></h1>

  <div class="container">
          <!-- Default box -->
    <div class="card ">
      <div class="card-header">
        <a href="<?=base_url('tambahproduk')?>" class="btn btn-primary">
          <i class="fas fa-plus"></i> Tambah produk
        </a>
      </div>
      <div class="card-body">

        <table id="produk-table" class="table">
          <thead>
            <tr>
              <td>No</td>
              <td>nama produk</td>
              <td>kategori</td>
              <td>Harga</td>
              <td>Status</td>
              <td>aksi</td>
            </tr>
          </thead>
          <tbody>
            <?
           
              $no=0;
              foreach($produk as $key){
                $no++;
              ?>
            <tr>
              <td><?=$no;?></td>
              <td><?=$key->nama_produk;?></td>
              <td><?=$key->kategori;?></td>
              <td><?=to_idr($key->harga);?></td>
              <td><?=$key->status;?></td>
              <td>
                <a href="<?=base_url('editproduk/'.$key->id_produk)?>" class="btn btn-info">
                <i class="fas fa-edit"></i> Edit
              </a>
              <a  onclick="hapus('<?=$key->id_produk?>')" class="btn btn-danger">
                <i class="fas fa-trash"></i> Hapus
              </a>
              </td>
            </tr>
            <?}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>