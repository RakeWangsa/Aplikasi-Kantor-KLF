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
  <td rowspan="5"><img src="<?= base_url('uploads/klflogo.png'); ?>" style="max-width:500px"></td>
  <td rowspan="5">v.1</td>
    <td>INVOICE Ny. Eva</td>
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
  <tr>
    <td style="text-align: left;">REV &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1</td>
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
        <td style="text-align: left;"><pre style="display:inline;">Customer : Ny. Eva</pre><br>
        <pre style="display:inline;">Address  : Semarang</pre><br>
        <pre style="display:inline;">Email    : eva@gmail.com</pre><br>
        <pre style="display:inline;">Mobile   : +62 815-4215-0996</pre></td>
      </tr>
      <tr>
      </table>
      <table>
        <tr style="background-color:#c0c0c0;">
      <th colspan="10">3. PRICELIST</th>
      </tr>
      <tr style="background-color:#e0e0e0;">
        <td rowspan="2">No</td>
        <td rowspan="2">Gambar</td>
        <td rowspan="2">Deskripsi</td>
        <td colspan="3">Ukuran</td>
        <td rowspan="2">Finishing</td>
        <td rowspan="2">Harga(Rp)</td>
        <td rowspan="2">Qty</td>
        <td rowspan="2">Total Harga</td>
      </tr>
      <tr style="background-color:#e0e0e0;">
        <td>W cm</td>
        <td>D cm</td>
        <td>H cm</td>
      </tr>
      <tr>
        <td>1</td>
        <td><img src="<?= base_url('uploads/bose.jpeg'); ?>" style="max-width:200px"></td>
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
      <tr>
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
        <td>SUBTOTAL</td>
        <td>1</td>
        <td>Rp. 8.000.000</td>
      </tr>
      <tr>
        <td colspan="7"></td>
        <td>DP</td>
        <td colspan="2">Rp. 3.000.000</td>
      </tr>
      <tr>
        <td colspan="7"></td>
        <td>GRAND TOTAL</td>
        <td colspan="2">Rp. 5.000.000</td>
      </tr>

      
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
