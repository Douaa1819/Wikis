<?php
require_once '../Controllers/Home.php'; 
$wikisController = new WikisController();
if (isset($_POST['wikiID'])) {
    $wikiID = $_POST['wikiID'];
    $wikiDetails = $wikisController->getWikiByID($wikiID);
    if ($wikiDetails) {;

        
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
    <div class="max-w-3xl bg-white shadow-2xl mx-auto mt-10 p-8">
        <div class="flex justify-between mb-4">
    <p class="text-gray-500">Author: <?php echo $wikiDetails['name']; ?></p>
    <p class="text-gray-500">Category: <span class=" underline"> <?php echo $wikiDetails['name_Categorie']; ?></span></p>
</div>
        <h2 class="text-3xl font-bold mb-4"><?php echo $wikiDetails['name_Wiki']; ?></h2>
        <p class="text-gray-600 mb-4"><?php echo $wikiDetails['contenu']; ?></p>
       
        
        <p class="text-gray-500 flex justify-end">Tags:
        <span class="tags text-xs inline-block bg-gray-200 text-gray-800 rounded-full px-2.5 py-0.5 me-2">#<?php echo $wikiDetails['tagName']; ?></span>
        </p>
       
    </div>

</body>

</html>
<?php
    } else {
       
        echo 'Wiki not found.';
    }
} else {
    echo 'Wiki ID not provided.';
}
?>
<script src="../js/main.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var tagsElement = document.querySelector('.tags');

    if (tagsElement) {
      var tagsText = tagsElement.textContent;
      var modifiedTags = tagsText.replace(/,/g, ' #');
      tagsElement.textContent = modifiedTags;
    }
  });
</script>
</body>
</html>
