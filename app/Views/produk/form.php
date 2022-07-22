<div class="row">
  <div class="col-md-6 offset-md-3">
    <div class="card">
      <div class="card-header">
        <?=$title?>
      </div>
      <div class="card-body">
            <form method="POST" id="myform" action="<?=base_url('newproduk')?>">
              <div class="mb-3">
                <label for="exampleInputEmail1">Nama Produk</label>
                <input type="text" class="form-control" id="produkname" aria-describedby="produkname" name="nama_produk" placeholder="contoh : BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="contoh : CI MTH TINTA LAIN " required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1">harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="contoh : Rp.10000,00" 
                data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" style="text-align: right;" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1">Status</label>
                <select class="form-control" name="status" required>
                  <option value=""></option>
                  <option value="bisa dijual">Bisa Di Jual</option>
                  <option value="tidak bisa dijual">tidak bisa dijual</option>
                </select>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>
