<?php
require_once '../Controllers/Admins.php'; 


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
        </div>
        <div class=" w-full mx-auto">
            <div class="h-20 text-center"></div>
        
        <div class=" w-ful mx-auto">
            <table class="w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Number</th>
                        <th class="border p-2">Gmail Author</th>
                        <th class="border p-2">Wiki Title</th>
                        <th class="border p-2">Texte</th>
                        <th class="border p-2">Image</th>
                        <th class="border p-2">Category </th>
                        <th class="border p-2">Archive</th>
                    </tr>
                </thead>
                <tbody>
        
        <tr class="border">
            <td class="border p-2"></td>
            <td class="border p-2"></td>
            <td class="border p-2"></td>
            <td class="border p-2"></td>
            <td class="border p-2"> <img class="w-10 h-10 rounded-full mr-4">  </td>
            <td class="border p-2"></td>
            <td class="border p-2 flex justify-around">
            <i class="fas fa-archive"></i>

            </td>
 
        </tr>
    </tbody>
</table>
</div>
</div>

</body>

</html>
