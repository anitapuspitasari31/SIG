<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Golongan Darah</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef; /* Warna latar belakang yang lebih lembut */
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%; /* Mengatur lebar kontainer menjadi 100% */
            max-width: 800px; /* Lebar maksimum kontainer */
            margin: auto;
            background: white;
            padding: 30px; /* Menambah padding untuk ruang yang lebih baik */
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s; /* Efek transisi saat hover */
        }
        .container:hover {
            transform: translateY(-5px); /* Efek angkat saat hover */
        }
        h1 {
            text-align: center;
            color: #343a40; /* Warna teks judul yang lebih gelap */
            margin-bottom: 20px; /* Jarak bawah judul */
            font-size: 2em; /* Ukuran font judul yang lebih besar */
        }
        .blood-type {
            margin: 15px 0;
            padding: 15px;
            border: 1px solid #007BFF; /* Warna border yang lebih mencolok */
            border-radius: 5px;
            background-color: #f8f9fa; /* Latar belakang yang lebih cerah untuk setiap golongan darah */
            transition: background-color 0.3s; /* Efek transisi saat hover */
        }
        .blood-type:hover {
            background-color: #e7f3ff; /* Warna latar belakang saat hover */
        }
        .blood-type h2 {
            margin: 0;
            color: #007BFF; /* Warna judul golongan darah */
            font-size: 1.5em; /* Ukuran font lebih besar */
        }
        .blood-type p {
            margin: 5px 0;
            color: #495057; /* Warna teks paragraf */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Analisis Golongan Darah</h1>
    
    <div class="blood-type">
        <h2>Golongan Darah A</h2>
        <p>Karakteristik: Dapat menerima darah dari A dan O.</p>
        <p>Kompatibilitas: A, O.</p>
    </div>

    <div class="blood-type">
        <h2>Golongan Darah B</h2>
        <p>Karakteristik: Dapat menerima darah dari B dan O.</p>
        <p>Kompatibilitas: B, O.</p>
    </div>

    <div class="blood-type">
        <h2>Golongan Darah AB</h2>
        <p>Karakteristik: Dapat menerima darah dari semua golongan.</p>
        <p>Kompatibilitas: A, B, AB, O.</p>
    </div>

    <div class="blood-type">
        <h2>Golongan Darah O</h2>
        <p>Karakteristik: Dapat memberikan darah kepada semua golongan.</p>
        <p>Kompatibilitas: O.</p>
    </div>
</div>

</body>
</html>