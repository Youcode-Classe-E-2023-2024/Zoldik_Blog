<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Index</title>
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
      <!-- Include jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <!-- Include DataTables CSS and JS -->
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
   </head>
   <body class="bg-gray-100 m-4">
      <div class="flex h-fit justify-center">
         <!-- Buttons -->
         <div class="">
            <button id="btn_add" class="m-2 text-white bg-gray-400 rounded p-2">+</button>
            <button id="btn_remove" class="m-2 bg-gray-300 rounded p-2">-</button>
         </div>
         <!-- Form -->
         <form action="add_muliple.php" method="post" class="bg-white p-4 rounded-lg shadow-lg" enctype="multipart/form-data">
            <?php
               session_start();
               if (isset($_SESSION['acc_exist'])) { ?>
            <p class="text-red-400"><?= $_SESSION['acc_exist'] ?></p>
            <?php
               unset($_SESSION['acc_exist']);
               } ?>
            <input type="submit" value="Submit" class="btn-submit text-white bg-green-500 p-2 rounded hover:opacity-70 cursor-pointer" name="btn">
            <!-- Hidden Input for Count -->
            <input type="hidden" value="" id="i" name="i">
            <div class="">
               <div class="">
                  <!-- Initial Inputs -->
                  <div class="">
                     <input type="text" placeholder="First Name" class="input-field" required name="firstname-0">
                     <input type="text" placeholder="Last Name" class="input-field" required name="lastname-0">
                     <input type="text" placeholder="Username" class="input-field" required name="username-0">
                     <input type="email" placeholder="Email" class="input-field" required name="email-0">
                     <input type="password" placeholder="Password" class="input-field" required name="password-0">
                     <input type="file" style="width: 150px;" accept="image/*" required name="avatar-0">
                     <select name="is_admin-0" class="input-field">
                        <option value="admin">Admin</option>
                        <option value="announcer">Announcer</option>
                     </select>
                  </div>
                  <!-- Additional Inputs -->
                  <div id="forms" class="col-span-2 my-2">
                     <!-- Add inputs dynamically here after pressing + -->
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="max-w-2xl mx-auto">
         <h1 class="text-2xl font-bold mb-4">Users</h1>
         <!-- Table -->
         <table id="usersTable" class="min-w-full bg-white border border-gray-300">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Profile</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody></tbody>
         </table>
         <script>
    $(document).ready(function() {
        // Initialize DataTable
        var usersTable = $('#usersTable').DataTable({
            ajax: 'json.php',
            columns: [
                { data: 'id' },
                { data: 'avatar', render: function(data) { return '<img src="' + data + '" class="h-16 w-16 rounded-full">'; } },
                { data: 'firstname' },
                { data: 'lastname' },
                { data: 'username' },
                { data: 'email' },
                { data: 'is_admin', render: function(data) { return data == 1 ? 'Admin' : 'Announcer'; } },
                {
                    data: 'id',
                    render: function(data) {
                        return '<form action="edit.php" method="post">' +
                            '<button name="btn" class="text-blue-500 hover:underline mr-2">Edit</button>' +
                            '<input name="id" type="hidden" value="' + data + '">' +
                            '</form>' +
                            '<button class="delete_btn text-red-500 hover:underline focus:outline-none focus:ring focus:border-red-300" data-id="' + data + '">Delete</button>';
                    }
                }
            ]
        });

        // Event delegation for delete button
        $('#usersTable').on('click', '.delete_btn', function() {
            var userId = $(this).data('id');
            console.log('Delete button clicked for user ID:', userId);
            
            // Perform your delete logic here or show a confirmation dialog
            var confirmDelete = confirm('Are you sure you want to delete user with ID ' + userId + '?');

            if (confirmDelete) {
                // Send AJAX request to delete_process.php
                $.ajax({
                    url: 'delet_process.php',
                    method: 'POST',
                    data: { delete_btn: true, id_user: userId },
                    success: function(response) {
                        console.log(response);
                        
                        // Remove the row from the DataTable
                        usersTable.row($(this).closest('tr')).remove().draw();
                        
                        // Reload the page after successful deletion
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Error deleting user:', error);
                    }
                });
            }
        });
    });
</script>


      </div>
      <div class="deleteAlert hidden fixed inset-0 bg-black bg-opacity-50 justify-center items-center">
         <div class="bg-white p-4 rounded-md w-1/3">
            <p class="text-lg font-semibold mb-4">Are you sure you want to delete this user?</p>
            <div class="flex justify-end">
               <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring focus:border-gray-300 mr-2" onclick="toggleDeleteAlert()">Cancel</button>
               <form id="deleteForm" action="delet_process.php" method="post">
                  <button name="delete_btn" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300" onclick="document.getElementById('deleteForm').submit()">Delete</button>
                  <input id="id_user" name="id_user" type="hidden" value="">
               </form>
            </div>
         </div>
      </div>
      <script src="main.js"></script>
   </body>
</html>