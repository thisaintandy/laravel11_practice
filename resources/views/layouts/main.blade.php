<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <header>
        <nav style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('product.index') }}">Home</a>
                <a href="{{ route('product.create') }}">Add Product</a>
            </div>
            <div>
                <a href="{{ route('profile.edit') }}">Profile</a>
                <a href="#" id="logout-link">Logout</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Andy Masarque</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        document.getElementById('logout-link').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default link behavior
            
            if (confirm('Are you sure you want to log out?')) {
                // Create a form dynamically
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route('logout') }}';
    
                // Add CSRF token as hidden input
                var token = document.createElement('input');
                token.type = 'hidden';
                token.name = '_token';
                token.value = '{{ csrf_token() }}';
                form.appendChild(token);
    
                // Append form to the body and submit it
                document.body.appendChild(form);
                form.submit();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
