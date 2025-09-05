<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>About Us - Androcie Bagtas Lying-in Clinic</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<style>
  :root {
    --color-primary: #1e3a8a;
    --color-yellow: #facc15;
    --color-yellow-dark: #d4aa07;
    --color-black: #000000;
    --font-family: 'Poppins', sans-serif;
    --color-text: #222;
    --color-skyblue: #87ceeb;
    --color-primary-dark: #1e40af;
    --color-success: #10b981;
    --color-success-dark: #059669;
    --color-bg: #fff;
    --color-panel-bg: #e0f7fa;
    --color-btn-bg: #fff;
    --color-btn-border: #333;
    --color-btn-hover: #e0e7ff;
    --border-radius: 0.5rem;
    --btn-padding: 0.75rem 1.5rem;
    --transition: background-color 0.3s, color 0.3s, box-shadow 0.3s;
    --shadow: 0 4px 12px rgba(0,0,0,0.08);
  }
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  body {
    font-family: var(--font-family);
    margin: 0;
    padding: 2rem 1rem;
    background: var(--color-bg);
    color: var(--color-text);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 12px solid var(--color-primary);
    overflow-x: hidden;
  }
  .background-blur {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 75vw;
    height: 60vh;
    background: linear-gradient(135deg, #3b82f6 0%, #fde68a 100%);
    filter: blur(48px);
    transform: translate(-50%, -50%);
    border-radius: 3rem;
    z-index: 0;
    opacity: 0.65;
    box-shadow:
      0 0 80px 30px #3b82f6cc,
      0 0 80px 50px #facc1580;
    pointer-events: none;
  }
  .button-container {
    margin-bottom: 2rem;
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    justify-content: center;
  }
  button {
    cursor: pointer;
    font-weight: 600;
    font-size: 1rem;
    border-radius: var(--border-radius);
    border: none;
    padding: var(--btn-padding);
    background: var(--color-primary);
    color: #fff;
    transition: var(--transition);
    box-shadow: var(--shadow);
    outline: none;
  }
  button:hover, button:focus {
    background-color: var(--color-primary-dark);
    color: #fff;
  }
  .home-btn {
    background: var(--color-success);
  }
  .home-btn:hover, .home-btn:focus {
    background-color: var(--color-success-dark);
  }
  .active-button {
    background-color: var(--color-skyblue);
    color: #000;
    box-shadow: 0 0 0 3px #bae6fd;
  }
  .content-panel {
    display: none;
    position: relative;
    background-color: var(--color-panel-bg);
    padding: 2rem 2rem 3rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    max-width: 700px;
    width: 100%;
    margin: 0 auto;
    animation: fadeIn 0.4s;
    z-index: 1;
  }
  .content-panel.active {
    display: block;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .go-back-btn {
    position: absolute;
    top: 1rem;
    left: 1rem;
    background: var(--color-btn-bg);
    color: var(--color-text);
    border: 2px solid var(--color-btn-border);
    border-radius: var(--border-radius);
    padding: 0.5rem 1.2rem;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
    z-index: 2;
  }
  .go-back-btn:hover, .go-back-btn:focus {
    background-color: var(--color-btn-hover);
    color: var(--color-primary-dark);
    border-color: var(--color-primary-dark);
  }
  .about-text {
    margin-top: 2.5rem;
    font-size: 1.15rem;
    line-height: 1.7;
    color: var(--color-text);
  }
  .about-text h2 {
    margin-bottom: 1rem;
    font-size: 2rem;
    color: var(--color-primary-dark);
    font-weight: 700;
    letter-spacing: 1px;
  }
  .motto {
    font-style: italic;
    text-align: center;
    margin: 2rem 0 0.5rem;
    font-size: 1.4rem;
    color: var(--color-primary-dark);
    font-weight: 600;
  }
  @media (max-width: 600px) {
    .content-panel {
      padding: 1.2rem 0.5rem 2.5rem;
      max-width: 98vw;
    }
    .about-text h2 {
      font-size: 1.3rem;
    }
    .about-text {
      font-size: 1rem;
    }
    .button-container {
      gap: 0.5rem;
    }
    button, .go-back-btn {
      font-size: 0.95rem;
      padding: 0.6rem 1rem;
    }
  }
  .about-center-image {
    display: block;
    position: relative;
    max-width: 750px;
    width: 100%;
    margin: 0 auto 2rem auto;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(30,58,138,0.15);
  }
  .modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(30, 58, 138, 0.18);
    z-index: 1000;
    display: block;
    transition: opacity 0.3s;
  }
  .modal-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1001;
    max-width: 98vw;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: none;
  }
  .modal-container .content-panel {
    display: none;
    min-width: 320px;
    max-width: 700px;
    width: 100%;
    margin: 0 auto;
    z-index: 21;
    animation: fadeIn 0.4s;
  }
  .modal-container .content-panel.active {
    display: block;
  }
