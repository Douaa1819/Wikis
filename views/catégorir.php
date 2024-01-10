<?php
require_once '../Controllers/Admins.php'; 
$catégorieObj = new CategorieModel();
$categories = $catégorieObj->getCategories();
$categoryIds = $catégorieObj->getCategoriesId(); 
$categoryNames = $catégorieObj->getCategoriesName();
if (isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];
    $catégorieObj->addCategory($categoryName);
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
 



    <?php if ($categories): ?>
        <table class="mx-auto my-8 w-4/5 bg-gray-200 border border-collapse border-gray-300 ">
    <thead>
        <tr class="bg-gray-400">
            <th class="border p-3 text-left">ID</th>
            <th class="border p-3 text-left">Name</th>
            <th class="border p-3 text-left">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($categoryIds); $i++): ?>
            <tr class="hover:bg-gray-100">
                <td class="border p-3"><?php echo $categoryIds[$i]; ?></td>
                <td class="border p-3"><?php echo $categoryNames[$i]; ?></td>
                <td class="border p-3">
                    <button onclick="editCategory(<?php echo $categoryIds[$i]; ?>)" class="bg-green-500 text-white py-1 px-2 rounded-md hover:bg-green-600">Edit</button>
                    <button onclick="deleteCategory(<?php echo $categoryIds[$i]; ?>)" class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600">Delete</button>
                </td>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>
<?php else: ?>
    <p>No categories available.</p>
<?php endif; ?>
    <div class="flex flex-col items-center mt-8">
        <button onclick="showAddCategoryPopup()" class="bg-gray-500 text-white py-2 px-3  mr-4 rounded-md hover:bg-gray-300">Add Category</button>
    </div>
    <!-- Add Category -->

    <div id="addCategoryPopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-md">
            <h2 class="text-2xl font-semibold mb-4">Add Category</h2>
            <form action="catégorir.php" method="post">
                <input type="text" name="categoryName" placeholder="Category Name" class="w-full p-2 mb-4 border rounded-md">
                <button type="submit" name="addCategory" class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-800">Add</button>
            </form>
            <button onclick="closeAddCategoryPopup()" class="bg-gray-300 text-black py-2 px-4 rounded-md hover:bg-gray-400">Cancel</button>
        </div>
    </div>

    <script>
        function showAddCategoryPopup() {
            document.getElementById('addCategoryPopup').style.display = 'block';
        }

        function closeAddCategoryPopup() {
            document.getElementById('addCategoryPopup').style.display = 'none';
        }

        function editCategory(categoryId) {
            
        }

        function deleteCategory(categoryId) {
         
        }
    </script>
</body>

</html>
