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
  .subtask {
    text-indent: 13px;
  }

  .subofsub {
    text-indent: 40px;
  }
  .subtask-icon {
    width: 8px; /* Lebar ikon bulat */
    height: 8px; /* Tinggi ikon bulat */
    background-color: white; /* Warna latar belakang ikon */
    border-radius: 50%; /* Mengatur ikon menjadi bulat */
    display: inline-block;
    margin-right: 3px; /* Jarak antara ikon dan teks */
  }
  .subofsub-icon {
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
      <h1 class="app-content-headerText">Task Calendar - Cetak QC</h1>
      
    </div>



    <div class="app-content-actions">
      <!-- <input class="search-bar" placeholder="Search..." id="searchInput" type="text"> -->
      <div></div>
      <button type="button" id="printButton" class="btn btn-secondary downloadButton"><i class="fas fa-download"></i> Download</button>
    </div>

    <div class="products-area-wrapper tableView">

    <form class="text-light" action="<?= base_url('taskCalendar/cetakQC/download'); ?>" method="post" id="cetakQCform">
      <div class="products-header">
      <div class="product-cell" style="padding-right:200px">To Do (<?= $jumlahTask; ?> Tasks)</div>
        <div class="product-cell">Deadline</div>
        <div class="product-cell">Status</div>
        <div class="product-cell">Cetak</div>
      </div>






      <div id="productList">
      <ul class="list-group">
      <?php $i=1; ?>
  <?php foreach ($OrderData as $row): ?>
    <?php $task = str_replace('/', '_', $row['kode_order']); ?>
<li class="">
<!-- <a href="#" class="" data-toggle="modal" data-target="#exampleModal"> -->
    <div class="products-row task">
      <div class="product-cell category" style="padding-right:200px">
        <span style="margin-right:-200px"><button class="icon-button bg-dark" data-toggle="collapse" href="#<?php echo $task; ?>" onclick="toggleIcon('icon<?php echo $task; ?>')">
        <i id="icon<?php echo $task; ?>" class="fas fa-chevron-right" style="color:grey"></i>
      </button> <?= $row['kode_order']; ?> - <?= $row['nama']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span><?= date('d-m-Y', strtotime($row['deadline'])); ?></span>
      </div>
      <div class="product-cell status-cell">
        <span style="color:       
        <?php if ($row['status_task'] === 'Selesai'): ?>
          #00ff00
    <?php elseif ($row['status_task'] === 'On Progress'): ?>
      #0099ff
    <?php elseif ($row['status_task'] === 'Belum Dikerjakan'): ?>
        #ff0000
    <?php endif; ?>"><?= $row['status_task']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span>

        <!-- <label for="radioButton<?= $task; ?>">Cetak</label> -->
    <input type="checkbox" id="radioButton<?= $task; ?>" name="radio<?= $i; ?>" value="<?= $row['kode_order']; ?>">
    <!-- <button type="submit">Kirim</button> -->


      </span>
      </div>
    </div>
<!-- </a> -->
    </li>
    <div id="<?php echo $task; ?>" class="collapse">

    <?php foreach ($TaskCalendarData as $taskCalendar): ?>
      <?php if ($taskCalendar['parent'] == $row['kode_order']): ?>
          <ul class="list-group list-group-flush">
        <li class="">

        <div class="products-row task">
      <div class="product-cell category subtask" style="padding-right:200px">
        <span style="margin-right:-200px"><button class="icon-button bg-dark" data-toggle="collapse" href="#sub<?php echo $taskCalendar['id']; ?>" onclick="toggleIcon('iconsub<?php echo $taskCalendar['id']; ?>')">
        <i id="iconsub<?php echo $taskCalendar['id']; ?>" class="fas fa-chevron-right" style="color:grey"></i>
      </button> <?= $taskCalendar['task']; ?>
    
      <img src="<?= base_url('uploads/' . $taskCalendar['gambar']); ?>" style="width:70px;height:auto;margin-left:50px" data-toggle="modal" data-target="#modal<?= $taskCalendar['id'] ?>" alt="...">



    </span>
      </div>
      <div class="product-cell status-cell">
        <span><?= date('d-m-Y', strtotime($taskCalendar['deadline'])); ?></span>
      </div>
      <div class="product-cell status-cell">
      <span style="color:       
        <?php if ($taskCalendar['status'] === 'Selesai'): ?>
          #00ff00
    <?php elseif ($taskCalendar['status'] === 'On Progress'): ?>
      #0099ff
    <?php elseif ($taskCalendar['status'] === 'Belum Dikerjakan'): ?>
        #ff0000
    <?php endif; ?>"><?= $taskCalendar['status']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span>
        
      </span>
      </div>
    </div>

        </li>
        <div id="sub<?php echo $taskCalendar['id']; ?>" class="collapse">

        <?php foreach ($TaskCalendarData as $taskCalendar2): ?>
          <?php if ($taskCalendar2['parent'] == $taskCalendar['id']): ?>
          <ul class="list-group list-group-flush">
            <li class="">

            <div class="products-row task">
      <div class="product-cell category subofsub" style="padding-right:200px">
        <span style="margin-right:-200px"><i class="subofsub-icon"></i> <?= $taskCalendar2['task']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span><?= date('d-m-Y', strtotime($taskCalendar2['deadline'])); ?></span>
      </div>
      <div class="product-cell status-cell">
      <span style="color:       
        <?php if ($taskCalendar2['status'] === 'Selesai'): ?>
          #00ff00
    <?php elseif ($taskCalendar2['status'] === 'On Progress'): ?>
      #0099ff
    <?php elseif ($taskCalendar2['status'] === 'Belum Dikerjakan'): ?>
        #ff0000
    <?php endif; ?>"><?= $taskCalendar2['status']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span>
        
        </span>
      </div>
    </div>

            </li>
          </ul>
          <?php endif; ?>
          <?php endforeach; ?>


        </div>

      </ul>
        <?php endif; ?>
    <?php endforeach; ?>

    </div>

    <?php $i++; ?>
  <?php endforeach; ?> 




</ul>
</div>








</form>

    </div>





  </div>
</div>

<script>
    document.getElementById('printButton').addEventListener('click', function() {
        document.getElementById('cetakQCform').submit();
    });
</script>

<script>
    // Get all the buttons triggering the collapse
    const collapseButtons = document.querySelectorAll('.icon-button');

    // Add a click event listener to each collapse button
    collapseButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default action

            const clickedButton = event.target;
            const buttonIcon = clickedButton.querySelector('i');

            const isDownloadButton = clickedButton.classList.contains('downloadButton');

            if (isDownloadButton) {
                // Perform form submission
                // You can choose to submit the form via AJAX or any other method here
                document.querySelector('form').submit(); // This submits the form
            } else {
                // Toggle the collapse for the clicked button
                const taskId = clickedButton.getAttribute('href').replace('#', ''); // Extract task ID
                const iconId = 'icon' + taskId;

                toggleIcon(iconId); // Your function to toggle the icon
            }
        });
    });

    // Your function to toggle the icon
    function toggleIcon(iconId) {
        // Implement your logic to toggle the icon
    }
