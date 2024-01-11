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

<body class="bg-no-repeat bg-right bg-fixed" style="background-image: url('../public/image/wikiii.png'); background-size: contain;">

<div class="lg:flex lg:justify-between lg:bg-white">

    <div class="lg:flex-shrink-0">
        <img src="../public/image/logo.png" alt="logo" class="lg:w-32 lg:h-32">
    </div>
<div class="flex space-x-24 mt-12">
      <div class="max-w-2xl  px-4 h-10 flex space-x-36 border rounded-xl overflow-hidden ">
  <input type="text" placeholder="Search for anything" class="flex-1 h-full  bg-white focus:outline-none">
  <div class="flex items-center justify-center h-full w-10 bg-white">
      <i class="fas fa-search text-gray-400"></i>
  </div>

</div>

<div id="openPopup" class="flex justify-end cursor-pointer items-center">
                        <i class="fas fa-plus-circle text-4xl text-green-500"></i>
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
                        <a href="index.php" class="text-xl w-full hover:bg-gray-300 hover:text-white">Home</a>
                        <a href="#" class="text-xl w-full hover:bg-gray-300 hover:text-white">Account</a>
                        <a href="#" class="text-xl w-full hover:bg-gray-300 hover:text-white">Contact Us</a>
                    </div>
                </nav>
            </div>

</div>
<div id="popup" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center">
    <div class="max-w-screen-lg mx-auto p-6 bg-white rounded-xl shadow-md">
        <!-- Contenu de la popup -->
        <label for="inputText" class="block text-gray-700 text-sm font-bold mb-2">Text Input:</label>
        <input type="text" id="inputText" class="w-full p-2 border rounded mb-4" placeholder="Enter your wiki here">

        <label class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
        <div class="flex flex-wrap mb-4">
            <!-- Ajoutez autant d'éléments checkbox que nécessaire -->
            <label for="label1" class="mr-4">tag2 </label>
            <input type="checkbox" id="label1" class="mr-2">

            <label for="label2" class="mr-4">Tag 1</label>
            <input type="checkbox" id="label2" class="mr-2">
           

            <!-- Ajoutez plus d'éléments selon vos besoins -->
        </div>
    </div>
</div>

<div class="lg:flex lg:space-x-8 mt-4">

    <div class="lg:flex-1 lg:max-w-4xl lg:mb-10">

        <div class="lg:flex lg:rounded-xl lg:bg-gray-100 lg:mb-10">
            <!-- img from database -->
            <img class="lg:h-64 lg:w-64 object-cover lg:rounded-l-xl" src="../public/image/visiteur.jpg" alt="IMG" />
            <div class="lg:flex lg:flex-col lg:justify-start lg:p-12">
                <!-- titre from database -->
                <h5 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">Card title</h5>
                <!-- contenu from database -->
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    This is a wider card with supporting text below as a natural lead-in
                    to additional content. This content is a little bit longer.
                </p>
                <p class="text-xs text-neutral-500 dark:text-neutral-300">Last updated 3 mins ago</p>
            </div>
        </div>
<!-- cart2 -->
        <div class="lg:flex lg:rounded-xl lg:bg-gray-100 lg:mb-10">
            <!-- img from database -->
            <img class="lg:h-64 lg:w-64 object-cover lg:rounded-l-xl" src="../public/image/visiteur.jpg" alt="IMG" />
            <div class="lg:flex lg:flex-col lg:justify-start lg:p-12">
                <!-- titre from database -->
                <h5 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">Card title</h5>
                <!-- contenu from database -->
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    This is a wider card with supporting text below as a natural lead-in
                    to additional content. This content is a little bit longer.
                </p>
                <p class="text-xs text-neutral-500 dark:text-neutral-300">Last updated 3 mins ago</p>
            </div>
        </div>
    </div>

</div>

<script src="../public/js/main.js"></script>
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
   
