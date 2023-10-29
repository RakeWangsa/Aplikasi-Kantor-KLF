<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Input Order</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>

<!-- partial:index.partial.html -->
<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
      <img src="<?= base_url('assets2/klf-logo.png') ?>" alt="Logo" width="320px" height="100px" style="margin-left:-73px">
      </div>
      
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a href="<?= base_url('dashboard'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dashboard">
    <rect x="3" y="3" width="6" height="6" />
    <rect x="15" y="3" width="6" height="6" />
    <rect x="3" y="15" width="6" height="6" />
    <rect x="15" y="15" width="6" height="6" />
</svg>

          <span>Dashboard</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="<?= base_url('order/listOrder'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list-order">
    <line x1="5" y1="6" x2="19" y2="6" />
    <line x1="5" y1="12" x2="19" y2="12" />
    <line x1="5" y1="18" x2="19" y2="18" />
</svg>


          <span>List Order</span>
        </a>
      </li>

      <li class="sidebar-list-item">
        <a href="<?= base_url('taskCalendar'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-task-calendar">
    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
    <line x1="16" y1="2" x2="16" y2="6" />
    <line x1="8" y1="2" x2="8" y2="6" />
    <line x1="3" y1="10" x2="21" y2="10" />
    <line x1="3" y1="14" x2="21" y2="14" />
</svg>

          <span>Task Calendar</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-supplier">
    <rect x="3" y="8" width="18" height="12" rx="2" ry="2" />
    <rect x="8" y="6" width="8" height="4" rx="1" ry="1" />
    <path d="M12 16v3m-2-3v3m4-3v3" />
</svg>

          <span>Supplier</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="<?= base_url('katalogProduk'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-product-catalog">
    <rect x="2" y="3" width="20" height="18" rx="2" ry="2" />
    <line x1="9" y1="7" x2="15" y2="7" />
    <line x1="9" y1="11" x2="15" y2="11" />
    <line x1="9" y1="15" x2="13" y2="15" />
</svg>




          <span>Katalog Produk</span>
        </a>
      </li>
    </ul>
    <div class="account-info">
      <div class="account-info-picture">
        <img src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="Account">
      </div>
      <div class="account-info-name"><?= session()->get('name') ?></div>
      <a class="account-info-more" href="<?= base_url('logout'); ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
        <path d="M19 12H5M12 19l7-7-7-7"/>
    </svg>
                  </a>
    </div>
  </div>
  <div class="app-content">
    <div class="app-content-header my-4">
      <h1 class="app-content-headerText">Input Order</h1>
    </div>

    <div class="products-area-wrapper tableView">



    <form class="text-light" action="<?= base_url('order/inputOrder/simpanData'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" style="max-width:1000px" placeholder="Masukkan nama">
            </div>
            <div class="form-group mb-2">
                <label for="noTelfon">No Telfon:</label>
                <input type="text" class="form-control" id="noTelfon" name="noTelfon" style="max-width:1000px" placeholder="Masukkan no telfon">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" style="max-width:1000px" placeholder="Masukkan email">
            </div>
            <div class="form-group mb-2">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" style="max-width:1000px" placeholder="Masukkan alamat"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="detailProduk">Tanggal Order:</label>
                <input type="date" class="form-control" id="tanggalOrder" name="tanggalOrder" style="max-width:1000px">
            </div>
            <div class="form-group mb-4">
                <label for="detailProduk">Deadline Order:</label>
                <input type="date" class="form-control" id="deadlineOrder" name="deadlineOrder" style="max-width:1000px">
            </div>

            <!-- <div class="form-group mb-2">
                <label for="detailProduk">Detail Produk (Gambar):</label>
                <input type="file" class="form-control-file" accept="image/*" id="detailProdukGambar" name="gambar[]" multiple>
            </div>
            <div class="form-group mb-2">
                <label for="detailProduk">Detail Produk (Kategori):</label>
                <select class="form-control" id="detailProdukKategori" name="detailProdukKategori" style="max-width:1000px">
                    <option value="kategori1">Kategori 1</option>
                    <option value="kategori2">Kategori 2</option>
                    <option value="kategori3">Kategori 3</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="detailProduk">Detail Produk (Harga):</label>
                <input type="text" class="form-control" id="detailProdukHarga" name="detailProdukHarga" style="max-width:1000px" placeholder="Masukkan harga">
            </div>
            <div class="form-group mb-2">
                <label for="detailProduk">Detail Produk (Deadline):</label>
                <input type="date" class="form-control" id="detailProdukDeadline" name="detailProdukDeadline" style="max-width:1000px">
            </div>
            <div class="form-group mb-2">
                <label for="detailProduk">Detail Produk (Catatan Khusus):</label>
                <textarea class="form-control" id="detailProdukCatatan" name="detailProdukCatatan" rows="3" style="max-width:1000px" placeholder="Masukkan catatan khusus"></textarea>
            </div> -->
            <div class="form-group mb-2">
                <label for="ongkosKirim">Ongkos Kirim:</label>
                <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary">
    <input type="radio" name="ongkosKirim" value="termasuk" id="ongkosKirimTermasuk" autocomplete="off" checked> Termasuk
</label>
<label class="btn btn-secondary">
    <input type="radio" name="ongkosKirim" value="tidak termasuk" id="ongkosKirimTidakTermasuk" autocomplete="off"> Tidak Termasuk
</label>

                </div>
            </div>
            <!-- <div class="form-group mb-2">
                <label for="discount">Discount:</label>
                <input type="text" class="form-control" id="discount" name="discount" style="max-width:1000px" placeholder="Masukkan discount">
            </div>
            <div class="form-group mb-2">
                <label for="grandTotal">Grand Total:</label>
                <input type="text" class="form-control" id="grandTotal" name="grandTotal" style="max-width:1000px" placeholder="Masukkan grand total">
            </div>
            <div class="form-group mb-2">
                <label for="kategoriSupplier">Kategori Supplier:</label>
                <select class="form-control" id="kategoriSupplier" name="kategoriSupplier" style="max-width:1000px">
                    <option value="Kayu (SUPK)">Kayu (SUPK)</option>
                    <option value="Besi (SUPB)">Besi (SUPB)</option>
                    <option value="Rotan (SUPR)">Rotan (SUPR)</option>
                    <option value="Finishing (SUPF)">Finishing (SUPF)</option>
                    <option value="Marmer (SUPM)">Marmer (SUPM)</option>
                    <option value="Jok (SUPJ)">Jok (SUPJ)</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="namaSupplier">Nama Supplier:</label>
                <select class="form-control" id="namaSupplier" name="namaSupplier" style="max-width:1000px">
                    <option value="Prabowo">Prabowo</option>
                    <option value="Ganjar">Ganjar</option>
                    <option value="Anies">Anies</option>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="jumlahBarang">Jumlah Barang:</label>
                <input type="text" class="form-control" id="jumlahBarang" name="jumlahBarang" style="max-width:1000px" placeholder="Masukkan jumlah barang">
            </div>
            <div class="form-group mb-2">
                <label for="supplierHarga">Harga (Supplier):</label>
                <input type="text" class="form-control" id="supplierHarga" name="supplierHarga" style="max-width:1000px" placeholder="Masukkan harga">
            </div> -->
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>

      


      

    </div>





  </div>
</div>
<!-- partial -->
  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
