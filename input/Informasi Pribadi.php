<?php
include '../koneksi.php';
include 'input data pribadi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembukaan Rekening</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <style>
       canvas {
            border: 1px solid #ccc;
            border-radius: 0.5rem;
            width: 100%;
            height: 300px;
        }

        @media (min-width: 768px) {
            canvas {
                height: 400px;
            }
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
        }

        .modal.show {
            display: flex;
        }
  </style>
<div class="max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
    <h1 class="text-xl font-bold text-center text-gray-700 dark:text-gray-200 mb-8">Pembukaan Rekening</h1>
    <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="w-full flex flex-col gap-4">
      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Nama Lengkap/Alias :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" id="firstName" name="firstName" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start mt-4">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Identitas :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="Kartu_Identitas" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="KTP">KTP</option>
            <option value="SIM">SIM</option>
            <option value="PASPOR">PASPOR</option>
            <option value="KARTU PELAJAR">KARTU PELAJAR</option>
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Nomor Identitas :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" name="Nomor_Identitas" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Alamat:</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" name="Alamat" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Kelurahan/Kecamatan/Kota/Kode POS :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="alamat_detail" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Rajabasa/Rajabasa/Kota Bandar Lampung/123123">Rajabasa/Rajabasa/Kota Bandar Lampung</option> 
            <option value="Rajabasa/Rajabasa/Kota Bandar Lampung/123123">Rajabasa/Rajabasa/Kota Bandar Lampung</option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Tanggal Lahir:</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="date" name="Tanggal_Lahir" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Kota :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="kota" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Bandar Lampung">Bandar Lampung</option> 
            <option value="Palembang">Palembang</option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Jenis Kelamin :</label>
         <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="kelamin" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Laki Laki">Laki Laki</option> 
            <option value="Perempuan">Perempuan</option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Nama Gadis Ibu Kandung :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" name="nama_ibu_kandung" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Agama :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="Agama" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Islam">Islam</option> 
            <option value="Kristen">Kristen</option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Kewarnegaraan :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="Kewarnegaraan" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Indonesia">Indonesia</option> 
            <option value="Asing">Asing</option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Nomor NPWP :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" name="Nomor_NPWP" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Pendidikan Terakhir :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="Pendidikan_Terakhir" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="SD">SD</option> 
            <option value="SMP">SMP</option>
            <option value="SMA/K">SMA/K</option>
            <option value="S1">S1</option>        
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Nomor Telepon :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" name="Nomor_Telepon" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Gmail :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <input type="text" name="Gmail" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Status Tempat Tinggal :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="Status_Tempat_Tinggal" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Milik Sendiri">Milik Sendiri</option> 
            <option value="Milik Keluarga">Milik Keluarga</option>
            <option value="Sewa/Kontrakan">Sewa/Kontrakan</option>       
        </select>
      </div>

      <div class="flex items-start flex-col justify-start">
        <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Tujuan Pembukaan Rekening :</label>
        <span class="error-message text-red-500 text-xs hidden">Mohon Isi Bagian Ini.</span>
        <select name="Tujuan_Pembukaan_Rekening" class="w-full px-3 dark:text-gray-200 dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            <option value="-">-</option>
            <option value="Simpanan">Simpanan</option> 
            <option value="Kredit">Kredit</option>
            <option value="Investasi">Investasi</option>
            <option value="Transaksi">Transaksi</option>        
        </select>
      </div>

      <!-- tanda tangan -->
       
      <div class="flex items-start flex-col justify-start mt-4">
          <label class="text-sm text-gray-700 dark:text-gray-200 mr-2">Tanda Tangan:</label>
          <button type="button" id="open-signature-pad" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">
              Tambahkan Tanda Tangan
          </button>
          <img id="signature-image" src="" alt="Tanda Tangan" class="mt-4 hidden"/>
      </div>
      <input type="hidden" id="signature-data" name="signature-data" />

      <button type="submit" id="submitButton" value="submit" name="kirim" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">
          Selesaikan Registrasi>>>
      </button>
    </form>
</div>


<div id="signature-modal" class="modal">
    <div class="modal-content">
        <canvas id="signature-pad" class="signature-pad"></canvas>
        <div class="flex justify-between mt-4">
            <button id="submit-signature" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md">
                Save Signature
            </button>
            <div class="space-x-2">
                <button type="button" id="change-color" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">Change Color</button>
                <button type="button" id="clear" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md">Clear</button>
            </div>
        </div>
    </div>
</div>

      <!-- tanda tangan -->
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    const signatureModal = document.getElementById('signature-modal');
    const openSignaturePadButton = document.getElementById('open-signature-pad');
    const submitSignatureButton = document.getElementById('submit-signature');
    const signatureImage = document.getElementById('signature-image');
    const signatureDataInput = document.getElementById('signature-data');

    openSignaturePadButton.addEventListener('click', function() {
        signatureModal.classList.add('show');
        resizeCanvas(); 
    });

    const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)'
    });

    function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext('2d').scale(ratio, ratio);
        signaturePad.clear(); 
    }

    window.addEventListener('resize', resizeCanvas);

    submitSignatureButton.addEventListener('click', function() {
        const dataURL = signaturePad.toDataURL('image/png');
        signatureImage.src = dataURL;
        signatureImage.classList.remove('hidden');
        signatureDataInput.value = dataURL; 
        signatureModal.classList.remove('show');
    });

    document.getElementById('clear').addEventListener('click', function() {
        signaturePad.clear();
    });

    document.getElementById('change-color').addEventListener('click', function() {
        signaturePad.penColor = signaturePad.penColor === 'black' ? 'blue' : 'black';
    });

    
    signatureModal.addEventListener('click', function(e) {
        if (e.target === signatureModal) {
            signatureModal.classList.remove('show');
        }
    });
});


submitSignatureButton.addEventListener('click', function() {
    const dataURL = signaturePad.toDataURL('image/png');
    signatureImage.src = dataURL;
    signatureImage.classList.remove('hidden');
    document.getElementById('signature-data').value = dataURL;
    signatureModal.classList.remove('show');
});


document.addEventListener('DOMContentLoaded', function() {
    const fields = [
        'firstName', 'Identitas', 'Nomor_Identitas', 'Alamat', 'alamat_detail',
        'Tanggal_Lahir', 'kota', 'kelamin', 'nama_ibu_kandung', 'Agama', 
        'Kewarnegaraan', 'Nomor_NPWP', 'Pendidikan_Terakhir', 'Nomor_Telepon',
        'Gmail', 'Status_Tempat_Tinggal', 'Tujuan_Pembukaan_Rekening'
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
