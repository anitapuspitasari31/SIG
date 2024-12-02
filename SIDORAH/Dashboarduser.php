<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Golongan Darah</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa; /* Latar belakang yang lebih lembut */
            margin: 0;
            padding: 0;
            height: 100vh; /* Full height */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 100%; /* Mengatur lebar kontainer menjadi 100% */
            max-width: 900px; /* Lebar maksimum kontainer */
            margin: auto;
            background: #ffffff;
            padding: 40px; /* Menambah padding untuk ruang yang lebih baik */
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Menyusun konten dari atas */
        }
        .container:hover {
            transform: translateY(-10px); /* Efek angkat saat hover */
        }
        h1 {
            text-align: center;
            color: #343a40; /* Warna teks judul yang lebih gelap */
            margin-bottom: 30px; /* Jarak bawah judul */
            font-size: 2.5em; /* Ukuran font judul yang lebih besar */
            font-weight: bold;
            text-transform: uppercase;
        }
        .blood-type {
            margin: 20px 0;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa; /* Latar belakang yang lebih cerah untuk setiap golongan darah */
            border-left: 5px solid #007BFF; /* Border kiri dengan warna mencolok */
            transition: background-color 0.3s ease; /* Efek transisi saat hover */
        }
        .blood-type:hover {
            background-color: #e7f3ff; /* Warna latar belakang saat hover */
        }
        .blood-type h2 {
            margin: 0;
            color: #007BFF; /* Warna judul golongan darah */
            font-size: 1.8em; /* Ukuran font lebih besar */
            font-weight: 600;
        }
        .blood-type p {
            margin: 10px 0;
            color: #495057; /* Warna teks paragraf */
            font-size: 1.1em;
        }
        /* Styling button */
        .btn {
            display: inline-block;
            padding: 12px 30px;
            margin-bottom: 20px; /* Memberikan jarak bawah antar tombol */
            font-size: 1.1em;
            font-weight: bold;
            text-align: center;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        /* Responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            .blood-type {
                padding: 15px;
            }
            .blood-type h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Button Login dan Lihat Informasi ditempatkan di atas -->
    <a href="login.php">
        <button class="btn">Login</button>
    </a>
    <a href="user.php">
        <button class="btn">Lihat Informasi</button>
    </a>

    <h1>Analisis Golongan Darah</h1>
    
    <div class="blood-type">
        <h2>Golongan Darah A</h2>
        <p><strong>Karakteristik:</strong> Dapat menerima darah dari A dan O.</p>
        <p><strong>Kompatibilitas:</strong> A, O.</p>
    </div>

    <div class="blood-type">
        <h2>Golongan Darah B</h2>
        <p><strong>Karakteristik:</strong> Dapat menerima darah dari B dan O.</p>
        <p><strong>Kompatibilitas:</strong> B, O.</p>
    </div>

    <div class="blood-type">
        <h2>Golongan Darah AB</h2>
        <p><strong>Karakteristik:</strong> Dapat menerima darah dari semua golongan.</p>
        <p><strong>Kompatibilitas:</strong> A, B, AB, O.</p>
    </div>

    <div class="blood-type">
        <h2>Golongan Darah O</h2>
        <p><strong>Karakteristik:</strong> Dapat memberikan darah kepada semua golongan.</p>
        <p><strong>Kompatibilitas:</strong> O.</p>
    </div>
</div>

</body>
</html>
