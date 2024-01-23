<?php 
require_once '../Controllers/Home.php'; 
$wikisController = new WikisController();
$CatégoriesController = new CategoriesModel();
$Catégorie=$CatégoriesController->getAllCategories();
$wiki = $wikisController->getWikiByID($_POST['wikiID']);
$wikiTags = explode(',', $wiki['tagName']);
if(isset($_POST['edit'])){
    $wikisController->editWikiByID();
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
<body>



<div id="popup" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center">
    <div class="bg-white max-w-3xl mx-auto m-16 p-8 rounded-md">
        <form method="post" action="" > 
            <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">

            <!-- Wiki Title -->
            <div class="mb-4">
                <label for="wikiTitle" class="text-sm">Wiki Title:</label>
                <input type="text" id="wikiTitle" name="WikiTitre" value="<?php echo $wiki['name_Wiki']?>" placeholder="Enter the title of your wiki" class="w-full p-2 border rounded-md" >
            </div>

            <!-- Wiki Content -->
            <div class="mb-4">
                <label for="wikiContent" class="text-sm">Wiki Content:</label>
                <textarea id="wikiContent" name="WikiContenu" placeholder="Enter your wiki" class="w-full p-2 border rounded-md"><?php echo $wiki['contenu']?></textarea>
            </div>

            <!-- Wiki Category -->
            <div class="mb-4">
                <label for="wikiCategory" class="text-sm">Select Category:</label>
                <select name="categorie" class="w-full p-2 mb-4 border rounded-md" >
                    <option value="" selected disabled>Select Category</option>
                    <?php foreach ($Catégorie as $category): ?>
                        <option <?php if($category['name_Categorie'] == $wiki['name_Categorie']){ echo 'selected';} ?> value="<?php echo $category['id_Categorie']; ?>"><?php echo $category['name_Categorie']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Wiki Tags -->
            <div class="mb-4">
                <label class="text-sm mb-2">Select tags for your wiki:</label>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($wikisController->getWikiTags() as $tag): ?>
                        <label class="flex items-center space-x-2">
                        <input <?php if(in_array($tag['nameTag'], $wikiTags)){ echo 'checked';} ?> type="checkbox" name="WikiTags[]" value="<?php echo $tag['idTag']; ?>">
                            <span class="text-gray-800"><?php echo $tag['nameTag']; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <input type="hidden" name="wikiID" value="<?php echo $wiki['idWiki']; ?>">
            <button type="submit" name="edit" class="mt-4 px-4 py-2 bg-gray-400 text-white rounded w-20 text-center">
                edit
            </button> 
            <div class="flex flex-col gap-5">
                <a href="auteur.php" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded w-20 text-center">
               Close
                </a>
            </div>

            
</body>