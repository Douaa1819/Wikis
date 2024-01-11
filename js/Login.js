// login

var loginFormElement = document.getElementById('formLogin');
var emailLogin = document.getElementById('emailLogin');
var passwordLogin = document.getElementById('passwordLogin');



var EmailLoginInputHelp = document.getElementById('EmailLoginInputHelp');
var PasswordLoginInputHelp = document.getElementById('PasswordLoginInputHelp');

loginFormElement.addEventListener('submit', e => {
  e.preventDefault();


  console.log("Email value:", emailLogin.value);
  console.log("Password value:", passwordLogin.value);

  if (EmailRegex.test(emailLogin.value) && PasswordRegex.test(passwordLogin.value)) {
    console.log("Form submitted!");
    loginFormElement.submit();
  } else {
    console.log("Validation failed. Form not submitted.");
  }
});


passwordLogin.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = PasswordRegex.test(currentValue);

  if(!valid){
    PasswordLoginInputHelp.style.display = 'block';
    passwordLogin.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    PasswordLoginInputHelp.style.display = 'none';
    passwordLogin.className = "w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF";
  }
})

emailLogin.addEventListener('input', function(e) {
  var currentValue = e.target.value;
  var valid = EmailRegex.test(currentValue);

  if(!valid){
    EmailLoginInputHelp.style.display = 'block';
    emailLogin.className = "bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5";
  } else {
    EmailLoginInputHelp.style.display = 'none';
    emailLogin.className = "w-full p-2 border-b-2 border-gray-300 focus:outline-none focus:border-#00BFFF";
  }
})



