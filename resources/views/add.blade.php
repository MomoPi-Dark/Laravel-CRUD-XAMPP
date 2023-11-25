<!DOCTYPE html>
<html>

<head>
    <title>Menambah User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        select,
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select:focus,
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #d71313;
            outline: none;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            background-color: #d71313;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #f45050;
        }

        .action-btns {
            display: flex;
            justify-content: center;
            font-size: small;
            margin-top: 2rem;
        }

        .btn:first-child {
            margin-right: 2rem;
        }
    </style>
</head>

<body>
    <h1 align="center">Form Tambah Data</h1>
    <form action="/mahasiswa/store" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <th>NIM</th>
                <td><input type="number" name="nim" required>
                </td>
            </tr>
            <tr>
                <th>Nama</th>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <th>Hp</th>
                <td><input type="text" name="hp" required></td>
            </tr>
        </table>
        <div class="action-btns">
            <a href="/mahasiswa" class="btn">Kembali</a>
            <input type="submit" value="Simpan Data"
                onclick="return confirm('Apakah Anda yakin ingin menambah pengguna ini?')" class="btn">
        </div>
    </form>
</body>

</html>
