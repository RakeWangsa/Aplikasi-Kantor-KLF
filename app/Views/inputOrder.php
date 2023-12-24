<?php include('header.php'); ?>
  <div class="app-content">
    <div class="app-content-header my-4">
      <h1 class="app-content-headerText">Input Order</h1>
    </div>

    <div class="products-area-wrapper tableView">



    <form class="text-light" action="<?= base_url('order/inputOrder/simpanData'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mb-2">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" style="max-width:1000px" placeholder="Masukkan nama">
            </div>
            <div class="form-group mb-2">
                <label for="noTelfon">No Telfon:</label>
                <input type="text" class="form-control" id="noTelfon" name="noTelfon" style="max-width:1000px" placeholder="Masukkan no telfon">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" style="max-width:1000px" placeholder="Masukkan email">
            </div>
            <div class="form-group mb-2">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" style="max-width:1000px" placeholder="Masukkan alamat"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="detailProduk">Tanggal Order:</label>
                <input type="date" class="form-control" id="tanggalOrder" name="tanggalOrder" style="max-width:1000px">
            </div>
            <div class="form-group mb-4">
                <label for="detailProduk">Deadline Order:</label>
                <input type="date" class="form-control" id="deadlineOrder" name="deadlineOrder" style="max-width:1000px">
            </div>


            <div class="form-group mb-2">
                <label for="ongkosKirim">Ongkos Kirim:</label>
                <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-secondary">
    <input type="radio" name="ongkosKirim" value="termasuk" id="ongkosKirimTermasuk" autocomplete="off" checked> Termasuk
</label>
<label class="btn btn-secondary">
    <input type="radio" name="ongkosKirim" value="tidak termasuk" id="ongkosKirimTidakTermasuk" autocomplete="off"> Tidak Termasuk
</label>

                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>

      


      

    </div>





  </div>
</div>
<!-- partial -->
  <script  src="<?= base_url('assets2/script.js'); ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
