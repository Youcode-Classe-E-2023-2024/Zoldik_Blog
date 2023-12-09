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
                        <!-- Mobile menu button-->
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!--
                            Icon when menu is closed.
                
                            Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!--
                            Icon when menu is open.
                
                            Menu open: "block", Menu closed: "hidden"
                            
                            -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        </div>
                        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex flex-shrink-0  items-center">
                            <a href="index.html"><img class="h-12 w-auto" src="../image/LOGOO.png" alt="Your Company"></a>
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="index.html" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Blog</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
                            </div>
                        </div>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                            <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
                            <a href="../signin.php" class="text-base font-medium leading-6 text-fuchsia-50 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-50">
                                Sign in
                            </a>
                            <a href="../signup.php" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-orange-700 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                                Sign up
                            </a>
                            </div>  
                    </div>
                </nav>
                <!-- *********************** ARTICLE INFORMATIONS ************************* -->
                <section class="bg-gray-400 py-4">
                    <?php
                        $html = '';
                        foreach ($articles as $article) {
                            if ($article[0] == $_POST['article_id'] ) {
                               $html .= <<<NOWDOC
                               <div class="CARD max-w-2xl mx-auto bg-white rounded-md overflow-hidden shadow-lg">
                                     <img src="../$article[4]" alt="Article Image" class="w-full h-64 object-cover">
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
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Comments</h2>
                        </div>
                        <div key="2" id="comments_parent">

                        </div>
                    </div>
                </section>
            </section>
        </section>
        <!-- ionicons script -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- local script -->
        <script src="script.js"></script>
        <!-- tailwind cdn --> 
        <script src="https://cdn.tailwindcss.com"></script>
    </body>
</html>