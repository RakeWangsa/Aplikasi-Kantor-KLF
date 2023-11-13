<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Cetak Label</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body style="background-color: white;">



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
    .page-break {
              page-break-after: always;
            }
  </style>

  



  



<?php $kolom=1 ?>
<?php foreach($array as $row): ?>

<?php if($row!=NULL): ?>
  <?php for($i=1;$i<=$row;$i++): ?>

    <?php if($kolom==1): ?>
      <table class="page-break">
        <tr>
          <td><?= $row ?></td>
          <?php $kolom++; ?>
    <?php elseif($kolom==2): ?>
          <td><?= $row ?></td>
        </tr>
        <?php $kolom++; ?>
    <?php elseif($kolom==3): ?>
      <tr>
      <td><?= $row ?></td>
      <?php $kolom++; ?>
    <?php elseif($kolom==4): ?>
      <td><?= $row ?></td>
        </tr>
        <?php $kolom=1; ?>
        </table>
    <?php endif; ?>


  <?php endfor; ?>
<?php endif; ?>


<?php endforeach; ?>
<?php if($kolom==2): ?>
  <td></td>
</tr>
</table>
  <?php endif; ?>


      


 
<!-- partial -->
<script>

        window.onload = function() {

            window.print();
        }
    </script>
  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
