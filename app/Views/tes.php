<!-- <!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container mt-4">
<button onclick="toggleAllLists()" class="btn btn-primary mb-2">Toggle All Lists</button>
  <ul class="list-group">
    <li class="list-group-item list-group-item-action">
      <button class="icon-button" data-toggle="collapse" href="#list1" onclick="toggleIcon('icon1')">
        <i id="icon1" class="fas fa-chevron-right"></i>
      </button> list 1
    </li>
    <div id="list1" class="collapse">
      <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action">
          <button class="icon-button" data-toggle="collapse" href="#sublist1" onclick="toggleIcon('icon2')">
            <i id="icon2" class="fas fa-chevron-right"></i>
          </button> sub list 1
        </li>
        <div id="sublist1" class="collapse">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">sub of sub 1</li>
          </ul>
        </div>
        <li class="list-group-item">sub list 2</li>
      </ul>
    </div>
    <li class="list-group-item list-group-item-action">
      <button class="icon-button" data-toggle="collapse" href="#list2" onclick="toggleIcon('icon3')">
        <i id="icon3" class="fas fa-chevron-right"></i>
      </button> list 2
    </li>
    <div id="list2" class="collapse">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">sub list 1</li>
        <li class="list-group-item">sub list 2</li>
      </ul>
    </div>
  </ul>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

</body>
</html> -->



<!DOCTYPE html>
<html>
<head>
    <title>Form dengan Penambahan Kolom Inputan</title>
    <script>
        // Fungsi untuk menambahkan 3 kolom input baru
        function addThreeInputFields() {
            for (let i = 0; i < 3; i++) {
                var inputNumber = document.querySelectorAll('input[type="text"]').length + 1;
                var newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'input' + inputNumber;
                newInput.placeholder = 'Input ' + inputNumber;

                var newLabel = document.createElement('label');
                newLabel.htmlFor = 'input' + inputNumber;
                newLabel.appendChild(document.createTextNode('Input ' + inputNumber + ':'));

                var lineBreak = document.createElement('br');

                var form = document.querySelector('form');
                form.appendChild(newLabel);
                form.appendChild(newInput);
                form.appendChild(lineBreak);
            }
        }
    </script>
</head>
<body>
    <form>
        <label for="input1">Input 1:</label>
        <input type="text" id="input1" name="input1"><br><br>

        <label for="input2">Input 2:</label>
        <input type="text" id="input2" name="input2"><br><br>

        <label for="input3">Input 3:</label>
        <input type="text" id="input3" name="input3"><br><br>

        <label for="input4">Input 4:</label>
        <input type="text" id="input4" name="input4"><br><br>

        <label for="input5">Input 5:</label>
        <input type="text" id="input5" name="input5"><br><br>

        <input type="button" value="Tambah Kolom Input" onclick="addThreeInputFields()">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
