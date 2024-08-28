<?php
include '../koneksi.php';
$notifikasi = '';
$error = false;

if (isset($_POST['kirim'])) {
    $users = isset($_POST['user']) ? $_POST['user'] : '';
    $pass = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($users) || empty($pass)) {
        $notifikasi = "Username dan Password harus diisi.";
        $error = true;
    } else {
       
        $users = mysqli_real_escape_string($conn, $users);
        $pass = mysqli_real_escape_string($conn, $pass);

      
        $query = "INSERT INTO users (username, password) VALUES ('$users', '$pass')";
        
        if (mysqli_query($conn, $query)) {
            $notifikasi = "Terima Kasih Sudah Melakukan Registrasi.";
        } else {
            $notifikasi = "Error: " . mysqli_error($conn);
            $error = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <form action="" method="POST">
        <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
            <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-3xl w-50 max-w-md">
                <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">Selamat Datang</div>
                <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">Buat Username Dan Password Anda</div>

                <div class="mt-10">
                    <div class="flex flex-col mb-5">
                        <label for="user" class="mb-1 text-xs tracking-wide text-gray-600">Username:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <i class="fas fa-at text-blue-500"></i>
                            </div>
                            <input id="user" type="text" name="user" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Masukan User Anda" />
                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Password:</label>
                        <div class="relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <span><i class="fas fa-lock text-blue-500"></i></span>
                            </div>
                            <input id="password" type="text" name="password" class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Masukan Password Anda" />
                        </div>
                    </div>

                    <div class="flex w-full">
                        <button name="kirim" type="submit" class="flex mt-2 items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-500 hover:bg-blue-400 rounded-2xl py-2 w-full transition duration-150 ease-in">
                            <span class="mr-2 uppercase">Masuk</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <a href="#" target="_blank" class="inline-flex items-center text-gray-700 font-medium text-xs text-center">
                    <span class="ml-2">Sudah Mempunyai Akun?
                        <a href="register_verifikasi.php" class="text-xs ml-2 text-blue-500 font-semibold">Login Disini</a>
                    </span>
                </a>
            </div>
        </div>
    </form>

    <!-- Notifikasi -->
    <?php if ($notifikasi) : ?>
    <div class="fixed inset-0 flex items-center justify-center bg-gray-100 z-50">
        <div class="rounded-lg bg-gray-50 px-16 py-14">
            <div class="flex justify-center">
                <div class="rounded-full <?php echo $error ? 'bg-red-200' : 'bg-green-200'; ?> p-6">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full <?php echo $error ? 'bg-red-500' : 'bg-green-500'; ?> p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-white">
                            <?php if ($error) : ?>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            <?php else : ?>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            <?php endif; ?>
                        </svg>
                    </div>
                </div>
            </div>
            <h3 class="my-4 text-center text-3xl font-semibold text-gray-700"><?php echo $error ? 'Oops!!!' : 'Congratuation!!!'; ?></h3>
            <p class="w-[230px] text-center font-normal text-gray-600">
                <?php echo $notifikasi; ?>
            </p>
            <button onclick="<?php echo $error ? 'window.location.href=\'register.php\'' : 'window.location.href=\'register_verifikasi.php\''; ?>" class="mx-auto mt-10 block rounded-xl border-4 border-transparent bg-orange-400 px-6 py-3 text-center text-base font-medium text-orange-100 outline-8 hover:outline hover:duration-300">
                <?php echo $error ? 'Coba Lagi' : 'Lanjut Login'; ?>
            </button>
        </div>
    </div>
    <script>
        setTimeout(hideNotification, 5000);

        function hideNotification() {
            const notification = document.querySelector('.fixed.inset-0');
            notification.style.display = 'none';
        }
    </script>
    <?php endif; ?>

</body>
</html>
