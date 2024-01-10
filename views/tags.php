<?php

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

    <div class="flex space-x-56">
        <div class="w-72 h-screen bg-gray-600 p-4">
        <a href="admin.php">
    <button class="bg-transparent w-52 text-gray-300 py-6 px-4 mt-40 rounded hover:bg-black transition duration-300">Home</button>
</a><br>

<a href="catégorir.php">
    <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Catégorie</button>
</a><br>

<a href="tags.php">
    <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Tags</button>
</a><br>

<a href="wiki.php">
    <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Wiki</button>
</a>
        </div>
        <div class="flex flex-col">
           

            <!-- Categories Table -->
            <table class="w-full border border-collapse border-gray-100">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-2">Number</th>
            <th class="border p-2">Category</th>
            <th class="border p-2">Operation</th>
        </tr>
    </thead>
    <tbody>
        </div>
    </div>



    <script>
        function showCategories() {
            var categoriesTable = document.getElementById("categoriesTable");
            categoriesTable.style.display = "table";
        }

        function hideCategories() {
            var categoriesTable = document.getElementById("categoriesTable");
            categoriesTable.style.display = "none";
        }
    </script>
</body>

</html>
