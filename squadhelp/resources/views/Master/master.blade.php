<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
    
  </script>

  <title>@yield('title')</title>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      outline: none;
      box-sizing: border-box;
      font-family: 'Montserrat', sans-serif;
    }

    body {
      background: #f2f2f2;
    }

    nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: black;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      height: 70px;
      padding: 0 100px;
      z-index: 5;
    }

    nav .logo {
      color: #fff;
      font-size: 30px;
      font-weight: 600;
      letter-spacing: -1px;
    }

    nav .nav-items {
      display: flex;
      flex: 1;
      padding: 0 0 0 40px;
    }

    nav .nav-items li {
      list-style: none;
      padding: 0 15px;
    }

    nav .nav-items li a {
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      text-decoration: none;
    }

    nav .nav-items li a:hover {
      color: #ff3d00;
    }

    nav form {
      display: flex;
      height: 40px;
      padding: 2px;
      background: #1e232b;
      min-width: 18% !important;
      border-radius: 2px;
      border: 1px solid rgba(155, 155, 155, 0.2);
    }

    nav form .search-data {
      width: 100%;
      height: 100%;
      padding: 0 10px;
      color: #fff;
      font-size: 17px;
      border: none;
      font-weight: 500;
      background: none;
    }

    nav form button {
      padding: 0 15px;
      color: #fff;
      font-size: 17px;
      background: #ff3d00;
      border: none;
      border-radius: 2px;
      cursor: pointer;
    }

    nav form button:hover {
      background: #e63600;
    }

    nav .menu-icon,
    nav .cancel-icon,
    nav .search-icon {
      width: 40px;
      text-align: center;
      margin: 0 50px;
      font-size: 18px;
      color: #fff;
      cursor: pointer;
      display: none;
    }

    nav .menu-icon span,
    nav .cancel-icon,
    nav .search-icon {
      display: none;
    }

    .notification {
      text-decoration: none;
      position: relative;
      display: inline-block;
      border-radius: 2px;
    }


    .notification .badge {
      position: absolute;
      top: -10px;
      left: 50px;
      padding: 3px 6px;
      border-radius: 50%;
      background-color: red;
      color: white;
      font-size: 13px;
    }

    @media (max-width: 1245px) {
      nav {
        padding: 0 50px;
      }

      .notification .badge {
        top: -20px;
        left: 70px;
        padding: 3px 12px;
        font-size: 10px;
      }
    }

    @media (max-width: 1140px) {
      nav {
        padding: 0px;
      }

      nav .logo {
        flex: 2;
        text-align: center;
      }

      nav .nav-items {
        position: fixed;
        z-index: 99;
        top: 70px;
        width: 100%;
        left: -100%;
        height: 100%;
        padding: 10px 50px 0 50px;
        text-align: center;
        background: #14181f;
        display: inline-block;
        transition: left 0.3s ease;
      }

      nav .nav-items.active {
        left: 0px;
      }

      nav .nav-items li {
        line-height: 40px;
        margin: 30px 0;
      }

      nav .nav-items li a {
        font-size: 20px;
      }

      nav form {
        position: absolute;
        top: 80px;
        right: 50px;
        opacity: 0;
        pointer-events: none;
        transition: top 0.3s ease, opacity 0.1s ease;
      }

      nav form.active {
        top: 95px;
        opacity: 1;
        pointer-events: auto;
      }

      nav form:before {
        position: absolute;
        content: "";
        top: -13px;
        right: 0px;
        width: 0;
        height: 0;
        z-index: -1;
        border: 10px solid transparent;
        border-bottom-color: #1e232b;
        margin: -20px 0 0;
      }

      nav form:after {
        position: absolute;
        content: '';
        height: 60px;
        padding: 2px;
        background: #1e232b;
        border-radius: 2px;
        min-width: calc(100% + 20px);
        z-index: -2;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
      }

      nav .menu-icon {
        display: block;
      }

      nav .search-icon,
      nav .menu-icon span {
        display: block;
      }

      nav .menu-icon span.hide,
      nav .search-icon.hide {
        display: none;
      }

      nav .cancel-icon.show {
        display: block;
      }
    }

    .content {
      position: absolute;
      top: 50%;
      left: 50%;
      text-align: center;
      transform: translate(-50%, -50%);
    }

    .content header {
      font-size: 30px;
      font-weight: 700;
    }

    .content .text {
      font-size: 30px;
      font-weight: 700;
    }

    .space {
      margin: 10px 0;
    }

    nav .logo.space {
      color: red;
      padding: 0 5px 0 0;
    }

    @media (max-width: 980px) {

      nav .menu-icon,
      nav .cancel-icon,
      nav .search-icon {
        margin: 0 20px;
      }

      nav form {
        right: 30px;
      }
    }

    @media (max-width: 350px) {

      nav .menu-icon,
      nav .cancel-icon,
      nav .search-icon {
        margin: 0 10px;
        font-size: 16px;
      }
    }

    .content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .content header {
      font-size: 30px;
      font-weight: 700;
    }

    .content .text {
      font-size: 30px;
      font-weight: 700;
    }

    .content .space {
      margin: 10px 0;
    }

    /* .left-container {
      height: 90vh;
      width: 20%;
      position: fixed;
      top: 3.7rem;
      display: flex;
      flex-direction: column;
      border-right: 2px solid black;
    }

    .left-container>div:hover {
      transition: .3s ease-in-out;
    }

    .left-container>div:hover {
      background-color: black;
      cursor: pointer;
      color: black;
    }

    .circle {
      height: 50px;
      width: 50px;
      border: 1px solid rgb(179, 2, 2);
      border-radius: 50%;
      margin-right: 10px;
    }

    .circle img {
      width: 100%;
      height: 100%;
      object-fit: conver;
      border-radius: 50%;
    }

    .year {
      font-weight: 500;
    }

    .badge-notify {
      background: red;
      position: relative;
      top: -20px;
      left: -20px;
      border-radius: 50%;
      color: white;
    } */

    .right-container {
      width: 100%;
      margin-top: 6rem;
      display:flex;
      flex-direction:column;
      justify-content:center;
      align-items:center;
    }


    .post-container {
      background-color: rgb(238, 238, 238);
      border-radius: 5px;
      width: 90%;
      padding: 1.5rem 1.5rem;
    }

    .post-container img {
      height: 50px;
      width: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .userdetails-container {
      display: flex;
    }

    .user-image {
      margin-top: .5rem;
    }

    .post-container h1 {
      font-size: 1.5rem;
      margin-left: 1rem;
      margin-top: .5rem;
    }

    .post-container h2 {
      font-size: .7rem;
      opacity: .8;
      margin-left: 1rem;
    }

    .question-container {
      margin-top: 1rem;
    }

    .posted {
      margin-top: 2rem;
      position: relative;
    }

    .post-date {
      position: absolute;
      right: 2%;
      top: 15%;
    }

    .post-date p {
      color: red;
      font-weight: 500;
    }

    .question-info {
      margin-top: .5rem;
      display: flex;
      flex-direction: row;
    }

    .votes {
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      align-items: center;
    }

    .votes h4 {
      font-size: 15px;
      margin-top:10px;
    }

    .votes i {
      cursor: pointer;
      transition: .3s ease-in-out;
    }

    .question p {
      font-weight: bold;
      font-size: 1.2rem;
    }

    .message-icon {
      position: relative;
      color: black;
      font-size: 20px;
    }


    @media screen and (max-width: 650px) {
      .left-container {
        display: none;
      }

      .post-date {
        font-size: .8rem;
      }

      .post-container h1 {
        font-size: 1.2rem;
      }

      .post-container h2 {
        font-size: .6rem;
      }

      .right-container {
        width: 100%;
        margin-left: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .post-container {
        width: 90%;
      }

      .question p {
        font-size: .8rem;
      }

      .votes h4 {
        font-size: 12px;
      }

      .filter{
          display:none;
        }

    }

    .filter-options{
        margin: 0 10px;
      }

      .filter-heading{
        font-size:30px;
        color:black;
        font-weight:bold;
        text-transform:uppercase;
        margin:40px;
      }

      .checkbox{
        display:none;
      }

      .checkbox:checked ~ label{
        background-color: #cc3227;
      }

      .filter-options label{
        font-size:20px;
        border-radius:10px;
        font-weight:bold;
        background-color:#bfbfbf;
        padding:10px 10px;
        color:white;
        cursor:pointer;
        transition:.2s ease-out;
      }

      .filter-options label:hover{
        transform:scale(.95);
      }

      .post-container form{
          display:flex;
          position:relative;
        }
      
      .filter-btn{
        border:none;
        background-color:none;
        padding:10px 10px;
        background-color:#33adff;
        border-radius:10px;
        color:white;
        font-size:20px;
        font-weight:bold;
        text-transform:uppercase;
        position:absolute;
        right:50px;
        transition:.2s ease-out;
      }

      .filter-btn:hover{
        transform:scale(.95);
      }
  </style>
@yield('header') 
</head>


<body>

  <!-- navbar -->
  <nav>
    <div class="menu-icon">
      <span class="fas fa-bars"></span>
    </div>
    <div class="logo">LOGO</div>
    <div class="nav-items">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="/ask">Ask</a></li>
      <li>
        <a href="#" class="notification">
          <span>Inbox</span>
          <span class="badge">3</span>
        </a>
      </li>
    </div>
    <div class="search-icon">
      <span class="fas fa-search"></span>
    </div>
    <div class="cancel-icon">
      <span class="fas fa-times"></span>
    </div>
    <form action="#">
      <input type="search" class="search-data" placeholder="Search" required>
      <button type="submit" class="fas fa-search"></button>
    </form>
  </nav>

  <!-- contents -->
  <div>
    @yield('content')
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>

</body>

</html>