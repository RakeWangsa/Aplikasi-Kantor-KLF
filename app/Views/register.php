<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#444654">
<div style="margin-bottom:80px;"></div>
<?php if (isset($errors) && is_array($errors)): ?>
    <div class="alert alert-danger mx-auto" style="max-width: 400px;" role="alert">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow" style="border-radius: 20px;border: 2px solid #FFFFFF;background-color:#151E2F">
                <div class="card-body">
                    <h4 class="card-title text-center text-light mb-4">Register</h4>
                    <form method="post" action="<?= base_url('register/submit') ?>">
                    <div class="mb-1">
                            <label for="nama" class="form-label text-light">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-1">
                            <label for="nama" class="form-label text-light">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label text-light">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-4" style="background-color: blue; border-color: blue;">Register</button>
                    </form>
                    <p class="mt-3 text-center" style="color:grey">Sudah punya akun? <a href="<?= base_url('login') ?>" style="color: #FFFFFF;">Login</a></p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>