<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: linear-gradient(45deg, #007bff, #00d4ff);
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            flex: 1;
            text-align: center;
        }

        .header .btn-container {
            display: flex;
            gap: 10px;
        }

        .header .btn {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .header .btn:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .header {
                flex-wrap: wrap;
                text-align: center;
            }

            .header h1 {
                order: 1;
                margin-bottom: 10px;
            }

            .header .btn-container {
                order: 2;
                justify-content: center;
                width: 100%;
            }
        }
    </style>
    <title>Sistem Informasi Geografis Pendonor Darah</title>
</head>
<body>

<div class="header">
    <h1>Selamat Datang di Sistem Informasi Geografis Pendonor Darah</h1>
    <div class="btn-container">
        <a href="login.php" class="btn">Login</a>
        <a href="Dashboarduser.php" class="btn">Home</a>
    </div>
</div>

<div style="
    background: green;
    color: white;
    padding: 20px;
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    border-radius: 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100vw;
    margin: 0;
">
    Sistem ini membantu Anda menemukan pendonor darah dengan mudah dan cepat. 
    Gunakan fitur peta untuk melihat lokasi pendonor di sekitar Anda.
</div>
</body>
</html>



    <?php      
// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "db_sigdorah");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Mendapatkan nilai filter dari URL
$kecamatanFilter = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '';
$golonganDarahFilter = isset($_GET['golongan_darah']) ? $_GET['golongan_darah'] : '';

// Query untuk menampilkan data lokasi termasuk kecamatan dengan filter jika ada
$query = "SELECT * FROM tb_data WHERE 1";
if ($kecamatanFilter != '') {
    $query .= " AND kecamatan = '$kecamatanFilter'";
}
if ($golonganDarahFilter != '') {
    $query .= " AND golongan_darah = '$golonganDarahFilter'";
}

$result = $koneksi->query($query);

// Mengecek apakah ada data
if ($result->num_rows > 0):
?>
<br>

    <div class="panel-body">
        <div class="table-responsive">
            <!-- Filter Form -->
            <form method="get" action="">
                <div class="row">
                    <div class="col-md-3">
                        <b><label for="kecamatan">Pilih Kecamatan:</label></b>
                        <select id="kecamatan" name="kecamatan" class="form-control">
                            <option value="">-- Pilih Kecamatan --</option>
                            <option value="Marioriwawo" <?php echo $kecamatanFilter == 'Marioriwawo' ? 'selected' : ''; ?>>Marioriwawo</option>
                            <option value="Lalabata" <?php echo $kecamatanFilter == 'Lalabata' ? 'selected' : ''; ?>>Lalabata</option>
                            <option value="Liliriaja" <?php echo $kecamatanFilter == 'Liliriaja' ? 'selected' : ''; ?>>Liliriaja</option>
                            <option value="Ganra" <?php echo $kecamatanFilter == 'Ganra' ? 'selected' : ''; ?>>Ganra</option>
                            <option value="Citta" <?php echo $kecamatanFilter == 'Citta' ? 'selected' : ''; ?>>Citta</option>
                            <option value="Lilirilau" <?php echo $kecamatanFilter == 'Lilirilau' ? 'selected' : ''; ?>>Lilirilau</option>
                            <option value="Donri-Donri" <?php echo $kecamatanFilter == 'Donri-Donri' ? 'selected' : ''; ?>>Donri-Donri</option>
                            <option value="Marioriawa" <?php echo $kecamatanFilter == 'Marioriawa' ? 'selected' : ''; ?>>Marioriawa</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <b><label for="golongan_darah">Pilih Golongan Darah:</label></b>
                        <select id="golongan_darah" name="golongan_darah" class="form-control">
                            <option value="">-- Pilih Golongan Darah --</option>
                            <option value="A" <?php echo $golonganDarahFilter == 'A' ? 'selected' : ''; ?>>A</option>
                            <option value="B" <?php echo $golonganDarahFilter == 'B' ? 'selected' : ''; ?>>B</option>
                            <option value="AB" <?php echo $golonganDarahFilter == 'AB' ? 'selected' : ''; ?>>AB</option>
                            <option value="O" <?php echo $golonganDarahFilter == 'O' ? 'selected' : ''; ?>>O</option>
                        </select>
                    </div>
                    <!-- Tombol Terapkan untuk menyaring data -->
                    <button type="button" class="btn btn-primary" style="margin-top: 25px;" onclick="applyFilters()">Terapkan</button>
                </div><br>

                <script>
                    function applyFilters() {
                        var kecamatan = document.getElementById('kecamatan').value;
                        var golonganDarah = document.getElementById('golongan_darah').value;

                        // Redirect dengan parameter kecamatan dan golongan darah yang dipilih
                        window.location.href = "?page=lokasi" + 
                            (kecamatan ? "&kecamatan=" + kecamatan : "") + 
                            (golonganDarah ? "&golongan_darah=" + golonganDarah : "");
                    }
                </script>

