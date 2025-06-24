<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Kampus Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero {
            padding: 60px 0 40px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }
        .hero .fa-university {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .fitur-icon {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        .fitur-card {
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(102,126,234,0.08);
            transition: transform 0.2s;
        }
        .fitur-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 8px 32px rgba(102,126,234,0.15);
        }
        .about-section {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(102,126,234,0.07);
            padding: 32px 24px;
            margin-top: 40px;
        }
        .footer {
            text-align: center;
            color: #888;
            padding: 24px 0 12px 0;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <i class="fas fa-university mb-3"></i>
            <h1 class="display-5 fw-bold mb-3">Selamat Datang di Sistem Informasi Kampus Mahasiswa</h1>
            <p class="lead mb-4">Platform digital untuk manajemen data mahasiswa, jadwal kuliah, dan layanan akademik kampus modern.</p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg px-4 shadow-sm">
                            <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg px-4 shadow-sm">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg px-4 shadow-sm">
                                <i class="fas fa-user-plus me-2"></i>Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section class="container py-5">
        <div class="row text-center mb-4">
            <h2 class="fw-bold mb-2">Fitur Unggulan</h2>
            <p class="text-muted">Berbagai kemudahan untuk civitas akademika kampus</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="p-4 bg-white fitur-card h-100">
                    <div class="fitur-icon"><i class="fas fa-users"></i></div>
                    <h5 class="fw-semibold mb-2">Manajemen Mahasiswa</h5>
                    <p class="text-muted">Kelola data mahasiswa secara mudah, cepat, dan terpusat.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="p-4 bg-white fitur-card h-100">
                    <div class="fitur-icon"><i class="fas fa-calendar-alt"></i></div>
                    <h5 class="fw-semibold mb-2">Jadwal Kuliah</h5>
                    <p class="text-muted">Akses jadwal kuliah dan agenda akademik secara online.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="p-4 bg-white fitur-card h-100">
                    <div class="fitur-icon"><i class="fas fa-bullhorn"></i></div>
                    <h5 class="fw-semibold mb-2">Informasi Akademik</h5>
                    <p class="text-muted">Dapatkan pengumuman dan info penting seputar kampus.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="p-4 bg-white fitur-card h-100">
                    <div class="fitur-icon"><i class="fas fa-laptop"></i></div>
                    <h5 class="fw-semibold mb-2">Layanan Online</h5>
                    <p class="text-muted">Berbagai layanan kampus dapat diakses secara daring.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section class="container about-section">
        <div class="row align-items-center">
            <div class="col-md-8 mx-auto text-center">
                <h3 class="fw-bold mb-3">Tentang Sistem</h3>
                <p class="text-muted mb-0">
                    Sistem Informasi Kampus Mahasiswa adalah platform digital yang dirancang untuk memudahkan pengelolaan data, komunikasi, dan layanan akademik di lingkungan kampus. Dengan sistem ini, mahasiswa, dosen, dan staf dapat saling terhubung dan mengakses informasi secara real-time, kapan saja dan di mana saja.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        &copy; {{ date('Y') }} Sistem Informasi Kampus Mahasiswa. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
