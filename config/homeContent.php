<?php
   echo '<pre>'; 
   print_r($_POST);
   echo '</pre>';

    $html = '';
    foreach ($articles as $article) {
        foreach ($users as $user) {
            if ($article[6] == $user[0]) {
                $half = substr($article[2], 0, 200);
                $html .= <<<NOWDOC
                    <button type="submit" name="article_id" value="$article[0]"  key="$user[0]" class="CARD max-w-2xl mx-auto bg-white rounded-md overflow-hidden shadow-lg">
                            <img src="../$article[4]" alt="Article Image" class="w-full h-64 object-cover">
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
    if(isset($_POST['category_id'])) {
        unset($_POST);
    }
?>