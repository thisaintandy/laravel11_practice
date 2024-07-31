<?php $__env->startSection('title', 'Product List'); ?>

<?php $__env->startSection('content'); ?>
      
                        <?php if(Route::has('login')): ?>

                                <?php if(auth()->guard()->check()): ?>
                                    <a href="<?php echo e(url('product')); ?>"
                                    style="font-size:30px">
                                        Go to Dashboard
                                    </a>
                                <?php else: ?>
                                    <div style="margin-top:10%;">
                                        <div style="background-color: black; color:white; width: 500px;height: 300px; border-radius: 20px; text-decoration: none; text-align:center; padding:10px; margin-bottom:50px;margin-left:37%;">
                                            <a href="<?php echo e(url('products')); ?>" style="font-size:20px; text-decoration: none; font-family: Impact, Charcoal, sans-serif; font-size:100px">
                                                Tindahan ni Kohi
                                            </a>
                                        </div>
                                        <div style="background-color: black; color:white; width: 200px; border-radius: 20px; text-decoration: none; text-align:center; padding:10px; margin-bottom:10px; margin-left:45%;">
                                            <a href="<?php echo e(route('login')); ?>" style="font-size:20px; text-decoration: none; font-family: Impact, Charcoal, sans-serif;">
                                                Log in
                                            </a>
                                        </div>
                                        <?php if(Route::has('register')): ?>
                                        <div style="background-color: black; color:white; width: 200px; border-radius: 20px; text-align:center; padding:10px; margin-bottom:10px; margin-left:45%;">
                                            <a href="<?php echo e(route('register')); ?>" style="font-size:20px;  text-decoration: none; font-family: Impact, Charcoal, sans-serif;">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                        <?php endif; ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\laravel11-crash-course\resources\views/welcome.blade.php ENDPATH**/ ?>