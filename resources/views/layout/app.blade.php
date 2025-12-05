<!DOCTYPE html>
<html>
<head>
    <title>Slate</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/notes" class="text-4xl font-bold text-blue-600">Slate</a>
            <a href="/notes/create" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add Note</a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-6">
        @yield('content')
    </div>

    <!-- SWEET ALERT SHOULD ALWAYS BE AT THE END OF BODY -->
    @if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon:'success',
                title:'Success',
                text:"{{ session('success') }}",
                timer:1800,
                showConfirmButton:false
            });
        });
    </script>
    @endif

</body>
</html>
