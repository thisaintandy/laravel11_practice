@extends('layouts.guest')

@section('title', 'Product List')

@section('content')
    @if($cartItems->count() > 0)
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
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->Product_Name }}</td>
                    <td>{{ $item->Product_Qty }}</td>
                    <td>${{ number_format($item->Product_Price, 2) }}</td>
                    <td>{{ $item->Product_Description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="py-12" style="margin-top: 10%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Your cart is empty!") }}
                
                </div>
            </div>
        </div>
    </div>
    @endif

