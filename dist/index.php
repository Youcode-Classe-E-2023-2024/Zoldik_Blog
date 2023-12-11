<?php
   session_start();
   @$logger_id = $_SESSION['user-id'];

   // articles table
   $conn = mysqli_connect('localhost', 'root', '', 'blog');
   $sql = "SELECT * FROM `articles`";
   $select_articles = mysqli_query($conn, $sql);
   $articles = mysqli_fetch_all($select_articles);

   // users table
   $conn = mysqli_connect('localhost', 'root', '', 'blog');
   $sql = "SELECT * FROM `users`";
   $select_users = mysqli_query($conn, $sql);
   $users = mysqli_fetch_all($select_users);
?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="output.css">
   <link rel="stylesheet" href="/dist/style.css">
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Tajawal:wght@300;400&family=Whisper&display=swap" rel="stylesheet">
   <style>
      body {
         overflow-y: hidden;
      }
      #index2global {
         position: relative;
      }
      #top_bloggers_btn {
         position: fixed;
         right: 0;
         top: 64;
         backdrop-filter: blur(30px);
         background-image: linear-gradient(to top left, rgba(11, 11, 11, 0.831), rgba(0, 0, 0, 0.479));
         color: white;
      }
      #top_bloggers_sct {
         position: fixed;
         top: 64;
         right: 0;
         height: 100vh;
         width: 20%;
         overflow: auto;
         backdrop-filter: blur(30px);
         background-image: linear-gradient(to top left, rgba(11, 11, 11, 0.831), rgba(0, 0, 0, 0.479));
      }
      .HIDDEN {
         display: none;
      }
      #ENCAPSULATER {
         position: sticky;
      }
      #NAV {
         position: sticky;
         top: 0;
         z-index: 1000; /* Adjust the value based on your layout */
      }
      #categoriesSct {
         height: 100vh;
         background-color: #2e72a2;
         /* backdrop-filter: blur(30px); */
         overflow: auto;
         font-family: 'Dancing Script', cursive;
      }
   </style>
</head>

