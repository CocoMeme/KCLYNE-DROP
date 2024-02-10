<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Products;

class ProductController extends Controller
{

    public function createProduct(Request $request)
{
    $incomingFields = $request->validate([
        'name' => 'required',
        'price' => 'required',
        'seller_price' => 'required',
        'description' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'stock' => 'required'
    ]);

    // Validate other fields as needed

    // Strip tags from text fields
    $incomingFields['name'] = strip_tags($incomingFields['name']);
    $incomingFields['price'] = strip_tags($incomingFields['price']);
    $incomingFields['seller_price'] = strip_tags($incomingFields['seller_price']);
    $incomingFields['description'] = strip_tags($incomingFields['description']);
    $incomingFields['stock'] = strip_tags($incomingFields['stock']);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName(); // Use the original file name
        $image->move(public_path('images/products'), $imageName);

        // Save image name to 'image' column in the 'products' table
        $incomingFields['image'] = $imageName;
    }

    // Save the product
    Products::create($incomingFields);

    return redirect('/');
}


    public function showProducts()
    {
        $products = Products::all();
        return view('home', compact('products'));
    }

}