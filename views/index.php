<?php
require_once '../Controllers/inscription.php';
require_once '../Controllers/login.php';
require_once '../Controllers/Home.php'; 
$wikiController = new WikisController();
$lastWikis = $wikiController->LastWikis();
$lastCategories = $wikiController->LastCategories();
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

    <div class="h-40">
        <div id="navbar" class="flex justify-between items-center bg-fixed bg-white p-4 shadow-md">
        <a href="index.php">
    <img src="../public/image/logo.png" alt="logo" width="150px" height="100px">
</a>
            <div class="max-w-2xl flex space-x-4 border rounded-xl overflow-hidden">
        
              
            </div>
            <div class="flex items-center space-x-4">
                <?php  
                if(!isset($_SESSION['user_id'])){?>
                <a href="Register.php" class="text-gray-800 hover:text-gray-600">Sign Up</a>
                <a href="Register.php">
                    <button class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        Sign In
                    </button>
                </a> <?php }
                ?>
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


   

<div class="flex justify-center items-center mt-4">
    <a href="home.php" class="mr-2 px-4 py-2 mt-4 mb-4 font-bold text-gray-500 rounded">All</a>
    <span class="text-black">/</span>
    <a href="index.php" class="ml-2 px-4 py-2 mt-4 mb-4 font-bold text-blue-500 rounded">Tranding</a>
</div>




<div class="max-w-2xl mx-auto border border-gray-800 rounded-xl p-4">
    <?php
    // Carte pour les catégories

echo '<h1 class="text-2xl font-bold mb-4 text-center">The Last Categories</h1>';
echo '<ul class=" p-5 flex justify-between ">';
foreach ($lastCategories as $category) {
    
    echo '<p class=" p-3 rounded-xl bg-gray-500 hover:bg-gray-600  text-white"><i class="fas fa-th-large"></i>
    ' . $category['name_Categorie'] . '</p>';
    
}
echo '</ul>'; 
?>
</div>
<h1 class="mb-4 text-4xl font-bold leading-none tracking-tight mt-5 text-center font-mono text-gray-900 md:text-3xl lg:text-4xl dark:text-white">the last Wikis</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:p-10">
<?php
// Cartes pour les wikis
foreach ($lastWikis as $wiki) {
    echo '<div class="flex   rounded-xl bg-gray-100 shadow-lg p-8 mb-4 hover:shadow-2xl">';
    echo '<div class="flex flex-col justify-start">';
    echo '<h5 class="mb-2 text-sm text-gray-500 flex justify-end dark:text-neutral-50">' . $wiki['name_Categorie'] . '</h5>';
    echo '<h5 class="mb-2 text-xl font-medium text-center text-gray-800">' . $wiki['name_Wiki'] . '</h5>';
    echo '<p class="mb-4 text-base text-gray-600">' . substr($wiki['contenu'], 0, 200) .'...'. '</p>';
    echo '<form action="readmore.php" method="post" class="mt-auto">';
    echo '<input type="hidden" name="wikiID" value="' . $wiki['idWiki'] . '">';
    echo '<button type="submit" class="p-3 text-sm mx-4 text-white w-32 mb-4 bg-gray-500 hover:bg-gray-600 rounded-md flex items-center">';
    echo '<i class="fas fa-arrow-right mr-3"></i>Read more</button>';
    echo '</form>';    
    echo '<div class="flex justify-between">';
    echo '<div class="flex items-start text-sm text-gray-500 dark:text-neutral-50 user-info">';
    echo '<i class="fas fa-user mr-1"></i> ' . $wiki['name'];
    echo '</div>';
    echo '<p class="text-xs text-gray-500">' . $wiki['date'] . '</p>';
    echo '</div>';
    
    echo '</div></div>';
}
?>
</div>

    <script src="../js/main.js"></script>
</body>

</html>