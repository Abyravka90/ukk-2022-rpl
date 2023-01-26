<?php
if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $text = $nik . "," . $nama . "\n";
    if ($nik == '' && $nama == '') {
        echo
        "<script>
        alert('data harus diisi')
        </script>";
    } else {
        $fp = fopen('config.txt', 'a+');
        fwrite($fp, $text);
        echo
        "<script>
        alert('data berhasil ditambahkan')
        </script>";
    }
} else if (isset($_POST['masuk'])) {
    $data = file_get_contents('config.txt');
    $contens = explode("\n", $data);
    foreach ($contens as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];
        if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            @session_start();
            header('location:home.php');
        } else {
            echo '<script>alert("NIK atau nama yang anda masukan salah!")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:LOGIN APLIKASI PEDULI DIRI:.</title>
</head>

<body>

    <form action="" method="post">
        <table align="center">
            <tr>
                <td>
                    <input name="nik" type="text" placeholder="masukan nik">
                </td>
            </tr>
            <tr>
                <td>
                    <input name="nama" type="text" placeholder="masukan nama lengkap">
                </td>
            </tr>
            <tr>
                <td><input name="daftar" type="submit" value="saya pengguna baru">
                    <input name="masuk" type="submit" value="masuk">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>