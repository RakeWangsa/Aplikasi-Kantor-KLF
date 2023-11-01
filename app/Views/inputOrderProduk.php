<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>KLF - Input Order Produk</title>
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
      <h1 class="app-content-headerText">Input Order Produk</h1>
    </div>

    <div class="products-area-wrapper tableView">



    <form class="text-light" action="<?= base_url('order/detailOrder/inputProduk/' . $encodedKodeOrder. '/submit'); ?>" id="myForm" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="kodeOrder">Kode Order :</label>
                <input type="text" class="form-control" id="kodeOrder" name="kodeOrder" style="max-width:1000px" value="<?= $kodeOrder; ?>" disabled>
            </div>
            <div class="form-group mb-2">
                <label for="namaProduk">Nama Produk :</label>
                <input type="text" class="form-control" id="namaProduk" name="namaProduk" style="max-width:1000px" placeholder="Masukkan nama produk">
            </div>
            <div class="form-group mb-2">
                <label for="gambar">Gambar :</label>
                <input type="file" class="form-control-file" accept="image/*" id="gambar" name="gambar[]" multiple>
            </div>

            <div class="form-group mb-2">
    <label for="kategori">Kategori :</label>
    <select class="form-select" id="kategori" name="kategori" style="max-width:1000px" required>
      <option value="" disabled selected>Pilih Kategori!</option>
        <?php foreach ($kategoriProdukData as $kategori): ?>
            <option value="<?= $kategori['kategori'] ?>"><?= $kategori['kategori'] ?></option>
        <?php endforeach; ?>
    </select>
</div>

<?php foreach ($kategoriProdukData as $kategori): ?>
    <div class="detail-inputs" id="<?= $kategori['kategori'] ?>" style="display: none;">

        <?php $i = 1; ?>
        <?php foreach ($kategoriProdukDetailData as $detail): ?>
            <?php if ($detail['kategori'] === $kategori['kategori']): ?>
              <div class="form-group mb-2">
                <label for="detail<?= $i; ?>"><?= $detail['detail'] ?> :</label>
                <input type="text" class="form-control" style="display: none;" name="detail<?= $kategori['kategori']; ?><?= $i; ?>" value="<?= $detail['detail'] ?> ">
                <input type="text" class="form-control" name="nilai<?= $kategori['kategori']; ?><?= $i; ?>" id="nilai<?= $i; ?>" style="max-width:1000px" placeholder="Masukkan <?= $detail['detail']; ?>">
              </div>
                <?php $i++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <input type="text" class="form-control" style="display: none;" name="jumlahDetail" value="<?= $i-1; ?>" readonly>
    </div>
<?php endforeach; ?>



            <div class="form-group mb-2">
                <label for="harga">Harga :</label>
                <input type="text" class="form-control" id="harga" name="harga" style="max-width:1000px" placeholder="Masukkan harga">
            </div>
            <div class="form-group mb-2">
                <label for="quantity">Quantity :</label>
                <input type="number" class="form-control" id="quantity" name="quantity" style="max-width:1000px" placeholder="Masukkan harga">
            </div>
            <div class="form-group mb-2">
                <label for="discount">Discount :</label>
                <input type="text" class="form-control" id="discount" name="discount" style="max-width:1000px" placeholder="Masukkan discount">
            </div>
            <div class="form-group mb-4">
                <label for="deadline">Deadline :</label>
                <input type="date" class="form-control" id="deadline" name="deadline" style="max-width:1000px">
            </div>
            <div class="form-group mb-4">
                <label for="catatan_khusus">Catatan Khusus :</label>
                <input type="text" class="form-control" id="catatan_khusus" name="catatan_khusus" style="max-width:1000px" placeholder="Masukkan catatan">
            </div>
            <div class="form-group mb-4">
              <input type="text" class="form-control" style="display: none;" id="jumlahSupplier" name="jumlahSupplier" style="max-width:1000px" readonly>
              <input type="button" class="btn btn-secondary" value="Tambah Supplier" onclick="tambahSupplier()">
            </div>
            
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>

      


      

    </div>





  </div>
</div>

<script>
    // Mendengarkan perubahan pada dropdown kategori
    document.getElementById('kategori').addEventListener('change', function () {
        // Mendapatkan nilai terpilih dari dropdown kategori
        var selectedKategori = this.value;
        // Menyembunyikan semua input detail
        var allDetailInputs = document.querySelectorAll('.detail-inputs');
        allDetailInputs.forEach(function(input) {
            input.style.display = 'none';
        });
        // Menampilkan input detail yang sesuai dengan kategori terpilih
        var selectedDetailInputs = document.getElementById(selectedKategori);
        if (selectedDetailInputs) {
            selectedDetailInputs.style.display = 'block';
        }
    });
</script>