</style>
</head>
<body>
  <div class="background-blur" aria-hidden="true"></div>
  <div class="button-container">
    <button id="homeBtn" class="home-btn" onclick="window.location.href='homepage.php'">Home</button>
    <button id="aboutUsBtn" aria-controls="aboutUsContent" aria-expanded="false">About Us</button>
    <button id="missionBtn" aria-controls="missionContent" aria-expanded="false">Mission</button>
    <button id="visionBtn" aria-controls="visionContent" aria-expanded="false">Vision</button>
    <button id="addressBtn" aria-controls="addressContent" aria-expanded="false">Contact Us</button>
  </div>
  <img src="image.jpg" alt="Clinic" class="about-center-image" />

  <!-- Modal Structure -->
  <div id="modalOverlay" class="modal-overlay" style="display:none;" hidden></div>
  <div id="modalContainer" class="modal-container" style="display:none;" hidden>
    <section id="aboutUsContent" class="content-panel" aria-labelledby="aboutUsBtn">
      <button class="go-back-btn" aria-label="Go Back to buttons">Go Back</button>
      <div class="about-text">
        <h2>About Us</h2>
        <p>Welcome to Androcie Bagtas Lying-in Clinic! We are dedicated to providing outstanding services that empower our patients and communities. Our mission is to innovate with passion, integrity, and commitment.</p>
        <p class="motto">"Even in Rest, Service Continues."</p>
      </div>
    </section>
    <section id="missionContent" class="content-panel" aria-labelledby="missionBtn">
      <button class="go-back-btn" aria-label="Go Back to buttons">Go Back</button>
      <div class="about-text">
        <h2>Our Mission</h2>
        <p>To offer exceptional prenatal and children services with safe and comfortable and personalized care for every patients we serve.</p>
      </div>
    </section>
    <section id="visionContent" class="content-panel" aria-labelledby="visionBtn">
      <button class="go-back-btn" aria-label="Go Back to buttons">Go Back</button>
      <div class="about-text">
        <h2>Our Vision</h2>
        <p>To be the leading provider of compassionate and comprehensive prenatal care with safe and joyful childbirth experiences.</p>
      </div>
    </section>
    <section id="addressContent" class="content-panel" aria-labelledby="addressBtn">
      <button class="go-back-btn" aria-label="Go Back to buttons">Go Back</button>
      <div class="about-text">
        <h2>Contact Us</h2>
        <p><strong>Androcie Bagtas Lying-in Clinic</strong><br>
        Kanto, Kalye 30, Kanluran street<br>
        Brgy. Bagtas, Tanza Cavite<br>
        Phone: 09623261206</p>
      </div>
    </section>
  </div>

  <script>
    const buttons = {
      aboutUs: document.getElementById('aboutUsBtn'),
      mission: document.getElementById('missionBtn'),
      vision: document.getElementById('visionBtn'),
      address: document.getElementById('addressBtn')
    };
    const contents = {
      aboutUs: document.getElementById('aboutUsContent'),
      mission: document.getElementById('missionContent'),
      vision: document.getElementById('visionContent'),
      address: document.getElementById('addressContent')
    };
    const modalOverlay = document.getElementById('modalOverlay');
    const modalContainer = document.getElementById('modalContainer');
    let currentContent = null;

    function showModal(contentId) {
      // Hide all content panels
      Object.values(contents).forEach(content => {
        content.style.display = 'none';
        content.classList.remove('active');
      });
      // Show modal and overlay
      modalOverlay.hidden = false;
      modalContainer.hidden = false;
      modalOverlay.style.display = 'block';
      modalContainer.style.display = 'flex';
      // Show selected content
      contents[contentId].style.display = 'block';
      contents[contentId].classList.add('active');
      currentContent = contentId;
      // Trap focus
      contents[contentId].querySelector('.go-back-btn').focus();
    }
    function hideModal() {
      modalOverlay.hidden = true;
      modalContainer.hidden = true;
      modalOverlay.style.display = 'none';
      modalContainer.style.display = 'none';
      if (currentContent) {
        contents[currentContent].style.display = 'none';
        contents[currentContent].classList.remove('active');
        buttons[currentContent].focus();
        currentContent = null;
      }
    }
    // Add click event listeners for all buttons
    Object.keys(buttons).forEach(key => {
      buttons[key].addEventListener('click', () => showModal(key));
      contents[key].querySelector('.go-back-btn').addEventListener('click', hideModal);
    });
    // Close modal when clicking overlay
    modalOverlay.addEventListener('click', hideModal);
    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
      if (!modalContainer.hidden && (e.key === 'Escape' || e.key === 'Esc')) {
        hideModal();
      }
    });
  </script>
</body>
</html>