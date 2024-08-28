<?php
include 'koneksi.php';
$notif = '';

if (isset($_POST['kirim'])) {
   
    $username = '';
    $query = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        
        $notif = "Harap Membuat Akun Terlebih Dahulu";
    } else {
       
        $notif = "Harap Membuat Akun Terlebih Dahulu";
    }
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
   
    #preloader {
      position: fixed;
      width: 100%;
      height: 100%;
      background: white;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.5rem;
      color: #333;
      z-index: 9999;
    }

   
    .hidden-content {
      display: none;
    }
  </style>
</head>
<body>

<div id="preloader">Web Sedang Di Muat...</div>
<form action="" method="POST">
<div id="mainContent" class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
    <section class="max-w-[968px] w-full mx-4">
        <p class="flex justify-center w-full mt-10">
            <img src="https://neluttu.github.io/gift-membership/gift.png" class="max-w-[100px] slide-in-elliptic-top-fwd">
        </p>
        <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Pilih Produk</h1>
        <ul class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row mb-10">
            <li class="pr-4 grow">
                <h2 class="mb-3 text-xl font-[800] mt-3">Deposito</h2>
               <div class="max-w-lg text-lg" id="depositoText">
               Deposito adalah simpanan yang pencairannya hanya dapat dilakukan pada jangka waktu tertentu dan syarat-syarat tertentu.
                <span id="moreDepositoText" style="display: none;">
                Karakteristik deposito dari bank antara lain adalah: Deposito dapat dicairkan setelah jangka waktu berakhir.
                </span>  <button onclick="toggleText('moreDepositoText', this)" class="text-blue-500">Read more</button>
               </div>
            </li>
            <li class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                <label for="twelve" class="flex items-center justify-start w-full gap-2 p-3 font-semibold cursor-pointer">
                    <input type="radio" class="w-[20px] aspect-square" name="period" id="twelve"> <span class="text-xl">Ajukan Deposito</span>
                </label>
            </li>
        </ul>

        <ul class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row relative overflow-hidden mb-10">
            <li class="pr-4 overflow-hidden grow">
                <h2 class="mb-3 text-xl font-[800] mt-3">Pinjaman</h2>
                <div class="max-w-lg text-lg" id="depositoText">
                Dalam keuangan, pinjaman adalah pemindahan uang oleh satu pihak ke pihak lain dengan perjanjian untuk membayarnya kembali.
                <span id="morePinjamanText" style="display: none;">
                Penerima, atau peminjam, menanggung utang dan biasanya diharuskan membayar bunga atas penggunaan uang tersebut.
                </span> <button onclick="toggleText('morePinjamanText', this)" class="text-blue-500">Read more</button>
                </div>
            </li>
            <li class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                <label for="mtwelve" class="flex items-center justify-start w-full gap-2 p-3 font-semibold cursor-pointer">
                    <input type="radio" class="w-[20px] aspect-square" name="period" id="mtwelve"> <span class="text-xl">Ajukan Pinjaman</span>
                </label>
            </li>
        </ul>

        <ul class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row relative overflow-hidden mb-10">
            <li class="pr-4 overflow-hidden grow">
                <h2 class="mb-3 text-xl font-[800] mt-3">Tabungan</h2>
                <div class="max-lg text-lg" id="depositoText">
                Tabungan adalah simpanan uang di bank yang penarikannya hanya dapat dilakukan menurut syarat tertentu.
                </div>
                <span id="moreTabunganText" style="display: none;">
                Umumnya bank akan memberikan buku tabungan yang berisi informasi seluruh transaksi yang Anda lakukan dan kartu ATM lengkap dengan nomor pribadi (PIN).
                </span> <button onclick="toggleText('moreTabunganText', this)" class="text-blue-500">Read more</button>
            </li>
            <li class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                <label for="mtwelve" class="flex items-center justify-start w-full gap-2 p-3 font-semibold cursor-pointer">
                    <input type="radio" class="w-[20px] aspect-square" name="period" id="mtwelve"> <span class="text-xl">Ajukan Tabungan</span>
                </label>
            </li>
        </ul>
        <button name="kirim" type="sumbit" class="mb-20 px-20 py-4 text-white bg-blue-600 mx-auto block mt-5 rounded-xl text-lg transition-all duration-150 ease-in hover:bg-blue-400">
            Kirim
        </button>
    </section>
</div>
</form>

 <!-- Notifikasi -->
 <?php if ($notif) : ?>
    <section class="fixed inset-0 flex items-center justify-center z-50">
      <div class="rounded-3xl shadow-2xl bg-white p-8 text-center sm:p-12 max-w-md mx-auto">
        <p class="text-sm font-semibold uppercase tracking-widest text-blue-500">
          <?php echo $notif ? 'Berhasil' : 'Error'; ?>
        </p>

        <h2 class="mt-6 text-3xl font-bold"><?php echo $notif; ?></h2>

        <a
          class="mt-8 inline-block w-full rounded-full bg-blue-600 py-4 text-sm font-bold text-white shadow-xl"
          href="multiuser/register.php"
        >
          Lanjutkan Login
        </a>
      </div>
    </section>
    <script>
      setTimeout(hideNotification, 5000); 
    </script>
    <?php endif; ?>

<script>
function toggleText(id, btn) {
    var moreText = document.getElementById(id);
    if (moreText.style.display === "none") {
        moreText.style.display = "inline";
        btn.innerHTML = "Read less";
    } else {
        moreText.style.display = "none";
        btn.innerHTML = "Read more";
    }
}


window.addEventListener('load', function() {
    setTimeout(function() {
        var preloader = document.getElementById('preloader');
        var mainContent = document.getElementById('mainContent');
        
        preloader.style.display = 'none';
        mainContent.style.display = 'flex'; 
    }, 1000); 
});


function navigatePage() {
    var selectedOption = document.querySelector('input[name="period"]:checked');
    
    if (!selectedOption) {
        alert('Harap memilih salah satu dari tiga pilihan sebelum melanjutkan.');
    } else {
        window.location.href = "multiuser/register.php";
    }
}
</script>
</body>
</html>
