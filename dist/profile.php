<?php
include '../admin/config.php';
session_start();
if (!isset($_SESSION['user-id'])) {
    header('location: index.php');
    exit();
}
$user_id = $_SESSION['user-id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$rslt = $connect->query($sql);
foreach ($rslt as $value) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <div class="text-center mb-4">
                <label for="profile-picture" class="cursor-pointer">
                    <img id="preview" src="../images/<?= $value['avatar'];?>" alt="Profile Picture" class="rounded-full w-20 h-20 mx-auto mb-2">
                </label>
                <h2 class="text-xl font-bold text-gray-800"><?= $value['firstname'] . ' ' . $value['lastname']; ?> | <span class="text-gray-500 text-sm"><?= $value['email'] ?></h2>
                <p class="text-gray-500 text-green-500"> <?php echo $value['is_admin'] == 1 ? 'Admin' : 'Announcer'; ?> </p>
            </div>

            <div class="mb-4">
                <form action="edit-profile-process.php" method="post" enctype="multipart/form-data">
                    <h3 class="text-lg font-semibold mb-2">Profile Information</h3>
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-600">First Name</label>
                        <input type="text" id="username" name="firstname" value="<?= $value['firstname']; ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Last Name</label>
                        <input type="text"  name="lastname" value="<?= $value['lastname']; ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Username</label>
                        <input type="text" name="username" value="<?= $value['username']; ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                        <input type="email" name="email" value="<?= $value['email']; ?>" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600">Want to Set a New Password ?</label>
                        <div class="flex items-center">
                            <input type="checkbox" id="setNewPassword" class="mr-2" onchange="toggleNewPassword()">
                            <label for="setNewPassword" class="text-sm text-gray-600">Set New Password</label>
                        </div>
                    </div>

                    <div id="newPasswordSection" class="mb-4 hidden">
                        <label for="newPassword" class="block text-sm font-medium text-gray-600">New Password</label>
                        <input type="password" id="newPassword" name="newPassword" class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <button name="btn" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Save Changes</button>
                    <input type="file" value="<?= $value['avatar'];?>" id="profile-picture" name="photo" class="hidden" accept="image/*" onchange="previewImage()">
                    <input type="hidden" name="currentPhoto" value="<?= $value['avatar']; ?>">
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleNewPassword() {
            var newPasswordSection = document.getElementById('newPasswordSection');
            var setNewPasswordCheckbox = document.getElementById('setNewPassword');

            if (setNewPasswordCheckbox.checked) {
                newPasswordSection.classList.remove('hidden');
            } else {
                newPasswordSection.classList.add('hidden');
            }
        }

        function previewImage() {
            const fileInput = document.getElementById('profile-picture');
            const preview = document.getElementById('preview');

            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onloadend = () => {
                    preview.src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    </body>
    </html>
<?php } ?>
