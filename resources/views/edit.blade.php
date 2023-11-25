<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
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
    <h1 align="center">Form Ubah Data User</h1>

    <form action="/mahasiswa/edit_data" method="post">
        @foreach ($data as $mahasiswa)
            {{ csrf_field() }}
            <table width="25%" border="0">
                <tr>
                    <th>NIM</th>
                    <td><input type="number" name="nim" value="{{ $mahasiswa->nim }}" readonly></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama" value="{{ $mahasiswa->nama }}"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><input type="text" name="alamat" value="{{ $mahasiswa->alamat }}"></td>
                </tr>
                <tr>
                    <th>Hp</th>
                    <td><input type="text" name="hp" value="{{ $mahasiswa->hp }}"></td>
                </tr>
            </table>
            <div class="action-btns">
                <a href="/mahasiswa" class="btn">Kembali</a>
                <input type="submit" value="Edit data" class="btn"
                    onclick="return confirm('Apakah anda yakin ingin mengganti user dengan NIM: {{ $mahasiswa->nim }} ini??')">
            </div>
        @endforeach
    </form>
</body>

</html>
