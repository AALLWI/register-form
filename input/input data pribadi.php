<?php
include '../koneksi.php';

if (isset($_POST['kirim'])) {
    $namaLengkap = $_POST['firstName'];
    $identitas = $_POST['Kartu_Identitas'];
    $nomorIdentitas = $_POST['Nomor_Identitas'];
    $alamat = $_POST['Alamat'];
    $alamatDetail = $_POST['alamat_detail'];
    $tanggalLahir = $_POST['Tanggal_Lahir'];
    $kota = $_POST['kota'];
    $kelamin = $_POST['kelamin'];
    $namaIbuKandung = $_POST['nama_ibu_kandung'];
    $agama = $_POST['Agama'];
    $kewarnegaraan = $_POST['Kewarnegaraan'];
    $nomorNPWP = $_POST['Nomor_NPWP'];
    $pendidikanTerakhir = $_POST['Pendidikan_Terakhir'];
    $nomorTelepon = $_POST['Nomor_Telepon'];
    $gmail = $_POST['Gmail'];
    $statusTempatTinggal = $_POST['Status_Tempat_Tinggal'];
    $tujuanPembukaanRekening = $_POST['Tujuan_Pembukaan_Rekening'];

    $signatureData = $_POST['signature-data'];
    $signatureFileName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $namaLengkap) . '.png';
    $signatureFilePath = 'pict tanda tangan/' . $signatureFileName;

    if (!file_exists('pict tanda tangan')) {
        mkdir('pict tanda tangan', 0777, true);
    }

    $base64String = preg_replace('#^data:image/\w+;base64,#i', '', $signatureData);
    if (file_put_contents($signatureFilePath, base64_decode($base64String))) {
        $query = "INSERT INTO pembukaan_rekening 
                  (Nama_Lengkap, Kartu_Identitas, Nomor_Identitas, Alamat, Kelurahan_Kecamatan_Kota, Tanggal_Lahir, Kota, Jenis_Kelamin, Nama_Ibu, Agama, Kewarnegaraan, NPWP, Pendidikan_Terakhir, Nomor_Telepon, Gmail, Status_Tempat_Tinggal, Tujuan_Pembukaan_Rekening, signature_path) 
                  VALUES 
                  ('$namaLengkap', '$identitas', '$nomorIdentitas', '$alamat', '$alamatDetail', '$tanggalLahir', '$kota', '$kelamin', '$namaIbuKandung', '$agama', '$kewarnegaraan', '$nomorNPWP', '$pendidikanTerakhir', '$nomorTelepon', '$gmail', '$statusTempatTinggal', '$tujuanPembukaanRekening', '$signatureFileName')";

        if (mysqli_query($conn, $query)) {
            header('Location: ../multiuser/nasabah.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal menyimpan tanda tangan.";
    }
}
?>
