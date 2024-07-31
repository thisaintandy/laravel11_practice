<!-- resources/views/layouts/guest.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'My Laravel App'); ?></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</head>
<body>
    <header>
        <nav style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="<?php echo e(route('products.showAll')); ?>">Home</a>
                <a href="<?php echo e(route('products.viewCart')); ?>">Cart</a> 
            </div>
            <a href="<?php echo e(route('login')); ?>"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Log in
            </a>

        </nav>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
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
                form.action = '<?php echo e(route('logout')); ?>';
    
                // Add CSRF token as hidden input
                var token = document.createElement('input');
                token.type = 'hidden';
                token.name = '_token';
                token.value = '<?php echo e(csrf_token()); ?>';
                form.appendChild(token);
    
                // Append form to the body and submit it
                document.body.appendChild(form);
                form.submit();
            }
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH C:\Users\Admin\laravel11-crash-course\resources\views/layouts/guest.blade.php ENDPATH**/ ?>