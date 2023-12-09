<style>
    .HIDDEN {
        display: none;
    }
</style>

<?php 
    session_start();
    $logger_id = $_SESSION['user-id'];
    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'blog');
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    $commenter_id = filter_input(INPUT_POST, 'commenter_id', FILTER_SANITIZE_SPECIAL_CHARS);
    $article_id = filter_input(INPUT_POST, 'article_id', FILTER_SANITIZE_SPECIAL_CHARS);

    $insert_comment = "INSERT INTO `comments` (`comment`, `commenter_id`, `article_id`) VALUES ('$comment', '$commenter_id', '$article_id')";

    mysqli_query($conn, $insert_comment);
    mysqli_close($conn);
    // users table
    $conn = mysqli_connect('localhost', 'root', '', 'blog');
    $sql = "SELECT * FROM `users` ORDER BY id DESC"; 
    $select_users = mysqli_query($conn, $sql); 
    $users = mysqli_fetch_all($select_users); 

    // comments tables
    $sql = "SELECT * FROM `comments` ORDER BY id DESC"; 
    $select_comments = mysqli_query($conn, $sql); 
    $comments = mysqli_fetch_all($select_comments);
    // 
    $html = '';
    foreach ($comments as $comment) {
        foreach($users as $user) {
            if($comment[2] == $user[0]) {
                if($comment[2] == $logger_id && $comment[3] == $_SESSION['current_article'] && $_POST['oneTwo'] == 1) {
                    $html .= <<<NOWDOC
                        <main class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                    <img class="mr-2 w-6 h-6 rounded-full" src="../images/$user[6]" alt="testing">
                                    $user[1]
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">Feb. 8, 2022</time>
                                </p>
                                </div>
                                
                                <button key="$comment[0]" class="comment_setting text-white" type="button">
                                    <ion-icon class="text-xl" name="ellipsis-vertical-outline"></ion-icon>
                                </button>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400">
                            $comment[1]
                            </p>
                        </main>
                    NOWDOC;
                }elseif ($comment[3] == $_SESSION['current_article']) {
                    $html .= <<<NOWDOC
                    <main class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                <img class="mr-2 w-6 h-6 rounded-full" src="../images/$user[6]" alt="testing">
                                $user[1]
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">Feb. 8, 2022</time>
                            </p>
                            </div>
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">
                            $comment[1]
                        </p>
                    </main>
                NOWDOC;
                }
            }
        }
    }
    echo $html;

    mysqli_close($conn);
?>
