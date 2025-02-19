<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Resep Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background: #8B4513; /* Coklat tua */
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h3 {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px;
            display: block;
            border-radius: 5px;
            font-size: 1.1rem;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background: #A0522D; /* Warna coklat lebih terang */
        }
        .content {
            margin-left: 270px;
            padding: 40px;
        }
        .table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        img {
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        img:hover {
            transform: scale(1.1);
        }
        h2 {
            font-weight: bold;
            color: #343a40;
            border-bottom: 3px solid #A0522D;
            display: inline-block;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Admin Panel</h3>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.kelola-user') }}">Kelola Pengguna</a>
        <a href="{{ route('resep-adm.index') }}">Kelola Resep Admin</a>
        <a href="{{ route('admin.kelola-resep-user') }}">Kelola Resep Pengguna</a>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Daftar Resep Pengguna</h2>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reseps as $resep)
                        @if (isset($resep->user) && $resep->user->role === 'user')
                            <tr>
                                <td>{{ $resep->nama_masakan }}</td>
                                <td>{{ $resep->kategori }}</td>
                                <td>
                                    @if ($resep->foto_masakan)
                                        <img src="{{ asset('storage/'.$resep->foto_masakan) }}" width="120" height="90">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
