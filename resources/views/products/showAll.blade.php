@extends('layouts.guest')

@section('title', 'Product List')

@section('content')
    <h1>Product</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
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
                <!-- The table body will be populated by DataTables -->
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the DataTable with server-side processing
        $('#products-table').DataTable({
            processing: true, // Enable processing display
            serverSide: true, // Enable server-side processing
            ajax: "{{ route('product.index') }}", // URL for fetching data
            columns: [
                { data: 'id', name: 'id' }, 
                { data: 'Product_Name', name: 'Product_Name' }, 
                { data: 'Product_Qty', name: 'Product_Qty' },
                { data: 'Product_Price', name: 'Product_Price' }, /
                { data: 'Product_Description', name: 'Product_Description' }, 
                {
                    data: 'action',
                    name: 'action',
                    orderable: false, // Disable ordering for actions column
                    searchable: false, // Disable searching for actions column
                    render: function(data, type, row) {
                        // Render action buttons for each row
                        return `
                            <div class="action-buttons">
                                <form action="{{ route('add.to.cart') }}" method="POST" class="edit-button" style="padding-bottom: 5px;padding-left: 5px;padding-right: 5px;padding-top: 5px;margin-top: 1%;margin-bottom: 0px;width: 90px;height: 30px; background-color:red">
                                    @csrf
                                    <input type="hidden" name="cart_id" value="${row.id}">
                                    <button type="submit">Add to Cart</button>
                                </form>
                                
                                <form action="{{ route('buy') }}" method="POST" class="edit-button" style="padding-bottom: 5px;padding-left: 5px;padding-right: 5px;padding-top: 5px;margin-top:1%;margin-bottom: 0px;width: 90px;height: 30px; background-color:black; color:white">
                                    @csrf
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
@endpush


