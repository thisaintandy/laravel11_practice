<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInCart;
use Illuminate\Support\Str;

class CartController extends Controller
{
    protected function getCartId(Request $request)
    {
        $cartId = $request->cookie('cart_id');

        if (!$cartId) {
            $cartId = Str::uuid()->toString();
            $cookie = cookie('cart_id', $cartId, 60 * 24 * 30); 

            return $cartId;
        }

        return $cartId;
    }

    public function addToCart(Request $request)
    {
    
        $cartId = $this->getCartId($request);
        $productName = $request->product_name;

        $cartItem = ProductInCart::where('cart_id', $cartId)
            ->where('Product_Name', $productName)
            ->first();

        if ($cartItem) {
            $cartItem->Product_Qty++;
            $cartItem->save();
        } else {
            $product = Product::where('Product_Name', $productName)->first();

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }

            ProductInCart::create([
                'cart_id' => $cartId,
                'Product_Name' => $productName,
                'Product_Qty' => 1,
                'Product_Price' => $product->Product_Price,
                'Product_Description' => $product->Product_Description,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function viewCart(Request $request)
    {
        $cartId = $this->getCartId($request);
        $cartItems = ProductInCart::where('cart_id', $cartId)->get();

        return view('products.cart', compact('cartItems'));
    }

    public function buy(Request $request)
    {
        // Handle payment processing and order creation logic here

        $cartId = $this->getCartId($request);
        ProductInCart::where('cart_id', $cartId)->delete();

        return redirect()->route('products.showAll')->with('success', 'Purchase successful');
    }
}
