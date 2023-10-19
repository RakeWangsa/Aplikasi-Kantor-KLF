<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data</title>
</head>
<body>
    <h1>Form Input Data</h1>
    <form action="<?= base_url('simpanData'); ?>" method="post" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" required></textarea><br>

        <label for="no_telfon">No. Telfon:</label>
        <input type="text" name="no_telfon" required><br>
        <input type="file" name="gambar[]" accept="image/*" multiple required><br>

        <input type="submit" value="Simpan">
    </form>
    <ul>
        <?php foreach ($data as $row): ?>
            <li><?= $row['nama']; ?></li>
            <li><?= $row['alamat']; ?></li>
            <li><?= $row['no_telfon']; ?></li>
            <img src="<?= base_url('uploads/' . $row['foto']); ?>" style="max-width: 100px;" alt="Gambar">
        <?php endforeach; ?>
    </ul>
</body>
</html>
