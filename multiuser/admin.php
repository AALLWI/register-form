<?php
include '../koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    if ($id) {
        
        $sql = "UPDATE pembukaan_rekening SET Nama_Lengkap='$name', Tanggal_Lahir='$description' WHERE id='$id'";
    } else {
        
        $sql = "INSERT INTO pembukaan_rekening (Nama_Lengkap, Tanggal_Lahir) VALUES ('$name', '$description')";
    }

    mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM pembukaan_rekening WHERE id='$id'");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
 
  <div class="bg-gray-100">
   
    <div class="header bg-white h-16 px-10 py-8 border-b-2 border-gray-200 flex items-center justify-between">
        <div class="flex items-center space-x-2 text-gray-400">
            <span class="text-green-700 tracking-wider font-thin text-md"><a href="#">Home</a></span>
            <span>/</span>
            <span class="tracking-wide text-md"><span class="text-base">Categories</span></span>
            <span>/</span>
        </div>
    </div>
    <div class="header my-3 h-12 px-10 flex items-center justify-between">
        <h1 class="font-medium text-2xl">Welcome Administrator</h1>
    </div>

   
    <div class="flex flex-col mx-3 mt-6 lg:flex-row">
       
        <div class="w-full lg:w-1/3 m-1">
            <form class="w-full bg-white shadow-md p-6" id="categoryForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="categoryId">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" for="category_name">Category Name</label>
                        <input class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]" 
                               type="text" name="name" id="categoryName" placeholder="Category Name" required />
                    </div>
                    <div class="w-full px-3 mb-6">
                        <textarea rows="4" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none focus:border-[#98c01d]" 
                                  name="description" id="categoryDescription" required></textarea>
                    </div>                        
                    <div class="w-full px-3 mb-6">
                        <button class="appearance-none block w-full bg-green-700 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-600 focus:outline-none focus:bg-white focus:border-gray-500" 
                                type="submit">Save Category</button>
                    </div>
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
                            <th>Icon</th>
                            <th class="p-2">
                                <div class="font-semibold">Nama Lengkap</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Tanggal Lahir</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-center">Action</div>
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
                            <td><img src="https://cdn-icons-png.flaticon.com/128/456/456212.png" class="h-8 w-8 mx-auto" /></td>
                            <td><?php echo $d['Nama_Lengkap']; ?></td>
                            <td><?php echo $d['Tanggal_Lahir']; ?></td>
                            <td class="p-2">
                                <div class="flex justify-center">
                                    <button class="rounded-md hover:bg-green-100 text-green-600 p-2 flex justify-between items-center editBtn" data-id="<?php echo $d['id']; ?>" data-name="<?php echo $d['Nama_Lengkap']; ?>" data-description="<?php echo $d['Tanggal_Lahir']; ?>">
                                        <span>Edit</span>
                                    </button>
                                    <a href="?delete=<?php echo $d['id']; ?>" class="rounded-md hover:bg-red-100 text-red-600 p-2 flex justify-between items-center">
                                        <span>Delete</span>
                                    </a>
                                </div>
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
 
    function searchFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("dataTable");
      tr = table.getElementsByTagName("tr");

      for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].classList.remove('hidden');
          } else {
            tr[i].classList.add('hidden');
          }
        }       
      }
    }

    
    document.querySelectorAll('.editBtn').forEach(button => {
      button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const description = button.getAttribute('data-description');

        document.getElementById('categoryId').value = id;
        document.getElementById('categoryName').value = name;
        document.getElementById('categoryDescription').value = description;
      });
    });
  </script>
</body>
</html>
