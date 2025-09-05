<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Midwives Portal Dashboard</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

  /* Reset and base */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #c6e0f5 0%, #8abdff 100%);
    color: #1c1e21;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }
  a {
    text-decoration: none;
    color: inherit;
  }
  /* Layout */
  .app-container {
    flex: 1;
    display: flex;
    min-height: 0;
  }

  /* Sidebar */
  .sidebar {
    background-color: #fff;
    width: 280px;
    border-right: 1px solid #dddfe2;
    display: flex;
    flex-direction: column;
    padding: 24px 16px;
    position: fixed;
    top: 0;
    bottom: 56px; /* leave room for bottom logout */
    left: 0;
    overflow-y: auto;
    box-shadow: 2px 0 8px rgb(0 0 0 / 0.05);
  }
  .sidebar .logo {
    font-size: 28px;
    font-weight: 700;
    color: #1877f2;
    margin-bottom: 32px;
    user-select: none;
    cursor: default;
    letter-spacing: 1px;
  }
  .nav-links {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .nav-link {
    display: flex;
    align-items: center;
    gap: 16px;
    font-weight: 600;
    font-size: 15px;
    color: #050505;
    padding: 12px 16px;
    border-radius: 12px;
    cursor: pointer;
    transition: background-color 0.25s ease, color 0.25s ease;
  }
  .nav-link:hover, .nav-link.active {
    background-color: #d5e5fc;
    color: #1877f2;
  }
  .nav-link svg {
    fill: currentColor;
  }

  /* Main Content */
  .main-content {
    margin-left: 280px;
    padding: 32px 48px 96px; /* bottom padding for logout */
    flex: 1;
    overflow-y: auto;
  }

  /* Header */
  .dashboard-header {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 24px;
    user-select: none;
    color: #1877f2;
  }

  /* Cards */
  .card {
    background-color: white;
    border-radius: 16px;
    box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
    padding: 28px 36px;
    margin-bottom: 32px;
  }
  .card h2 {
    font-weight: 700;
    font-size: 22px;
    margin-bottom: 24px;
    color: #0948a4;
  }

  /* Patient Table */
  table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 14px;
  }
  thead tr th {
    text-align: left;
    font-weight: 700;
    font-size: 15px;
    color: #4779d9;
    padding-bottom: 10px;
    border-bottom: 3px solid #bbe0ff;
  }
  tbody tr {
    background: #f0f6ff;
    border-radius: 14px;
    transition: background-color 0.2s ease;
  }
  tbody tr:hover {
    background-color: #cde4ff;
  }
  tbody tr td {
    padding: 14px 20px;
    font-size: 16px;
    color: #0c236e;
    vertical-align: middle;
  }

  /* Schedule List */
  .schedule-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 18px;
  }
  .schedule-item {
    padding: 18px 24px;
    background: #f0f6ff;
    border-radius: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.25s ease;
  }
  .schedule-item:hover {
    background-color: #cde4ff;
  }
  .schedule-item .patient-name {
    font-weight: 700;
    font-size: 17px;
    color: #0c236e;
  }
  .schedule-item .appointment-time {
    font-size: 15px;
    color: #3a5ec1;
  }

  /* Logout Button */
  .logout-container {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 280px;
    background-color: #1877f2;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-top: none;
    padding: 14px 18px;
    display: flex;
    justify-content: center;
    box-shadow: 0 -4px 10px rgb(0 0 0 / 0.12);
  }
  .logout-button {
    width: 100%;
    background-color: #0d52d1;
    color: white;
    font-weight: 700;
    font-size: 17px;
    border: none;
    border-radius: 16px;
    padding: 16px 0;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
  }
  .logout-button:hover {
    background-color: #094aaf;
    box-shadow: 0 0 14px 2px rgba(9, 74, 175, 0.75);
  }
  .logout-button svg {
    fill: white;
  }

  /* Visibility toggling */
  .hidden {
    display: none !important;
  }

  /* Responsive */

  @media (max-width: 1023px) {
    .main-content {
      margin-left: 0;
      padding: 24px 20px 96px;
    }
    .sidebar {
      position: relative;
      width: 100%;
      height: auto;
      border-right: none;
      border-bottom: 1px solid #a3c1ff;
      padding: 20px 32px;
      bottom: auto;
      box-shadow: none;
    }
    .logout-container {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      max-width: 100%;
      padding: 12px 24px;
      box-shadow: 0 -4px 10px rgb(0 0 0 / 0.12);
      border-radius: 0;
    }
  }

  @media (max-width: 639px) {
    body {
      font-size: 14px;
    }
    .dashboard-header {
      font-size: 22px;
      padding-bottom: 12px;
    }
    .card {
      padding: 20px 24px;
      margin-bottom: 28px;
    }
    table thead tr th, tbody tr td {
      font-size: 13px;
      padding: 10px 14px;
    }
    .schedule-item {
      flex-direction: column;
      align-items: flex-start;
      gap: 8px;
    }
    .logout-button {
      font-size: 15px;
      padding: 14px 0;
    }
  }

  /* Material Icons SVG Styling */
  svg.md-icon {
    height: 20px;
    width: 20px;
  }
