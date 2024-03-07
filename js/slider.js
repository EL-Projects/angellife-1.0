// document.addEventListener("DOMContentLoaded", function () {
//   const carousels = document.querySelectorAll(
//     ".carousel",
//     "carousel2",
//     "carousel3",
//     "carousel4",
//     "carousel5"
//   );

//   carousels.forEach(function (carousel, index) {
//     const prevBtn = document.querySelectorAll(".prev-btn")[index];
//     const nextBtn = document.querySelectorAll(".next-btn")[index];
//     let currentIndex = 0;

//     function showCurrentIndex() {
//       carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
//     }

//     function nextSlide() {
//       currentIndex = (currentIndex + 1) % carousel.children.length;
//       showCurrentIndex();
//     }

//     function prevSlide() {
//       currentIndex =
//         (currentIndex - 1 + carousel.children.length) %
//         carousel.children.length;
//       showCurrentIndex();
//     }

//     nextBtn.addEventListener("click", nextSlide);
//     prevBtn.addEventListener("click", prevSlide);
//   });
// });

// dddddddd
// document.addEventListener("DOMContentLoaded", function () {
//   const carouselIds = [
//     "carousel1",
//     "carousel2",
//     "carousel3",
//     "carousel4",
//     "carousel5",
//   ];

//   carouselIds.forEach(function (carouselId) {
//     const carousel = document.getElementById(carouselId);
//     const prevBtn = document.getElementById(`${carouselId}-prev`);
//     const nextBtn = document.getElementById(`${carouselId}-next`);
//     let currentIndex = 0;
//     let touchStartX = 0;
//     let touchEndX = 0;

//     function showCurrentIndex() {
//       carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
//     }

//     function nextSlide() {
//       currentIndex = (currentIndex + 1) % carousel.children.length;
//       showCurrentIndex();
//     }

//     function prevSlide() {
//       currentIndex =
//         (currentIndex - 1 + carousel.children.length) %
//         carousel.children.length;
//       showCurrentIndex();
//     }

//     function handleTouchStart(event) {
//       touchStartX = event.touches[0].clientX;
//     }

//     function handleTouchMove(event) {
//       touchEndX = event.touches[0].clientX;
//     }

//     function handleTouchEnd() {
//       const diff = touchEndX - touchStartX;
//       if (Math.abs(diff) > 50) {
//         if (diff > 0) {
//           prevSlide();
//         } else {
//           nextSlide();
//         }
//       }
//     }

//     nextBtn.addEventListener("click", nextSlide);
//     prevBtn.addEventListener("click", prevSlide);
//     carousel.addEventListener("touchstart", handleTouchStart);
//     carousel.addEventListener("touchmove", handleTouchMove);
//     carousel.addEventListener("touchend", handleTouchEnd);
//   });
// });

// new js
var swiper = new Swiper(".mySwiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".mySwiper1", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".mySwiper2", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".mySwiper3", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".mySwiper4", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
