<?php include('header.php'); ?>
  <div class="app-content">
    <div class="app-content-header my-4">
      <h1 class="app-content-headerText">Edit Order Produk</h1>
    </div>

    <div class="products-area-wrapper tableView">



    <form class="text-light" action="<?= base_url('order/detailOrder/editProduk/' . $encodedKode . '/submit'); ?>" id="myForm" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="kodeOrder">Kode Order :</label>
                <input type="text" class="form-control" id="kodeOrder" name="kodeOrder" style="max-width:1000px" value="<?= $OrderProdukData['kode_order']; ?>" disabled>
            </div>
            <div class="form-group mb-2">
                <label for="namaProduk">Nama Produk :</label>
                <input type="text" class="form-control" id="namaProduk" name="namaProduk" style="max-width:1000px" placeholder="Masukkan nama produk" value="<?= $OrderProdukData['nama']; ?>">
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
            <option value="<?= $kategori['kategori'] ?>" <?php if($kategori['kategori']==$OrderProdukData['kategori']): ?> selected <?php endif; ?>><?= $kategori['kategori'] ?></option>
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
                <input type="text" class="form-control" style="display: none;" name="detail<?= $kategori['kategori']; ?><?= $i; ?>" value="<?= $detail['detail'] ?>">
                <input type="text" class="form-control" name="nilai<?= $kategori['kategori']; ?><?= $i; ?>" id="nilai<?= $i; ?>" style="max-width:1000px" placeholder="Masukkan <?= $detail['detail']; ?>" <?php if(isset($detail['nilai'])): ?> value="<?= $detail['nilai'] ?>" <?php endif; ?>>
              </div>
                <?php $i++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <input type="text" class="form-control" style="display: none;" name="jumlahDetail" value="<?= $i-1; ?>" readonly>
    </div>
<?php endforeach; ?>



            <div class="form-group mb-2">
                <label for="harga">Harga :</label>
                <input type="text" class="form-control" id="harga" name="harga" style="max-width:1000px" placeholder="Masukkan harga" value="<?= $OrderProdukData['harga']; ?>">
            </div>
            <div class="form-group mb-2">
                <label for="quantity">Quantity :</label>
                <input type="number" class="form-control" id="quantity" name="quantity" style="max-width:1000px" placeholder="Masukkan harga" value="<?= $OrderProdukData['quantity']; ?>">
            </div>
            <div class="form-group mb-4">
                <label for="deadline">Deadline :</label>
                <input type="date" class="form-control" id="deadline" name="deadline" style="max-width:1000px" value="<?= $OrderProdukData['deadline']; ?>">
            </div>
            <div class="form-group mb-4">
                <label for="catatan_khusus">Catatan Khusus :</label>
                <input type="text" class="form-control" id="catatan_khusus" name="catatan_khusus" style="max-width:1000px" placeholder="Masukkan catatan" value="<?= $OrderProdukData['catatan_khusus']; ?>">
            </div>
            <div class="form-group mb-4">
              <input type="text" class="form-control" style="display: none;" id="jumlahSupplier" name="jumlahSupplier" style="max-width:1000px" readonly>
              <input type="button" class="btn btn-secondary" value="Tambah Supplier" onclick="tambahSupplier()">
              <input type="button" class="btn btn-danger" value="Kurangi Supplier" onclick="hapusSupplier()">
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

    // Set initial category value
    var initialCategory = "<?php echo $OrderProdukData['kategori']; ?>";
    
    // Trigger the change event manually after setting the initial category
    document.getElementById('kategori').value = initialCategory;
    var event = new Event('change');
    document.getElementById('kategori').dispatchEvent(event);
</script>

<script>
    // Panggil cekSupplier() saat dokumen dimuat
    document.addEventListener('DOMContentLoaded', function() {
        cekSupplier();
    });
</script>

<script>

