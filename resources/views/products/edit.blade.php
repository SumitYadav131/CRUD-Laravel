<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Your Product</h1>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div style="color:red;">{{ $error }}</div>
            @endforeach
        @endif
    </div>
    <form method="POST" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="qty">Quantity:</label>
            <input type="number" id="qty" name="qty" value="{{ $product->qty }}" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>

</html>