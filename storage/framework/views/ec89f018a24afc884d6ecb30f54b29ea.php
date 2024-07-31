

<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Edit Product</h1>
    <form method="POST" action="<?php echo e(route('product.update', ['product' => $product->id])); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label for="Product_Name">Product Name</label>
            <input type="text" name="Product_Name" id="Product_Name" placeholder="Name" value="<?php echo e(old('Product_Name', $product->Product_Name)); ?>" required/>
            <?php $__errorArgs = ['Product_Name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="Product_Qty">Qty</label>
            <input type="number" name="Product_Qty" id="Product_Qty" placeholder="Qty" value="<?php echo e(old('Product_Qty', $product->Product_Qty)); ?>" required/>
            <?php $__errorArgs = ['Product_Qty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="Product_Price">Price</label>
            <input type="number" name="Product_Price" id="Product_Price" placeholder="Price" step="0.01" value="<?php echo e(old('Product_Price', $product->Product_Price)); ?>" required/>
            <?php $__errorArgs = ['Product_Price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="Product_Description">Description</label>
            <textarea name="Product_Description" id="Product_Description" placeholder="Description"><?php echo e(old('Product_Description', $product->Product_Description)); ?></textarea>
            <?php $__errorArgs = ['Product_Description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="Product_Image">Product Image</label>
            <input type="file" name="Product_Image" id="Product_Image" accept="image/*"/>
            <?php $__errorArgs = ['Product_Image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <input type="submit" value="Update Product"/>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\laravel11-crash-course\resources\views/products/edit.blade.php ENDPATH**/ ?>