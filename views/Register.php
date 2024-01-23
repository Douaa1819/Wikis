<?php
require_once '../Controllers/inscription.php';
require_once '../Controllers/login.php';
$inscrptionObj = new InscriptionController();
$inscrptionObj->inscriptionUtilisateur();
if (isset($_POST['submit'])) {
    $loginObj = new TraitementController();
    $loginObj->connexionUtilisateur($_POST['email'], $_POST['password']);
}

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

<body class="min-h-screen flex flex-col items-center justify-center bg-no-repeat bg-right bg-fixed" style="background-image: url('../public/image/wikiii.png'); background-size: contain;">

    <div id="form-container" class="form-container" style="display: none;">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Sign Up</h1>
        </div>
        <form id="form" action="" method="post">
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-500  focus:outline-none focus:border-green-500 " id="fullName" type="text" name="nameInsc" placeholder="Full Name">
            </div>
            <p class="hidden text-red-500 text-sm  font-medium" id="FullNameInputHelp">invalid nom</p>
           
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none  focus:border-green-500 " id="email" type="email" name="emailInsc" placeholder="Email">
            </div>
            <p class="hidden  text-red-500  text-sm  font-medium" id="EmailInputHelp">invalid Email</p>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none  focus:border-green-500" id="password" type="password" name="passwordInsc" placeholder="Password">
            </div>
            <p class="hidden  text-red-500 text-sm  font-medium" id="PasswordInputHelp">invalid  password</p>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none   focus:border-green-500" id="repeatPassword" type="password" name="repeat-password" placeholder="repeat Password">
            </div>
            <p class="hidden  text-red-500 text-sm  font-medium" id="ReapeatPasswordInputHelp"> not Matched</p>
            <div class="text-center">
                  <input class="bg-#8B4513 text-gray py-2 px-8 rounded-xl cursor-pointer border border-#8B4513 hover:bg-gray-300 hover:text-#8B4513 duration-300 ease-in-out" type="submit" name="submitInsc" value="Sign Up">
            </div>
        </form>
        <div class="text-center mt-4">
            <button id="showLoginFormBtn" class="hover:underline cursor-pointer">Already have an account? Login</button>
        </div>
    </div>

    <div id="loginForm" class="form-container mt-8" style="display: block;">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Sign In</h1>
    </div>
    <form id="formLogin" action="" method="post">
        <div class="mb-4">
            <input class="w-full p-2 border-b-2 text-gray-800 border-gray-300  focus:border-green-500" id="emailLogin" type="text" name="email" placeholder="Email">
            <p class="hidden text-red-600 focus:border-red-500  text-sm  font-medium focus:border-#ff0000 " id="EmailLoginInputHelp">Invalid email format</p>
        </div>
        <div class="mb-4">
            <input class="w-full p-2 border-b-2 text-gray-00  border-gray-300  focus:border-#00ff77" id="passwordLogin" type="password" name="password" placeholder="Password">
            <p class="hidden   focus:border-red-500 text-sm  font-medium text-red-600 focus:border-#ff0000" id="PasswordLoginInputHelp">Password should be at least 8 characters</p>
        </div>
        <div class="text-center mt-5">
            <input class="bg-#8B4513 text-gray py-2 px-8 rounded-xl cursor-pointer border border-#8B4513 hover:bg-gray-300 hover:text-#8B4513 duration-300 ease-in-out" type="submit" name="submit" value="Login">
        </div>
    </form>

    <div class="text-center mt-7">
        <button id="showSignUpFormBtn" class="text-#1E90FF hover:underline cursor-pointer">Don't have an account? Sign Up</button>
    </div>
</div>


</script>
    <script src="../js/regex.js"></script>
    <!-- <script src="../js/Login.js"></script> -->
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
