<?php
include '../config/database.php';
if (!isset($_SESSION['user-id'])) {
    header('location: ../dist/index.php');
}
$query = "SELECT id, title, description, category_id FROM articles WHERE is_deleted = 0";
$posts = mysqli_query($connection, $query);
$query_select_users = "SELECT * FROM users";
$exe_query_s_u = mysqli_query($connection, $query_select_users);
$query_select_categories = "SELECT * FROM categories";
$exe_query_s_c = mysqli_query($connection, $query_select_categories);
$current_id = $_SESSION['user-id'];
$query_current_user = "SELECT * FROM users WHERE id = $current_id";
$exe_current_user_q = mysqli_query($connection, $query_current_user);
$objUser = mysqli_fetch_assoc($exe_current_user_q);
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

    <div class="flex">
        <?php
        if (isset($_SESSION['acc_exist'])) { ?>
            <script>alert('<?= $_SESSION['acc_exist']; ?>');</script>
            <?php
            unset($_SESSION['acc_exist']);
        }?>

        <aside class="h-screen from-sky-950 text-white bg-gradient-to-b bg-sky-800 fixed" style="width: 20%;">
            <div class="flex mb-10 bg-emerald-500 bg-gradient-to-l from-cyan-900">
                <img src="../images/<?= $objUser['avatar']; ?>" class="my-2 h-16 rounded-r-xl hover:opacity-80" alt="">
                <div class="ml-4 flex flex-col justify-center">
                    <p class="text-2xl top-16 left-10"><?= $objUser['username']; ?></p>
                    <p class="top-28 text-blue-200 left-10"><?= $objUser['email']; ?></p>
                </div>
            </div>
            <div class="opacity-80 bg-none" id="l">
                <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] === true) { ?>
                <p class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer hover:opacity-100" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7">Manage Users</p>
                <div class="my-8">
                    <a href="categories.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70 hover:opacity-100">Manage Categories</a>
                </div>
                <p class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer " onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.7">Add Users</p>
                <p class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70 hover:opacity-100">Manage Articles</p>
                <?php } ?>
                <div class="my-4">
                    <a href="add-post.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70 hover:opacity-100">Add Article</a>
                <div class="my-8">
                    <a href="add-category.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70 hover:opacity-100">Add Category</a>
                </div>
                <div class="my-8">
                    <a href="../dist/index2.php" class="w-full p-4 pl-10 my-2 text-2xl hover:cursor-pointer opacity-70 hover:opacity-100">Home</a>
                </div>
            </div>

            <form action="signout.php" method="post">
                <button name="btnSO" class="text-start hover:opacity-70 w-full p-4 pl-10 my-2 text-red-500 font-bold text-xl ">Sign Out</button>
            </form>
        </aside>



        <main class="absolute w-[80%] p-8 right-0">

            <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] === true) { ?>
            <div id="div1">
                <!-- Statistics Section -->
                <h2 class="text-3xl font-bold mb-4">Statistics</h2>
                <section class="flex justify-between">
                    <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                        <div style="font-size: 35px;">&#9997;</div>
                        <section class="w-[70%]">
                            <p class="text-xl"><?= mysqli_num_rows($posts); ?></p>
                            <p class="text-lg">Number of Articles</p>
                        </section>
                    </section>
                    <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                        <div style="font-size: 35px;">&#128100;</div>
                        <section class="w-[70%]">
                            <p class="text-xl"><?= mysqli_num_rows($exe_query_s_u); ?></p>
                            <p class="text-lg">Number of Users</p>
                        </section>
                    </section>
                    <section class="mb-8 flex bg-white p-5 w-[30%] shadow-sm rounded-lg justify-between">
                        <div style="font-size: 35px;">&#128193;</div>
                        <section class="w-[70%]">
                            <p class="text-xl"><?= mysqli_num_rows($exe_query_s_c); ?></p>
                            <p class="text-lg">Number of Categories</p>
                        </section>
                    </section>
                </section>
                <!-- User List Section -->
                <div class="max-w-2xl mx-auto flex flex-col items-center">
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
                                    { data: 'avatar', render: function(data) { return '<img src="../' + data + '" class="h-16 w-16 rounded-full">'; } },
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
                <form method="post" action="add_muliple_users_process.php" enctype="multipart/form-data" class="flex flex-col justify-end p-5 shadow-sm rounded-lg mx-auto">
                    <div class="flex justify-end">
                        <p id="btn_add" class="w-fit m-2 text-white bg-green-500 rounded p-2 cursor-pointer hover:opacity-80">+</p>
                        <p id="btn_remove" class="w-fit m-2 bg-red-500 rounded text-white p-2 cursor-pointer hover:opacity-80">-</p>
                    </div>
                    <div class="flex justify-end">
                        <button name="btn" class="bg-green-500 text-white px-4 py-2 rounded mb-4 hover:opacity-80">Add Users</button>
                    </div>
                    <input type="hidden" value="" id="i" name="i">
                    <div class="flex flex-col">
                        <div class="flex justify-between">
                            <!-- First Name -->
                            <div class="relative z-0 w-fit mb-5 group">
                                <input type="text" name="firstname-0" id="floating_firstname" class="w-fit block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
                            </div>
                            <!-- Last Name -->
                            <div class="relative z-0 w-full mb-5 group w-fit">
                                <input type="text" name="lastname-0" id="floating_lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
                            </div>
                            <!-- Username -->
                            <div class="relative z-0 w-full mb-5 group w-fit">
                                <input type="text" name="username-0" id="floating_username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                            </div>
                            <!-- Email -->
                            <div class="relative z-0 w-fit mb-5 group">
                                <input type="text" name="email-0" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            </div>
                            <!-- Password -->
                            <div class="relative z-0 w-fit mb-5 group">
                                <input type="password" name="password-0" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                        </div>
                        <!-- File Upload and Role Selection -->
                        <div class="flex w-full justify-end items-center">
                            <!-- File Upload -->
                            <div class="relative w-full mb-6">
                                <div class="mt-2 flex items-center">
                                    <label for="fileInput" class="relative cursor-pointer bg-white dark:bg-gray-800 py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                        Browse
                                    </span>
                                        <input id="fileInput" type="file" name="avatar-0" accept="image/*" required multiple class="hidden" onchange="updateFileName(this)">
                                    </label>
                                    <span id="file-chosen" class="ml-3 text-gray-600 dark:text-gray-400">No file chosen</span>
                                </div>
                                <script>
                                    function updateFileName(input) {
                                        const fileName = input.files && input.files.length > 0 ? input.files[0].name : "No file chosen";
                                        document.getElementById("file-chosen").textContent = fileName;
                                    }
                                </script>
                            </div>
                            <!-- Role Selection -->
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
            <?php } ?>

            <div id="div3">

                <a href="deleted_articles.php">
                    <div class="text-2xl bg-white shadow-black text-gray-600 w-fit p-2 rounded-md hover:opacity-70">Check Deleted Articles &#128465;</div>
                </a>
                <div class="div_articles font-sans bg-gray-100 flex justify-center items-center mx-8">
                    <div class="container mx-auto flex">
                        <!-- Main Content -->
                        <main class="flex-1 p-8 text-center">

                            <!-- Table Section -->
                            <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] === true) { ?>
                            <section>
                                <h3 class="text-2xl font-bold mb-4">Manage Articles</h3>
                                <?php if (mysqli_num_rows($posts) > 0) : ?>
                                    <table class="w-full border-collapse border rounded-lg overflow-hidden mx-auto">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th class="py-2 px-4 border-b">Title</th>
                                            <th class="py-2 px-4 border-b">Category</th>
                                            <th class="py-2 px-4 border-b">Description</th>
                                            <th class="py-2 px-4 border-b">Edit</th>
                                            <th class="py-2 px-4 border-b">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                                            <!-- get category title of each post from categories table -->
                                            <?php
                                            $category_id = $post['category_id'];
                                            $category_query = "SELECT category FROM categories WHERE id=$category_id";
                                            $category_result = mysqli_query($connection, $category_query);
                                            $category = mysqli_fetch_assoc($category_result);
                                            ?>
                                            <tr class="hover:bg-gray-100">
                                                <td class="py-2 px-4 border-b"><?= $post['title'] ?></td>
                                                <td class="py-2 px-4 border-b"><?= $category['category'] ?></td>
                                                <td class="py-2 px-4 border-b"><?= $post['description'] ?></td>
                                                <td class="py-2 px-4 border-b"><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="text-blue-500">Edit</a></td>
                                                <td id="delete_article_parent" class="py-2 px-4 border-b">
                                                    <form action="delete_article.php" method="post">
                                                        <button name="btn" class="delete_article_btn hover:opacity-80 text-red-500" value="<?= $post['id'] ?>">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endwhile ?>
                                        </tbody>
                                    </table>

                                <?php else : ?>
                                    <div class="alert__message error mb-5"><?= "No posts found" ?></div>
                                <?php endif ?>
                            </section>
                            <?php } else {
                                $author_id = $_SESSION['user-id'];
                                $author_articles_query = "SELECT id, title, description, category_id FROM articles WHERE is_deleted = 0 AND author_id = $author_id";
                                $author_articles= mysqli_query($connection, $author_articles_query);
                            ?>
                                <section>
                                    <h3 class="text-2xl font-bold mb-4">Manage Articles</h3>
                                    <?php if (mysqli_num_rows($author_articles) > 0) : ?>
                                        <table class="w-full border-collapse border rounded-lg overflow-hidden mx-auto">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th class="py-2 px-4 border-b">Title</th>
                                                <th class="py-2 px-4 border-b">Category</th>
                                                <th class="py-2 px-4 border-b">Description</th>
                                                <th class="py-2 px-4 border-b">Edit</th>
                                                <th class="py-2 px-4 border-b">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($author_artcl = mysqli_fetch_assoc($author_articles)) : ?>
                                                <!-- get category title of each post from categories table -->
                                                <?php
                                                $category_id = $author_artcl['category_id'];
                                                $category_queryy = "SELECT category FROM categories WHERE id=$category_id";
                                                $category_resultt = mysqli_query($connection, $category_queryy);
                                                $categoryy = mysqli_fetch_assoc($category_resultt);
                                                ?>
                                                <tr class="hover:bg-gray-100">
                                                    <td class="py-2 px-4 border-b"><?= $author_artcl['title'] ?></td>
                                                    <td class="py-2 px-4 border-b"><?= $categoryy['category'] ?></td>
                                                    <td class="py-2 px-4 border-b"><?= $author_artcl['description'] ?></td>
                                                    <td class="py-2 px-4 border-b"><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $author_artcl['id'] ?>" class="text-blue-500">Edit</a></td>
                                                    <td id="delete_article_parent" class="py-2 px-4 border-b">
                                                        <form action="delete_article.php" method="post">
                                                            <button name="btn" class="delete_article_btn hover:opacity-80 text-red-500" value="<?= $author_artcl['id'] ?>">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endwhile ?>
                                            </tbody>
                                        </table>

                                    <?php else : ?>
                                        <div class="alert__message error mb-5"><?= "No posts found" ?></div>
                                    <?php endif ?>
                                </section>
                            <?php } ?>
                        </main>
                    </div>
                </div>
            </div>
        </main>

    </div>

<script>
    const p = document.querySelectorAll('div#l p');
    const d1 = document.querySelector('#div1');
    const d2 = document.querySelector('#div2');
    const d3 = document.querySelector('#div3');

    const div = [d1, d2, d3];

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

                case ele = p[2]:
                    hideDivs();
                    div[2].style.display = 'block';
                    break;
            }
        });
    })
</script>
<script src="main.js"></script>
</body>
</html>