<?php
session_start();
include 'config.php';
$query_deleted_articles = "SELECT * FROM articles WHERE is_deleted = 1"; // remove "WHERE author_id=$current_user_id ORDER BY id DESC"
$executeQuery = mysqli_query($connect, $query_deleted_articles);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Deleted Articles</title>
</head>
<body class="bg-gray-100 p-8">
<div class="flex justify-around items-center mx-10">
    <h1 class="text-center my-10 text-gray-500 font-bold text-4xl">Deleted Articles</h1>
    <a href="index.php" class="delete_article_btn hover:opacity-80 text-white p-2 h-16 rounded-md bg-blue-500 flex items-center"><p>Back to Dashboard</p></a>
</div>
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] === true) { ?>
        <?php while ($arr = $executeQuery->fetch_assoc()) { ?>
        <tr>
            <?php
            $category_id = $arr['category_id'];
            $category_query = "SELECT category FROM categories WHERE id=$category_id";
            $category_result = mysqli_query($connect, $category_query);
            $category = mysqli_fetch_assoc($category_result);
            ?>
            <td class="py-4 px-6"><img src="../<?= $arr['path']; ?>" class="rounded-full h-10 w-10" alt=""></td>
            <td class="py-4 px-6"><?= $arr['title']; ?></td>
            <td class="py-4 px-6"><?= $category['category']; ?></td>
            <td class="py-4 px-6"><?= $arr['description']; ?></td>
            <td class="py-4 px-6">
                <form action="recover_article.php" method="post">
                    <button name="btn" class="delete_article_btn hover:opacity-80 text-white p-2 rounded-md bg-green-500" value="<?= $arr['id'] ?>">Recover</button>
                </form>
            </td>
        </tr>
        <?php } ?>
        <?php } else {
        $author_id = $_SESSION['user-id'];
        $author_articles_query = "SELECT * FROM articles WHERE is_deleted = 1 AND author_id = $author_id";
        $author_articles= mysqli_query($connect, $author_articles_query); ?>
        <?php while($author_artcl = mysqli_fetch_assoc($author_articles)) { ?>
        <!-- get category title of each post from categories table -->
                <tr>
                    <?php
                    $category_id = $author_artcl['category_id'];
                    $category_queryr = "SELECT category FROM categories WHERE id=$category_id";
                    $category_resultr = mysqli_query($connect, $category_queryr);
                    $categoryr = mysqli_fetch_assoc($category_resultr);
                    ?>
                    <td class="py-4 px-6"><img src="../<?= $author_artcl['path']; ?>" class="rounded-full h-10 w-10" alt=""></td>
                    <td class="py-4 px-6"><?= $author_artcl['title']; ?></td>
                    <td class="py-4 px-6"><?= $categoryr['category']; ?></td>
                    <td class="py-4 px-6"><?= $author_artcl['description']; ?></td>
                    <td class="py-4 px-6">
                        <form action="recover_article.php" method="post">
                            <button name="btn" class="delete_article_btn hover:opacity-80 text-white p-2 rounded-md bg-green-500" value="<?= $author_artcl['id'] ?>">Recover</button>
                        </form>
                    </td>
                </tr>
        <?php } } ?>
        </tbody>
    </table>

</div>

</body>
</html>