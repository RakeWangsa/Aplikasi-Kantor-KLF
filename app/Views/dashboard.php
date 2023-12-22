<?php include('header.php'); ?>
  <div class="app-content">
    <div class="app-content-header my-4">
      <h1 class="app-content-headerText">Dashboard</h1>

    </div>



<div class="row mt-4">
                    <div class="col-md-4 mb-4">
                        <div class="dashboard-box">
                        <i class="fas fa-file-invoice dashboard-box-icon"></i>


                            <p class="dashboard-box-label text-light">Jumlah Order Bulan Berjalan</p>
                            <p class="dashboard-box-value text-light"><?= $jumlahOrder; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="dashboard-box">
                            <i class="fas fa-money-bill-wave dashboard-box-icon"></i>
                            <p class="dashboard-box-label text-light">Sisa Saldo Di Luar</p>
                            <p class="dashboard-box-value text-light">Rp. <?= number_format($sisaSaldo, 0, ",", "."); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="dashboard-box">
                            <i class="fas fa-receipt dashboard-box-icon"></i>

                            <p class="dashboard-box-label text-light">Total Tagihan Semua Supplier</p>
                            <p class="dashboard-box-value text-light">Rp. <?= number_format($totalTagihan, 0, ",", "."); ?></p>
                        </div>
                    </div>

                </div>

  </div>
</div>

