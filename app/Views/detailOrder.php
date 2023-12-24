<?php include('header.php'); ?>
  <div class="app-content">
  <div class="app-content-header my-4">
  <h1 class="app-content-headerText">Detail Order (<?= $kodeOrder; ?> - <?= $data['nama']; ?>)</h1>
  <div class="d-flex">
    
    <a class="btn btn-primary" href="<?= base_url('order/detailOrder/inputProduk/' . $encodedKodeOrder); ?>"><i class="fas fa-plus"></i> Tambah Produk</a>
  </div>
</div>




    <style>
 .dashboard-box:hover {
                        background-color: #f9e8b2;
                        /* Warna latar belakang saat hover */
                        border-width: 2px;
                        /* Lebar border saat hover */
                    }

                    .dashboard-box {
                        transition: background-color 0.3s, border-width 0.1s;
                        /* Efek transisi saat hover */
                        background-color: #56564C;
                        /* Warna latar belakang putih */
                        border: 1.5px solid #ECE5D3;
                        /* Border abu-abu */
                        padding: 28px;
                        border-radius: 8px;
                        display: flex;
                        flex-direction: column;
                        align-items: flex-start;
                    }

                    .dashboard-box-icon {
                        font-size: 24px;
                        color: #cfced2;
                        padding-right: 8px;
                    }

                    .dashboard-box-label {
                        font-size: 16px;
                        margin-top: 12px;
                        margin-bottom: 4px;
                    }

                    .dashboard-box-value {
                        font-size: 24px;
                        font-weight: bold;
                        margin-bottom: 0px;
                        /* Atur jarak bawah nilai */

                    }
  </style>

  



    <div class="products-area-wrapper tableView">
    <div class="row mt-4">
                    <div class="col-md-3 mb-4">
                        <div class="dashboard-box">
                        <i class="fas fa-file-invoice dashboard-box-icon"></i>


                            <p class="dashboard-box-label text-light">Total Nilai Order</p>
                            <p class="dashboard-box-value text-light">Rp. <?= number_format($data['nilaiOrder'], 0, ",", "."); ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
    <div class="dashboard-box" id="discountBox" data-target="discountModal">
        <i class="fas fa-percent dashboard-box-icon"></i>
        <p class="dashboard-box-label text-light">Discount</p>
        <p class="dashboard-box-value text-light">Rp. <?= number_format($data['discount'], 0, ",", "."); ?></p>
    </div>
</div>
<div class="col-md-3 mb-4">
    <a href="<?= base_url('order/detailOrder/biaya/' . $encodedKodeOrder); ?>" style="text-decoration:none">
        <div class="dashboard-box">
            <i class="fas fa-money-bill-wave dashboard-box-icon"></i>
            <p class="dashboard-box-label text-light">Total Biaya Produksi</p>
            <p class="dashboard-box-value text-light">Rp. <?= number_format($data['total_biaya_order'], 0, ",", "."); ?></p>
        </div>
    </a>
</div>

                    <div class="col-md-3 mb-4">
                        <div class="dashboard-box">
                            <i class="fas fa-receipt dashboard-box-icon"></i>

                            <p class="dashboard-box-label text-light">Gross Profit</p>
                            <p class="dashboard-box-value text-light">Rp. <?= number_format($data['gross_profit'], 0, ",", "."); ?></p>
                        </div>
                    </div>


<!-- Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Input Discount</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('order/detailOrder/inputDiscount/' . $encodedKodeOrder); ?>" method="post">
      <div class="modal-body">
      <div class="mb-3">
            <label for="discount" class="form-label">Discount :</label>
            <input type="int" class="form-control" id="discount" name="discount" value="<?= $data['discount']; ?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


                </div>







    <div class="products-header">

<div class="product-cell">Gambar</div>
<div class="product-cell">Nama</div>
<div class="product-cell">Harga</div>
<div class="product-cell">Quantity</div>
<div class="product-cell">Total Harga</div>
<div class="product-cell">Biaya Produksi</div>

</div>


<div id="productList">
<?php foreach ($produkData as $row): ?>
  <?php
        $encodedKodeOrder = base64_encode($row['id_order_produk']);
      ?>
        <?php 
        $modalId = str_replace('/', '_', $row['id_order_produk']); 
        ?>
        <a href="<?= base_url('order/detailOrder/detailProduk/' . $encodedKodeOrder); ?>" style="text-decoration: none;">

<div class="products-row">
<div class="product-cell">
    <span><img src="<?= base_url('uploads/' . $row['gambar']); ?>" style="width: 150px; height: auto;"></span>
  </div>
  <div class="product-cell">
    <span><?= $row['nama']; ?></span>
  </div>
<div class="product-cell"><span>Rp. <?= number_format($row['harga'], 0, ",", "."); ?></span></div>
<div class="product-cell"><span><?= $row['quantity']; ?></span></div>
<div class="product-cell"><span>Rp. <?= number_format($row['total_harga'], 0, ",", "."); ?></span></div>
<div class="product-cell"><span>Rp. <?= number_format($row['total_biaya'], 0, ",", "."); ?></span></div>

</div></a>
    
    <?php endforeach; ?>


</div>
  

      









    </div>





  </div>
</div>

<script>
    $(document).ready(function() {
        $('#discountBox').on('click', function() {
            $('#discountModal').modal('show');
        });
    });
</script>



  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
