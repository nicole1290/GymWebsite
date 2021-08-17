// Password Visibility

// First Select icon and password input using querySelection
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password');
// Then, attach an event listener to the togglePassword icon  
// toggle the type attribute of the password field as well as the class of the icon:
togglePassword.addEventListener('click', function (e) {
  // toggle the type attribute
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  // toggle the eye slash icon
  this.classList.toggle('fa-eye-slash');
});

// End of Password Visibility Part

