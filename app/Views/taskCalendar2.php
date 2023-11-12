<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Task Calendar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>

<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(85, 85, 85, 0.5);
            color: #ffffff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
          background-color: rgba(85, 85, 85, 0.9);
        }

        td {
            height: 80px;
            text-align:left;
            vertical-align: top;
        }

        .today {
            background-color: #7fd3f3;
        }

        #calendar-info {
            margin-bottom: 20px;
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

      <li class="sidebar-list-item active">
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
    <div class="app-content-header mt-4">
      <h1 class="app-content-headerText"><?= $namaBulan ?> - <?= $tahun ?></h1>
      
    </div>

    <div class="app-content-actions">
      <div>
      <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#pilihBulan"><i class="fas fa-calendar-week"></i> Pilih Bulan</button>
      <a <?php if($bulan==1): ?> href="<?= base_url('taskCalendar/calendarView/12/'.$tahun-1); ?>" <?php else: ?> href="<?= base_url('taskCalendar/calendarView/'.$bulan-1 .'/'.$tahun); ?>" <?php endif; ?> class="btn btn-danger mb-2"><i class="fas fa-arrow-up"></i></a>
      <a <?php if($bulan==12): ?> href="<?= base_url('taskCalendar/calendarView/1/'.$tahun+1); ?>" <?php else: ?> href="<?= base_url('taskCalendar/calendarView/'.$bulan+1 .'/'.$tahun); ?>" <?php endif; ?> class="btn btn-success mb-2"><i class="fas fa-arrow-down"></i></a>
      </div>
    
<!-- Modal -->
<div class="modal fade" id="pilihBulan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Bulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPilihBulan" action="<?= base_url('taskCalendar/calendarView/pilih'); ?>" method="post">
            <div class="modal-body">

                    <div class="mb-3">
                        <label for="bulan" class="form-label" style="float:left">Bulan:</label>
                        <select class="form-control" id="bulan" name="bulan">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label" style="float:left">Tahun:</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <?php
                            for ($thn = $tahun - 1; $thn <= $tahun + 1; $thn++) {
                              if($thn==$tahun){
                                echo "<option value=\"$thn\" selected>$thn</option>";
                              }else{
                                echo "<option value=\"$thn\">$thn</option>";
                              }
                            }
                            ?>
                        </select>
                    </div>
     
            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="submitForm()">Pilih</button>
            </div>
            </form>
        </div>
    </div>
</div>



      <a class="btn btn-success mb-2" href="<?= base_url('taskCalendar'); ?>"><i class="fas fa-calendar-check"></i> Task Calendar</a>
    </div>

    <div class="products-area-wrapper tableView">

    <div id="calendar-info">
        <!-- Tempat untuk informasi tanggal, bulan, dan tahun -->
    </div>

    <table>
        <thead>
            <tr>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jumat</th>
                <th>Sabtu</th>
                <th>Minggu</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
          <?php $tgl=1 ?>
          <?php $tglDepan=1 ?>
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <tr>
              <?php if($i==0):?>

                <?php for ($j = 0; $j < $awalHari-1; $j++) { ?>
                <td style="color:#767676">
                    <?php $tanggalSel=$jumlahHariBulanLalu-$awalHari+$j+2 .'-'.$bulan-1 .'-'.$tahun ?>
                    <?= $jumlahHariBulanLalu-$awalHari+$j+2 ?><br>
                    <?= $tanggalSel ?>
                  </td>
                <?php } ?>

                <?php for ($j = $awalHari-1; $j < 7; $j++) { ?>
                <td <?php if ($bulan == $bulanSkrg && $tahun == $tahunSkrg && $tgl == $tanggalSkrg): ?> style="background-color: rgba(0, 255, 0, 0.7); " <?php endif; ?>>
                  <?php $tanggalSel=$tgl.'-'.$bulan.'-'.$tahun ?>
                    <?= $tgl++ ?><br>
                    <?= $tanggalSel ?>  
                </td>
                <?php } ?>


                <?php elseif($i==4) : ?>
                  <?php for ($j = 0; $j < 7; $j++) { ?>
                  <?php if($tgl>$jumlahHari):?>
                    <td style="color:#767676">
                      <?php $tanggalSel=$tglDepan.'-'.$bulan+1 .'-'.$tahun ?>
                      <?= $tglDepan++ ?><br>
                      <?= $tanggalSel ?>  
                    </td>
                    <?php else: ?>
                  <td <?php if ($bulan == $bulanSkrg && $tahun == $tahunSkrg && $tgl == $tanggalSkrg): ?> style="background-color: rgba(0, 255, 0, 0.7); " <?php endif; ?>>
                    <?php $tanggalSel=$tgl.'-'.$bulan.'-'.$tahun ?>
                    <?= $tgl++ ?><br>
                    <?= $tanggalSel ?>  
                  </td>
                  <?php endif; ?>
                  <?php } ?>

                  <?php if($tgl<=$jumlahHari):?>
                    <tr>
                    <?php for ($j = 0; $j < 7; $j++) { ?>
                  <?php if($tgl>$jumlahHari):?>
                    <td style="color:#767676">
                      <?php $tanggalSel=$tglDepan.'-'.$bulan+1 .'-'.$tahun ?>
                        <?= $tglDepan++ ?><br>
                        <?= $tanggalSel ?>  
                    </td>
                    <?php else: ?>
                  <td <?php if ($bulan == $bulanSkrg && $tahun == $tahunSkrg && $tgl == $tanggalSkrg): ?> style="background-color: rgba(0, 255, 0, 0.7); " <?php endif; ?>>
                    <?php $tanggalSel=$tgl.'-'.$bulan.'-'.$tahun ?>
                    <?= $tgl++ ?><br>
                    <?= $tanggalSel ?>  
                  </td>
                  <?php endif; ?>
                  <?php } ?>
                    </tr>
                    <?php endif; ?>

                <?php else: ?>

            <?php for ($j = 0; $j < 7; $j++) { ?>

                  <td <?php if ($bulan == $bulanSkrg && $tahun == $tahunSkrg && $tgl == $tanggalSkrg): ?> style="background-color: rgba(0, 255, 0, 0.7); " <?php endif; ?>>
                    <?php $tanggalSel=$tahun.'-'.$bulan.'-'.$tgl ?>
                    <?= $tgl++ ?><br>
                    <?php foreach($taskCalendarData as $task): ?>
                      <?php if($task['deadline']==$tanggalSel): ?>
                        <?php if ($task['status'] == "Selesai"): ?>
                              <span style="color: #00ff00;"><?= $task['nama'] ?> - <?= $task['task'] ?></span><br>
                          <?php elseif ($task['status'] == "On Progress"): ?>
                              <span style="color: #0099ff;"><?= $task['nama'] ?> - <?= $task['task'] ?></span><br>
                          <?php elseif ($task['status'] == "Belum Dikerjakan"): ?>
                              <span style="color: #ff0000;"><?= $task['nama'] ?> - <?= $task['task'] ?></span><br>
                          <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </td>

                <?php } ?>

                <?php endif; ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>

      

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
