function validateform() {
  // Get the input values
  var fullName = document.querySelector('input[name="fullname"]').value;
  var username = document.querySelector('input[name="username"]').value;
  var email = document.querySelector('input[name="email"]').value;
  var phone = document.querySelector('input[name="phone"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var confirmPassword = document.querySelector('input[name="confirmpassword"]').value;




  // Regular expression patterns for validation
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var phone=/^\d{10}$/;

  // Check full name length
  if (fullName.length < 5 || fullName.length > 30) {
    alert(" Full name should be between 5 and 30 characters long.");
    return false;
  }

  // Check username length
  if (username.length < 6 || username.length > 20) {
    alert("Username should be between 6 and 20 characters long.");
    return false;
  }

  // Check email format
  if (!emailPattern.test(email)) {
    alert("Invalid email address!");
    return false;
  }

  // Check phone number length
  if (phone.length !== 10) {
    alert("Phone number should be 10 digits long.");
    return false;
  }
  if (password.length < 6) {
    alert(" pssword number should be minimum 6 characters long.");
    return false;
  }

  // Check password match
  if (password !== confirmPassword) {
    alert("Passwords do not match!");
    return false;
  }

  // Form is valid
  return true;
}

