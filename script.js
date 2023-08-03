// handle blinking animation

const inputsAnimation = document.querySelectorAll(".blinking-placeholder");

inputsAnimation.forEach((input) => {
  input.addEventListener("focus", function () {
    input.classList.remove("blinking-placeholder");
  });

  input.addEventListener("blur", function () {
    input.classList.add("blinking-placeholder");
  });
});

// end handle blinking animation

// bootstrap modal script

var modalId = document.getElementById("modalId");

modalId.addEventListener("show.bs.modal", function (event) {
  // Button that triggered the modal
  let button = event.relatedTarget;
  // Extract info from data-bs-* attributes
  let recipient = button.getAttribute("data-bs-whatever");

  // Use above variables to manipulate the DOM
});

// end bootstrap modal script
