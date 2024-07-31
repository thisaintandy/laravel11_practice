$(document).ready(function() {
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/api/products',
            method: 'GET'
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'Product_Name', name: 'Product_Name' },
            { data: 'Product_Qty', name: 'Product_Qty' },
            { data: 'Product_Price', name: 'Product_Price' },
            { data: 'Product_Description', name: 'Product_Description' },
        ]
    });
});
