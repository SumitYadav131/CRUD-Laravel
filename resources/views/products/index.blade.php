@include('partials.header');

<body class="bg-light">

<div class="container py-5">
    <!-- changed -->

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Product Management</h1>
        <a href="{{ route('product.create') }}" class="btn btn-primary">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('product.edit', $product) }}" 
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form method="POST" 
                                      action="{{ route('product.delete', $product) }}" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                No products found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
