<?php
include 'partials/header.php';

//fetch categories from DB
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);

//fetch Article data from database if id is set
if(isset($_GET['id'])) {
    $id= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $article = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>



<div class="flex items-center justify-center min-h-screen bg-gray-100 mt-8">
    <form class="max-w-xl mx-auto p-10 bg-white rounded-md shadow-md" action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
        <h2 class="text-2xl font-bold mb-8 text-center">Edit Article</h2>
     
    <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-5 group">
          <input type="hidden" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" name="id" value="<?= $article['id'] ?>" />
          <input type="hidden" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" name="previous_path_name" value="<?= $article['path'] ?>" />
          <input type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" name="title" value="<?= $article['title'] ?>" placeholder="Title" />
          <input type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" name="description" value="<?= $article['description'] ?>" placeholder="description" />

      </div>
    </div>

    <select name="categori" id="category" class="mb-4 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <?php while ($categori = mysqli_fetch_assoc($categories)) : ?>
              <option value="<?= $categori['id'] ?>"><?= $categori['category'] ?></option>
        <?php endwhile ?>
    </select>

    <textarea rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5" name="body" placeholder="Body"><?= $article['body'] ?></textarea>
    
    <div class="mb-4">
       <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="path">Change Path</label>
       <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="path" name="path" type="file">
    </div>

    <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-6 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Article</button>
</form>
</div>

<?php
include '../partials/footer.php';
?>