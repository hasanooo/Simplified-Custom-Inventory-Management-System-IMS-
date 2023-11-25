<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="text-center">Product Table</h3>
                                <a href="{{ route('product.add') }}"><button class="btn btn-primary btn-sm">Product
                                        Add</button></a>
                                <a href="{{ route('logout') }}"><button
                                        class="btn btn-warning btn-sm">Logout</button></a>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($allproduct->count() > 0)
                                    @foreach ($allproduct as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <a href="{{ route('product.view', $item->id) }}"><button
                                                        class="btn btn-primary btn-sm">View</button></a>
                                                <a href="{{ route('product.edit', $item->id) }}"><button
                                                        class="btn btn-warning btn-sm">Edit</button></a>

                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deletemodal{{ $item->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    No Data Available
                                @endif




                            </tbody>
                        </table>
                        @foreach ($allproduct as $product)
                            <div class="modal" id="deletemodal{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete
                                                Product</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
