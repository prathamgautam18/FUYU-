document.addEventListener('DOMContentLoaded', function() {
    const profileIcon = document.querySelector('.profile');
    const dropdownContent = document.querySelector('.dropdown-content');
  
    profileIcon.addEventListener('click', function() {
      dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
    });
  
    // Hide dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
      if (!profileIcon.contains(event.target)) {
        dropdownContent.style.display = 'none';
      }
    });
  });