</script>


<script>
  function toggleIcon(iconId) {
    const icon = document.getElementById(iconId);
    if (icon.classList.contains('fa-chevron-right')) {
      icon.classList.remove('fa-chevron-right');
      icon.classList.add('fa-chevron-down');
    } else {
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-right');
    }
  }
</script>

<!-- ga penting -->
<script>
$(document).ready(function () {
  // Tambahkan event listener untuk setiap task
  $(".task").click(function () {
    // Dapatkan ID task yang diklik
    var taskId = $(this).data("task-id");
    
    // Cari subtask yang sesuai berdasarkan ID
    var $subtask = $(".subtask[data-task-id='" + taskId + "']");
    
    // Toggle tampilan subtask
    $subtask.toggle();
  });
});
</script>

<!-- <script>
const searchInput = document.getElementById("searchInput");
const productList = document.getElementById("productList");

searchInput.addEventListener("input", function () {
  const searchTerm = searchInput.value.toLowerCase();
  const productRows = productList.getElementsByClassName("products-row");

  for (const row of productRows) {
    const productName = row.querySelector(".product-cell.bg-success span").textContent.toLowerCase();
    const month = row.querySelector(".product-cell.image span").textContent.toLowerCase();
    const orderCode = row.querySelector(".product-cell.category span").textContent.toLowerCase();

    if (productName.includes(searchTerm) || month.includes(searchTerm) || orderCode.includes(searchTerm)) {
      row.classList.remove("d-none"); // Menghapus kelas "d-none" untuk menampilkan
    } else {
      row.classList.add("d-none"); // Menambahkan kelas "d-none" untuk menyembunyikan
    }
  }
});

</script> -->


  <script  src="<?= base_url('assets2/script.js'); ?>"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
