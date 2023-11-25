<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Product Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <p class="form-control-static">{{$product->name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <p class="form-control-static">{{$product->quantity}}</p>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <p class="form-control-static">{{$product->price}}</p>
                    </div>
                    
                </div>
                
            </div>
            <a href="{{ route('product.index') }}"><button
                class="btn btn-warning btn-sm">Back</button></a>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
