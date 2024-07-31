

<?php $__env->startSection('title', 'Product List'); ?>

<?php $__env->startSection('content'); ?>
    <?php if($cartItems->count() > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->Product_Name); ?></td>
                    <td><?php echo e($item->Product_Qty); ?></td>
                    <td>$<?php echo e(number_format($item->Product_Price, 2)); ?></td>
                    <td><?php echo e($item->Product_Description); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="py-12" style="margin-top: 10%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php echo e(__("Your cart is empty!")); ?>

                
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>


<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\laravel11-crash-course\resources\views/products/cart.blade.php ENDPATH**/ ?>