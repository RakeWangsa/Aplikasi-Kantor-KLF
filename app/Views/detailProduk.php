<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Detail Produk</title>
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
      <h1 class="app-content-headerText">Detail Produk (<?= $OrderProdukData['nama']; ?>)</h1>
    </div>

    <div class="products-area-wrapper tableView">




    <div class="container text-light">
        <div class="row">
            <div class="col-md-6">
                <!-- Gambar Produk -->
                <img class="product-img" src="path_to_gambar" alt="Gambar Produk">
            </div>
            <div class="col-md-6 product-details">
                <h2>Nama Produk</h2>
                <p><strong>Harga:</strong> Harga Produk</p>
                <p><strong>Quantity:</strong> Jumlah Produk</p>
                <p><strong>Total Harga:</strong> Total Harga Produk</p>
                <p><strong>Kategori:</strong> Kategori Produk</p>
                <p><strong>Discount:</strong> Discount Produk</p>
                <p><strong>Catatan Khusus:</strong> Catatan Khusus Produk</p>
                <!-- Tambahan informasi produk lainnya -->
            </div>
        </div>
        <div class="row mt-4">
                <div class="col-md-6">
                    <h4>List Supplier</h4>
                    <ul class="list-group">
    <li class="list-group-item list-group-item-action">
    <div class="row">


    <div class="col">
      <button class="icon-button" data-toggle="collapse" href="#list1" onclick="toggleIcon('icon1')">
        <i id="icon1" class="fas fa-chevron-right"></i>
      </button>
      Order A
    </div>
    <div class="col">
      30 Oktober
    </div>
    <div class="col">
      Action
    </div>
  </div>
    </li>
    <div id="list1" class="collapse">
      <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action">

          <div class="row">
            <div class="col">
              <button class="icon-button" data-toggle="collapse" href="#sublist1-1" onclick="toggleIcon('icon1-1')" style="margin-left:10px">
                <i id="icon1-1" class="fas fa-chevron-right"></i>
              </button>
              Meja Makan
            </div>
            <div class="col">
              29 Oktober
            </div>
            <div class="col">
              Action
            </div>
        </div>
        </li>
        <div id="sublist1-1" class="collapse">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">

                <div class="row">
                  <div class="col">
                    <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                  </div>
                  <div class="col">
                    25 Oktober
                  </div>
                  <div class="col">
                    Action
                  </div>
                </div>

            </li>
            <li class="list-group-item">

                <div class="row">
                  <div class="col">
                    <i class="subofsub-icon" style="margin-left:50px"></i>Finishing
                  </div>
                  <div class="col">
                    26 Oktober
                  </div>
                  <div class="col">
                    Action
                  </div>
                </div>

            </li>
          </ul>
        </div>
        <li class="list-group-item list-group-item-action">

          <div class="row">
            <div class="col">
              <button class="icon-button" data-toggle="collapse" href="#sublist1-2" onclick="toggleIcon('icon1-2')" style="margin-left:10px">
                <i id="icon1-2" class="fas fa-chevron-right"></i>
              </button>
              Kursi Makan
            </div>
            <div class="col">
              28 Oktober
            </div>
            <div class="col">
              Action
            </div>
        </div>
        </li>
        <div id="sublist1-2" class="collapse">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">

                <div class="row">
                  <div class="col">
                    <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                  </div>
                  <div class="col">
                    24 Oktober
                  </div>
                  <div class="col">
                    Action
                  </div>
                </div>

            </li>
          </ul>
        </div>
      </ul>
    </div>
    <li class="list-group-item list-group-item-action">
    <div class="row">


    <div class="col">
      <button class="icon-button" data-toggle="collapse" href="#list2" onclick="toggleIcon('icon2')">
        <i id="icon2" class="fas fa-chevron-right"></i>
      </button>
      Order B
    </div>
    <div class="col">
      5 November
    </div>
    <div class="col">
      Action
    </div>
  </div>
    </li>
    <div id="list2" class="collapse">
      <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action">

          <div class="row">
            <div class="col">
              <button class="icon-button" data-toggle="collapse" href="#sublist2-1" onclick="toggleIcon('icon2-1')" style="margin-left:10px">
                <i id="icon2-1" class="fas fa-chevron-right"></i>
              </button>
              Lemari
            </div>
            <div class="col">
              3 November
            </div>
            <div class="col">
              Action
            </div>
        </div>
        </li>
        <div id="sublist2-1" class="collapse">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">

                <div class="row">
                  <div class="col">
                    <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                  </div>
                  <div class="col">
                    1 November
                  </div>
                  <div class="col">
                    Action
                  </div>
                </div>

            </li>
            <li class="list-group-item">

                <div class="row">
                  <div class="col">
                    <i class="subofsub-icon" style="margin-left:50px"></i>Finishing
                  </div>
                  <div class="col">
                    2 November
                  </div>
                  <div class="col">
                    Action
                  </div>
                </div>

            </li>
          </ul>
        </div>
        <li class="list-group-item list-group-item-action">

          <div class="row">
            <div class="col">
              <button class="icon-button" data-toggle="collapse" href="#sublist2-2" onclick="toggleIcon('icon2-2')" style="margin-left:10px">
                <i id="icon2-2" class="fas fa-chevron-right"></i>
              </button>
              Buffet
            </div>
            <div class="col">
              6 November
            </div>
            <div class="col">
              Action
            </div>
        </div>
        </li>
        <div id="sublist2-2" class="collapse">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">

                <div class="row">
                  <div class="col">
                    <i class="subofsub-icon" style="margin-left:50px"></i>Rangka
                  </div>
                  <div class="col">
                    4 November
                  </div>
                  <div class="col">
                    Action
                  </div>
                </div>

            </li>
          </ul>
        </div>
      </ul>
    </div>
  </ul>
                </div>
                <div class="col-md-6">
                    <h4>List Biaya</h4>
                    <ul>
                        <li>Biaya 1</li>
                        <li>Biaya 2</li>
                        <!-- Tambahkan daftar biaya lainnya -->
                    </ul>
                </div>
            </div>


    </div>
      


      

    </div>





  </div>
</div>

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

  function toggleAllLists() {
    const collapsibleButtons = document.querySelectorAll('.list-group-item-action button');
    collapsibleButtons.forEach(button => {
      if (!button.getAttribute('aria-expanded') || button.getAttribute('aria-expanded') === 'false') {
        button.click();
      } else {
        button.click();
      }
    });
  }
</script>

  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
