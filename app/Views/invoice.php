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
        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z"/></svg>
        <p class="text-light">Karya Logam Furniture</p>
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
        <a href="#">
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
        <a href="#">
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
      <div class="account-info-name">Rakev</div>
      <button class="account-info-more">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </button>
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
