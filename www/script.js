  
  // Hamburger menu toggle
  const hamburger = document.getElementById('hamburger');
  const navLinks = document.getElementById('navLinks');
  // Toggle the 'open' class on navLinks when hamburger is clicked
  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });


// Session timer
const timer = document.getElementById('session-timer');
const startTime = Math.floor(Date.now() / 1000); 

if (timer) {
  function runTimer() {
    const now = Math.floor(Date.now() / 1000);
    const elapsed = now - startTime;
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;

    timer.textContent =
      `${minutes}:${seconds.toString().padStart(2, '0')}`;
  }

  setInterval(runTimer, 1000);
}
