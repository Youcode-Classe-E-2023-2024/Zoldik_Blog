<?php
include 'partials/header.php';

?>
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<!-- Navbar -->

<div class="flex h-screen">
    <?php
    if (isset($_SESSION['acc_exist'])) { ?>
        <script>alert('<?= $_SESSION['acc_exist']; ?>');</script>
        <?php
        unset($_SESSION['acc_exist']);
    }?>

    <div class="w-[25%] h-screen from-sky-950 text-white bg-gradient-to-b bg-sky-800">
        <img src="img/logo.png" alt="" class="m-10 h-10">
        <div class="opacity-80 bg-none" id="l">
            <p class="w-full p-4 pl-10 my-2  text-2xl hover:cursor-pointer">Dashboard</p>
            <p class="w-full p-4 pl-10 my-2  text-2xl hover:cursor-pointer">Add Users</p>
            <div class="my-4">
                <a href="add-post.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70">Add Article</a>
            </div>
            <div class="my-8">
                <a href="articles.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70">Articles</a>
            </div>
            <div class="my-8">
                <a href="categories.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70">Categories</a>
            </div>
        </div>
        <form action="#" method="post">
        <button name="admin_logout_btn" class="text-start hover:opacity-70 w-full p-4 pl-10 my-2 text-red-500 font-bold text-xl">Log Out</button>
        </form>
    </div>

    <div class="w-full">

        <div class="container mx-auto p-8" id="div1">
            <!-- Statistics Section -->
            <h2 class="text-3xl font-bold mb-4">Statistics</h2>
            <section class="flex justify-between">
                <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                    <img src="img/users.png" alt="" class="rounded-full h-16">
                    <section class="w-[70%]">
                        <p class="text-xl"></p>
                        <p class="text-lg">Clients</p>
                    </section>
                </section>
                <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                    <img src="img/profile.png" alt="" class="rounded-full h-16">
                    <section class="w-[70%]">
                        <p class="text-xl"></p>
                        <p class="text-lg">Sellers</p>
                    </section>
                </section>
                <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                    <img src="img/products.png" alt="" class="rounded-full h-16">
                    <section class="w-[70%]">
                        <p class="text-xl"></p>
                        <p class="text-lg">Available Products</p>
                    </section>
                </section>
            </section>
            <!-- User List Section -->
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
            <!-- end -->
        </div>

        <div id="div2" class="m-10">
        <form method="post" action="add_muliple.php" enctype="multipart/form-data" class="flex flex-col justify-end p-5 shadow-sm rounded-lg mx-auto">
            <div class="flex justify-end">
                <p id="btn_add" class="w-fit m-2 text-white bg-green-500 rounded p-2 cursor-pointer hover:opacity-80">+</p>
                <p id="btn_remove" class="w-fit m-2 bg-red-500 rounded text-white p-2 cursor-pointer hover:opacity-80">-</p>
            </div>
                <div class=" flex justify-end">
                    <button name="btn" class="bg-green-500 text-white px-4 py-2 rounded mb-4 hover:opacity-80">Add Users</button>
                </div>
            <input type="hidden" value="" id="i" name="i">
            <div class="flex flex-col">
                <div class="flex justify-between">
                    <div class="relative z-0 w-fit mb-5 group">
                        <input type="text" name="firstname-0" id="floating_password" class="w-fit block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">firstname</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group w-fit">
                        <input type="text" name="lastname-0" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">lastname</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group w-fit">
                        <input type="text" name="username-0" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">username</label>
                    </div>
                    <div class="relative z-0 w-fit mb-5 group">
                        <input type="text" name="email-0" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">email</label>
                    </div>
                    <div class="relative z-0 w-fit mb-5 group">
                        <input type="password" name="password-0" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">password</label>
                    </div>
                </div>
                <div class="flex w-full justify-end items-center">
                    <div class="relative w-full mb-6">
                        <label for="multiple_files" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Choose Profile Picture</label>
                        <div class="mt-2 flex items-center">
                            <label for="fileInput" class="relative cursor-pointer bg-white dark:bg-gray-800 py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200">
                                <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                Browse
                                </span>
                                <input id="fileInput" type="file" name="avatar-0" accept="image/*" required multiple class="hidden">
                            </label>
                            <span id="file-chosen" class="ml-3 text-gray-600 dark:text-gray-400">No file chosen</span>
                        </div>
                    </div>
                    <select name="is_admin-0" class="input-field w-fit rounded-2xl h-10 mx-8">
                        <option value="admin">Admin</option>
                        <option value="announcer">Announcer</option>
                    </select>
                </div>
            </div>

            <div id="forms" class="col-span-2 my-2">
                <!-- Add inputs dynamically here after pressing + -->
            </div>
            </form>
        </div>
    </div>

</div>

<script>
    const p = document.querySelectorAll('div#l p');
    const d1 = document.querySelector('#div1');
    const d2 = document.querySelector('#div2');

    const div = [d1, d2];

    function lowerOpacity() {
        p.forEach((element)=>{
            element.style.opacity = '.7';
            element.style.background = 'none';
        });
    }
    lowerOpacity();

    function hideDivs() {
        div.forEach((element) => {
            element.style.display = 'none';
        });
    }
    hideDivs();

    div[0].style.display = 'block';
    p[0].style.backgroundColor = 'rgb(8 47 73)';
    p[0].style.opacity = '1';

    p.forEach((ele)=>{
        ele.addEventListener('click', () => {
            lowerOpacity();
            ele.style.opacity = '1';
            ele.style.backgroundColor = 'rgb(8 47 73)';

            switch (ele) {
                case ele = p[0]:
                    hideDivs();
                    div[0].style.display = 'block';
                    break;

                case ele = p[1]:
                    hideDivs();
                    div[1].style.display = 'block';
                    break;
            }
        });
    })
</script>

<script src="script.js"></script>
</body>
</html>