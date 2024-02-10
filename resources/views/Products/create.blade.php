@extends('header')
@extends('footer')

<body>
    <div class="div-create-product">
        <div class="create-product">
            <form class="form-create-product" action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 style="text-align: center;">Create Product</h2>
            <input name="name" type="text" placeholder="Product Name">
            <input name="price" type="integer" placeholder="Price">
            <input name="seller_price" type="integer" placeholder="Seller Price">
            <input name="stock" type="integer" placeholder="Stock">
            <textarea name="description" placeholder="Product Description" cols="30" rows="10"></textarea>
            <input type="file" name="image" id="image">
            <button>Create</button>
            </form>
        </div>
    </div>
</body>