<table id="dataTables-example" class="table table-striped table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pendonor</th>
            <th>Golongan Darah</th>
            <th>Jenis Kelamin</th>
            <th>Nama Lokasi</th>
            <th>Kecamatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['nama_pendonor']); ?></td>
                <td><?php echo htmlspecialchars($row['golongan_darah']); ?></td>
                <td><?php echo ($row['jk'] == 'P') ? 'Perempuan' : 'Laki-laki'; ?></td>
                <td><?php echo htmlspecialchars($row['nama_lokasi']); ?></td>
                <td><?php echo htmlspecialchars($row['kecamatan']); ?></td>
                <td>
                    <a href="#map" class="btn btn-info" onclick="showLocation(<?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?>, '<?php echo addslashes($row['nama_pendonor']); ?>', '<?php echo addslashes($row['golongan_darah']); ?>', '<?php echo ($row['jk'] == 'P') ? 'Perempuan' : 'Laki-laki'; ?>', '<?php echo addslashes($row['nama_lokasi']); ?>', '<?php echo addslashes($row['kecamatan']); ?>', '<?php echo addslashes($row['no_hp']); ?>', '<?php echo $row['created_at']; ?>');">Lihat di Maps</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
        </div>
    </div>
</div>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery dan DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "pageLength": 5, // Menampilkan 5 data per halaman
            "lengthMenu": [5, 10, 25, 50, 100], // Opsi jumlah data
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(disaring dari total _MAX_ data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>
<br>
<div class="panel panel-default">
<div style="text-align: center;">
   <h4> Peta Lokasi Pendonor</h4>
</div>

    <div class="panel-body">
      <div id="map" style="height: 600px; width: 100%;"></div>
    </div>
</div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script>
    // Inisialisasi peta dengan koordinat Kabupaten Soppeng
    var map = L.map('map').setView([-4.350259, 119.885787], 13);

    // Menambahkan layer peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Custom icon for the marker (replace with your image URL)
    var donorIcon = L.icon({
        iconUrl: 'images/person-icon.png',  // Ganti dengan URL gambar ikon orang
        iconSize: [90, 90],  // Ukuran ikon
        iconAnchor: [16, 32],  // Posisi jangkar ikon
        popupAnchor: [0, -32]  // Posisi popup
    });

    // Data lokasi dari PHP (mengambil data dari query yang sama)
    var locations = [
        <?php
        $result->data_seek(0); // Kembali ke awal hasil query
        while($row = $result->fetch_assoc()):
            echo "{
                lat: " . $row['latitude'] . ",
                lng: " . $row['longitude'] . ",
                nama: '" . addslashes($row['nama_pendonor']) . "',
                golonganDarah: '" . $row['golongan_darah'] . "',
                jenisKelamin: '" . ($row['jk'] == 'P' ? 'Perempuan' : 'Laki-laki') . "',
                lokasi: '" . addslashes($row['nama_lokasi']) . "',
                kecamatan: '" . addslashes($row['kecamatan']) . "',
                noHp: '" . $row['no_hp'] . "',
                createdAt: '" . $row['created_at'] . "' },"; 
        endwhile;
        ?>
    ];

    // Menambahkan marker untuk setiap lokasi dengan custom icon
    locations.forEach(function(location) {
        var marker = L.marker([location.lat, location.lng], { icon: donorIcon })
            .addTo(map)
            .bindPopup("<strong>" + location.nama + "</strong><br>Golongan Darah: " + location.golonganDarah + "<br>Jenis Kelamin: " + location.jenisKelamin + "<br>Lokasi: " + location.lokasi + "<br>Kecamatan: " + location.kecamatan);
        
        // Add the same click behavior for markers
        marker.on('click', function() {
            showLocation(location.lat, location.lng, location.nama, location.golonganDarah, location.jenisKelamin, location.lokasi, location.kecamatan, location.noHp, location.createdAt);
        });
    });

    // Fungsi untuk menampilkan lokasi di peta saat tombol "Lihat di Maps" ditekan
    function showLocation(lat, lng, nama, golonganDarah, jenisKelamin, lokasi, kecamatan, noHp, createdAt) {
        if (lat && lng) {
            L.marker([lat, lng], { icon: donorIcon })
                .addTo(map)
                .bindPopup(`
                    <strong>${nama}</strong><br>
                    <table class="table table-bordered">
                        <tr><td>Golongan Darah:</td><td>${golonganDarah}</td></tr>
                        <tr><td>Jenis Kelamin:</td><td>${jenisKelamin}</td></tr>
                        <tr><td>Lokasi:</td><td>${lokasi}</td></tr>
                        <tr><td>Kecamatan:</td><td>${kecamatan}</td></tr>
                        <tr><td>Created At:</td><td>${createdAt}</td></tr>
                        <tr><td>Nomor HP:</td><td><a href="https://wa.me/${noHp}" target="_blank">Chat di WhatsApp</a></td></tr>
                    </table>
                `)
                .openPopup();
            map.setView([lat, lng], 15); // Zoom ke lokasi spesifik
        } else {
            alert('Koordinat tidak tersedia untuk pendonor ini.');
        }
    }
</script>

<?php
else:
    echo "Data tidak ditemukan.";
endif;
?>


<?php
// Tutup koneksi database
$koneksi->close();
?>
