@extends('layout')
@section('nav')
<div>
    <form action="{{ route('submitProduct') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="form-group">
            <label for="short_description">Short Description:</label>
            <textarea name="short_description" class="form-control" id="short_description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="SKU">SKU:</label>
            <input type="text" name="SKU" class="form-control" id="SKU">
        </div>
        <div class="form-group">
            <label for="stock_status">Stock Status:</label>
            <select name="stock_status" class="form-control" id="stock_status">
                <option value="instock">In Stock</option>
                <option value="outofstock">Out of Stock</option>
            </select>
        </div>
        <div class="form-group">
            <label for="featured">Featured:</label>
            <input type="checkbox" name="featured" id="featured">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" id="quantity" required>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" name="image" class="form-control" id="image">
        </div>
        <div class="form-group">
            <label for="images">Images:</label>
            <input type="text" name="images" class="form-control" id="images">
        </div>
        <div class="form-group">
            <label for="category_id">Category ID:</label>
            <input type="number" name="category_id" class="form-control" id="category_id">
        </div>
        <div class="form-group">
            <label for="brand_id">Brand ID:</label>
            <input type="number" name="brand_id" class="form-control" id="brand_id">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection