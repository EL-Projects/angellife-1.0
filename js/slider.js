document.addEventListener("DOMContentLoaded", function () {
  const carousels = document.querySelectorAll(
    ".carousel",
    "carousel2",
    "carousel3",
    "carousel4",
    "carousel5"
  );

  carousels.forEach(function (carousel, index) {
    const prevBtn = document.querySelectorAll(".prev-btn")[index];
    const nextBtn = document.querySelectorAll(".next-btn")[index];
    let currentIndex = 0;

    function showCurrentIndex() {
      carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % carousel.children.length;
      showCurrentIndex();
    }

    function prevSlide() {
      currentIndex =
        (currentIndex - 1 + carousel.children.length) %
        carousel.children.length;
      showCurrentIndex();
    }

    nextBtn.addEventListener("click", nextSlide);
    prevBtn.addEventListener("click", prevSlide);
  });
});
