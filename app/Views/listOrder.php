<?php include('header.php'); ?>
  <div class="app-content">
    <div class="app-content-header mt-4">
      <h1 class="app-content-headerText">List Order</h1>
      
    </div>

    <div class="app-content-actions">
      <input class="search-bar" placeholder="Search..." id="searchInput" type="text">
      <a class="btn btn-primary" href="<?= base_url('order/inputOrder'); ?>"><i class="fas fa-pencil-alt"></i> Input Order</a>
    </div>

    <div class="products-area-wrapper tableView">
      <div class="products-header">

        <div class="product-cell">Tanggal Order</div>
        <div class="product-cell">Customer</div>
        <div class="product-cell">Kode Order</div>
        <div class="product-cell">Nilai Order</div>
        <div class="product-cell">DP Masuk</div>
        <div class="product-cell">Status</div>
          <div class="product-cell">Gross Profit</div>
          <div class="product-cell">Grand Total</div>
      </div>


      <div id="productList">
      <?php foreach ($data as $row): ?>
        <?php $modalId = str_replace('/', '_', $row['kode_order']); ?>
        <a href="" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#modal<?= $modalId; ?>">
        <div class="products-row">
      <div class="product-cell date">
            <span><?= date('d-m-Y', strtotime($row['tanggalOrder'])); ?></span>
          </div>
          <div class="product-cell nama
    <?php if ($row['status'] === 'Selesai'): ?>
        bg-success
    <?php elseif ($row['status'] === 'Hold'): ?>
        bg-warning
    <?php elseif ($row['status'] === 'Batal'): ?>
        bg-danger
    <?php elseif ($row['status'] === 'Delivery'): ?>
        bg-info
    <?php endif; ?>">
    <span><?= $row['nama']; ?></span>
</div>
        <div class="product-cell code"><span><?= $row['kode_order']; ?></div>
        <div class="product-cell status-cell">
          <span>Rp. <?= number_format($row['nilaiOrder'], 0, ",", "."); ?></span>
        </div>
        <div class="product-cell sales"><span>Rp. <?= number_format($row['dp_masuk'], 0, ",", "."); ?></span></div>
        <div class="product-cell stock"><span><?= $row['status']; ?></span></div>
        <div class="product-cell price"><span>Rp. <?= number_format($row['gross_profit'], 0, ",", "."); ?></span></div>
        <div class="product-cell price"><span>Rp. <?= number_format($row['grand_total'], 0, ",", "."); ?></span></div>
      </div></a>
    
<?php endforeach; ?>
      </div>


<?php foreach ($data as $row): ?>
  <?php $modalId = str_replace('/', '_', $row['kode_order']); ?>
  <div class="modal fade" id="modal<?= $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Kode Order : <?= $row['kode_order']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
        $encodedKodeOrder = base64_encode($row['kode_order']);
      ?>
      <a style="text-decoration: none;" href="<?= base_url('order/detailOrder/' . $encodedKodeOrder); ?>">Detail Order</a><br>
      <a style="text-decoration: none;" href="<?= base_url('order/invoice/' . $encodedKodeOrder); ?>">Invoice Order</a><br>  
      <a style="text-decoration: none;" href="<?= base_url('order/cetakLabel/' . $encodedKodeOrder); ?>">Cetak Label</a><br> 
      <a style="text-decoration: none;" href="<?= base_url('order/payment/' . $encodedKodeOrder); ?>">Payment</a>  <br> 
      <a style="text-decoration: none;" href="<?= base_url('order/editOrder/' . $encodedKodeOrder); ?>">Edit</a><br> 
      <a style="text-decoration: none;" href="" data-bs-toggle="modal" data-bs-target="#status<?= $modalId; ?>">Status</a>




      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<?php endforeach; ?>

      
<!-- Modal -->
<?php foreach ($data as $row): ?>
  <?php $modalId = str_replace('/', '_', $row['kode_order']); ?>
  <?php
        $encodedKodeOrder2 = base64_encode($row['kode_order']);
      ?>
<div class="modal fade" id="status<?= $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status : <?= $row['kode_order']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <a style="text-decoration: none;" href="<?= base_url('order/updateStatus/' . $encodedKodeOrder2 . '?status=Selesai'); ?>">Selesai</a><br>
      <a style="text-decoration: none;" href="<?= base_url('order/updateStatus/' . $encodedKodeOrder2 . '?status=Delivery'); ?>">Delivery</a><br>
      <a style="text-decoration: none;" href="<?= base_url('order/updateStatus/' . $encodedKodeOrder2 . '?status=Hold'); ?>">Hold</a><br>
      <a style="text-decoration: none;" href="<?= base_url('order/updateStatus/' . $encodedKodeOrder2 . '?status=Batal'); ?>">Batal</a><br>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

      


    </div>





  </div>
</div>
<!-- partial -->
<script>
const searchInput = document.getElementById("searchInput");
const productList = document.getElementById("productList");

searchInput.addEventListener("input", function () {
  const searchTerm = searchInput.value.toLowerCase();
  const productRows = productList.getElementsByClassName("products-row");

  for (const row of productRows) {
    const productName = row.querySelector(".product-cell.nama span").textContent.toLowerCase();
    const month = row.querySelector(".product-cell.date span").textContent.toLowerCase();
    const orderCode = row.querySelector(".product-cell.code span").textContent.toLowerCase();

    if (productName.includes(searchTerm) || month.includes(searchTerm) || orderCode.includes(searchTerm)) {
      row.classList.remove("d-none"); // Menghapus kelas "d-none" untuk menampilkan
    } else {
      row.classList.add("d-none"); // Menambahkan kelas "d-none" untuk menyembunyikan
    }
  }
});

</script>

  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
