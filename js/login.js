
        function validateform() {
  // Get the input values
  var username = document.querySelector('input[type="text"]').value;
  var password = document.querySelector('input[type="password"]').value;

  // Regular expression pattern to check for special characters
  

  // Check username length and special characters
  if (username.length < 6 || username.length > 20 ) {
    alert("Username must be between 6 and 20 characters ");
    return false;
  }

  // Check password length
  if (password.length < 6 || password.length > 20) {
    alert(" Password must be between 6 and 20 characters long.");
    return false;
  }

  // Form is valid
  return true;
}


   