

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
        <table border="1" id="products-table">
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
                                <a href="/product/${row.id}/edit" class="edit-button">Edit</a>
                                <a href="#" class="delete-button" data-id="${row.id}">Delete</a>
                            </div>
                        `;
                    }
                }
            ]
        });

        // Handle delete button click
        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();
            var productId = $(this).data('id');
            var url = `/product/${productId}`;
            
            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    success: function(result) {
                        $('#products-table').DataTable().ajax.reload();
                        alert('Product deleted successfully');
                    },
                    error: function(xhr) {
                        alert('Something went wrong!');
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\laravel11-crash-course\resources\views/products/index.blade.php ENDPATH**/ ?>