function cekSupplier() {
        var jumlahSupplier = "<?php echo $jumlahSupplier; ?>";

        // Check if jumlahSupplier is a valid number
        if (!isNaN(jumlahSupplier)) {
            // Parse the value as an integer
            jumlahSupplier = parseInt(jumlahSupplier);

            // Call tambahSupplier() function based on the value of jumlahSupplier
            for (var i = 0; i < jumlahSupplier; i++) {
              tambahSupplier(); // Call your actual function here
            }
        }
    }


    var supplierCount = 1;
    var kategoriData = <?php echo json_encode($kategoriData); ?>; 
    var namaData = <?php echo json_encode($supplierData); ?>; 
    var jumlahSupplier = "<?php echo $jumlahSupplier; ?>";
    var OrderProdukSupplierData = <?php echo json_encode($OrderProdukSupplierData); ?>;
    
    function tambahSupplier() {
      var form = document.getElementById('myForm');

      var supplierDiv = document.createElement('div');
      supplierDiv.className = 'form-group';
      supplierDiv.id = 'supplierDiv'+supplierCount;

      var additionalText = document.createElement('h5');
      additionalText.innerHTML = 'Supplier ' + supplierCount;
      additionalText.style.fontWeight = 'bold';
      

      var kategoriDiv = document.createElement('div');
      kategoriDiv.className = 'form-group';
      kategoriDiv.id = 'kategoriDiv'+supplierCount;

      var kategoriLabel = document.createElement('label');
      kategoriLabel.htmlFor = 'kategori';
      kategoriLabel.appendChild(document.createTextNode('Kategori Supplier:'));

      var kategoriInput = document.createElement('select');
      kategoriInput.className = 'form-control';
      kategoriInput.name = 'kategori'+supplierCount;

      kategoriInput.style.maxWidth = '1000px';

      var placeholderOption = document.createElement('option');
      placeholderOption.value = '';
      placeholderOption.text = 'Pilih Kategori!';
      placeholderOption.disabled = true; // Membuat placeholder tidak dapat dipilih
      placeholderOption.selected = true; // Opsi ini akan muncul sebagai default atau terpilih pertama kali

      kategoriInput.appendChild(placeholderOption);

      kategoriData.forEach(function (kategori) {
          var option = document.createElement('option');
          option.value = kategori.kategori; 
          option.text = kategori.kategori; 
          if(supplierCount - 1 < jumlahSupplier){
            if (kategori.kategori === OrderProdukSupplierData[supplierCount - 1].kategori) {
                option.selected = true;
            }
          }
          kategoriInput.appendChild(option);
      });

      var namaSupplierDiv = document.createElement('div');
      namaSupplierDiv.className = 'form-group';
      namaSupplierDiv.id = 'namaSupplierDiv'+supplierCount;

      var namaSupplierLabel = document.createElement('label');
      namaSupplierLabel.htmlFor = 'nama_supplier';
      namaSupplierLabel.appendChild(document.createTextNode('Nama Supplier:'));

      var namaSupplierInput = document.createElement('select');
      namaSupplierInput.className = 'form-control';
      namaSupplierInput.name = 'nama_supplier'+supplierCount;
      namaSupplierInput.style.maxWidth = '1000px';

      if(supplierCount - 1 < jumlahSupplier){
        var placeholderSupplier = document.createElement('option');
        placeholderSupplier.value = OrderProdukSupplierData[supplierCount-1].nama;
        placeholderSupplier.text = OrderProdukSupplierData[supplierCount-1].nama;
        placeholderSupplier.selected = true; 
        namaSupplierInput.appendChild(placeholderSupplier);
      }



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
      jumlahBarangDiv.id = 'jumlahBarangDiv'+supplierCount;

        var jumlahBarangLabel = document.createElement('label');
        jumlahBarangLabel.htmlFor = 'jumlah_barang';
        jumlahBarangLabel.appendChild(document.createTextNode('Jumlah Barang:'));

        var jumlahBarangInput = document.createElement('input');
        jumlahBarangInput.type = 'text';
        jumlahBarangInput.className = 'form-control';
        jumlahBarangInput.name = 'jumlah_barang'+supplierCount;
        if(supplierCount - 1 < jumlahSupplier){
          jumlahBarangInput.value = OrderProdukSupplierData[supplierCount-1].jumlah_barang;
        }
        jumlahBarangInput.style.maxWidth = '1000px';
        jumlahBarangInput.placeholder = 'Jumlah Barang';

        var hargaDiv = document.createElement('div');
        hargaDiv.className = 'form-group';
        hargaDiv.style.paddingBottom = '40px';
        hargaDiv.id = 'hargaDiv'+supplierCount;

        var hargaLabel = document.createElement('label');
        hargaLabel.htmlFor = 'harga';
        hargaLabel.appendChild(document.createTextNode('Harga:'));

        var hargaInput = document.createElement('input');
        hargaInput.type = 'text';
        hargaInput.className = 'form-control';
        hargaInput.name = 'harga'+supplierCount;
        if(supplierCount - 1 < jumlahSupplier){
          hargaInput.value = OrderProdukSupplierData[supplierCount-1].harga;
        }
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

    function hapusSupplier() {
        if (supplierCount > 1) {
            supplierCount--;

            // Hapus elemen terakhir
            var form = document.getElementById('myForm');

            var supplierDiv = document.getElementById('supplierDiv'+supplierCount);
            var kategoriDiv = document.getElementById('kategoriDiv'+supplierCount);
            var namaSupplierDiv = document.getElementById('namaSupplierDiv'+supplierCount);
            var jumlahBarangDiv = document.getElementById('jumlahBarangDiv'+supplierCount);
            var hargaDiv = document.getElementById('hargaDiv'+supplierCount);
            form.removeChild(supplierDiv);
            form.removeChild(kategoriDiv);
        form.removeChild(namaSupplierDiv);
        form.removeChild(jumlahBarangDiv);
        form.removeChild(hargaDiv);

            // Perbarui nilai button dan inputJumlah
            var button = document.querySelector('input[type="button"]');
            button.value = 'Tambah Supplier ke-' + supplierCount;

            var inputJumlah = document.getElementById('jumlahSupplier');
            inputJumlah.value = supplierCount - 1;
        }
    }
</script>





<!-- partial -->
  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
