<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Laravel Sidebar Menu</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" defer rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" defer> 
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" defer>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
  <style>
    /* CSS for Sidebar */
    *{
        margin:0;
        font-family: Arial, Helvetica, sans-serif;
   }
    .sidebar {
      /* width: 200px; */
      min-width: 200px;
      background-color: #f1f1f1;
      height: 100%;
      position: fixed;
    }

    .sidebar a {
      padding: 10px;
      text-decoration: none;
      display: block;
      font-size: 13px;
      text-transform: uppercase;
      font-weight: 600;
    }
    .logout button{
        padding: 6px 10px;
        background-color: rgb(250, 62, 62);
        color: white;
        border:none;
        border-radius: 5px;
    }
    .logout button:hover{
        cursor: pointer;
        background-color: rgb(172, 1, 1);
        transition: .3s;
    }

    .sidebar a:hover {
      background-color: #ddd;
    }

    .dropdown-content {
      display: none;
      padding-left: 20px;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* CSS for Navbar */
    .navbar {
      background-color: #333;
      overflow: hidden;
    padding: 14px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    }
    .search input{
        /* width: 130px; */
        width: 100%;
        max-width: 300px;


    }
    .navbar .logo{
        color: white;
    }

    .navbar input[type="text"] {
      padding: 6px;
      margin-right: 16px;
      font-size: 17px;
      border: none;
      width: 300px;
    }

    /* CSS for Dashboard */
    .dashboard {
      margin-left: 200px;
      padding: 20px;
      margin-left: 0;
      margin-top: 50px;
      padding: 10px;
    }

    /* Responsive Style */
    @media only screen and (max-width: 600px){
      .sidebar{
         display: none; /* Hide the sidebar on smaller screens */
      }

      .dashboard{
        margin-top: 10px; /* Reduce the top margin for better spacing */
      }
    }
  </style>
</head>
<body>
     <div class="navbar">
        <div class="logo">
            <h1>Logo</h1>
        </div>
        {{-- <div class="search">
            <input type="input" placeholder="search">
        </div> --}}
        <div class="logout">
           <button>Se Deconnecter</button>
        </div>
  </div>
  
  <div class="sidebar">
    <a href="#">Home</a>
    <a href="#">About</a>
    <div class="dropdown">
      <a href="#">Services</a>
      <div class="dropdown-content">
        <a href="#">Service 1</a>
        <a href="#">Service 2</a>
        <a href="#">Service 3</a>
      </div>
    </div>
    <a href="#">Contact</a>
  </div>

 

  <div class="dashboard">
     @yield('content')
    <!-- Place your dashboard content here -->
  </div>

  <script>
    // JavaScript for Dropdown
    let dropdowns = document.getElementsByClassName('dropdown');
    for (let i = 0; i < dropdowns.length; i++) {
      dropdowns[i].addEventListener('click', function() {
        this.classList.toggle('active');
        let dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === 'block') {
          dropdownContent.style.display = 'none';
        } else {
          dropdownContent.style.display = 'block';
        }
      });
    }
  </script>
</body>
</html>
