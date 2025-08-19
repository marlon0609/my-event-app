<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} - My Event</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo/icon_white_my_event.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-wrapper {
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper d-flex flex-column min-vh-100">
        <!-- Dashboard Header -->
        <x-dashboard.header />
        
        <!-- Dashboard Content Area -->
        <div class="d-flex flex-grow-1">
            <!-- Dashboard Sidebar -->
            <x-dashboard.sidebar />
            
            <!-- Main Content -->
            <x-dashboard.main>
                {{ $slot }}
            </x-dashboard.main>
        </div>
        
        <!-- Dashboard Footer -->
        <x-dashboard.footer />
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Dashboard specific JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
</body>
</html>
