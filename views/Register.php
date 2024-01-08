<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>wiki</title>
</head>
<style>
    body {
        background-color: #FFFFFF; 
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
    }


    #signupForm {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }



    .form-container {
        background-color: #F5F5F5; 
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin-top: 8px;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #D3D3D3; 
        border-radius: 4px;
        outline: none;
        transition: border-color 0.3s ease-in-out;
    }

    .form-container input:focus,
    .form-container select:focus {
        border-color: #00BFFF; /* Bleu ciel */
    }

    .form-container button {/* Marron clair */
        color: #000;
        padding: 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

  

    .form-container a {
        color: #1E90FF; 
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .form-container a:hover {
        color: #4169E1; 
    }
</style>

<body class="min-h-screen flex flex-col items-center justify-center">

    <div id="signupForm" class="form-container">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Sign Up</h1>
        </div>
        <form action="" method="post">
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" type="text" name="name" placeholder="Full Name">
            </div>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" type="email" name="email" placeholder="Email">
            </div>
            <div class="mb-4">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" type="password" name="password" placeholder="Password">
            </div>
            <div class="mb-8">
                <input class="w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF" type="password" name="repeat-password" placeholder="Repeat Password">
            </div>
         
            <div class="text-center">
                <input class="bg-#8B4513 text-gray py-2 px-8 rounded-xl cursor-pointer border border-#8B4513 hover:bg-gray-300 hover:text-#8B4513 duration-300 ease-in-out" type="submit" name="signup" value="Sign Up">
            </div>
        </form>
        <div class="text-center mt-4">
            <button id="showLoginFormBtn" class=" hover:underline cursor-pointer">Already have an account? Login</button>
        </div>
    </div>

    <div id="loginForm" class="form-container mt-8">
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
                <input class="bg-#8B4513 text-gray py-2 px-8 rounded-xl cursor-pointer border border-#8B4513 hover:bg-gray-300 hover:text-#8B4513 duration-300 ease-in-out" type="submit" name="login" value="Login">
            </div>
        </form>
        
        <div class="text-center mt-7">
            <button id="showSignUpFormBtn" class="text-#1E90FF hover:underline cursor-pointer">Don't have an account? Sign Up</button>
        </div>
    </div>

</body>
<script>
    document.getElementById('showSignUpFormBtn').addEventListener('click', function () {
        document.getElementById('signupForm').style.display = 'block';
        document.getElementById('loginForm').style.display = 'none';
        setTimeout(() => {
            document.getElementById('signupForm').style.opacity = '1';
        }, 0);
    });

    document.getElementById('showLoginFormBtn').addEventListener('click', function () {
        document.getElementById('signupForm').style.opacity = '0';
        setTimeout(() => {
            document.getElementById('signupForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        }, 500);
    });
</script>

</html>
