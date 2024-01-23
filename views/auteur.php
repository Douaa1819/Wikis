<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
}
require_once '../Controllers/Home.php'; 
require_once '../Controllers/Admins.php';

$wikisController = new WikisController();
$CatégoriesController = new CategoriesModel();
$Catégorie=$CatégoriesController->getAllCategories();
$wikiController = new WikisController();
if (isset($_POST['deleteWiki'])) {
    $wikiIDToDelete = $_POST['wikiID'];
    $deletionSuccess = $wikiController->deletWiki($wikiIDToDelete);
    if ($deletionSuccess) {
        echo '<script>alert("Wiki supprimé avec succès!");</script>';
    } else {
        echo '<script>alert("Erreur lors de la suppression du wiki.");</script>';
    }
}
if(isset($_POST['ADDteWiki'])){
    $wikiController->addWiki();
}

$wikis = $wikisController->getAuthorwikis();
$auteurController = new WikiModel();
if (isset($_POST['logout'])) {
    $auteurController->logout();
}


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

<div class="lg:flex lg:justify-between lg:bg-white">

    <div class="lg:flex-shrink-0">
    <a href="index.php">
    <img src="../public/image/logo.png" alt="logo" width="150px" height="100px">
</a>
    </div>


<div id="openPopup" class="flex justify-end cursor-pointer items-center">
                        <i class="fas fa-plus-circle text-4xl text-gray-500"></i>
                    </div>

</div>
    <div>
        <img src="../public/image/menu.png" alt="burger_menu" id="iconMenu" class="text-2xl text-black cursor-pointer">
    </div>
    <div 
    id="burgerMenu" class="hidden bg-white border justify-end w-screen fixed top-0 right-0 p-4">

                <i onclick="toggleMenu()" class="fas fa-times absolute top-10 right-10 text-2xl cursor-pointer"></i>
                <nav class="flex flex-col gap-6 text-center items-center">
                    
                    <div class="flex flex-col gap-2 w-full">
                        <a href="home.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Home</a>
                        <form action="" method="post">
                            <button type="submit" name="logout" class="text-xl w-full hover:bg-gray-300 hover:text-white">Disconnect</button>
                        </form>

                    </div>
                </nav>
            </div>

</div>
<!-- AddWiki Pop-up Form -->
<div id="popup" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white max-w-3xl mx-auto m-16 p-8 rounded-md">
        <form method="post" action="" > 
            <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">

            <!-- Wiki Title -->
            <div class="mb-4">
                <label for="wikiTitle" class="text-sm">Wiki Title:</label>
                <input type="text" id="wikiTitle" name="WikiTitre" placeholder="Enter the title of your wiki" class="w-full p-2 border rounded-md" required>
            </div>

            <!-- Wiki Content -->
            <div class="mb-4">
                <label for="wikiContent" class="text-sm">Wiki Content:</label>
                <textarea id="wikiContent" name="WikiContenu" placeholder="Enter your wiki" class="w-full p-2 border rounded-md" required></textarea>
            </div>

            <!-- Wiki Category -->
            <div class="mb-4">
                <label for="wikiCategory" class="text-sm">Select Category:</label>
                <select name="categorie" class="w-full p-2 mb-4 border rounded-md" required>
                    <option value="" selected disabled>Select Category</option>
                    <?php foreach ($Catégorie as $category): ?>
                        <option value="<?php echo $category['id_Categorie']; ?>"><?php echo $category['name_Categorie']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Wiki Tags -->
            <div class="mb-4">
                <label class="text-sm mb-2">Select tags for your wiki:</label>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($wikisController->getWikiTags() as $tag): ?>
                        <label class="flex items-center space-x-2">
                        <input type="checkbox" name="WikiTags[]" value="<?php echo $tag['idTag']; ?>">
                            <span class="text-gray-800"><?php echo $tag['nameTag']; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col gap-5">
                <input type="submit" name="ADDteWiki" value="ADD Wiki" class="w-full p-2 border border-black text-black rounded-md hover:bg-black hover:text-white">
                <button id="closePopup" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded">Close</button>
            </div>

        </form>
    </div>
</div>
                    </div>
                    
                </div>
        </div>
    </div>
</div>

<?php
echo '<div class="grid grid-cols-1 sm:grid-cols-2 gap-10 mx-20 mt-10">'; 
foreach ($wikis as $wiki) {
    echo '<div class="lg:flex lg:rounded-xl lg:bg-gray-100 lg:mb-10">';
    

    echo '<div class="lg:flex lg:flex-col lg:justify-start lg:p-4">';
    echo '<h6 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">' . $wiki['name_Categorie'] . '</h6>';
    echo '<h4 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">' . $wiki['name_Wiki'] . '</h4>';
    echo '<p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">' . substr($wiki['contenu'], 0, 200) .'...'.  '</p>';
    echo '<form action="readmore.php" method="post" class="mt-auto">';
    echo '<input type="hidden" name="wikiID" value="' . $wiki['idWiki'] . '">';
    echo '<button type="submit" class="p-3 text-sm mx-4 text-white w-32 mb-4 bg-gray-500 hover:bg-gray-600 rounded-md flex items-center">';
    echo '<i class="fas fa-arrow-right mr-3"></i>Read more</button>';
    echo '</form>';
    
    echo '</div>';
    echo '<div class="lg:flex lg:flex-col lg:justify-start lg:p-4 lg:ml-auto">'; 
   echo'<form action="./editwiki.php" method="post" onsubmit="return confirm(\'Voulez-vous vraiment Editer ce wiki ?\')">';
   echo '<input type="hidden" name="wikiID" value="'. $wiki['idWiki'] .'">';
    echo '<button type="submit" class="text-green-500 cursor-pointer"><i class="fas fa-edit"> Edit</i></button>';
    echo '</form>';
    echo '<div class="lg:flex lg:flex-col lg:justify-start lg:p-4 lg:ml-auto">';
    echo '<form action="" method="post" onsubmit="return confirm(\'Voulez-vous vraiment supprimer ce wiki ?\')">';
    echo '<input type="hidden" name="wikiID" value="' . $wiki['idWiki'] . '">';
    echo '<button type="submit" name="deleteWiki" class="text-red-500 cursor-pointer ml-2"><i class="fas fa-trash"></i></button>';
    echo '</form>';    
    echo '</div>';    
    echo '</div>';
    
    echo '</div>';
}

echo '</div>';
?>
    </div>
</div>
<script src="../js/main.js"></script>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const popup = document.getElementById('popup');
            const openPopupBtn = document.getElementById('openPopup');
            const closePopupBtn = document.getElementById('closePopup');

            openPopupBtn.addEventListener('click', function () {
                popup.classList.remove('hidden');
            });

            closePopupBtn.addEventListener('click', function () {
                popup.classList.add('hidden');
            });
        });
    </script>

</body>

</html>
   
