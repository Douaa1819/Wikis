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
            <button onclick="showHome()" class="bg-transparent w-52 text-gray-300 py-6 px-4 mt-40 rounded hover:bg-black transition duration-300">Home</button><br>
            <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Catégorie</button><br>
            <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Tags</button><br>
            <button class="bg-transparent w-52 text-gray-300 py-6 px-4 rounded hover:bg-black transition duration-300">Wiki</button>
        </div>
        <div class="flex flex-col">
     
    <div class="p-8 flex flex-wrap gap-16">
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-100 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-users text-2xl"></i> Users</p>
                <!-- usercount -->
                <p class="text-2xl font-semibold"></p>
           </div>
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-100 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-file-alt text-2xl"></i> Wikis</p>
                <!-- wikicount -->
                <p class="text-2xl font-semibold"> </p>
           </div>
           <div class="w-64 h-40 flex flex-col gap-3 items-center justify-center text-center bg-gray-100 rounded-xl border border-gray-300 transform transition-transform hover:scale-110">
                <p class="text-3xl text-black font-semibold"><i class="fas fa-th-large text-2xl"></i> Categories</p>
                <p class="text-2xl font-semibold"></p>
           </div>
</div>
        </div>
        </div>
    </div>

   


</body>

</html>
