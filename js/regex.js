// --------------------------------------------------form validation script--------------------------------------------------

// input variables

var form = document.getElementById('form');
var fullName = document.getElementById('fullName');
var email = document.getElementById('email');
var password = document.getElementById('password');
var repeatPassword = document.getElementById('repeatPassword');


// error messages variables

var FullNameInputHelp = document.getElementById('FullNameInputHelp');
var EmailInputHelp = document.getElementById('EmailInputHelp');
var PasswordInputHelp = document.getElementById('PasswordInputHelp');
var ReapeatPasswordInputHelp = document.getElementById('ReapeatPasswordInputHelp');

// Regex values

const NameRegex = /^[A-Za-z]+(?: [A-Za-z]+)*$/;
const EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;

// Submit only after all values are correct function

form.addEventListener('submit', e => {
  e.preventDefault();

  var passwordValue = password.value;

  if(NameRegex.test(fullName.value) && EmailRegex.test(email.value) && PasswordRegex.test(passwordValue) && (passwordValue === repeatPassword.value)){
    form.submit();
  }
})

// Full Name Error Check

fullName.addEventListener('input', function(e) { 
    var currentValue = e.target.value;
    var valid = NameRegex.test(currentValue);
  
    if(!valid){
      FullNameInputHelp.style.display = 'block';
      fullName.className = "bg-red-50 border border-black text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-black focus:border-ring-black block w-full ";
    } else {
      FullNameInputHelp.style.display = 'none';
      fullName.className = "w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF";
    }
  })
  
  // Email Error Check
  
  email.addEventListener('input', function(e) {
    var currentValue = e.target.value;
    var valid = EmailRegex.test(currentValue);
  
    if(!valid){
      EmailInputHelp.style.display = 'block';
      email.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
    } else {
      EmailInputHelp.style.display = 'none';
      email.className = "w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF";
    }
  })
  
  // Password Error Check
  
  password.addEventListener('input', function(e) {
    var currentValue = e.target.value;
    var valid = PasswordRegex.test(currentValue);
  
    if(!valid){
      PasswordInputHelp.style.display = 'block';
      // password.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
    } else {
      PasswordInputHelp.style.display = 'none';
      password.className = "w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF";
    }
  })
  
  // Password Repeat Match Check

  repeatPassword.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var passwordValue = password.value;

  if(!(passwordValue === currentValue)){
    ReapeatPasswordInputHelp.style.display = 'block';
    // repeatPassword.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    ReapeatPasswordInputHelp.style.display = 'none';
     repeatPassword.className = "w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF";
  }
})

// login

document.getElementById('formLogin').addEventListener('submit', function (event) {
  var emailValue = document.getElementById('emailLogin').value;
  var passwordValue = document.getElementById('passwordLogin').value;

  var EmailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  var PasswordRegex = /^(?=.*[0-9])(?!.*[^0-9a-zA-Z-_@])[a-zA-Z0-9-_@]{8,}$/;

  // Email validation
  var emailInput = document.getElementById('emailLogin');
  var emailHelp = document.getElementById('EmailLoginInputHelp');
  if (!EmailRegex.test(emailValue)) {
      event.preventDefault();
      emailHelp.style.display = 'block';
      emailInput.classList.add("border-red-500", "focus:border-red-500", "focus:ring-red-500");
  } else {
      emailHelp.style.display = 'none';
      emailInput.classList.remove("border-red-500", "focus:border-red-500", "focus:ring-red-500");
  }

  // Password validation
  var passwordInput = document.getElementById('passwordLogin');
  var passwordHelp = document.getElementById('PasswordLoginInputHelp');
  if (!PasswordRegex.test(passwordValue)) {
      event.preventDefault();
      passwordHelp.style.display = 'block';
      passwordInput.classList.add("border-red-500", "focus:border-red-500", "focus:ring-red-500");
  } else {
      passwordHelp.style.display = 'none';
      passwordInput.classList.remove("border-red-500", "focus:border-red-500", "focus:ring-red-500");
  }
});
