<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP </title>
</head>
<body>
 
	<h2>tampilan data pribadi</h2>
	<table border="1">
    <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Identitas</th>
            <th>Nomor Identitas</th>
            <th>Alamat</th>
            <th>Kelurahan/Kecamatan/Kota</th>
            <th>Tanggal Lahir</th>
            <th>Kota</th>
            <th>Jenis Kelamin</th>
            <th>Nama Ibu Kandung</th>
            <th>Agama</th>
            <th>Kewarnegaraan</th>
            <th>NPWP</th>
            <th>Pendidikan Terakhir</th>
            <th>Nomor Telepon</th>
            <th>Gmail</th>
            <th>Status Tempat Tinggal</th>
            <th>Tujuan Pembukaan Rekening</th>
        </tr>
		<?php 
		$no = 1;
		$data = mysqli_query($conn,"select * from pembukaan_rekening");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['Nama_Lengkap']; ?></td>
				<td><?php echo $d['Kartu_Identitas']; ?></td>
				<td><?php echo $d['Nomor_Identitas']; ?></td>
                <td><?php echo $d['Alamat']; ?></td>
                <td><?php echo $d['Kelurahan_Kecamatan_Kota']; ?></td>
                <td><?php echo $d['Tanggal_Lahir']; ?></td>
                <td><?php echo $d['Kota']; ?></td>
                <td><?php echo $d['Jenis_Kelamin']; ?></td>
                <td><?php echo $d['Nama_Ibu']; ?></td>
                <td><?php echo $d['Agama']; ?></td>
                <td><?php echo $d['Kewarnegaraan']; ?></td>
                <td><?php echo $d['NPWP']; ?></td>
                <td><?php echo $d['Pendidikan_Terakhir']; ?></td>
                <td><?php echo $d['Nomor_Telepon']; ?></td>
                <td><?php echo $d['Gmail']; ?></td>
                <td><?php echo $d['Status_Tempat_Tinggal']; ?></td>
                <td><?php echo $d['Tujuan_Pembukaan_Rekening']; ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
    
</body>
</html>
