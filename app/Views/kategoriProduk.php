<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Kategori Produk</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url('assets2/style.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>

<style>
  .sublist {
    text-indent: 30px;
  }

  .sublist-icon {
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
      <li class="sidebar-list-item active">
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
      <h1 class="app-content-headerText">Kategori Produk</h1>
      
    </div>

    <div class="app-content-actions">
      <div>
      <button onclick="expandAllLists()" class="btn btn-primary mb-2"><i class="fas fa-arrow-down"></i> Expand</button>
      <button onclick="collapseAllLists()" class="btn btn-danger mb-2"><i class="fas fa-arrow-up"></i> Hide</button>
      </div>
    


      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Kategori</button>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('kategoriProduk/addKategori'); ?>" method="post">
          <div class="modal-body">
          <label for="kategori" class="form-label">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    </div>

    <div class="products-area-wrapper tableView">
      <div class="products-header">
      <div class="product-cell status-cell">Kategori Produk</div>
        <div class="product-cell sales"></div>
        <div class="product-cell sales">Action</div>
      </div>






      <div id="productList">
      <ul class="list-group">
  <?php foreach ($KategoriData as $row): ?>
    <?php $id = $row['id']; ?>
<li class="">
<!-- <a href="#" class="" data-toggle="modal" data-target="#exampleModal"> -->
    <div class="products-row">
      <div class="product-cell category">
        <span><button class="icon-button bg-dark" data-toggle="collapse" href="#list<?php echo $id; ?>" onclick="toggleIcon('icon<?php echo $id; ?>')">
        <i id="icon<?php echo $id; ?>" class="fas fa-chevron-right" style="color:grey"></i>
      </button> <?= $row['kategori']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span></span>
      </div>
      <div class="product-cell status-cell">
        <span>
          <button type="button" class="btn btn-success rounded-circle" data-toggle="modal" data-target="#add<?php echo $id; ?>"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn btn-primary rounded-circle" data-toggle="modal" data-target="#edit<?php echo $id; ?>"><i class="fas fa-pencil-alt"></i></button>
          <a class="btn btn-danger rounded-circle" href="<?= base_url('kategoriProduk/deleteKategori?kategori=' . $row['kategori']); ?>" onclick="return confirm('Anda yakin ingin menghapus subtask ini?');"><i class="fas fa-trash"></i></a>
      </span>
      </div>
    </div>
<!-- </a> -->
    </li>
    <div id="list<?php echo $id; ?>" class="collapse">

    <?php foreach ($DetailData as $detail): ?>
      <?php if ($detail['kategori'] == $row['kategori']): ?>
          <ul class="list-group list-group-flush">
        <li class="">

        <div class="products-row">
      <div class="product-cell category sublist">
        <span><i class="sublist-icon"></i> <?= $detail['detail']; ?></span>
      </div>
      <div class="product-cell status-cell">
        <span></span>
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

  <?php endforeach; ?> 
</ul>
</div>


<!-- tambah detail -->
<?php foreach ($KategoriData as $row): ?>
  <?php $modalId = $row['id']; ?>
  <div class="modal fade" id="add<?= $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?= base_url('kategoriProduk/addDetail/' . $row['kategori']); ?>" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Detail (<?php echo $row['kategori']; ?>)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="tambahDetail<?= $modalId; ?>">
        
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" disabled>
          </div>
          <div class="mb-3" style="display: none;">
          <label for="jumlah<?= $modalId; ?>" class="form-label">Jumlah:</label>
                            <input type="text" class="form-control" id="jumlah<?= $modalId; ?>" name="jumlah" readonly>
          </div>
          <div class="mb-3">
            <input type="button" class="btn btn-primary" value="Tambah Detail" onclick="tambahDetail('<?= $modalId; ?>')">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>



<!-- edit detail -->

<?php foreach ($KategoriData as $row): ?>
  <?php $modalId = $row['id']; ?>

  <div class="modal fade" id="edit<?= $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="<?= base_url('kategoriProduk/editDetail/' . $row['kategori']); ?>" method="post">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Detail (<?php echo $row['kategori']; ?>)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $row['kategori']; ?>" disabled>
          </div>
          <?php $i=1 ?>
          <?php foreach ($DetailData as $detail): ?>
            <?php if ($detail['kategori'] == $row['kategori']): ?>

            <div class="mb-3">
            <label for="detail" class="form-label">Detail</label>
            <input type="text" class="form-control" name="detail<?php echo $i; ?>" id="detail" value="<?= $detail['detail']; ?>">
          </div>
          <input type="text" class="form-control" style="display: none;" name="id_detail<?php echo $i; ?>" value="<?= $detail['id']; ?>">

          <?php $i++; ?>
          <?php endif; ?>
            <?php endforeach; ?>

            <input type="text" class="form-control" style="display: none;" name="jumlah" id="jumlahInput" value="<?= $i-1; ?>" readonly>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>





      

    </div>





  </div>
</div>
<!-- partial -->


<script>
    var detailCounter = {};
    var jumlahCounter = {};

    function tambahDetail(modalId) {
        if (!detailCounter[modalId]) {
            detailCounter[modalId] = 1; // Set nilai awal jika belum ada
            jumlahCounter[modalId] = 1; // Inisialisasi nilai Jumlah
        } else {
            detailCounter[modalId]++;
            jumlahCounter[modalId]++;
        }

        var modalBody = document.getElementById('tambahDetail' + modalId);

        var detailDiv = document.createElement('div');
        detailDiv.className = 'mb-3';

        var detailLabel = document.createElement('label');
        detailLabel.htmlFor = 'detail';
        detailLabel.appendChild(document.createTextNode('Detail:'));

        var detailInput = document.createElement('input');
        detailInput.type = 'text';
        detailInput.className = 'form-control';
        detailInput.name = 'detail' + detailCounter[modalId];
        detailInput.placeholder = 'Masukkan detail';

        detailDiv.appendChild(detailLabel);
        detailDiv.appendChild(detailInput);

        modalBody.appendChild(detailDiv);

        // Update value of "Jumlah" input
        var jumlahInput = document.getElementById('jumlah' + modalId);
        jumlahInput.value = jumlahCounter[modalId];
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
  
  function expandAllLists() {
    const collapsibleButtons = document.querySelectorAll('.icon-button');

    collapsibleButtons.forEach(button => {
      const targetId = button.getAttribute('href').replace('#', '');
      const targetElement = document.getElementById(targetId);

      if (targetElement && !targetElement.classList.contains('show')) {
        button.click(); 
      }
    });
  }

  function collapseAllLists() {
    const collapsibleButtons = document.querySelectorAll('.icon-button');

    collapsibleButtons.forEach(button => {
      const targetId = button.getAttribute('href').replace('#', '');
      const targetElement = document.getElementById(targetId);

      if (targetElement && targetElement.classList.contains('show')) {
        button.click();
      }
    });
  }
</script>





  <script  src="<?= base_url('assets2/script.js'); ?>"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
