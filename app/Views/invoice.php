<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Invoice Order</title>
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
        <a href="<?= base_url('kategoriProduk'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M5 4h14c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm0 5h14M5 14h14M5 9h14"></path>
</svg>
          <span>Kategori Produk</span>
        </a>
      </li>
      <li class="sidebar-list-item">
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
  <h1 class="app-content-headerText">Invoice Order</h1>
  <div class="d-flex">
    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#paymentTerms" style="margin-right:10px"><i class="fas fa-credit-card"></i> Payment Terms</button>
    <a class="btn btn-primary" href="<?= base_url('order/invoice/cetak'); ?>"><i class="fas fa-file-pdf"></i> Cetak Invoice</a>
  </div>
</div>

<?php
        $encodedKodeOrder = base64_encode($data['kode_order']);
      ?>
<!-- Payment terms -->
<div class="modal fade" id="paymentTerms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?= base_url('order/invoice/addPaymentTerms?kode_order=' . $encodedKodeOrder); ?>" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Terms</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="termin1" class="form-label">Termin 1</label>
            <input type="text" class="form-control" id="termin1" name="termin1">
          </div>
          <div class="mb-3">
            <label for="termin2" class="form-label">Termin 2</label>
            <input type="text" class="form-control" id="termin2" name="termin2">
          </div>
          <div class="mb-3">
            <label for="termin3" class="form-label">Termin 3</label>
            <input type="text" class="form-control" id="termin3" name="termin3">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    table, th, td {
      border: 1px solid white;
    }

    th, td {
      padding: 10px;
      text-align: center;
    }
  </style>

  



    <div class="products-area-wrapper tableView">




  <table class="text-light">
  <tr style="background-color:#707070;">
  <td rowspan="5"><img src="<?= base_url('uploads/klflogo.png'); ?>" style="max-width:500px"></td>
  <td rowspan="5">v.1</td>
    <td>Invoice <?= $data['nama']; ?></td>
  </tr>
  <tr style="background-color:#707070;">
    <td style="text-align: left;">CODE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $data['kode_invoice']; ?></td>
  </tr>
  <tr style="background-color:#707070;">
    <td style="text-align: left;">DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -</td>
  </tr>
  <tr style="background-color:#707070;">
  <td style="text-align: left;">DEADLINE &nbsp; <?= date('d-m-Y', strtotime($data['deadline'])); ?></td>


  </tr>
  <tr style="background-color:#707070;">
    <td style="text-align: left;">REV &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -</td>
  </tr>

</table>

<table class="text-light">



    
      <tr style="background-color:#303030;">
        <th>1. SUPPLIER</th>
        <th>2. DELIVERY</th>
      </tr>
      <tr style="background-color:#707070;">
        <td style="text-align: left;">
        <pre style="display:inline;">Karya Logam Furniture<br></pre>
          <pre style="display:inline;">Jl. Bendansari No. 2, Kec. Tahunan, Kab. Jepara<br></pre>
          <pre style="display:inline;">Email    : nino@karyalogamfurniture.com</pre><br>
          <pre style="display:inline;">Mobile   : +6281327737717 / +62895411499535</pre></td>
        </td>
        <td style="text-align: left;"><pre style="display:inline;">Customer : <?= $data['nama']; ?></pre><br>
        <pre style="display:inline;">Address  : <?= $data['alamat']; ?></pre><br>
        <pre style="display:inline;">Email    : -</pre><br>
        <pre style="display:inline;">Mobile   : <?= $data['no_telfon']; ?></pre></td>
      </tr>
      <tr>
      </table>
      <table class="text-light">
      <tr>
      <th colspan="10" style="background-color:#303030;">3. PRICELIST</th>
      </tr>
      <tr style="background-color:#404040;">
        <td rowspan="2">No</td>
        <td rowspan="2">Gambar</td>
        <td rowspan="2">Deskripsi</td>
        <td colspan="3">Ukuran</td>
        <td rowspan="2">Finishing</td>
        <td rowspan="2">Harga(Rp)</td>
        <td rowspan="2">Qty</td>
        <td rowspan="2">Total Harga</td>
      </tr>
      <tr style="background-color:#404040;">
        <td>W cm</td>
        <td>D cm</td>
        <td>H cm</td>
      </tr>
      <tr style="background-color:#707070;">
        <td>1</td>
        <td>    <?php
    // Pecah nilai $row['foto'] menjadi array berdasarkan koma (,)
    $fotoArray = explode(',', $data['gambar']);

    // Loop untuk menampilkan setiap foto
    foreach ($fotoArray as $foto):
    ?>
        <img src="<?= base_url('uploads/' . $foto); ?>" style="max-width: 100px;" alt="Gambar">
    <?php
    endforeach;
    ?></td>
        <td>Buffet<br>
200x40x90<br>
Kaki stainless gold<br>
Warna Excellente White <br>
Nippon<br>
Marmer white carrara</td>

        <td>200</td>
        <td>40</td>
        <td>90</td>
        <td>Deskripsi</td>
        <td>Rp. 8.000.000</td>
        <td>1</td>
        <td>Rp. 8.000.000</td>
      </tr>
      <tr style="background-color:#707070;">
        <td>2</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="7"></td>
        <td style="background-color:#707070;">SUBTOTAL</td>
        <td style="background-color:#707070;">1</td>
        <td style="background-color:#707070;">Rp. 8.000.000</td>
      </tr>
      <tr>
        <td colspan="7"></td>
        <td style="background-color:#707070;">DP</td>
        <td colspan="2" style="background-color:#707070;">Rp. 3.000.000</td>
      </tr>
      <tr>
        <td colspan="7"></td>
        <td style="background-color:#707070;">GRAND TOTAL</td>
        <td colspan="2" style="background-color:#707070;">Rp. 5.000.000</td>
      </tr>

      
  </table>

  

      



  <div class="row mt-4">
    <div class="col-md-6">
            <div class="alert bg-primary text-light">
                PAYMENT TERMS :<br>
                <?php if (isset($termin['termin1'])): ?>
                    - Termin 1 &nbsp;&nbsp;: <?= $termin['termin1']; ?><br>
                <?php else: ?>
                    - Termin 1 &nbsp;&nbsp;: -<br>
                <?php endif; ?>
                <?php if (isset($termin['termin2'])): ?>
                    - Termin 2 &nbsp;: <?= $termin['termin2']; ?><br>
                <?php else: ?>
                    - Termin 2 &nbsp;: -<br>
                <?php endif; ?>
                <?php if (isset($termin['termin3'])): ?>
                    - Termin 3 &nbsp;: <?= $termin['termin3']; ?><br>
                <?php else: ?>
                    - Termin 3 &nbsp;: -<br>
                <?php endif; ?>
                BCA a.n. Alfennino Ferdiansyah Gunawan
            </div>
    </div>
</div>





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
