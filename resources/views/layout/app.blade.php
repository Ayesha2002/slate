<!DOCTYPE html>
<html>
<head>
    <title>Slate</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/notes" class="text-4xl font-bold text-blue-600">Slate</a>
            <a href="/notes/create" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add Note</a>
        
        </div>
        
    </nav>

    <!-- SUCCESS ALERT -->
    @if(session('success'))
        <div class="container mx-auto mb-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- MAIN CONTENT -->
    <div class="container mx-auto px-6">
        @yield('content')
    </div>

</body>
</html>
