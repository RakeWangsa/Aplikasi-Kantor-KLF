<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="container mt-4">
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
</script>
</body>
</html>
