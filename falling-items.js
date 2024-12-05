document.addEventListener("DOMContentLoaded", () => {
    const overlay = document.querySelector(".falling-items-overlay");
    const items = document.querySelectorAll(".falling-item");
  
    document.body.appendChild(overlay); // Move to the end of the body
  
    // Get the total page height (including footer)
    const pageHeight = document.documentElement.scrollHeight;
    const viewportHeight = window.innerHeight;
  
    // Calculate the scrolling height
    const scrollHeight = pageHeight - viewportHeight;
  
    // Set the animation duration dynamically based on page height
    items.forEach((item) => {
      item.style.animationDuration = `${scrollHeight / 200}px`; // Adjust speed here
      item.style.setProperty("--scroll-height", `${scrollHeight}px`);
    });
  
    // Remove overlay after all items have disappeared
    setTimeout(() => {
      overlay.remove();
    }, scrollHeight * 10); // Matches dynamic animation duration
  });
  