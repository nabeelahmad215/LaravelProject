<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>HRMS - Dashboard</title>
  <style>
    /* Google Fonts Import Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;

    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 260px;
      background: #000000;
      z-index: 100;
      transition: all 0.5s ease;
    }

    .sidebar.close {
      width: 78px;
    }

    .sidebar .logo-details {
      height: 60px;
      width: 100%;
      display: flex;
      align-items: center;
    }

    .sidebar .logo-details i {
      font-size: 30px;
      color: #fff;
      height: 50px;
      min-width: 78px;
      text-align: center;
      line-height: 50px;
    }

    .sidebar .logo-details .logo_name {
      font-size: 22px;
      color: #fff;
      font-weight: 600;
      transition: 0.3s ease;
      transition-delay: 0.1s;
    }

    .sidebar.close .logo-details .logo_name {
      transition-delay: 0s;
      opacity: 0;
      pointer-events: none;
    }

    .sidebar .nav-links {
      height: 100%;
      padding: 30px 0 150px 0;
      overflow: auto;
    }

    .sidebar.close .nav-links {
      overflow: visible;
    }

    .sidebar .nav-links::-webkit-scrollbar {
      display: none;
    }

    .sidebar .nav-links li {
      position: relative;
      list-style: none;
      transition: all 0.4s ease;
    }

    .sidebar .nav-links li:hover {
      background: #030303;
      color: rgb(255, 255, 255);
    }

    .sidebar .nav-links li .iocn-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .sidebar.close .nav-links li .iocn-link {
      display: block
    }

    .sidebar .nav-links li i {
      height: 50px;
      min-width: 78px;
      text-align: center;
      line-height: 50px;
      color: #ffffff;
      font-size: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .sidebar .nav-links li.showMenu i.arrow {
      transform: rotate(-180deg);
    }

    .sidebar.close .nav-links i.arrow {
      display: none;
    }

    .sidebar .nav-links li a {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .sidebar .nav-links li a .link_name {
      font-size: 18px;
      font-weight: 400;
      color: rgb(182, 182, 182);
      transition: all 0.4s ease;
    }

    .sidebar.close .nav-links li a .link_name {
      opacity: 0;
      pointer-events: none;
    }

    .sidebar .nav-links li .sub-menu {
      padding: 6px 6px 14px 80px;
      margin-top: -10px;
      background: #000000;
      display: none;
    }

    .sidebar .nav-links li.showMenu .sub-menu {
      display: block;
    }

    .sidebar .nav-links li .sub-menu a {
      color: #fff;
      font-size: 15px;
      padding: 5px 0;
      white-space: nowrap;
      transition: all 0.3s ease;
    }

    .sidebar .nav-links li .sub-menu a:hover {
      color: #037971;
    }

    .sidebar.close .nav-links li .sub-menu {
      position: absolute;
      left: 100%;
      top: -10px;
      margin-top: 0;
      padding: 10px 20px;
      border-radius: 0 6px 6px 0;
      opacity: 0;
      display: block;
      pointer-events: none;
      transition: 0s;
    }

    .sidebar.close .nav-links li:hover .sub-menu {
      top: 0;
      opacity: 1;
      pointer-events: auto;
      transition: all 0.4s ease;
    }

    .sidebar .nav-links li .sub-menu .link_name {
      display: none;
    }

    .sidebar.close .nav-links li .sub-menu .link_name {
      font-size: 18px;
      opacity: 1;
      display: block;
    }

    .sidebar .nav-links li .sub-menu.blank {
      opacity: 1;
      pointer-events: auto;
      padding: 3px 20px 6px 16px;
      opacity: 0;
      pointer-events: none;
    }

    .sidebar .nav-links li:hover .sub-menu.blank {
      top: 50%;
      transform: translateY(-50%);
    }

    .sidebar .profile-details {
      position: fixed;
      bottom: 0;
      width: 260px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #036D66;
      padding: 12px 0;
      transition: all 0.5s ease;
    }

    .sidebar.close .profile-details {
      background: none;
    }

    .sidebar.close .profile-details {
      width: 78px;
    }

    .sidebar .profile-details .profile-content {
      display: flex;
      align-items: center;
    }

    .sidebar .profile-details img {
      height: 52px;
      width: 52px;
      object-fit: cover;
      border-radius: 16px;
      margin: 0 14px 0 12px;
      background: #d11323;
      transition: all 0.5s ease;
    }

    .sidebar.close .profile-details img {
      padding: 10px;
    }

    .sidebar .profile-details .profile_name,
    .sidebar .profile-details .job {
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      white-space: nowrap;
    }

    .sidebar.close .profile-details i,
    .sidebar.close .profile-details .profile_name,
    .sidebar.close .profile-details .job {
      display: none;
    }

    .sidebar .profile-details .job {
      font-size: 12px;
    }

    .home-section {
      position: relative;
      background: #E4E9F7;
      height: 100vh;
      left: 260px;
      width: calc(100% - 260px);
      transition: all 0.5s ease;
    }

    .sidebar.close~.home-section {
      left: 78px;
      width: calc(100% - 78px);
    }

    .home-section .home-content {
      height: 60px;
      display: flex;
      align-items: center;
    }

    .home-section .home-content .bx-menu,
    .home-section .home-content .text {
      color: #11101d;
      font-size: 35px;
    }

    .home-section .home-content .bx-menu {
      margin: 0 15px;
      cursor: pointer;
    }

    .home-section .home-content .text {
      font-size: 26px;
      font-weight: 600;
    }

    @media (max-width: 420px) {
      .sidebar.close .nav-links li .sub-menu {
        display: none;
      }
    }
  </style>

</head>

<body>
  <!-- partial:index.partial.html -->
  <html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | lalit kumar metta </title>-->
    <style>
      /* Google Fonts Import Link */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;

      }

      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 260px;
        background: #036D66;
        z-index: 100;
        transition: all 0.5s ease;
      }

      .sidebar.close {
        width: 78px;
      }

      .sidebar .logo-details {
        height: 60px;
        width: 100%;
        display: flex;
        align-items: center;
      }

      .sidebar .logo-details i {
        font-size: 30px;
        color: #fff;
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
      }

      .sidebar .logo-details .logo_name {
        font-size: 22px;
        color: #fff;
        font-weight: 600;
        transition: 0.3s ease;
        transition-delay: 0.1s;
      }

      .sidebar.close .logo-details .logo_name {
        transition-delay: 0s;
        opacity: 0;
        pointer-events: none;
      }

      .sidebar .nav-links {
        height: 100%;
        padding: 30px 0 150px 0;
        overflow: auto;
      }

      .sidebar.close .nav-links {
        overflow: visible;
      }

      .sidebar .nav-links::-webkit-scrollbar {
        display: none;
      }

      .sidebar .nav-links li {
        position: relative;
        list-style: none;
        transition: all 0.4s ease;
      }

      .sidebar .nav-links li:hover {
        background: #28BC89;
        color: rgb(255, 255, 255);
      }

      .sidebar .nav-links li .iocn-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
      }

      .sidebar.close .nav-links li .iocn-link {
        display: block
      }

      .sidebar .nav-links li i {
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        color: #ffffff;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .sidebar .nav-links li.showMenu i.arrow {
        transform: rotate(-180deg);
      }

      .sidebar.close .nav-links i.arrow {
        display: none;
      }

      .sidebar .nav-links li a {
        display: flex;
        align-items: center;
        text-decoration: none;
      }

      .sidebar .nav-links li a .link_name {
        font-size: 18px;
        font-weight: 400;
        color: #ffffff;
        transition: all 0.4s ease;
      }

      .sidebar.close .nav-links li a .link_name {
        opacity: 0;
        pointer-events: none;
      }

      .sidebar .nav-links li .sub-menu {
        padding: 6px 6px 14px 80px;
        margin-top: -10px;
        background: #28BC89;
        display: none;
      }

      .sidebar .nav-links li.showMenu .sub-menu {
        display: block;
      }

      .sidebar .nav-links li .sub-menu a {
        color: white;
        font-size: 15px;
        padding: 5px 0;
        white-space: nowrap;
        transition: all 0.3s ease;
      }

      .sidebar .nav-links li .sub-menu a:hover {
        color: #037971;
      }

      .sidebar.close .nav-links li .sub-menu {
        position: absolute;
        left: 100%;
        top: -10px;
        margin-top: 0;
        padding: 10px 20px;
        border-radius: 0 6px 6px 0;
        opacity: 0;
        display: block;
        pointer-events: none;
        transition: 0s;
      }

      .sidebar.close .nav-links li:hover .sub-menu {
        top: 0;
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
      }

      .sidebar .nav-links li .sub-menu .link_name {
        display: none;
      }

      .sidebar.close .nav-links li .sub-menu .link_name {
        font-size: 18px;
        opacity: 1;
        display: block;
      }

      .sidebar .nav-links li .sub-menu.blank {
        opacity: 1;
        pointer-events: auto;
        padding: 3px 20px 6px 16px;
        opacity: 0;
        pointer-events: none;
      }

      .sidebar .nav-links li:hover .sub-menu.blank {
        top: 50%;
        transform: translateY(-50%);
      }

      .sidebar .profile-details {
        position: fixed;
        bottom: 0;
        width: 260px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #036D66;
        padding: 12px 0;
        transition: all 0.5s ease;
      }

      .sidebar.close .profile-details {
        background: none;
      }

      .sidebar.close .profile-details {
        width: 78px;
      }

      .sidebar .profile-details .profile-content {
        display: flex;
        align-items: center;
      }

      .sidebar .profile-details img {
        height: 52px;
        width: 52px;
        object-fit: cover;
        border-radius: 16px;
        margin: 0 14px 0 12px;
        background: #d11323;
        transition: all 0.5s ease;
      }

      .sidebar.close .profile-details img {
        padding: 10px;
      }

      .sidebar .profile-details .profile_name,
      .sidebar .profile-details .job {
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        white-space: nowrap;
      }

      .sidebar.close .profile-details i,
      .sidebar.close .profile-details .profile_name,
      .sidebar.close .profile-details .job {
        display: none;
      }

      .sidebar .profile-details .job {
        font-size: 12px;
      }

      .home-section {
        position: relative;
        background: #E4E9F7;
        height: 100vh;
        left: 260px;
        width: calc(100% - 260px);
        transition: all 0.5s ease;
      }

      .sidebar.close~.home-section {
        left: 78px;
        width: calc(100% - 78px);
      }

      .home-section .home-content {
        height: 60px;
        display: flex;
        align-items: center;
      }

      .home-section .home-content .bx-menu,
      .home-section .home-content .text {
        color: #11101d;
        font-size: 35px;
      }

      .home-section .home-content .bx-menu {
        margin: 0 15px;
        cursor: pointer;
      }

      .home-section .home-content .text {
        font-size: 26px;
        font-weight: 600;
      }

      @media (max-width: 420px) {
        .sidebar.close .nav-links li .sub-menu {
          display: none;
        }
      }
    </style>

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div class="sidebar close">
      <div class="logo-details">
        <i class='bx bxl-redbubble'></i>
        <span class="logo_name">Retrobuzz</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#">
            <i class='bx bx-grid-alt'></i>
            <span class="link_name">Dashboard</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Dashboard</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-user-pin me-icon'></i>
              <span class="link_name">Recruitment</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Recruitment</a></li>
            <li><a href="#">Job Request</a></li>
            <li><a href="#">Candidates</a></li>
            <li><a href="#">Job Interview</a></li>
            <li><a href="#">Interview Feedback</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-user me-icon'></i>
              <span class="link_name">Employee</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Employee</a></li>
            <li><a href="#">Employee Information</a></li>
            <li><a href="#">Complaint</a></li>
            <li><a href="#">Promotion</a></li>
            <li><a href="#">Warning</a></li>
            <li><a href="#">Resignation</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-calendar-alt me-icon'></i>
              <span class="link_name">Leaves</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Leaves</a></li>
            <li><a href="#">Request</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Type</a></li>
            <li><a href="#">Adjustment</a></li>
          </ul>
        </li>
                <li>
          <div class="iocn-link">
            <a href="#">
              <i class='bx bx-wallet-alt me-icon'></i>
              <span class="link_name">Payroll</span>
            </a>
            <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Payroll</a></li>
            <li><a href="#">Salary Sheet</a></li>
            <li><a href="#">Payslip</a></li>
            <li><a href="#">Reimbursement</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog me-icon'></i>
            <span class="link_name">Admin Panel</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Admin Panel</a></li>
          </ul>
        </li>
        <li>
          <div class="profile-details">
            <div class="profile-content">
              <img src="profile.jpg" alt="IMG">
            </div>
            <div class="name-job">
              <div class="profile_name">Username</div>
              <div class="job">Profession</div>
            </div>
            <i class='bx bx-log-out'></i>
          </div>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">WELCOME | {{ $postedData['full_name'] }}</span>
      </div>
    </section>
    <!--script starts here-->
  </body>

  </html>
  <!-- partial -->
  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    });

  </script>

</body>

</html>