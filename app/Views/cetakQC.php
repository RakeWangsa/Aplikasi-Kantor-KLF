<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Invoice</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body style="background-color: white;">

<!-- partial:index.partial.html -->

    <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: black;
    }
    
    table, th, td {
      border: 1px solid black;
    }

    th, td {
      padding: 10px;
      text-align: center;
    }
  </style>

  



  



<?php foreach ($array as $row): ?>

      <table>
        <tr style="background-color:#c0c0c0;">
      <th colspan="7">Kode Order : <?= $row ?></th>
      </tr>
      <tr style="background-color:#e0e0e0;">
        <td>No</td>
        <td>Gambar</td>
        <td>Detail</td>
        <td>Quantity</td>
      </tr>
      <?php $i=1; ?>
      <?php foreach ($OrderProdukData as $produk): ?>
        <?php if ($produk['kode_order']==$row): ?>
      <tr>
        <td><?= $i ?></td>
        <td><img src="<?= base_url('uploads/' . $produk['gambar']); ?>" style="width:150px;height:auto"></td>
        <td><?= $produk['nama'] ?><br>
        <?php foreach ($OrderProdukDetailData as $detail): ?>
          <?php if ($detail['id_order_produk']==$produk['id_order_produk']): ?>
          <?= $detail['detail'] ?> : <?= $detail['nilai'] ?><br>
          <?php endif; ?>
          <?php endforeach; ?>
          </td>
        <td><?= $produk['quantity'] ?></td>
      </tr>
      <?php $i++; ?>
      <?php endif; ?>
      <?php endforeach; ?>

      
  </table>

  <?php endforeach; ?>

      


 
<!-- partial -->
<script>
        // Menggunakan window.onload untuk memastikan bahwa fungsi dijalankan saat halaman sudah dimuat sepenuhnya
        window.onload = function() {
            // Mencetak halaman otomatis
            window.print();
        }
    </script>
  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
