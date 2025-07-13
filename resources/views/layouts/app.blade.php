<style>
/* Example: Customize DataTables sorting icons */
table.dataTable thead .sorting:after {
    content: "⇅";          /* default icon for unsorted */
    opacity: 0.5;
    margin-left: 0px;
  }
  table.dataTable thead .sorting_asc:after {
    content: "▲";          /* up arrow for ascending */
    margin-left: 0px;
  }
  table.dataTable thead .sorting_desc:after {
    content: "▼";          /* down arrow for descending */
    margin-left: 0px;
  }

</style>


<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    @yield('styles')
</head>

<body class="bg-light">
    <div class="container-fluid">
        <!-- Sidebar on top -->
        <div class="row">
            <nav class="col-12 bg-light p-3 mb-3">
                @include('layouts.sidebar')
            </nav>
        </div>

        <!-- Main content (table, etc.) below -->
        <div class="row">
            <main class="col-12 p-3">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery -->

    <script src="{{ asset('vendor/jquery/jquery-3.7.1.js') }}"></script>


    <!-- SweetAlert2 -->
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Init DataTables -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
          $('.dataTable').DataTable({
            responsive: true,
            autoWidth: true,
            pageLength: 10,
            ordering: true,               // enable ordering globally
            order: [],                    // no initial sorting
            columnDefs: [
              { orderable: false, targets: [-1, -1] }  // example: disable ordering on first & last columns
            ]
          });
        });
      </script>

    <!-- Toasts -->
    @if(session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif

    @if(session('info'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'info',
                title: "{{ session('info') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif

    @yield('scripts')
</body>
</html>