<body class="bg-gray-100 font-sans">
   <article id="ENCAPSULATER">
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
      <!-- HOME PAGE -->
      <article class="grid grid-cols-6">
         <!-- categories section -->
         <main id="categoriesSct" class="col-span-1  px-2 flex flex-col justify-center text-2xl">
            <h1 class="font-bold text-2xl">Categories:</h1>
            <!-- categories container -->
            <div id="darg_parent" ondrop="drop(event)" ondragover="allowDrop(event)">
               <!-- <button class="bg-green-400 border-b border-solid border-black py-2 cursor-pointer">Technologies</button> -->
               <?php
                  // categories table
                  $sql = "SELECT * FROM `categories`";
                  $select_categories = mysqli_query($conn, $sql);
                  $categories = mysqli_fetch_all($select_categories);
                  $html = '';
                  foreach($categories as $category) {
                     $html .=<<<HEREDOC
                        <div draggable="true" ondragstart="drag(event)" key="$category[0]" class="CTGS font-bold  text-white py-2 border-b border-solid border-white m-0 cursor-pointer">
                           $category[1]
                        </div>
                     HEREDOC;
                  }
                  echo $html;
               ?>
            </div>
         </main>
         <main class="col-span-5 h-screen overflow-auto">
            <!-- parent -->
            <section id="index2global">
               <!-- child1 -->
               <section id="index2cnt">
                  <div class="py-20 bg-cover bg-no-repeat bg-fixed" style="background-image: url(../image/e2.png)">
                     <div class="container m-auto text-center px-6 opacity-100">
                        <h2 class="text-4xl font-bold mb-2 text-white drop-shadow-[0_35px_35px_rgba(0,0,0,1)]">Chaque clic est une porte vers<br> un monde de possibilités dans le commerce électronique</h2>
                        <h3 class="text-2xl mb-8 text-gray-400 drop-shadow-[0_35px_35px_rgba(255,255,255,1)]">Clic d'expérience e-commerce</h3>
                        <button class="bg-white font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider hover:border-transparent hover:text-blue-500 hover:bg-gray-800 transition-all">Explorez notre blog</button>
                     </div>
                  </div>
                  <form action="../dist/readmore2.php" method="post" class="grid grid-cols-2 gap-x-4 gap-y-8 px-2 py-6">
                     <!-- FETCHING THE ARTICLES INTO THE CURRENT PAGE: -->
                     <?php
                       $html = '';
                       foreach ($articles as $article) {
                           foreach ($users as $user) {
                               if ($article[6] == $user[0]) {
                                   $half = substr($article[2], 0, 200);
                                   $html .= <<<NOWDOC
                                       <button category_id="$article[5]" type="submit" name="article_id" value="$article[0]"  key="$user[0]" class="CARD max-w-2xl mx-auto bg-white rounded-md overflow-hidden shadow-lg">
                                               <img src="../images/$article[4]" alt="Article Image" class="w-full h-64 object-cover">
                                               <div class="p-6">
                                                   <h1 class="text-3xl font-bold mb-2">$article[1]</h1>
                                                   <p class="text-gray-950 font-bold"> $half...
                                                   </p>
                                               </div>
                                       </button>
                                       NOWDOC;
                               }
                           }
                       }
                       echo $html;
                     ?>
                  </form>
                  <!-- Page Wrap -->
                  <!--Call to Action-->
                  <section style="background-color: #3c4c55">
                     <div class="container mx-auto px-6 text-center py-20">
                        <h2 class="mb-6 text-4xl font-bold text-center text-white">Headquarters personnel</h2>
                        <h3 class="my-4 text-2xl text-white">Report to command center. Take it easy.</h3>
                        <button class="bg-white font-bold rounded-full mt-6 py-4 px-8 shadow-lg uppercase tracking-wider hover:border-red hover:text-white hover:bg-red-600">Report</button>
                     </div>
                  </section>
               </section>
               <!-- child2 -->
               <section>
                  <a id="top_bloggers_btn" class="cursor-pointer flex items-center p-2 border-b-2 border-solid border-white">
                     <strong>Top bloggers</strong>
                     <ion-icon name="chevron-forward-outline" class="text-2xl cursor-pointer"></ion-icon>
                  </a>
                  <main id="top_bloggers_sct" class="HIDDEN p-2 text-white">
                     <div class="flex justify-between">
                        <div></div>
                        <ion-icon name="chevron-back-outline" id="top_bloggers_close" class="text-2xl cursor-pointer"></ion-icon>
                     </div>
         
                     <?php
                        $array = [];
                        foreach ($articles as $article) {
                           $array[] = $article[6];
                        }
         
                        $frequencyArray = array_count_values($array);
         
                        // Sort the array based on the frequency of each number
                        arsort($frequencyArray);
                        $rank = [];
                        $sortArr = [];
                        foreach($frequencyArray as $key => $value) {
                           $rank[] = $value;
                           $sortArr[] = $key;
                        }
         
                        $html = '';
                        $i = 0;
                        foreach($sortArr as $value) {
                           foreach($articles as $article) {
                              if($article[6] == $value) {
                                 foreach($users as $user) {
                                    if ($user[0] == $value) {
                                       $html .=<<<HEREDOC
                                          <div class="flex justify-between items-center border-b border-solid border-white p-2">
                                             <div class="flex items-center gap-2">
                                                <div class="relative">
                                                   <div class="w-12 h-12 rounded-full bg-black border-white absolute top-0 z-[-1] flex justify-center items-center">
                                                      <ion-icon name="person" class="text-3xl"></ion-icon>
                                                   </div>
                                                <div class="w-12 h-12 rounded-full border-white" style="background-image:url('../images/{$user[6]}');background-size: cover;"></div>
                                             </div>
                                             <div>{$user[3]}</div>
                                             </div>
                                             <strong> {$rank[$i]} articles</strong>
                                          </div>
                                       HEREDOC;
                                    }
                                 }
                                 break;
                              }
                           }
                           $i++;
                        }
                        echo $html;
                     ?>
                  </main>
               </section>
            </section>
         </main>
      </article>
   </article>
</body>

<!-- drag_drop logic -->
<script src="drag_drop.js"></script>
<!-- comments logic -->
<script src="script.js"></script>
<!-- top bloggers logic -->
<script src="topBloggers.js"></script>
<!-- cat_filter logic -->
<script src="cat_filter.js"></script>
<!-- tailwind cdn -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- ionicons cdn -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>

