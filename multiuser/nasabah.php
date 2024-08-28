<?php
include '../koneksi.php';
session_start();

$tombol_disabled = false;
$berhasil_terkirim = false;


if (isset($_SESSION['data_submitted']) && $_SESSION['data_submitted'] === true) {
   
    $berhasil_terkirim = true; 
}


if (isset($_POST['kirim'])) {
   
    $_SESSION['data_submitted'] = true;

   
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .tooltip {
            display: none;
            position: absolute;
            top: -4rem; 
            left: 50%;
            transform: translateX(-50%);
            background-color: #fefcbf;
            color: #d97706;
            padding: 0.5rem;
            border-radius: 0.375rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
            white-space: nowrap;
        }
        .tooltip.active {
            display: block;
        }
        .notification {
            display: none;
            background-color: #d1fae5;
            color: #065f46; 
            padding: 0.5rem 1rem; 
            border-radius: 0.375rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            right: 1rem;
            bottom: -2.5rem;
            max-width: 250px; 
            font-size: 0.875rem; 
            text-align: center; 
        }
        .notification.active {
            display: block;
        }
    </style>
</head>
<body>
<div class="bg-gray-100 min-h-screen flex flex-col">
   
    <div class="header bg-white h-16 px-10 py-8 border-b-2 border-gray-200 flex items-center justify-between">
        <div class="flex items-center space-x-2 text-gray-400">
            <span class="text-green-700 tracking-wider font-thin text-md"><a href="#">Home</a></span>   
        </div>
    </div>
    <div class="header my-3 h-12 px-10 flex items-center justify-between">
        <h1 class="font-medium text-2xl">Welcome User</h1>
    </div>

   
    <div class="flex flex-col mx-3 mt-6 lg:flex-row">
        
        <div class="w-full lg:w-1/3 m-1">
            <form class="w-full bg-white shadow-md p-6 relative" method="post">
                <div class="flex justify-end space-x-4">
                    
                 
                    <?php if ($tombol_disabled): ?>
                    <div id="notification" class="tooltip active">
                        Anda hanya bisa mengirim data satu kali!
                    </div>
                    <?php endif; ?>

                    <button type="button" name="kirim" id="register-btn" 
                        class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md relative"
                        <?php echo $tombol_disabled ? 'disabled' : ''; ?> 
                        onmouseover="showTooltip()"
                        onclick="location.href='../input/Informasi Pribadi.php';">
                        Register Data Pribadi
                    </button>
                    <button type="button" id="change-color" 
                        class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md"
                        onclick="location.href='../input/Informasi Pekerjaan.php';">
                        Register Informasi Pekerjaan
                    </button>
                </div>
            </form>
        </div>

       
        <div class="w-full lg:w-2/3 m-1 bg-white shadow-lg text-lg rounded-sm border border-gray-200">
            <div class="overflow-x-auto rounded-lg p-3">
                <input type="text" id="searchInput" onkeyup="searchFunction()" placeholder="Search for names.." class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d] mb-4">
                <table class="table-auto w-full" id="dataTable">
                    <thead class="text-sm font-semibold uppercase text-gray-800 bg-gray-50 mx-auto">
                        <tr>
                            <th>No</th>
                            <th class="p-2">
                                <div class="font-semibold">Nama Lengkap</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Tanggal Lahir</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Keterangan</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($conn, "SELECT * FROM pembukaan_rekening");
                        while ($d = mysqli_fetch_array($data)) {
                        ?> 
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['Nama_Lengkap']; ?></td>
                            <td><?php echo $d['Tanggal_Lahir']; ?></td>
                            <td class="relative p-2">
                                <?php if ($berhasil_terkirim): ?>
                                <div class="notification active flex justify-center">
                                    Berhasil Terkirim
                                </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function showTooltip() {
    var notification = document.getElementById('notification');
    
    if (notification) {
        notification.classList.add('active');
        setTimeout(function() {
            notification.classList.remove('active');
        }, 2000);
    }
}
</script>

</body>
</html>
