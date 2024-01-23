<?php
require_once '../Controllers/inscription.php';
require_once '../Controllers/login.php';
require_once '../Controllers/Home.php'; 
$wikiController = new WikisController();
$Wikis = $wikiController->getAllwikis();
$categoryController = new CatégoriesController();
$categories = $categoryController-> Categories();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/image/licon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Wiki</title>
</head>

<body class="bg-no-repeat bg-right bg-fixed" style="background-image: url('../public/image/wikiii.png'); background-size: contain;">

    <div class=" h-32">
        <div id="navbar" class="flex justify-between items-center bg-fixed bg-white p-1 shadow-md">
        <a href="index.php">
    <img src="../public/image/logo.png" alt="logo" width="150px" height="100px">
</a>   
            <div class="max-w-2xl flex space-x-4 border rounded-xl overflow-hidden">
        
              
            </div>
            <div class="flex items-center space-x-4">
                <a href="Register.php" class="text-gray-800 hover:text-gray-600">Sign Up</a>
                <a href="Register.php">
                    <button class="bg-gray-500 text-white p-3 md:px-6 md:py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        Sign In
                    </button>
                </a>
                <img src="../public/image/menu.png" alt="burger_menu" id="iconMenu" class="text-2xl text-black cursor-pointer">
                <div id="burgerMenu" class="hidden bg-white border justify-end w-screen fixed top-0 right-0 p-4">
                    <i onclick="toggleMenu()" class="fas fa-times absolute top-10 right-10 text-2xl cursor-pointer"></i>
                    <nav class="flex flex-col gap-6 text-center items-center">
                        <div class="flex flex-col gap-2 w-full">
                        <a href="index.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Home</a>
                            <?php  
                            if(!isset($_SESSION['user_id'])){?>
                            <a href="register.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Cree Account</a>
                            <?php }
                                ?>
                            <?php  
                            if(isset($_SESSION['user_id'])){?>
                            <a href="auteur.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Account</a>
                            <?php }
                                ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="max-w-2xl px-4 h-10 flex space-x-8 border  overflow-hidden mt-10 mb-6 mx-auto ">
    <div class="flex items-center justify-center h-full w-10 bg-white">
        <i class="fas fa-search text-gray-400"></i>
    </div>
    <!-- <input type="search" placeholder="Search for anything"  id="searchWiki" name="search" class="flex-1 h-full bg-white focus:outline-none px-4"> -->
    <input type="search" placeholder="Search for anything"  id="search"  class="flex-1 h-full bg-white focus:outline-none px-4" >
</div>
        <div class="hidden grid-cols-1 sm:grid-cols-3 gap-10  w-auto mx-10"  id="searchresult">>
            
        </div>
<div class="flex justify-center items-center mt-4">
    <a href="home.php" class="mr-2 px-4 py-2  font-bold text-blue-500 rounded">All</a>
    <span class="text-black">/</span>
    <a href="index.php" class="ml-2 px-4 py-2 font-bold text-gray-500 rounded">Tranding</a>
</div>
<h1 class=" mb-20 text-4xl font-bold leading-none tracking-tight mt-10 text-center text-gray-900 md:text-3xl lg:text-4xl dark:text-white">we invest in the world's potential</h1>

<?php
echo '</div>';

// Afficher les wikis
echo '<div class="grid grid-cols-1 sm:grid-cols-3 gap-10  w-auto mx-10" id="allwikis">'; 

foreach ($Wikis as $wiki) {
    echo '<div class="flex flex-col justify-start bg-gray-100 shadow-lg p-4 mb-4 rounded-md relative">'; 
    // Affichage du nom de la catégorie et du rôle
    echo '<h5 class="mb-2 text-sm flex justify-end text-gray-500 dark:text-neutral-50">' . $wiki['name_Categorie'] . '</h5>';
    echo '<div class="flex items-center mb-2 text-sm text-gray-500 dark:text-neutral-50">';
    echo  '<i class="fas fa-user mr-1"></i> ' . $wiki['name'];
    echo '</div>';
    echo '<h6 class="mb-2 text-2xl font-semibold  text-center text-gray-800">' . $wiki['name_Wiki'] . '</h6>';
    echo '<p class="mb-4 text-base text-gray-600">' . substr($wiki['contenu'], 0, 200)  .'...'. '</p>';
    echo '<form action="readmore.php" method="post" class="mt-auto">';
    echo '<input type="hidden" name="wikiID" value="' . $wiki['idWiki'] . '">';
    echo '<button type="submit" class="p-3 text-sm mx-4 text-white w-32 mb-4 bg-gray-500 hover:bg-gray-600 rounded-md flex items-center">';
    echo '<i class="fas fa-arrow-right mr-3"></i>Read more</button>';
    echo '</form>';
    echo '<div class="flex justify-end">';
    echo '<p class="text-xs text-gray-500">' . $wiki['date'] . '</p>';
    echo '</div>';
    echo '</div>';

}

echo '</div>';
?>

<script src="../js/main.js"></script>

<script>

  document.addEventListener("DOMContentLoaded", function () {
    var liveSearchInput = document.getElementById("search");
    var searchResult = document.getElementById("searchresult");
    var allWikis = document.getElementById("allwikis");

    liveSearchInput.addEventListener("input", function () {
        var input = liveSearchInput.value;

        if (input) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Controllers/ajax.php");
            xhr.setRequestHeader("Content-type", "application/json");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) { 
                    var wikiCards = afficher(JSON.parse(xhr.responseText));
                    var allCards = '';

                    wikiCards.forEach(wikiCard => {
                    allCards += wikiCard;
                    });

                    searchResult.innerHTML = allCards;
                    searchResult.className = "grid grid-cols-1 sm:grid-cols-3 gap-10  w-auto mx-10";            
                    allWikis.className = "hidden grid-cols-1 sm:grid-cols-3 gap-10  w-auto mx-10";            
                }
            };
            var requestData = {
                input: input
            };
            xhr.send(JSON.stringify(requestData));
        } else {
            searchResult.className = "hidden grid-cols-1 sm:grid-cols-3 gap-10  w-auto mx-10";            
            allWikis.className = "grid grid-cols-1 sm:grid-cols-3 gap-10  w-auto mx-10";            
        }
    });
});
function afficher(wikis){
  var wikiCards = [];
  var i = 0;
  wikis.forEach(wiki => {
    wikiCards[i] = 
      `<div class="flex flex-col justify-start bg-gray-100 shadow-lg p-4 mb-4 rounded-md relative">
    <h5 class="mb-2 text-sm flex justify-end text-gray-500 dark:text-neutral-50">${wiki.name_Categorie}</h5>
    <div class="flex items-center mb-2 text-sm text-gray-500 dark:text-neutral-50">
   <i class="fas fa-user mr-1"></i> ${wiki.name}
    </div>
    <h6 class="mb-2 text-2xl font-bold text-center text-gray-800">${wiki.name_Wiki}</h6>
     <p class="mb-4 text-base text-gray-600">${wiki.contenu.substring(0, 200)}...</p>
    <form action="readmore.php" method="post" class="mt-auto">
    <input type="hidden" name="wikiID" value="${wiki.idWiki}">
    <button type="submit" class="p-3 text-sm mx-4 text-white w-32 mb-4 bg-gray-500 hover:bg-gray-600 rounded-md flex items-center">
    <i class="fas fa-arrow-right mr-3"></i>Read more</button>
    </form>
    <div class="flex justify-end">
    <p class="text-xs text-gray-500">${wiki.date}</p>
    </div>
    </div>`
    i++;
  });
  return wikiCards;
}


</script>
</body>

</html>
