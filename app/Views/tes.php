<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<style>
   .subofsub-icon {
    width: 6px; /* Lebar ikon bulat */
    height: 6px; /* Tinggi ikon bulat */
    background-color: black; /* Warna latar belakang ikon */
    border-radius: 50%; /* Mengatur ikon menjadi bulat */
    display: inline-block;
    margin-right: 3px; /* Jarak antara ikon dan teks */
  }
</style>

<div class="container mt-4">
<button onclick="toggleAllLists()" class="btn btn-primary mb-2">Toggle All Lists</button>
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
</html>


<!-- 
<!DOCTYPE html>
<html>
<head>
    <title>Form dengan Penambahan Kolom Inputan</title>
    <script>
        // Fungsi untuk menambahkan 3 kolom input baru
        function addThreeInputFields() {
            for (let i = 0; i < 10; i++) {
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
</html> -->


<!-- <!DOCTYPE html>
<html>
<head>
    <title>Form Pop-up ke Tabel ke Inputan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
        Tampilkan Form
    </button>

    <div class="modal" id="formModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Input</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="inputForm">
                        <div class="form-group">
                            <label for="inputData1">Data 1:</label>
                            <input type="text" class="form-control" id="inputData1" required>
                        </div>
                        <div class="form-group">
                            <label for="inputData2">Data 2:</label>
                            <input type="text" class="form-control" id="inputData2" required>
                        </div>
                        <div class="form-group">
                            <label for="inputData3">Data 3:</label>
                            <input type="text" class="form-control" id="inputData3" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Data 1</th>
                <th>Data 2</th>
                <th>Data 3</th>
            </tr>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table>

    <div id="additionalInputs">

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    let dataInputs = [];

    document.getElementById('inputForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const data1 = document.getElementById('inputData1').value;
        const data2 = document.getElementById('inputData2').value;
        const data3 = document.getElementById('inputData3').value;

        const tableBody = document.getElementById('tableBody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${data1}</td>
            <td>${data2}</td>
            <td>${data3}</td>
        `;
        tableBody.appendChild(newRow);

        dataInputs.push([data1, data2, data3]);


        displayAdditionalInputs();

        $('#formModal').modal('hide');
        document.getElementById('inputForm').reset();
    });

    function displayAdditionalInputs() {
        const additionalInputs = document.getElementById('additionalInputs');
        additionalInputs.innerHTML = ''; 

        dataInputs.forEach(data => {
            const additionalInput = document.createElement('div');
            additionalInput.classList.add('form-group');
            additionalInput.innerHTML = `
                <div class="row">
                    <div class="col">
                        <label>Kolom Input 1:</label>
                        <input type="text" class="form-control" value="${data[0]}" disabled>
                    </div>
                    <div class="col">
                        <label>Kolom Input 2:</label>
                        <input type="text" class="form-control" value="${data[1]}" disabled>
                    </div>
                    <div class="col">
                        <label>Kolom Input 3:</label>
                        <input type="text" class="form-control" value="${data[2]}" disabled>
                    </div>
                </div>
            `;
            additionalInputs.appendChild(additionalInput);
        });
    }
</script>

</body>
</html> -->






<!-- 
 <!DOCTYPE html>
<html>
<head>
    <title>Form di Dalam Form (Simulasi)</title>
</head>
<body>

<div>
    <h2>Form Utama</h2>
    <form id="formUtama">
        <label for="input1">Input 1:</label>
        <input type="text" id="input1" required><br><br>
        <label for="input2">Input 2:</label>
        <input type="text" id="input2" required><br><br>

        <button type="button" onclick="openSubForm()">Isi Form Kedua</button>
    </form>
</div>

<div style="display: none;" id="subFormDiv">
    <h2>Form Kedua (Simulasi)</h2>
    <form id="formKedua">
        <label for="subInput1">Sub Input 1:</label>
        <input type="text" id="subInput1" required><br><br>
        <label for="subInput2">Sub Input 2:</label>
        <input type="text" id="subInput2" required><br><br>

        <button type="button" onclick="submitSubForm()">Kirim</button>
    </form>
</div>

<script>
    function openSubForm() {
        document.getElementById('subFormDiv').style.display = 'block';
    }

    function submitSubForm() {
        // Lakukan sesuatu dengan data dari "Form Kedua"
        const subInput1 = document.getElementById('subInput1').value;
        const subInput2 = document.getElementById('subInput2').value;
        // Contoh: Cetak hasil ke konsol
        console.log("Data dari Form Kedua:", subInput1, subInput2);
        // Kemudian atur form kedua kembali menjadi tidak terlihat
        document.getElementById('subFormDiv').style.display = 'none';
    }
</script>

</body>
</html> -->
