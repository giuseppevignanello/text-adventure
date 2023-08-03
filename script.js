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
