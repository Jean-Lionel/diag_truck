<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" defer>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" defer>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <style>

    </style>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bxl-plus-medical'></i>
            <span class="logo_name">DIAGTRACK</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links_name">Tableau De Bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('patient.index') }}">
                    <i class='bx bx-accessibility' ></i>
                    <span class="links_name">Patients</span>
                </a>
            </li>

            <li>
                <a href="{{ route('user.index') }}">
                    <i class='bx bx-user-plus' ></i>
                    <span class="links_name">Personnels</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assignation.index') }}">
                    <i class='bx bx-box' ></i>
                    <span class="links_name">Assignation</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-dna' ></i>
                    <span class="links_name">Diagnostics</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-book-alt' ></i>
                    <span class="links_name">Prescriptions</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-list-ul' ></i>
                    <span class="links_name">Services</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-message' ></i>
                    <span class="links_name">Dossiers Medicals</span>
                </a>
            </li>
            {{-- <li>
                <a href="#">
                    <i class='bx bx-heart' ></i>
                    <span class="links_name">Favrorites</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <span class="links_name">Setting</span>
                </a>
            </li> --}}
            <li class="log_out">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Tableau De Bord</span>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Recherche...">
            <i class='bx bx-search' ></i>
        </div>
        <div class="profile-details">
            <img src="images/profile.jpg" alt="">
            <span class="admin_name">Prem Shahi</span>
            {{-- <i class='bx bx-chevron-down' ></i> --}}
        </div>
    </nav>

    <div class="home-content">

        @yield('content')
    </div>



</section>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@livewireScripts
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            "aaSorting": []
        });
    });
</script>

<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
            sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>

</body>
</html>
