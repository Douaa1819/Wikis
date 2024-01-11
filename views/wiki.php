<?php
require_once '../Controllers/Admins.php'; 
$wikiObj = new  WikiModel();
$wikis = $wikiObj -> getAllwiki();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['archive'])) {
    $wikiId = $_POST['archive'];
    $success = $wikiObj->archiveWiki($wikiId);

    if ($success) {
        echo '<script>alert("Wiki archived successfully.");</script>';
        header("Location: wiki.php");
        exit();}
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

<body class="bg-no-repeat bg-right bg-fixed bg-gray-300 overflow-hidden" style="background-image: url('../public/image/wikiii.png'); background-size: contain;">

    <div class="flex">
        <div class="w-72 h-screen bg-gray-600 p-4">
            <a href="admin.php">
                <button class="bg-transparent w-52 text-gray-300 py-6 px-4 mt-40 rounded hover:bg-black transition duration-300">Home</button>
            </a><br>

            <a href="catégories.php">
                <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Catégorie</button>
            </a><br>

            <a href="tags.php">
                <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Tags</button>
            </a><br>

            <a href="wiki.php">
                <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Wiki</button>
            </a>
            <form action="" method="post">
    <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300" name="logout" type="submit">Log out</button>
    </form>
        </div>
        <div class=" w-full mx-auto">
            <div class="h-20 text-center"></div>
        
        <div class=" w-auto mx-6">
        <form method="post" action="">
            <table class="w-full border border-collapse border-gray-300 ">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Number</th>
                        <th class="border p-2"> Author email </em></th>
                        <th class="border p-2">Wiki Title</th>
                        <th class="border p-2">content</th>
                        <!-- <th class="border p-2">Image</th> -->
                        <!-- <th class="border p-2">Category </th> -->
                        <th class="border p-2">Archive</th>
                    </tr>
                </thead>
                <tbody>
    <?php foreach ($wikis as $wiki): ?>
        <tr class="border">
            <td class="border p-2"><?= $wiki['idWiki']; ?></td>
            <td class="border p-2"><?= $wiki['email']; ?></td>
            <td class="border p-2"><?= $wiki['name_Wiki']; ?></td>
            <td class="border p-2"><?= $wiki['contenu']; ?></td>
            <td class="border p-2 flex justify-around">
                                        <!-- Add a button for archiving with data-wiki-id attribute -->
                                        <button type="submit" class="archive-btn" name="archive" value="<?= $wiki['idWiki']; ?>">
                                            <i class="fas fa-archive"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
        </tbody>
</table>
</div>
</div>

</body>

</html>
