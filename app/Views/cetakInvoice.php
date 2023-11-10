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

  



  


  <table>
  <tr>
  <td rowspan="4"><img src="<?= base_url('uploads/klflogo.png'); ?>" style="max-width:500px"></td>
    <td>INVOICE <?= $data['nama']; ?></td>
  </tr>
  <tr>
    <td style="text-align: left;">CODE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Eva/23/IX/01</td>
  </tr>
  <tr>
    <td style="text-align: left;">DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20 Oktober 2023</td>
  </tr>
  <tr>
    <td style="text-align: left;">DEADLINE &nbsp; 30 Oktober 2023</td>
  </tr>

</table>

<table>


<tr style="background-color:#c0c0c0;">
        <th>1. SUPPLIER</th>
        <th>2. DELIVERY</th>
      </tr>
      <tr>
        <td style="text-align: left;">
        <pre style="display:inline;">Karya Logam Furniture<br></pre>
          <pre style="display:inline;">Jl. Bendansari No. 2, Kec. Tahunan, Kab. Jepara<br></pre>
          <pre style="display:inline;">Email    : nino@karyalogamfurniture.com</pre><br>
          <pre style="display:inline;">Mobile   : +6281327737717 / +62895411499535</pre></td>
        </td>
        <td style="text-align: left;"><pre style="display:inline;">Customer : <?= $data['nama']; ?></pre><br>
        <pre style="display:inline;">Address  : <?= $data['alamat']; ?></pre><br>
        <pre style="display:inline;">Email    : <?= $data['email']; ?></pre><br>
        <pre style="display:inline;">Mobile   : <?= $data['no_telfon']; ?></pre></td>
      </tr>
      <tr>
      </table>
      <table>
        <tr style="background-color:#c0c0c0;">
      <th colspan="10">3. PRICELIST</th>
      </tr>
      <tr style="background-color:#e0e0e0;">
        <td>No</td>
        <td>Gambar</td>
        <td>Detail</td>
        <td>Harga(Rp)</td>
        <td>Qty</td>
        <td>Total Harga</td>
      </tr>

      <?php $i = 1; ?>
      <?php foreach ($OrderProdukData as $row): ?>
      <tr>
        <td><?= $i ?></td>
        <td><img src="<?= base_url('uploads/'.$row['gambar']); ?>" style="width: 150px; height: auto;"></td>
        <td><strong><?= $row['nama'] ?></strong><br>
        <?php foreach ($OrderProdukDetailData as $detail): ?>
          <?php if ($detail['id_order_produk']==$row['id_order_produk']): ?>
          <?= $detail['detail'] ?> : <?= $detail['nilai'] ?><br>
          <?php endif; ?>
          <?php endforeach; ?>


        <td>Rp. <?= number_format($row['harga'], 0, ",", "."); ?></td>
        <td><?= $row['quantity'] ?></td>
        <td>Rp. <?= number_format($row['total_harga'], 0, ",", "."); ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>



      <tr>
        <td colspan="3"></td>
        <td>SUBTOTAL</td>
        <td><?= $totalQuantity ?></td>
        <td>Rp. <?= number_format($data['nilaiOrder'], 0, ",", "."); ?></td>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td>Discount</td>
        <td colspan="2">Rp. <?= number_format($data['discount'], 0, ",", "."); ?></td>
      </tr>
      <?php foreach ($PaymentData as $row): ?>
        <?php if ($row['kode_order']==$data['kode_order']): ?>
      <tr>
        <td colspan="3"></td>
        <td>DP (<?= date('d-m-Y', strtotime($row['tanggal'])); ?>)</td>
        <td colspan="2">Rp. <?= number_format($row['jumlah_payment'], 0, ",", "."); ?></td>
      </tr>
      <?php endif; ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="3"></td>
        <td>GRAND TOTAL</td>
        <td colspan="2">Rp. <?= number_format($data['grand_total'], 0, ",", "."); ?></td>
      </tr>

      
  </table>

  <div class="row mt-4">
    <div style="width:70%">
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
