// === Smooth section reveal animation ===
let fadeInObserver = null;

function initFadeInAnimation() {
  // Disconnect previous observer if exists
  if (fadeInObserver) {
    fadeInObserver.disconnect();
  }

  const elements = document.querySelectorAll(".fade-in");

  fadeInObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      }
    });
  }, { threshold: 0.1 });

  elements.forEach(el => fadeInObserver.observe(el));
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", initFadeInAnimation);

// Make function globally accessible for re-initialization after content changes
window.initFadeInAnimation = initFadeInAnimation;

// === Small gold-glow cursor effect ===
let cursor = null;

function initCursorEffect() {
  // Create cursor only once
  if (!cursor) {
    cursor = document.createElement("div");
    cursor.style.width = "18px";
    cursor.style.height = "18px";
    cursor.style.border = "2px solid #d4af37";
    cursor.style.borderRadius = "50%";
    cursor.style.position = "fixed";
    cursor.style.pointerEvents = "none";
    cursor.style.zIndex = "9999";
    cursor.style.transition = "transform 0.1s ease, opacity 0.2s";
    cursor.style.opacity = "0.7";
    document.body.appendChild(cursor);

    document.addEventListener("mousemove", (e) => {
      cursor.style.left = e.clientX - 9 + "px";
      cursor.style.top = e.clientY - 9 + "px";
    });
  }

  // Add hover enlarge to all interactive elements
  document.querySelectorAll("a, button").forEach((el) => {
    // Remove old listeners to prevent duplicates
    el.removeEventListener("mouseenter", enlargeCursor);
    el.removeEventListener("mouseleave", resetCursor);
    
    // Add new listeners
    el.addEventListener("mouseenter", enlargeCursor);
    el.addEventListener("mouseleave", resetCursor);
  });
}

function enlargeCursor() {
  if (cursor) cursor.style.transform = "scale(1.8)";
}

function resetCursor() {
  if (cursor) cursor.style.transform = "scale(1)";
}

// Initialize cursor effect on page load
document.addEventListener("DOMContentLoaded", initCursorEffect);

// Make function globally accessible for re-initialization after content changes
window.initCursorEffect = initCursorEffect;
