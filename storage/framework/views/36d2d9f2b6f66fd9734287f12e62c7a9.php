

<?php $__env->startSection('title', 'Product List'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Product</h1>
    <div>
        <?php if(session()->has('success')): ?>
            <div>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="table-container">
        <table border="1" id="products-table" style="margin-top: 10px;width: 1202px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('product.index')); ?>",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'Product_Name', name: 'Product_Name' },
                { data: 'Product_Qty', name: 'Product_Qty' },
                { data: 'Product_Price', name: 'Product_Price' },
                { data: 'Product_Description', name: 'Product_Description' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <div class="action-buttons">
                                <form action="<?php echo e(route('add.to.cart')); ?>" method="POST" class="edit-button" style="padding-bottom: 5px;padding-left: 5px;padding-right: 5px;padding-top: 5px;margin-top: 1%;margin-bottom: 0px;width: 90px;height: 30px; background-color:red">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="cart_id" value="${row.id}">
                                    <button type="submit">Add to Cart</button>
                                </form>
                                
                                <form action="<?php echo e(route('buy')); ?>" method="POST" class="edit-button" style="padding-bottom: 5px;padding-left: 5px;padding-right: 5px;padding-top: 5px;margin-top:1%;margin-bottom: 0px;width: 90px;height: 30px; background-color:black; color:white">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="cart_id" value="${row.id}">
                                    <button type="submit">Buy Now</button>
                                </form>
                            </div>
                        `;
                    }
                }
            ]
        });

    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\laravel11-crash-course\resources\views/products/showAll.blade.php ENDPATH**/ ?>