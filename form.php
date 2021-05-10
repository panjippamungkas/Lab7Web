<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>PHP Dasar</title>
    <style>
        body {
            font-family: Georgia, serif;
            background: #eaeaea;
        }

        h1 {
        text-align: center;
        }

        form {
        padding: 10px;
        }

        .container {
            padding: 1em;
            margin: auto;
            width: 90%;
            background: Salmon;
            border-radius: 3px;
        }
        
        label {
            font-size: 10pt;
            color: #555;
        }
        
        input[type="text"],
        input[type="date"] {
            padding: 15px;
            width: 98%;
            background: #efefef;
            border: 0;
            font-size: 1em;
            font-family: 'Georgia';
            margin: 6px 0px;
            border-radius: 5px;
        }
        
        input[type="submit"] {
            background: #264653;
            color: #fff;
            border: 0;
            margin: 5px 0px;
            padding: 15px;
            border-radius: 5px;
            width: 100%;
            font-family: 'Georgia';
        }

        input[type="submit"]:hover {
            background: #042631;
            cursor: pointer;
        }

        .jenis {
            padding: 15px;
            width: 100%;
            background: #efefef;
            border: 0;
            font-size: 1em;
            font-family: 'Georgia';
            margin: 6px 0px;
            border-radius: 5px;
        }

        p {
        margin: 5px;
        }
    </style>
</head>
<body>
	<div class="container">
		<h1>Program Gaji Karyawan</h1>
		<form method="POST">
			<label>Nama : <br></label>
			<input type="text" name="nama" placeholder="Masukan Nama">
			<br>
			<label>Tanggal Lahir : <br></label>
			<input type="date" name="tanggal">
			<br>
			<label>Pekerjaan : <br></label>
            <select name="pekerjaan" class="jenis">
                <option value="Staff">Staff</option>
                <option value="Teknisi">Teknisi</option>
                <option value="Marketing">Marketing</option>
            </select>
			<br>
			<br>
			<input type="submit" name="button" value="Submit">
			<br>
			<br>
			<h3>Hasil Output : </h3>
	<?php
    $lahir = @$_GET['tanggal'];
    $button = @$_POST['button'];

    if ($button) {
        $nama=$_POST['nama'];
        $job=@$_POST['pekerjaan'];
        echo "<p>Nama : $nama</p>";
        $tanggal_lahir = new DateTime($_POST['tanggal']);
        $sekarang = new DateTime("today");
        if ($tanggal_lahir > $sekarang) { 
            $thn = "0";
            $bln = "0";
            $tgl = "0";
        }
        $thn = $sekarang->diff($tanggal_lahir)->y;
        $bln = $sekarang->diff($tanggal_lahir)->m;
        $tgl = $sekarang->diff($tanggal_lahir)->d;
        echo "<p>Umur : ";
        echo $thn." Tahun ".$bln." Bulan ".$tgl." Hari";
         
        if ($job=='Staff') {
            echo "<p>Pekerjaan : $job</p> ";
            echo "<p>Gajinya : Rp. 4.000.000/bulan</p>";
        }
        elseif ($job=="Teknisi") {
            echo "<p>Pekerjaan : $job</p> ";
            echo "<p>Gajinya : Rp. 3.300.000/bulan</p>";
        }
        elseif ($job=="Marketing") {
            echo "<p>Pekerjaan : $job</p> ";
            echo "<p>Gajinya : Rp. 4.500.000/bulan</p>";
        }
        else {
            echo "<p>Pilih pekerjaan</p>";
        }
        echo "<br><br><p>&copy;" . date("Y") . " Panji Putra Pamungkas </p>";
    }
    ?>
		</form>
	</div>
</body>
</html>