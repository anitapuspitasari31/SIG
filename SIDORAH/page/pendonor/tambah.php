<div class="panel panel-default">  
    <div class="panel-heading">
        Tambah Data Pendonor
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label for="no_hp">NO HP</label>
                        <input class="form-control" type="text" name="no_hp" id="no_hp" maxlength="16" required />
                    </div>

                    <div class="form-group">
                        <label for="nama_pendonor">Nama</label>
                        <input class="form-control" name="nama_pendonor" id="nama_pendonor" required />
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label><br/>
                        <label class="checkbox-inline">
                            <input type="radio" value="L" name="jk" required /> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" value="P" name="jk" required /> Perempuan
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <select class="form-control" name="golongan_darah" required>
                            <option value="">== Pilih Golongan Darah ==</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_lokasi">Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" class="form-control" required />
                    </div>
                    
                    <!-- Tambahan input untuk kecamatan -->
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select name="kecamatan" class="form-control" required>
                            <option value="">-- Pilih Kecamatan --</option>
                            <option value="marioriwawo">Marioriwawo</option>
                            <option value="lalabata">Lalabata</option>
                            <option value="liliriaja">Liliriaja</option>
                            <option value="ganra">Ganra</option>
                            <option value="citta">Citta</option>
                            <option value="lilirilau">Lilirilau</option>
                            <option value="donri-donri">Donri-Donri</option>
                            <option value="marioriawa">Marioriawa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" class="form-control" required />
                    </div>

                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $no_hp = $koneksi->real_escape_string($_POST['no_hp']);
    $nama_pendonor = $koneksi->real_escape_string($_POST['nama_pendonor']);
    $jk = isset($_POST['jk']) ? $koneksi->real_escape_string($_POST['jk']) : '';
    $golongan_darah = $koneksi->real_escape_string($_POST['golongan_darah']);
    $nama_lokasi = $koneksi->real_escape_string($_POST['nama_lokasi']);
    $kecamatan = $koneksi->real_escape_string($_POST['kecamatan']); // Menangkap data kecamatan
    $latitude = $koneksi->real_escape_string($_POST['latitude']);
    $longitude = $koneksi->real_escape_string($_POST['longitude']);

    // Menyimpan data ke database
    $sql = "INSERT INTO tb_data (no_hp, nama_pendonor, jk, golongan_darah, nama_lokasi, kecamatan, latitude, longitude) 
            VALUES ('$no_hp', '$nama_pendonor', '$jk', '$golongan_darah', '$nama_lokasi', '$kecamatan', '$latitude', '$longitude')";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
                alert('Data Berhasil Disimpan');
                window.location.href='?page=pendonor';
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error: " . $koneksi->error . "');
              </script>";
    }
}
$koneksi->close();
?>
