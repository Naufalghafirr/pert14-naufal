<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel with ajax</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/DataTables-1.13.3/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .bg-gradient-danger {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(102, 126, 234, 0.1) !important;
            transform: scale(1.01);
            transition: all 0.2s ease;
        }
        .btn {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .form-control, .form-select {
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
        }
        .modal-content {
            border-radius: 15px;
        }
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0,0,0,0.175) !important;
        }
    </style>
</head>
<body>
    <div class="d-flex" style="min-height: 100vh">
        <div class="bg-danger text-white p-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 220px; width: 250px">
            <div class="mb-4 text-center">
                <img src="{{ secure_asset('assets/image/logo.png') }}" alt="logo" class="img-fluid" style="max-width: 180px; height: auto;">
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white">
                        <i class="fas fa-tachometer-alt me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mahasiswa') }}" class="nav-link text-white">
                        <i class="fas fa-users me-2"></i>
                        Data Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link text-white border-0 bg-transparent" style="width: 100%; text-align: left;" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="flex-fill">
            <nav class="navbar navbar-expand-lg px-4 d-flex justify-content-between navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <a href="#" class="navbar-brand">
                        <i class="fas fa-university me-2 text-primary"></i>
                        <span class="text-primary fw-bold">Sistem Informasi</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <span class="nav-link text-muted">
                                    <i class="fas fa-user-circle me-1"></i>
                                    Selamat Datang <b>{{ auth()->user()->name }}</b>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ secure_asset('assets/jquery-3.6.1.js') }}"></script>
    <script src="{{ secure_asset('assets/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('assets/datatables.min.js') }}"></script>
    <script src="{{ secure_asset('assets/toastr.min.js') }}"></script>
    <script src="{{ secure_asset('assets/DataTables-1.13.3/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ secure_asset('assets/DataTables-1.13.3/js/jquery.dataTables.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