<script>
    var supplierCount = 1;
    var kategoriData = <?php echo json_encode($kategoriData); ?>; 
    var namaData = <?php echo json_encode($supplierData); ?>; 

    function tambahSupplier() {
      var form = document.getElementById('myForm');

      var supplierDiv = document.createElement('div');
      supplierDiv.className = 'form-group';

      var additionalText = document.createElement('h5');
      additionalText.innerHTML = 'Supplier ' + supplierCount;
      additionalText.style.fontWeight = 'bold';
      

      var kategoriDiv = document.createElement('div');
      kategoriDiv.className = 'form-group';

      var kategoriLabel = document.createElement('label');
      kategoriLabel.htmlFor = 'kategori';
      kategoriLabel.appendChild(document.createTextNode('Kategori Supplier:'));

      var kategoriInput = document.createElement('select');
      kategoriInput.className = 'form-control';
      kategoriInput.name = 'kategori'+supplierCount;
      kategoriInput.style.maxWidth = '1000px';

      var placeholderOption = document.createElement('option');
      placeholderOption.value = ''; // Nilai placeholder kosong
      placeholderOption.text = 'Pilih Kategori'; // Pesan placeholder
      placeholderOption.disabled = true; // Membuat placeholder tidak dapat dipilih
      placeholderOption.selected = true; // Opsi ini akan muncul sebagai default atau terpilih pertama kali

      kategoriInput.appendChild(placeholderOption);

      kategoriData.forEach(function (kategori) {
          var option = document.createElement('option');
          option.value = kategori.kategori; 
          option.text = kategori.kategori; 
          kategoriInput.appendChild(option);
      });

      var namaSupplierDiv = document.createElement('div');
      namaSupplierDiv.className = 'form-group';

      var namaSupplierLabel = document.createElement('label');
      namaSupplierLabel.htmlFor = 'nama_supplier';
      namaSupplierLabel.appendChild(document.createTextNode('Nama Supplier:'));

      var namaSupplierInput = document.createElement('select');
      namaSupplierInput.className = 'form-control';
      namaSupplierInput.name = 'nama_supplier'+supplierCount;
      namaSupplierInput.style.maxWidth = '1000px';

      kategoriInput.addEventListener('change', function() {
          var selectedKategori = this.value;

          namaSupplierInput.innerHTML = '';

          var filteredSuppliers = namaData.filter(function (supplier) {
              return supplier.kategori == selectedKategori; 
          });

          filteredSuppliers.forEach(function (supplier) {
              var option = document.createElement('option');
              option.value = supplier.nama; 
              option.text = supplier.nama; 
              namaSupplierInput.appendChild(option);
          });
      });

      var jumlahBarangDiv = document.createElement('div');
      jumlahBarangDiv.className = 'form-group';

        var jumlahBarangLabel = document.createElement('label');
        jumlahBarangLabel.htmlFor = 'jumlah_barang';
        jumlahBarangLabel.appendChild(document.createTextNode('Jumlah Barang:'));

        var jumlahBarangInput = document.createElement('input');
        jumlahBarangInput.type = 'text';
        jumlahBarangInput.className = 'form-control';
        jumlahBarangInput.name = 'jumlah_barang'+supplierCount;
        jumlahBarangInput.style.maxWidth = '1000px';
        jumlahBarangInput.placeholder = 'Jumlah Barang';

        var hargaDiv = document.createElement('div');
        hargaDiv.className = 'form-group';
        hargaDiv.style.paddingBottom = '40px';

        var hargaLabel = document.createElement('label');
        hargaLabel.htmlFor = 'harga';
        hargaLabel.appendChild(document.createTextNode('Harga:'));

        var hargaInput = document.createElement('input');
        hargaInput.type = 'text';
        hargaInput.className = 'form-control';
        hargaInput.name = 'harga'+supplierCount;
        hargaInput.style.maxWidth = '1000px';
        hargaInput.placeholder = 'Harga';

        supplierCount++;

        supplierDiv.appendChild(additionalText);
        form.insertBefore(supplierDiv, form.lastElementChild);
        
        form.insertBefore(kategoriDiv, form.lastElementChild);
        kategoriDiv.appendChild(kategoriLabel);
        kategoriDiv.appendChild(kategoriInput);

        form.insertBefore(namaSupplierDiv, form.lastElementChild);
        namaSupplierDiv.appendChild(namaSupplierLabel);
        namaSupplierDiv.appendChild(namaSupplierInput);

        form.insertBefore(jumlahBarangDiv, form.lastElementChild);
        jumlahBarangDiv.appendChild(jumlahBarangLabel);
        jumlahBarangDiv.appendChild(jumlahBarangInput);

        form.insertBefore(hargaDiv, form.lastElementChild);
        hargaDiv.appendChild(hargaLabel);
        hargaDiv.appendChild(hargaInput);


        var button = document.querySelector('input[type="button"]');
        button.value = 'Tambah Supplier ke-' + (supplierCount);

        var inputJumlah = document.getElementById('jumlahSupplier');
        inputJumlah.value = supplierCount-1;
    }
</script>





<!-- partial -->
  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
