<?php
session_start();
$logger_id = $_SESSION['user-id'];
$_SESSION['current_article'] = $_POST['article_id'];
// articles table
$conn = mysqli_connect('localhost', 'root', '', 'blog');
$sql = "SELECT * FROM `articles`";
$select_articles = mysqli_query($conn, $sql);
$articles = mysqli_fetch_all($select_articles);

// users table
$sql = "SELECT * FROM `users`";
$select_users = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($select_users);

// comments tables
$sql = "SELECT * FROM `comments`";
$select_comments = mysqli_query($conn, $sql);
$comments = mysqli_fetch_all($select_comments);


// echo '<pre>'; 
// print_r($comments); 
// echo '</pre>';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Document</title>
    <style>
        .HIDDEN {
            display: none;
        }

        #global {
            position: relative;
        }

        #child2 {
            position: fixed;
            top: 0;
            z-index: 1;
            width: 100%;
            height: 100vh;
            backdrop-filter: blur(30px);
            background-image: linear-gradient(to top left, rgba(11, 11, 11, 0.831), rgba(0, 0, 0, 0.479));
        }
        #NAV {
         position: sticky;
         top: 0;
         z-index: 1000; /* Adjust the value based on your layout */
      }
    </style>
</head>

<body>
    <!-- CHILD1 & 2 PARENT -->
    <section id="global">
        <!-- CHILD 1 -->
        <section id="child1">
        <nav id="NAV" class="m-auto bg-slate-800">
         <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
               <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                  <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                     <span class="absolute -inset-0.5"></span>
                     <span class="sr-only">Open main menu</span>

                     <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                     </svg>

                     <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                  </button>
               </div>
               <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                  <div class="flex flex-shrink-0  items-center">
                     <a href="index.html"><img class="h-12 w-auto" src="../image/LOGOO.png" alt="Your Company"></a>
                  </div>
                  <div class=" sm:ml-6 sm:block">
                     <div class="flex space-x-4">
                        <a href="/dist/index2.html" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a>
                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                     </div>
                  </div>
               </div>
               <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">View notifications</span>
                  </button>
                  <div class="relative ml-3">
                     <div>
                        <button id="profileButton" type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 hover:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                           <span class="absolute -inset-1.5"></span>
                           <span class="sr-only">Open user menu</span>
                           <?php
                           foreach ($users as $user) {
                              if ($user[0] == $logger_id) {
                                 $trns_id = $user[6];
                              }
                           }
                           ?>
                           <img class="h-8 w-8 rounded-full" src="../images/<?php echo $trns_id ?>" alt="">
                        </button>
                     </div>
                     <!-- MENU LIST -->
                     <div id="profileList" class="HIDDEN absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="component.html" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Your Profile</a>
                        <a href="../admin/index.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Dashboard</a>
                        <a href="../index.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Sign out</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Mobile menu, show/hide based on menu state. -->
         <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
               <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
               <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
               <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
               <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
               <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
            </div>
         </div>
         </div>
      </nav>
            <!-- *********************** ARTICLE INFORMATIONS ************************* -->
            <section class="bg-gray-400 py-4">
                <?php
                $html = '';
                foreach ($articles as $article) {
                    if ($article[0] == $_POST['article_id']) {
                        $html .= <<<NOWDOC
                               <div class="CARD max-w-2xl mx-auto bg-white rounded-md overflow-hidden shadow-lg">
                                     <img src="../images/$article[4]" alt="Article Image" class="w-full h-64 object-cover">
                                     <div class="p-6">
                                        <h1 class="text-3xl font-bold mb-2">$article[1]</h1>
                                        <p class="text-gray-950 font-bold"> $article[2]
                                        </p>
                                     </div>
                               </div>
                            NOWDOC;
                    }
                }
                echo $html;
                ?>
            </section>
            <!-- *********************** COMMENT SECTION ***********************-->
            <section id="comments_section" class="bg-white dark:bg-gray-900 py-8">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                    </div>
                    <form id="commentForm">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label class="sr-only text-black">Your comment</label>
                            <textarea id="commentInput" name="comment" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required>
                                </textarea>
                        </div>
                        <input type="hidden" name="article_id" value="<?php echo $_POST['article_id'] ?>">
                        <input type="hidden" name="commenter_id" value="<?php echo $_SESSION['user-id'] ?>">
                        <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center bg-blue-600 ">
                            Post comment
                        </button>
                    </form> 
                    <!--  -->
                    <div key="1" id="comments_parent">

                    </div>
                </div>
            </section>
        </section>
        <!-- CHILD 2 -->
        <section id="child2" class="HIDDEN text-white p-4">
            <nav class="flex justify-between mb-4">
                <div></div>
                <ion-icon name="close-outline" id="close_comment_section" class="cursor-pointer text-2xl font-bold"></ion-icon>
            </nav>
            <div class="h-full flex justify-center items-center">
                <main class="p-2 flex justify-center items-center">
                    <div class="max-w-md mx-auto">
                        <form id="delete_comment_form" class="mb-4">
                            <button type="submit" class="bg-red-600 text-white p-2 rounded-md w-full">Delete</button>
                        </form>
                        <form id="update_comment_form">
                            <label class="block text-sm font-semibold mb-2">Write a new Comment</label>
                            <textarea name="newComment" class="border-2 p-2 w-full text-sm text-gray-900 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="Write a comment..." required></textarea>
                            <button type="submit" class="border-2 bg-blue-600 text-white p-2 rounded-md w-full mt-4">Update</button>
                        </form>
                    </div>
                </main>
            </div>
        </section>
    </section>

    <script>
        const profileButton = document.getElementById('profileButton');
        const profileList = document.getElementById('profileList'); 
        profileButton.addEventListener('click', () => profileList.classList.toggle('HIDDEN'));
    </script>
    <!-- ionicons script -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- local script -->
    <script src="script.js"></script>
    <!-- tailwind cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>