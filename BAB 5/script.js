// Fungsi untuk menampilkan snackbar dengan logo
function showSnackbar(message) {
  const snackbar = document.getElementById("snackbar");
  const messageElement = document.getElementById("snackbar-message");
  
  messageElement.textContent = message;
  snackbar.classList.remove("hidden");
  snackbar.classList.add("show");

  // Menghilangkan snackbar setelah beberapa detik
  setTimeout(() => {
    snackbar.classList.remove("show");
    snackbar.classList.add("hidden");
  }, 3000); // 3000 ms atau 3 detik
}
document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById('formService');
  const modal = document.getElementById('modalPopup');
  const closeBtn = document.querySelector('.close');
  const okBtn = document.getElementById('okBtn');

  // Function to show the modal popup
  function showModal() {
      modal.style.display = 'block';
  }

  // Function to close the modal popup
  function closeModal() {
      modal.style.display = 'none';
  }

  // Event listener for close buttons
  closeBtn.addEventListener('click', closeModal);
  okBtn.addEventListener('click', closeModal);

  // Show modal when form is submitted
  form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission
      showModal(); // Display the modal popup
  });
});

