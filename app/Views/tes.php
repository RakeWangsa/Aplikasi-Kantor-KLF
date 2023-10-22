<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
  <ul class="list-group">
    <li class="list-group-item list-group-item-action" data-toggle="collapse" href="#list1">list 1</li>
    <div id="list1" class="collapse">
      <ul class="list-group list-group-flush">
        <li class="list-group-item list-group-item-action" data-toggle="collapse" href="#sublist1">sub list 1</li>
        <div id="sublist1" class="collapse">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">sub of sub 1</li>
          </ul>
        </div>
        <li class="list-group-item">sub list 2</li>
      </ul>
    </div>
    <li class="list-group-item list-group-item-action" data-toggle="collapse" href="#list2">list 2</li>
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
</body>
</html>
