<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Cetak SPK</title>
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

  



<table>
  <tr>
    <td colspan=2 style="background-color:yellow"><strong>SPK PENGRAJIN KARYA LOGAM FURNITURE</strong></td>
  </tr>
  <tr>

<div class="headerspk">

      <div class="left-column">
      <td style="text-align:left">
          <p><strong>Pengrajin :</strong> <?= $SupplierData['nama'] ?></p>
          <p><strong>Tanggal Cetak :</strong> <?= $hariIni ?></p>
          <p><strong>Kode :</strong> <?= $kodeSpk ?></p>
          </td>
      </div>

  
      <div class="right-column">
      <td style="text-align:left">
          <p><strong>Total :</strong> Rp. <?= number_format($totalHarga, 0, ",", "."); ?></p>
          <p><strong>DP :</strong> Rp. <?= number_format($DP, 0, ",", "."); ?></p>
          <p><strong>Kekurangan :</strong> Rp. <?= number_format($kekurangan, 0, ",", "."); ?></p>
          </td>
      </div>

    </div>

    </tr>
    </table>
    <table>


    <tr>
      <td>No</td>
      <td>Gambar</td>
      <td>Keterangan</td>
      <td>Harga</td>
      <td>Quantity</td>
      <td>Total</td>
      <td>Deadline</td>
    </tr>
    <?php $no=1 ?>
    <?php foreach ($orderProdukSupplierDataArray as $row): ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><img src="<?= base_url('uploads/'.$row['gambar']); ?>" style="width: 150px; height: auto;"></td>
      <td><?= $row['customer'] ?><br>
      <?php foreach ($row['detail'] as $detail): ?>
                        <?= $detail['detail']; ?> : <?= $detail['nilai']; ?><br>
                    <?php endforeach; ?>
                    Catatan Khusus : <?= $row['catatan_khusus'] ?>    </td>

      <td>Rp. <?= number_format($row['harga'], 0, ",", "."); ?></td>
      <td><?= $row['jumlah_barang'] ?></td>
      <td>Rp. <?= number_format($row['total_harga'], 0, ",", "."); ?></td>
      <td><?= date('d-m-Y', strtotime($row['deadline'])); ?></td>
    </tr>
    <?php endforeach; ?>

    <?php foreach ($PaymentSupplierData as $row): ?>
    <tr>
      <td colspan=5>DP - <?= date('d F Y', strtotime($row['tanggal'])); ?></td>
      <td colspan=2>Rp. <?= number_format($row['jumlah_payment'], 0, ",", "."); ?></td>
    </tr>
    <?php endforeach; ?>

    </table>


 
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
