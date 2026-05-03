<?php
session_start();
include "koneksi.php";

/* PROSES SIMPAN */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama   = mysqli_real_escape_string($conn, $_POST['nama_pohon']);
    $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $umur   = mysqli_real_escape_string($conn, $_POST['umur']);

    if ($nama == "" || $lokasi == "" || $umur == "") {
        $_SESSION['info'] = "Semua data wajib diisi!";
    } else {
        $query = "INSERT INTO data_kelapa (nama_pohon, lokasi, umur)
                  VALUES ('$nama','$lokasi','$umur')";

        if (mysqli_query($conn, $query)) {
            $_SESSION['info'] = "Data berhasil ditambahkan!";
        } else {
            $_SESSION['info'] = "Gagal: " . mysqli_error($conn);
        }
    }

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pohon Kelapa</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: center; }
        .alert { background: #d4edda; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>

<h2>Form Data Pohon Kelapa</h2>

<!-- NOTIFIKASI -->
<?php if (isset($_SESSION['info'])): ?>
    <div class="alert">
        <?php 
            echo $_SESSION['info']; 
            unset($_SESSION['info']);
        ?>
    </div>
<?php endif; ?>

<!-- FORM INPUT -->
<form method="POST">
    Nama Pohon:<br>
    <input type="text" name="nama_pohon"><br><br>

    Lokasi:<br>
    <input type="text" name="lokasi"><br><br>

    Umur:<br>
    <input type="text" name="umur"><br><br>

    <button type="submit">Simpan</button>
</form>

<hr>

<h3>Data Pohon Kelapa</h3>

<table>
    <tr>
        <th>No</th>
        <th>Nama Pohon</th>
        <th>Lokasi</th>
        <th>Umur</th>
    </tr>

    <?php
    $no = 1;
    $query = "SELECT * FROM data_kelapa ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['nama_pohon']."</td>";
            echo "<td>".$row['lokasi']."</td>";
            echo "<td>".$row['umur']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Belum ada data.</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php mysqli_close($conn); ?>