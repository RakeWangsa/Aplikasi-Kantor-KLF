<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center" style="background-color:#444654">
<img src="<?= base_url('assets2/klf-logo.png') ?>" alt="Logo" width="800px" style="margin-top: 20px;">
<?php if(session()->has('error')) { ?>
    <div class="alert alert-danger mx-auto" style="max-width: 400px;" role="alert">
        <?= session('error') ?>
    </div>
<?php } ?>
<?php if(session()->has('success')) { ?>
    <div class="alert alert-success mx-auto" style="max-width: 400px;" role="alert">
        <?= session('success') ?>
    </div>
<?php } ?>
<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow" style="border-radius: 20px;border: 2px solid #FFFFFF;background-color:#151E2F">
                <div class="card-body">
                    <h4 class="card-title text-center text-light mb-4">Login</h4>

                    

                    <form method="post" action="<?= base_url('login/check') ?>">
                        <div class="mb-3 text-start">
                            <label for="nama" class="form-label text-light">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="username" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="nip" class="form-label text-light">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" style="background-color: blue; border-color: blue;">Login</button>

                    </form>
                    <p class="mt-3 text-center" style="color:grey">Belum punya akun? <a href="<?= base_url('register') ?>" style="color: #FFFFFF;">Register</a></p>


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>