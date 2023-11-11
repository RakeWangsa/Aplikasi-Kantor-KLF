<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Supplier Info</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>

<style>
  .sublist {
    text-indent: 30px;
  }

  .sublist-icon {
    width: 6px; /* Lebar ikon bulat */
    height: 6px; /* Tinggi ikon bulat */
    background-color: grey; /* Warna latar belakang ikon */
    border-radius: 50%; /* Mengatur ikon menjadi bulat */
    display: inline-block;
    margin-right: 3px; /* Jarak antara ikon dan teks */
  }


</style>


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
      <li class="sidebar-list-item">
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
        <a href="<?= base_url('kategoriProduk'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M5 4h14c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm0 5h14M5 14h14M5 9h14"></path>
</svg>
          <span>Kategori Produk</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="<?= base_url('supplier'); ?>">
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
      <h1 class="app-content-headerText">Supplier Info [<?= $SupplierData['kategori']; ?> - <?= $SupplierData['nama']; ?>]</h1>
      
    </div>

    <!-- <div class="app-content-actions">
      <div>

      </div>
    


      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Kategori</button>


    Modal
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('supplier/addKategori'); ?>" method="post">
          <div class="modal-body">
          <label for="kategori" class="form-label">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    </div> -->

    <div class="products-area-wrapper tableView">

    <div class="container text-light">
        <div class="row">
        <div class="col-md-6 product-details border p-4">
        <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Rincian Pesanan</h4>

        </div>
      <div class="products-header mt-2">

      <div class="product-cell">Produk</div>
      <div class="product-cell">Quantity</div>
        <div class="product-cell">Total Harga</div>
        <div class="product-cell">Status</div>
      </div>






      <div id="productList">
      <ul class="list-group">
      <?php foreach ($OrderProdukSupplierData as $row): ?>
        <?php if ($row['status']!='Selesai'): ?>
    <?php $id = $row['id']; ?>
<!-- <li class=""> -->
<!-- <a href="#" class="" data-toggle="modal" data-target="#exampleModal"> -->
    <div class="products-row">

      <div class="product-cell">
        <span><?= $row['nama_produk']; ?></span>
      </div>
      <div class="product-cell">
        <span><?= $row['jumlah_barang']; ?></span>
      </div>
      <div class="product-cell">
        <span>Rp. <?= number_format($row['total_harga'], 0, ",", "."); ?></span>
      </div>
      <div class="product-cell">
        <span><?= $row['status']; ?></span>
      </div>
      <!-- <div class="product-cell status-cell">
        <span>
          <button type="button" class="btn btn-success rounded-circle" data-toggle="modal" data-target="#add<?php echo $id; ?>"><i class="fas fa-plus"></i></button>
      </span>
      </div> -->
    </div>
<!-- </a> -->
    <!-- </li> -->


    <?php endif; ?> 
  <?php endforeach; ?> 
</ul>
</div>






    </div>

    <div class="col-md-6 product-details border p-4">
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Payment</h4>
        
        <div class="d-flex align-items-center">
        <h6 class="mb-0" style="margin-right:10px">Tagihan : Rp. <?= number_format($totalTagihan, 0, ",", "."); ?></h6>
        <button type="button" class="btn btn-success btn-sm rounded-circle mr-2" data-toggle="modal" data-target="#addPayment">
            <i class="fas fa-plus"></i>
        </button>
        
    </div>

        <!-- Modal -->
    <div class="modal fade" id="addPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog text-dark">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Payment</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('supplier/addPayment/'.$encodedId); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal">
          </div>
          <div class="mb-3">
            <label for="jumlahPayment" class="form-label">Jumlah Payment :</label>
            <input type="number" class="form-control" name="jumlahPayment" id="jumlahPayment">
          </div>
          <div class="mb-3">
          <label for="gambar">Bukti Payment :</label>
                <input type="file" class="form-control-file" accept="image/*" id="gambar" name="gambar[]" required>
          </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    </div>
      <div class="products-header mt-2">

      <div class="product-cell">Tanggal</div>
      <div class="product-cell">Jumlah Pembayaran</div>
      <div class="product-cell">Bukti Pembayaran</div>
      </div>






      <div id="productList">
      <ul class="list-group">
      <?php foreach ($PaymentSupplierData as $row): ?>
    <?php $id = $row['id']; ?>
<!-- <li class=""> -->
<!-- <a href="#" class="" data-toggle="modal" data-target="#exampleModal"> -->
    <div class="products-row">

      <div class="product-cell">
        <span><?= date('d-m-Y', strtotime($row['tanggal'])); ?></span>
      </div>
      <div class="product-cell">
        <span>Rp. <?= number_format($row['jumlah_payment'], 0, ",", "."); ?></span>
      </div>
      <div class="product-cell">
        <span><img src="<?= base_url('uploads/'.$row['bukti_payment']); ?>" style="width: 50px; height: auto;" data-toggle="modal" data-target="#modal<?= $row['id'] ?>"></span>
      </div>
    </div>
<!-- </a> -->
    <!-- </li> -->

            <!-- Modal -->
            <div class="modal fade" id="modal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <img src="<?= base_url('uploads/' . $row['bukti_payment']); ?>" style="width: 100%; height: auto;" alt="...">
            </div>
          </div>
        </div>
      </div>


  <?php endforeach; ?> 
</ul>
</div>






    </div>

    </div>

    <div class="row">
        <div class="col-md-12 product-details border p-4">
        <h4 class="mb-0">Riwayat Pesanan</h4>
        <div class="products-header mt-2">

<div class="product-cell">Produk</div>
<div class="product-cell">Gambar</div>
<div class="product-cell">Quantity</div>
  <div class="product-cell">Total Harga</div>
  <div class="product-cell">Status</div>
</div>






<div id="productList">
<ul class="list-group">
<?php foreach ($OrderProdukSupplierData as $row): ?>
  <?php if ($row['status']=='Selesai'): ?>

<!-- <li class=""> -->
<!-- <a href="#" class="" data-toggle="modal" data-target="#exampleModal"> -->
<div class="products-row">

<div class="product-cell">
  <span><?= $row['nama_produk']; ?><br><?= $row['kode_order']; ?></span>
</div>
<div class="product-cell">
        <span><img src="<?= base_url('uploads/'.$row['gambar']); ?>" style="width: 150px; height: auto;" data-toggle="modal" data-target="#gambar<?= $row['id'] ?>"></span>
      </div>
<div class="product-cell">
  <span><?= $row['jumlah_barang']; ?></span>
</div>
<div class="product-cell">
  <span>Rp. <?= number_format($row['total_harga'], 0, ",", "."); ?></span>
</div>
<div class="product-cell">
  <span><?= $row['status']; ?></span>
</div>
<!-- <div class="product-cell status-cell">
  <span>
    <button type="button" class="btn btn-success rounded-circle" data-toggle="modal" data-target="#add<?php echo $id; ?>"><i class="fas fa-plus"></i></button>
</span>
</div> -->
</div>
<!-- </a> -->
<!-- </li> -->

            <!-- Modal -->
            <div class="modal fade" id="gambar<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $row['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <img src="<?= base_url('uploads/' . $row['gambar']); ?>" style="width: 100%; height: auto;" alt="...">
            </div>
          </div>
        </div>
      </div>

<?php endif; ?> 
<?php endforeach; ?> 
</ul>
</div>
        </div>
      </div>

    </div>

      

    </div>





  </div>
</div>






  <script  src="<?= base_url('assets2/script.js'); ?>"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
