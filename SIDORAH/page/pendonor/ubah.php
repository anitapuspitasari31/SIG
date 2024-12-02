<?php     
session_start();

// Redirect non-admin users
if ($_SESSION['level'] != 'admin') {
    header("Location: index.php");
    exit();
}

// Database connection
$koneksi = new mysqli("localhost", "root", "", "db_sigdorah");

// Validate donor ID
if (!isset($_GET['id'])) {
    header("Location: pendonor.php?message=ID tidak valid.");
    exit();
}

$id = $_GET['id'];

// Fetch donor data based on ID
$sql = $koneksi->query("SELECT * FROM tb_data WHERE id='$id'");
$data = $sql->fetch_assoc();

// Redirect if donor not found
if (!$data) {
    header("Location: pendonor.php?message=Data tidak ditemukan.");
    exit();
}

$message = '';

// Update donor data
if (isset($_POST['submit'])) {
    $no_hp = $_POST['no_hp'];
    $nama_pendonor = $_POST['nama_pendonor'];
    $jk = $_POST['jk'];
    $golongan_darah = $_POST['golongan_darah'];
    $nama_lokasi = $_POST['nama_lokasi'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $kecamatan = $_POST['kecamatan']; // Added kecamatan

    // Update query
    $update = $koneksi->query("UPDATE tb_data SET no_hp='$no_hp', nama_pendonor='$nama_pendonor', jk='$jk', golongan_darah='$golongan_darah', nama_lokasi='$nama_lokasi', latitude='$latitude', longitude='$longitude', kecamatan='$kecamatan' WHERE id='$id'");

    // JavaScript alert for success or error
    if ($update) {
        echo "<script type='text/javascript'>
                alert('Data Berhasil Disimpan');
                window.location.href='?page=pendonor';  // Redirect back to pendonor page
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error: " . $koneksi->error . "');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pendonor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Ubah Pendonor</h2>

    <!-- Display message if exists -->
    <?php if ($message != ''): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required />
        </div>
        <div class="form-group">
            <label>Nama Pendonor</label>
            <input type="text" name="nama_pendonor" class="form-control" value="<?php echo htmlspecialchars($data['nama_pendonor']); ?>" required />
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="L" <?php echo ($data['jk'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?php echo ($data['jk'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>  
        <div class="form-group">
            <label>Golongan Darah</label>
            <select name="golongan_darah" class="form-control" required>
                <option value="A" <?php echo ($data['golongan_darah'] == 'A') ? 'selected' : ''; ?>>A</option>
                <option value="B" <?php echo ($data['golongan_darah'] == 'B') ? 'selected' : ''; ?>>B</option>
                <option value="AB" <?php echo ($data['golongan_darah'] == 'AB') ? 'selected' : ''; ?>>AB</option>
                <option value="O" <?php echo ($data['golongan_darah'] == 'O') ? 'selected' : ''; ?>>O</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" value="<?php echo htmlspecialchars($data['nama_lokasi']); ?>" required />
        </div>
        
        <!-- Kecamatan Dropdown -->
        <div class="form-group">
            <label>Kecamatan</label>
            <select name="kecamatan" class="form-control" required>
                <option value="">-- Pilih Kecamatan --</option>
                <option value="marioriwawo" <?php echo ($data['kecamatan'] == 'marioriwawo') ? 'selected' : ''; ?>>Marioriwawo</option>
                <option value="lalabata" <?php echo ($data['kecamatan'] == 'lalabata') ? 'selected' : ''; ?>>Lalabata</option>
                <option value="liliriaja" <?php echo ($data['kecamatan'] == 'liliriaja') ? 'selected' : ''; ?>>Liliriaja</option>
                <option value="ganra" <?php echo ($data['kecamatan'] == 'ganra') ? 'selected' : ''; ?>>Ganra</option>
                <option value="citta" <?php echo ($data['kecamatan'] == 'citta') ? 'selected' : ''; ?>>Citta</option>
                <option value="lilirilau" <?php echo ($data['kecamatan'] == 'lilirilau') ? 'selected' : ''; ?>>Lilirilau</option>
                <option value="donri-donri" <?php echo ($data['kecamatan'] == 'donri-donri') ? 'selected' : ''; ?>>Donri-Donri</option>
                <option value="marioriawa" <?php echo ($data['kecamatan'] == 'marioriawa') ? 'selected' : ''; ?>>Marioriawa</option>
            </select>
        </div>

        <div class="form-group">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" value="<?php echo htmlspecialchars($data['latitude']); ?>" required />
        </div>
        <div class="form-group">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" value="<?php echo htmlspecialchars($data['longitude']); ?>" required />
        </div>     
        <input type="submit" name="submit" value="Perbarui" class="btn btn-primary" />
    </form>
</div>

</body>
</html>
