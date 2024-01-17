<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container mt-3">
        <div id="cartInfo" class="mb-3">
            Total Items in Cart: <span id="cartCount">0</span>
        </div>
<div class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
    @foreach ($products as $product)                            
    <div>
        <div class="product-box">
            <div class="img-wrapper">
                <div class="front">
                    <a href="#">
                        <img src="{{$product->image}}" class="bg-img blur-up lazyload" alt="">
                    </a>
                </div>
                <div class="back">
                    <a href="#">
                        <img src="{{$product->image}}" class="bg-img blur-up lazyload" alt="">
                    </a>
                </div>
            </div>
            <div class="product-details">
                <div class="rating-details">
                    <span class="font-light grid-content">{{$product->category->name}}</span>
                </div>
                <div class="main-price">
                    <a href="#" class="font-default">
                        <h5 class="ms-0">{{$product->name}}</h5>
                    </a>
                    <div class="listing-content">
                        <span class="font-light">{{$product->category->name}}</span>
                        <p class="font-light">{{$product->short_description}}</p>
                    </div>
                    <h3 class="theme-color">${{$product->regular_price}}</h3>
                    <button class="btn btn-primary addToCartBtn" data-product-id="{{$product->id}}">
                            Add To Cart
                        </button>                
                    </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{$products->links("default")}}
</div>
<!-- Custom script for adding to cart -->
<script>
    $(document).ready(function () {
        let cartCount = 0;

        // Attach a click event handler to all elements with class 'addToCartBtn'
        $('.addToCartBtn').on('click', function () {
            cartCount++;
            updateCartMessage(cartCount);
        });

        // Function to update the cart message
        function updateCartMessage(count) {
            $('#cartCount').text(count);
        }
    });
</script>

</body>
</html>
