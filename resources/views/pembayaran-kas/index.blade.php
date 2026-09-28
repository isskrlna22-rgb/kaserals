<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran Kas - KASERALS</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
            margin: 0;
        }

        .container {
            padding: 30px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            margin-bottom: 6px;
        }

        .header p {
            color: #64748b;
        }

        .card {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            padding: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            background: #0d9488;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Pembayaran Kas</h1>
        <p>Kelola pencatatan pembayaran kas siswa.</p>
    </div>

    <div class="card">
        <p>Halaman Pembayaran Kas KASERALS berhasil dibuka.</p>

        <a href="{{ route('dashboard') }}" class="btn">
            ← Kembali ke Dashboard
        </a>
    </div>

</div>

</body>
</html>
