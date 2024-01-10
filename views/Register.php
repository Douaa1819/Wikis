<?php
require_once '../Controllers/inscription.php';

$inscrptionObj = new InscriptionController();
$inscrptionObj->inscriptionUtilisateur();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/image/licon.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>wiki</title>
</head>

<body class="min-h-screen flex flex-col items-center justify-center">

    <div id="form-container" class="form-container">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Sign Up</h1>
        </div>
        <form id="form" action="" method="post">
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" id="fullName" type="text" name="nameInsc" placeholder="Full Name">
            </div>
            <p class="hidden text-red-500" id="FullNameInputHelp">invalid nom</p>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" id="email" type="email" name="emailInsc" placeholder="Email">
            </div>
            <p class="hidden" id="EmailInputHelp">invalid Email</p>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" id="password" type="password" name="passwordInsc" placeholder="Password">
            </div>
            <p class="hidden" id="PasswordInputHelp">invalid  password</p>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" id="repeatPassword" type="password" name="passwordInsc" placeholder="repeat Password">
            </div>
            <p class="hidden" id="ReapeatPasswordInputHelp">matched</p>

            <div class="text-center">
                <input class="bg-#8B4513 text-gray py-2 px-8 rounded-xl cursor-pointer border border-#8B4513 hover:bg-gray-300 hover:text-#8B4513 duration-300 ease-in-out" type="submit" name="submitInsc" value="Sign Up">
            </div>
        </form>
        <div class="text-center mt-4">
            <button id="showLoginFormBtn" class="hover:underline cursor-pointer">Already have an account? Login</button>
        </div>
    </div>

    <div id="loginForm" class="form-container mt-8" style="display: none;">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">Sign In</h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" type="email" name="email" placeholder="Email">
            </div>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" type="password" name="password" placeholder="Password">
            </div>
            <div class="text-center mt-5">
                <input class="bg-#8B4513 text-gray py-2 px-8 rounded-xl cursor-pointer border border-#8B4513 hover:bg-gray-300 hover:text-#8B4513 duration-300 ease-in-out" type="submit" name="submit" value="Login">
            </div>
        </form>

        <div class="text-center mt-7">
            <button id="showSignUpFormBtn" class="text-#1E90FF hover:underline cursor-pointer">Don't have an account? Sign Up</button>
        </div>
    </div>

    <script src="../js/regex.js"></script>
    <script>
        document.getElementById('showSignUpFormBtn').addEventListener('click', function () {
            document.getElementById('form-container').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
            setTimeout(() => {
                document.getElementById('form-container').style.opacity = '1';
            }, 0);
        });

        document.getElementById('showLoginFormBtn').addEventListener('click', function () {
            document.getElementById('form-container').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('form-container').style.display = 'none';
                document.getElementById('loginForm').style.display = 'block';
            }, 500);
        });
    </script>

</body>

</html>
