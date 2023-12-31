<?php
include 'partials/header.php';

//fetch categories from databse
$query = "SELECT * FROM categories ORDER BY category";
$categories = mysqli_query($connection, $query);
?>

    <?php if(isset($_SESSION['add-category-success'])) : // shows if add category was successful ?>
        <div class="alert__message success mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['add-category-success'];
                    unset($_SESSION['add-category-success']);
                    ?>
                </p>
        </div>
    <?php elseif(isset($_SESSION['add-category'])) : // shows if add category was NOT successful
        ?>
        <div class="alert__message error mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                    ?>
                </p>
        </div> 
    <?php elseif(isset($_SESSION['edit-category'])) : // shows if edit category was NOT successful
        ?>
        <div class="alert__message error mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category']);
                    ?>
                </p>
        </div>    
    <?php elseif(isset($_SESSION['edit-category-success'])) : // shows if edit category was successful
        ?>
        <div class="alert__message success mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['edit-category-success'];
                    unset($_SESSION['edit-category-success']);
                    ?>
                </p>
        </div> 
    <?php elseif(isset($_SESSION['delete-category-success'])) : // shows if delete category was successful
        ?>
        <div class="alert__message success mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['delete-category-success'];
                    unset($_SESSION['delete-category-success']);
                    ?>
                </p>
        </div>          

    <?php endif ?>    
    


    <?php if(isset($_SESSION['add-category-success'])) : // shows if add category was successful
        ?>
        <div class="alert__message success mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['add-category-success'];
                    unset($_SESSION['add-category-success']);
                    ?>
                </p>
        </div>
    <?php elseif(isset($_SESSION['add-category'])) : // shows if add category was NOT successful
        ?>
        <div class="alert__message error mb-5">
                <p class="text-700 font-bold text-center">
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                    ?>
                </p>
        </div>

        <?php endif ?>
    <div class="font-sans bg-gray-100 flex justify-center items-center min-h-screen mt-20 mx-8">
        <div class="container mx-auto flex">

            <!-- Main Content -->
            <main class="flex-1 p-8 text-center">
                
                <!-- Table Section -->
                <section>
                    <h3 class="text-2xl font-bold mb-4">Manage Categories</h3>
                    <?php if (mysqli_num_rows($categories) > 0) : ?>
                    <table class="w-full border-collapse border rounded-lg overflow-hidden mx-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-2 px-4 border-b">Title</th>
                                <th class="py-2 px-4 border-b">Edit</th>
                                <th class="py-2 px-4 border-b">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b"><?= $category['category'] ?></td>
                                <td class="py-2 px-4 border-b"><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="text-blue-500">Edit</a></td>
                                <td class="py-2 px-4 border-b"><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category
                                ['id'] ?>" class="text-red-500">Delete</a></td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="alert__message error mb-5"><?= "No categories found" ?></div>
                        </section>
                    <?php endif ?> 
            </main>
        </div>
    </div>
    
<?php
include '../partials/footer.php';
?>