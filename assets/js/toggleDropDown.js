function toggleDropdown() {
  var dropdownContent = document.getElementById("dropdown-content");
  dropdownContent.classList.toggle("show");
}

function selectOption(option) {
  var dropdownButton = document.getElementById("items");
  dropdownButton.textContent = option;
}