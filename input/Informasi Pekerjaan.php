<?php 
include '../koneksi.php';
include 'input data pekerjaan.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   
<div class="max-w-lg mx-auto  bg-white dark:bg-gray-800 rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-xl font-bold text-center text-gray-700 dark:text-gray-200 mb-8">Informasi Pekerjaan </h1>
    <form id="form" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" class="w-full flex flex-col gap-4">
    <div class="flex items-start flex-col justify-start mt-4">
            <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Pekerjaan :</label>
            <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
            <select id="Pekerjaan" name="Pekerjaan" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
                <option  value="-">- </option>
                <option value="PNS">PNS</option>
                <option value="WIRASWASTA">Wiraswasta</option>
                <option value="PELAJAR">Pelajar</option>
            </select>
            </div>

            <div class="flex items-start flex-col justify-start">
                <label  class="text-sm text-gray-700 dark:text-gray-200 mr-2">Tanggal Berdirinya Perusahaan:</label>
                <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
                <input type="text" name="Tanggal_Berdirinya_Perusahaan" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
              </div>
        

      <div class="flex items-start flex-col justify-start">
        <label  class="text-sm text-gray-700 dark:text-gray-200 mr-2">Jabatan :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" id="Jabatan" name="Jabatan" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label  class="text-sm text-gray-700 dark:text-gray-200 mr-2">Mulai Bekerja :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" id="Mulai_Bekerja" name="Mulai_Bekerja" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Alamat Kantor :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" id="Alamat_Kantor" name="Alamat_Kantor" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">No Telp Kantor :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" id="No_Telp_Kantor" name="No_Telp_Kantor" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Pendapatan Perbulan :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select id="Pendapatan_Perbulan" name="Pendapatan_Perbulan" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value=" <1 Juta "> <1 Juta </option> 
            <option value=" >2 "> >2 Juta </option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Sumber Pendapatan :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select id="Sumber_Pendapatan" name="Sumber_Pendapatan" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Gaji">Gaji</option> 
            <option value="Lainnya">--Lainnya--</option>        
        </select>
      </div>


      <button type="submit" id="submitButton" value="submit" name="kirim" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">
  Lanjutkan Pembukaan >>>
</button>
  
    
    
    
    </div>
  </div>
  </div>
    </form>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const fields = [
        'Pekerjaan', 'Tanggal_Berdirinya_Perusahaan', 'Jabatan', 'Mulai_Bekerja', 'Alamat_Kantor',
        'No_Telp_Kantor', 'Pendapatan_Perbulan', 'Sumber_Pendapatan'
    ];

    fields.forEach(function(field) {
        const input = document.getElementsByName(field)[0];
        if (input) {
            input.addEventListener('input', function() {
                const errorMessage = input.previousElementSibling;
                if (input.value !== '' && input.value !== '-') {
                    input.style.borderColor = '';
                    errorMessage.classList.add('hidden');
                }
            });
        }
    });

    document.getElementById('form').addEventListener('submit', function(event) {
        let valid = true;
        let firstInvalidField = null;

        fields.forEach(function(field) {
            const input = document.getElementsByName(field)[0];
            const errorMessage = input.previousElementSibling;

            if (input.value === '' || input.value === '-') {
                valid = false;
                input.style.borderColor = 'red'; 
                errorMessage.classList.remove('hidden'); 

                if (!firstInvalidField) {
                    firstInvalidField = input; 
                }
            } else {
                input.style.borderColor = ''; 
                errorMessage.classList.add('hidden');
            }
        });

        if (!valid) {
            event.preventDefault(); 
            if (firstInvalidField) {
                firstInvalidField.focus(); 
            }
        }
    });
});



</script>  
</body>
</html>