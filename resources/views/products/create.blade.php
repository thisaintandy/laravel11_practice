@extends('layouts.main')

@section('title', 'Create Product')

@section('content')

    <h1>Add a Product</h1>
    <form method="POST" class="" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="Product_Name">Product Name</label>
            <input type="text" name="Product_Name" id="Product_Name" placeholder="Name" value="{{ old('Product_Name') }}" required/>
            @error('Product_Name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="Product_Qty">Qty</label>
            <input type="number" name="Product_Qty" id="Product_Qty" placeholder="Qty" value="{{ old('Product_Qty') }}" required/>
            @error('Product_Qty')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="Product_Price">Price</label>
            <input type="number" name="Product_Price" id="Product_Price" placeholder="Price" step="0.01" value="{{ old('Product_Price') }}" required/>
            @error('Product_Price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="Product_Description">Description</label>
            <textarea name="Product_Description" id="Product_Description" placeholder="Description">{{ old('Product_Description') }}</textarea>
            @error('Product_Description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Add Product"/>
        </div>
    </form>
@endsection
