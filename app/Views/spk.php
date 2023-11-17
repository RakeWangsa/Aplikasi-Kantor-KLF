<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - SPK</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <h1 class="app-content-headerText">SPK</h1>
  <div class="d-flex">
    
    <a class="btn btn-secondary" href="<?= base_url('supplier/info/spk/cetak/'.$encodedKode); ?>"><i class="fas fa-print"></i> Cetak SPK</a>
  </div>
</div>




  
<style>
  .headerspk {
    display: flex;
    justify-content: space-between;
}

.left-column, .right-column {
    width: 48%; /* Atur lebar masing-masing kolom sesuai kebutuhan */
}
.right-column {
    margin-left: 50%; /* Atur margin kiri sesuai kebutuhan untuk menggeser ke kanan */
}
</style>


    <div class="products-area-wrapper tableView">




    <div class="headerspk text-light">
      <div class="left-column">
          <p><strong>Pengrajin :</strong> <?= $SupplierData['nama'] ?></p>
          <p><strong>Kode :</strong> <?= $kodeSpk ?></p>
      </div>

      <div class="right-column">
          <p><strong>Total :</strong> Rp. <?= number_format($totalHarga, 0, ",", "."); ?></p>
          <p><strong>DP :</strong> Rp. <?= number_format($DP, 0, ",", "."); ?></p>
          <p><strong>Kekurangan :</strong> Rp. <?= number_format($kekurangan, 0, ",", "."); ?></p>
      </div>
    </div>

    <div class="products-header">

<div class="product-cell" style="margin-right:-100px">No</div>
<div class="product-cell">Gambar</div>
<div class="product-cell">Keterangan</div>
<div class="product-cell">Harga</div>
<div class="product-cell">Quantity</div>
<div class="product-cell">Total</div>
<div class="product-cell">Deadline</div>

</div>

<?php $no=1 ?>
<div id="productList">
<?php foreach ($orderProdukSupplierDataArray as $row): ?>


<div class="products-row">
<div class="product-cell" style="margin-right:-100px"><span><?= $no++ ?></span></div>
<div class="product-cell">
    <span>
      <img src="<?= base_url('uploads/'.$row['gambar']); ?>" style="width: 150px; height: auto;">
    </span>
  </div>
  <div class="product-cell">
    <span>
      <?= $row['customer'] ?><br>
      <?php foreach ($row['detail'] as $detail): ?>
                        <?= $detail['detail']; ?> : <?= $detail['nilai']; ?><br>
                    <?php endforeach; ?>
                    Catatan Khusus : <?= $row['catatan_khusus'] ?>    
  </span>
  </div>
<div class="product-cell"><span>Rp. <?= number_format($row['harga'], 0, ",", "."); ?></span></div>
<div class="product-cell"><span><?= $row['jumlah_barang'] ?></span></div>
<div class="product-cell"><span>Rp. <?= number_format($row['total_harga'], 0, ",", "."); ?></span></div>
<div class="product-cell"><span><?= date('d-m-Y', strtotime($row['deadline'])); ?></span></div>

</div>
    
    <?php endforeach; ?>


</div>
  

      <div class="mt-4">
<?php foreach ($PaymentSupplierData as $row): ?>

<p class="text-light"><strong>DP - <?= date('d F Y', strtotime($row['tanggal'])); ?> :</strong> Rp. <?= number_format($row['jumlah_payment'], 0, ",", "."); ?></p>

    
  <?php endforeach; ?>
  </div>




    </div>





  </div>
</div>





  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
