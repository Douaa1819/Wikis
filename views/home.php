<?php
require_once '../Controllers/inscription.php';
require_once '../Controllers/login.php';
require_once '../Controllers/Home.php'; 

$wikiController = new WikisController();
$Wikis = $wikiController->getAllwikis();
$categoryController = new CatégoriesController();
$categories = $categoryController-> Categories()  ;
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
        <div id="navbar" class="flex justify-between items-center bg-fixed bg-white p-4 shadow-sm">
            <img src="../public/image/logo.png" alt="logo" width="150px" height="100px">
            <div class="max-w-2xl flex space-x-4 border rounded-xl overflow-hidden">
        
              
            </div>
            <div class="flex items-center space-x-4">
                <a href="Register.php" class="text-gray-800 hover:text-gray-600">Sign Up</a>
                <a href="Register.php">
                    <button class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition duration-300">
                        Sign In
                    </button>
                </a>
                <img src="../public/image/menu.png" alt="burger_menu" id="iconMenu" class="text-2xl text-black cursor-pointer">
                <div id="burgerMenu" class="hidden bg-white border justify-end w-screen fixed top-0 right-0 p-4">
                    <i onclick="toggleMenu()" class="fas fa-times absolute top-10 right-10 text-2xl cursor-pointer"></i>
                    <nav class="flex flex-col gap-6 text-center items-center">
                        <div class="flex flex-col gap-2 w-full">
                            <a href="index.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Home</a>
                            <a href="Register.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Account</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="max-w-2xl px-4 h-10 flex space-x-8 border  overflow-hidden mt-10 mb-6 ml-96">
    <div class="flex items-center justify-center h-full w-10 bg-white">
        <i class="fas fa-search text-gray-400"></i>
    </div>
    <input type="text" placeholder="Search for anything" class="flex-1 h-full bg-white focus:outline-none px-4">
</div>
<div class="flex justify-center items-center mt-4">
    <a href="home.php" class="mr-2 px-4 py-2  font-bold text-blue-500 rounded">All</a>
    <span class="text-black">/</span>
    <a href="index.php" class="ml-2 px-4 py-2 font-bold text-gray-500 rounded">Trading</a>
</div>
<h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-center text-gray-900 md:text-3xl lg:text-4xl dark:text-white">we invest in the world's potential</h1>

<?php
    // Afficher les catégories
    echo '<div class="w-72 h-auto bg-gray-100 p-6 rounded-xl shadow-md mb-4">';
    echo '<h1 class="text-2xl font-bold mb-4">The  Categories</h1>';
    foreach ($categories as $category) {
        echo '<ul class="list-disc pl-4">';
        echo '<p class="mb-2 text-gray-800"><i class="fas fa-folder mr-2 text-gray-500"></i>' . $category['name_Categorie'] . '</p>';
        echo '</ul>';
    }
    echo '</div>';

    // Afficher les wikis
    foreach ($Wikis as $wiki) {
        echo '<div class="flex max-w-4xl rounded-xl bg-gray-100 shadow-lg p-8 mb-4">';
        echo '<div class="flex flex-col justify-start">';
        echo '<h5 class="mb-2 text-xl font-medium text-gray-800">' . $wiki['name_Wiki'] . '</h5>';
        echo '<p class="mb-4 text-base text-gray-600">' . $wiki['contenu'] . '</p>';
        echo '<p class="text-xs text-gray-500">' . $wiki['date'] . '</p>';
        echo '<a href="#" class="mt-4 inline-block bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-700 transition duration-300 text-center">';
        echo '<i class="fas fa-arrow-right mr-2"></i> Read More</a>';
        echo '</div></div>';
    }
    ?>


    <script src="../js/main.js"></script>
</body>

</html>