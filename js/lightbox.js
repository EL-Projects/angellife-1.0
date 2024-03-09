var currentImageIndex = 0;
var images = [
  [
    "images/main.jpg",
    "images/main-new.jpg",
    "image1_3.jpg",
    "image1_4.jpg",
    "image1_5.jpg",
  ],
  [
    "images/main.jpg",
    "images/main-new.jpg",
    "image2_3.jpg",
    "image2_4.jpg",
    "image2_5.jpg",
  ],
  [
    "images/main.jpg",
    "images/main-new.jpg",
    "image3_3.jpg",
    "image3_4.jpg",
    "image3_5.jpg",
  ],
  [
    "images/main.jpg",
    "images/main-new.jpg",
    "image3_3.jpg",
    "image3_4.jpg",
    "image3_5.jpg",
  ],
  // Add more arrays of image URLs here for each lightbox
];

var startX = 0;
var endX = 0;
function openLightbox(lightboxId) {
  currentImageIndex = 0;
  updateImage(lightboxId);
  document.getElementById(`lightbox-${lightboxId}`).style.display = "block";
  document.documentElement.style.overflow = "hidden"; // Disable scrolling
}

// function closeLightbox(lightboxId) {
//   document.getElementById(`lightbox-${lightboxId}`).style.display = "none";
//   document.documentElement.style.overflow = "auto"; // Enable scrolling
// }

function closeLightbox(lightboxId) {
  document.getElementById(`lightbox-${lightboxId}`).style.display = "none";
  document
    .getElementById(`lightbox-${lightboxId}`)
    .removeEventListener("click", closeLightboxOutside);
}
function prevImage(lightboxId) {
  if (currentImageIndex > 0) {
    currentImageIndex--;
    updateImage(lightboxId);
  }
}

function nextImage(lightboxId) {
  if (currentImageIndex < images[lightboxId - 1].length - 1) {
    currentImageIndex++;
    updateImage(lightboxId);
  }
}

function updateImage(lightboxId) {
  document.getElementById(`lightbox-img-${lightboxId}`).src =
    images[lightboxId - 1][currentImageIndex];
}

function handleTouchStart(event) {
  startX = event.touches[0].clientX;
}

function handleTouchMove(event) {
  endX = event.touches[0].clientX;
  handleSwipe();
}

function handleTouchEnd(event) {
  startX = 0;
  endX = 0;
}

function handleSwipe() {
  var threshold = 50; // Adjust as needed
  if (startX - endX > threshold) {
    nextImage(currentLightboxId);
  } else if (endX - startX > threshold) {
    prevImage(currentLightboxId);
  }
}

function closeLightboxOutside(event) {
  if (event.target.classList.contains("lightbox")) {
    var lightboxId = parseInt(event.currentTarget.id.replace("lightbox-", ""));
    closeLightbox(lightboxId);
  }
}
