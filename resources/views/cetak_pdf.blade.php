<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .title {
            padding: 2rem 1rem;
            border: 1px solid #d71313;
            text-align: center;
        }

        .title h2 {
            margin: 0;
            color: #d71313;
        }

        .title h3 {
            margin: 0;
            color: #d71313;
        }

        .title h4 {
            margin: 0;
            color: #d71313;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #d71313;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #d71313;
            border: 1px solid #d71313;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        a:hover {
            background-color: #f45050;
            color: #fff;
        }

        .add {
            text-align: center;
            margin-top: 20px;
        }

        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #d71313;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .add-button:hover {
            background-color: #f45050;
        }

        .popup {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px;
            background: white;
            border: 1px solid #d71313;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            animation: fadeIn 0.5s, fadeOut 0.5s 2s;
        }

        .popup p {
            margin: 0;
        }

        .popup p::before {
            content: "";
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }

        .popup.danger p::before {
            content: "❗";
            color: red;
        }

        .popup.warning p::before {
            content: "⚠️";
            color: yellow;
        }

        .popup.success p::before {
            content: "✅";
            color: green;
        }

        .popup.show {
            display: block;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <center>
        <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
    </center>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomer HP</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $mahasiswa)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->alamat }}</td>
                    <td>{{ $mahasiswa->hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