</style>
</head>
<body>
  <div class="app-container">
    <aside class="sidebar" aria-label="Primary navigation">
      <div class="logo" aria-label="Midwives Portal logo">Midwives Portal</div>
      <nav class="nav-links" role="navigation" aria-label="Main navigation">
        <a href="#" id="nav-patients" class="nav-link active" aria-current="page" tabindex="0">
          <svg class="md-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 14s-1 0-1-1 1-4 6-4 6 4 6 4v5H7v-4zM7 10a4 4 0 1 1 8 0 4 4 0 0 1-8 0z"/></svg>
          Patients
        </a>
        <a href="#" id="nav-schedule" class="nav-link" aria-current="false" tabindex="0">
          <svg class="md-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM5 19V8h14v11H5z"/></svg>
          Schedule
        </a>
      </nav>
    </aside>

    <main class="main-content" role="main" tabindex="-1">
      <h1 class="dashboard-header" id="page-title">Patient Checkup Results</h1>

      <section id="patient-info-section" class="card" aria-labelledby="patients-info-title">
        <h2 id="patients-info-title">Patient Checkup Results</h2>
        <table role="table" aria-describedby="patients-info-desc">
          <thead>
            <tr>
              <th scope="col">Patient Name</th>
              <th scope="col">Last Checkup Date</th>
              <th scope="col">Weight</th>
              <th scope="col">Blood Pressure</th>
              <th scope="col">Notes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mary Johnson</td>
              <td>May 10, 2024</td>
              <td>68 kg</td>
              <td>120/80</td>
              <td>Healthy, no concerns</td>
            </tr>
            <tr>
              <td>Angela Smith</td>
              <td>May 8, 2024</td>
              <td>72 kg</td>
              <td>115/75</td>
              <td>Recommended additional prenatal vitamins</td>
            </tr>
            <tr>
              <td>Karen Williams</td>
              <td>April 22, 2024</td>
              <td>65 kg</td>
              <td>118/79</td>
              <td>Monitor blood pressure next visit</td>
            </tr>
            <tr>
              <td>Patricia Brown</td>
              <td>May 1, 2024</td>
              <td>70 kg</td>
              <td>122/82</td>
              <td>All normal</td>
            </tr>
          </tbody>
        </table>
      </section>

      <section id="schedule-section" class="card hidden" aria-labelledby="schedule-title">
        <h2 id="schedule-title">Next Patient Checkups</h2>
        <ul class="schedule-list" role="list" aria-describedby="schedule-desc">
          <li class="schedule-item">
            <span class="patient-name">Mary Johnson</span>
            <time class="appointment-time" datetime="2024-05-30T10:00">May 30, 2024 - 10:00 AM</time>
          </li>
          <li class="schedule-item">
            <span class="patient-name">Patricia Brown</span>
            <time class="appointment-time" datetime="2024-05-25T14:00">May 25, 2024 - 2:00 PM</time>
          </li>
          <li class="schedule-item">
            <span class="patient-name">Karen Williams</span>
            <time class="appointment-time" datetime="2024-05-28T09:00">May 28, 2024 - 9:00 AM</time>
          </li>
          <li class="schedule-item">
            <span class="patient-name">Angela Smith</span>
            <time class="appointment-time" datetime="2024-06-05T11:30">June 5, 2024 - 11:30 AM</time>
          </li>
        </ul>
      </section>
    </main>
  </div>

  <div class="logout-container">
    <button class="logout-button" aria-label="Log out">
      <svg class="md-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 13v-2H7V8l-5 4 5 4v-3zM20 3h-8a2 2 0 0 0-2 2v3h2V5h8v14h-8v-3h-2v3a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/></svg>
      Logout
    </button>
  </div>

<script>
  // Focus main content on load for accessibility
  document.querySelector('main').focus();

  // Navigation links and sections
  const navLinks = document.querySelectorAll('.nav-link');
  const patientInfoSection = document.getElementById('patient-info-section');
  const scheduleSection = document.getElementById('schedule-section');
  const pageTitle = document.getElementById('page-title');

  function activateSection(sectionId) {
    if (sectionId === 'patients') {
      patientInfoSection.classList.remove('hidden');
      scheduleSection.classList.add('hidden');
      pageTitle.textContent = 'Patient Checkup Results';
      setActiveNavLink('nav-patients');
    } else if (sectionId === 'schedule') {
      scheduleSection.classList.remove('hidden');
      patientInfoSection.classList.add('hidden');
      pageTitle.textContent = 'Next Patient Checkups';
      setActiveNavLink('nav-schedule');
    }
  }

  function setActiveNavLink(activeId) {
    navLinks.forEach(link => {
      if (link.id === activeId) {
        link.classList.add('active');
        link.setAttribute('aria-current', 'page');
      } else {
        link.classList.remove('active');
        link.setAttribute('aria-current', 'false');
      }
    });
  }

  navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      if(link.id === 'nav-patients') {
        activateSection('patients');
      } else if(link.id === 'nav-schedule') {
        activateSection('schedule');
      }
      // Scroll to top of main content on section change
      document.querySelector('.main-content').scrollTop = 0;
    });
  });

  // Default to showing patients information on load
  activateSection('patients');

  // Logout button handler
  document.querySelector('.logout-button').addEventListener('click', () => {
    alert('Logging out...');
    // Add logout logic here
  });
</script>
</body>
</html>

