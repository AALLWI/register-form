<?php
include '../koneksi.php';

if (isset($_POST['kirim'])) {

    $pekerjaan = isset($_POST['Pekerjaan']) ? $_POST['Pekerjaan'] : '';
    $berdiriperusahaan = isset($_POST['Tanggal_Berdirinya_Perusahaan']) ? $_POST['Tanggal_Berdirinya_Perusahaan'] : '';
    $jabatan = isset($_POST['Jabatan']) ? $_POST['Jabatan'] : '';
    $mulaibekerja = isset($_POST['Mulai_Bekerja']) ? $_POST['Mulai_Bekerja'] : '';
    $alamatkantor = isset($_POST['Alamat_Kantor']) ? $_POST['Alamat_Kantor'] : '';
    $nokantor = isset($_POST['No_Telp_Kantor']) ? $_POST['No_Telp_Kantor'] : '';
    $pedapatanperbulan = isset($_POST['Pendapatan_Perbulan']) ? $_POST['Pendapatan_Perbulan'] : '';
    $sumberpendapatan = isset($_POST['Sumber_Pendapatan']) ? $_POST['Sumber_Pendapatan'] : '';

    $query = "INSERT INTO informasi_Pekerjaan (
    Pekerjaan, Berdirinya_Perusahaan, Jabatan, Mulai_Bekerja, Alamat_Kantor, No_Telpon_Kantor,
    Pendapatan_Perbulan, Sumber_Pendapatan
    ) VALUES (
    '$pekerjaan', '$berdiriperusahaan', '$jabatan', '$mulaibekerja', '$alamatkantor', 
    '$nokantor', '$pedapatanperbulan', '$sumberpendapatan'
    )";

    
if (mysqli_query($conn, $query)) {
    $notifikasi = "Data Terkirim";
} else {
    $notifikasi = "Error: " . mysqli_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $pekerjaan = $_POST['Pekerjaan'];
    $jabatan = $_POST['Jabatan'];
   
    header('Location: ' . $_SERVER['PHP_SELF']); 
    exit;
}
}
?>