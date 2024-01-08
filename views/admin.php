<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Wiki</title>
</head>

<body class="bg-no-repeat bg-right bg-fixed bg-gray-300 overflow-hidden" style="background-image: url('../public/image/wikiii.png'); background-size: contain;">

    <div>
        <div id="navbar" class="flex justify-between items-center">
            <img src="../public/image/logo.png" alt="logo" width="150px" height="100px">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <img src="../public/image/menu.png" alt="burger_menu" id="iconMenu" class="text-2xl text-black cursor-pointer">
                <div id="burgerMenu" class="hidden bg-gray-300 border justify-end w-screen fixed top-0 right-0 p-4">
                    <i onclick="toggleMenu()" class="fas fa-times absolute top-10 right-10 text-2xl cursor-pointer"></i>
                    <nav class="flex flex-col gap-6 text-center items-center">
                        <div class="flex flex-col gap-2 w-full">
                            <a href="index.php" class="text-lg w-full hover:bg-gray-300 hover:text-gray-800 py-2 px-4 rounded transition duration-300">Home</a>
                            <a href="#" class="text-lg w-full hover:bg-gray-300 hover:text-gray-800 py-2 px-4 rounded transition duration-300">Disconnect</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="flex space-x-56">
        <div class="w-72 h-screen bg-gray-600 p-4">
            <button onclick="showHome()" class="bg-transparent w-52 text-gray-300 py-6 px-4 mt-40 rounded hover:bg-black transition duration-300">Home</button><br>
            <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Catégorie</button><br>
            <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Tags</button><br>
            <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Wiki</button>
        </div>
    </div>

    <div id="homeCard" class="p-4 xl:ml-80 hidden">
        <div class="container mx-auto pr-4">
            <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                <div class="h-20 bg-red-400 flex items-center justify-between">
                    <p class="mr-0 text-white text-lg pl-5">Example Card</p>
                </div>
                <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                    <p>TOTAL</p>
                </div>
                <p class="py-4 text-3xl ml-5">12345</p>
            </div>
        </div>
    </div>

    <script src="../public/js/main.js"></script>
    <script>
        function showHome() {
            document.getElementById("homeCard").style.display = "block";
        }
        function showHome() {
    console.log("Button clicked!");  // Ajoutez cette ligne
    document.getElementById("homeCard").style.display = "block";
}

    </script>
</body>

</html>
