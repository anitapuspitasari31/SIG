<div class="row">  
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Pendonor
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <!-- Tombol Tambah Data -->
                        <a href="?page=pendonor&aksi=tambah" class="btn btn-success" style="margin-bottom: 10px;">
                            <i class="fa fa-plus"></i> Tambah Pendonor
                        </a>

                        <div class="panel-body">
        <div class="table-responsive">
            <!-- Filter Form -->
            <form method="get" action="">
                <div class="row">
                    <div class="col-md-3">
                        <label for="kecamatan">Pilih Kecamatan:</label>
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
                        <label for="golongan_darah">Pilih Golongan Darah:</label>
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
                            window.location.href = "?page=pendonor" + 
                                (kecamatan ? "&kecamatan=" + kecamatan : "") + 
                                (golonganDarah ? "&golongan_darah=" + golonganDarah : "");
                        }
                    </script>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NO HP</th>
                                <th>Nama Pendonor</th>
                                <th>Golongan Darah</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Lokasi</th>
                                <th>Kecamatan</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kecamatanFilter = isset($_GET['kecamatan']) ? $_GET['kecamatan'] : '';
                            $golonganDarahFilter = isset($_GET['golongan_darah']) ? $_GET['golongan_darah'] : '';

                            // Query tanpa penggabungan filter kecamatan dan golongan darah
                            $sqlQuery = "SELECT * FROM tb_data WHERE 1";

                            if ($kecamatanFilter !== '') {
                                $sqlQuery .= " AND kecamatan = '" . $koneksi->real_escape_string($kecamatanFilter) . "'";
                            }
                            if ($golonganDarahFilter !== '') {
                                $sqlQuery .= " AND golongan_darah = '" . $koneksi->real_escape_string($golonganDarahFilter) . "'";
                            }

                            $sql = $koneksi->query($sqlQuery);

                            while ($data = $sql->fetch_assoc()) {
                                $jk = ($data['jk'] == 'P') ? "Perempuan" : "Laki-laki";
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['no_hp']; ?></td>
                                    <td><?php echo $data['nama_pendonor']; ?></td>
                                    <td><?php echo $data['golongan_darah']; ?></td>
                                    <td><?php echo $jk; ?></td>
                                    <td><?php echo $data['nama_lokasi']; ?></td>
                                    <td><?php echo $data['kecamatan']; ?></td>
                                    <td><?php echo $data['latitude']; ?></td>
                                    <td><?php echo $data['longitude']; ?></td>
                                    <td>
                                        <a href="?page=pendonor&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a onclick="return confirm('Anda ingin menghapus?')" href="?page=pendonor&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
