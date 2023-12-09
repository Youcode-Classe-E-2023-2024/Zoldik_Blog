<?php
if (isset($_POST['btn'])) {
    include_once 'config.php';
    $id = $_POST['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $value = mysqli_query($connect, $sql);
    $value = $value->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Edit User</title>
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white rounded p-8 shadow-md">

        <form action="edit_user_process.php" method="post" enctype="multipart/form-data">


            <label for="profile-picture" class="cursor-pointer">
                <img id="preview" src="<?= $value['avatar'];?>" class="rounded-full w-20 h-20 mx-auto mb-2">
            </label>

            <div class="mb-4">
                <label for="firstname" class="block text-sm font-medium text-gray-600">Full Name</label>
                <input value="<?= $value['firstname'] ?>" type="text" name="firstname" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="lastname" class="block text-sm font-medium text-gray-600">Last Name</label>
                <input value="<?= $value['lastname'] ?>" type="text" name="lastname" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                <input value="<?= $value['username'] ?>" type="text" name="username" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input value="<?= $value['email'] ?>" type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Role</label>
                <select name="is_admin" class="input-field">
                    <?php if ($value['is_admin'] == 1) { ?>
                    <option value="admin">Admin</option>
                    <option value="announcer">Announcer</option>
                    <?php } else { ?>
                    <option value="announcer">Announcer</option>
                    <option value="admin">Admin</option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-4">
                <button name="save_btn" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
            </div>
            <input type="file" id="profile-picture" name="avatar" class="hidden" accept="image/*" onchange="previewImage()">
            <input type="hidden" name="id" value="<?= $value['id'] ?>">
        </form>

    </div>
</div>


</body>
</html>
<?php } ?>
