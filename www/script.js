  
  // Hamburger menu toggle
  const hamburger = document.getElementById('hamburger');
  const navLinks = document.getElementById('navLinks');
  // Toggle the 'open' class on navLinks when hamburger is clicked
  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });


// Session timer
const timer = document.getElementById('session-timer');

if (timer && typeof loginTime !== 'undefined') {
  setInterval(() => {
    const now = Math.floor(Date.now() / 1000);
    const elapsed = now - loginTime;

    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;

    timer.textContent =
      `${minutes}:${seconds.toString().padStart(2, '0')}`;
  }, 1000);
}
