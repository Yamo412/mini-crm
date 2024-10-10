<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Make the entire app use Flexbox */
        #app {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure it covers the full height */
        }

        /* Navigation Bar Styles */
        .navbar {
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1050; /* Ensure navbar stays above other content */
        }

        /* Sidebar Styles */
        #sidebar {
            height: 100vh; /* Full height */
            padding-top: 56px; /* Padding to align content with navbar height */
            background-color: #73c2fb5b; /* Full sidebar background color */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0; /* Align to the top of the page */
            left: 0;
            z-index: 1000;
            color: #333;
            overflow-y: auto; /* Enable scrolling if content overflows */
        }

        /* Sidebar Header */
        .sidebar-header {
            
            color: #2e2e2e;
            font-size: 1.2rem;
            padding: 17px 0; /* Adjusted padding */
            text-align: left;
            padding-right: 10px;
        }

        /* Sidebar Link Styles */
        #sidebar .nav-link {
            color: #fff; /* Text color for buttons */
            background-color: #007bff; /* Default button background color */
            font-weight: 500;
            padding: 12px 20px; /* Increased padding for button-like appearance */
            margin-bottom: 10px; /* Increased spacing between buttons */
            margin-top: 20px; /* Added margin-top to move the buttons down */
            text-align: center;
            border-radius: 5px; /* Rounded corners */
            border: 1px solid transparent; /* Border for a defined button appearance */
            transition: background-color 0.3s, border 0.3s, color 0.3s;
        }

        #sidebar .nav-link.active,
        #sidebar .nav-link:hover {
            background-color: #0056b3; /* Darker blue for hover state */
            color: #fff; /* Keep text white */
            border: 1px solid #0056b3; /* Highlight border for active/hover state */
        }

        /* Sidebar Divider */
        .sidebar-divider {
            border-right: 2px solid #ddd;
            height: calc(100vh - 56px); /* Divider height minus the navbar height */
            position: fixed;
            top: 56px; /* Align with the sidebar */
            left: 0;
            z-index: 999;
        }

        /* Main Content */
        .content {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding-top: 70px; /* Padding to account for fixed navbar */
            flex: 1; /* Take up the remaining space */
            overflow-y: auto; /* Enable scrolling within content */
        }

        /* Footer Styles */
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            width: 100%;
            text-align: center;
            position: relative; /* Change to relative position */
            bottom: 0;
            left: 0;
        }

        /* Adjustments for small screens */
        @media (max-width: 768px) {
            .sidebar-divider {
                display: none;
            }

            #sidebar {
                width: 100%; /* Make sidebar full-width on small screens */
                height: auto;
                position: fixed;
                top: 56px; /* Align with the navbar */
                z-index: 1050;
                overflow-y: auto; /* Scrollable content */
            }

            .content {
                margin-left: 0; /* Reset margin for small screens */
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container-fluid">
                <!-- Sidebar Toggle Button (Only visible when logged in) -->
                @auth
                    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endauth

                <!-- Left Side: Mini-CRM Dashboard -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">Mini-CRM Dashboard</a>

                <!-- Right Side Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- Only show Admin and Logout if the user is authenticated -->
                        @auth
                            <li class="nav-item d-flex align-items-center">
                                <span class="nav-link text-dark">Admin</span>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar and Main Content Container -->
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar (Only visible when logged in) -->
                @auth
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar show">
                    <div class="position-sticky">
                        <!-- Sidebar Header -->
                        <div class="sidebar-header">
                            <h4>Mini-CRM</h4>
                        </div>
                
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                                    <span data-feather="home"></span>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('companies.index') ? 'active' : '' }}" href="{{ route('companies.index') }}">
                                    <span data-feather="briefcase"></span>
                                    Company
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('employees.index') ? 'active' : '' }}" href="{{ route('employees.index') }}">
                                    <span data-feather="users"></span>
                                    Employee
                                </a>
                            </li>
                        </ul>
                
                        <!-- Divider -->
                        <div class="sidebar-divider"></div>
                
                        <!-- Sidebar Logout Section -->
                        <div class="px-3 text-center mt-4">
                            <span class="sidebar-heading">Admin</span>
                            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block w-100">Logout</button>
                            </form>
                        </div>
                    </div>
                </nav>
                @endauth

                <!-- Main Content -->
                <main class="content col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="bg-light text-center py-3 mt-auto">
            <div class="container">
                <span class="text-muted">© 2024 Yaman Salman Mini-CRM. All rights reserved.</span>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS for Sidebar Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.querySelector('.navbar-toggler');

            if (toggleButton) {
                toggleButton.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
        });
    </script>
</body>
</html>
