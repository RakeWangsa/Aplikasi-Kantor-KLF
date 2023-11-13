<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Angka dengan Tombol</title>
  <!-- Tambahkan link Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    /* Atur sedikit padding agar tampilan lebih baik */
    body {
      padding: 20px;
    }
    /* Atur lebar maksimum kolom input menjadi 60px */
    #numberInput {
      max-width: 50px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="form-group">
    <label for="numberInput">Angka:</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
      </div>
      <!-- Gunakan properti style untuk menentukan lebar maksimum kolom -->
      <input type="text" class="form-control" id="numberInput" readonly>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
      </div>
    </div>
  </div>
</div>

<!-- Tambahkan link Bootstrap JS dan Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
  // Fungsi untuk menambah nilai
  function increment() {
    var input = document.getElementById('numberInput');
    var value = parseInt(input.value, 10);
    input.value = isNaN(value) ? 1 : value + 1;
  }

  // Fungsi untuk mengurangi nilai
  function decrement() {
    var input = document.getElementById('numberInput');
    var value = parseInt(input.value, 10);
    input.value = isNaN(value) || value <= 0 ? 0 : value - 1;
  }
</script>

</body>
</html>
