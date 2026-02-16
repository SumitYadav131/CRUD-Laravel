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
    <form action="" method="POST">
        @csrf
        @method('POST')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" value="{{ $product->description }}" required></textarea>
        </div>
        <div>
            <label for="qty">Quantity:</label>
            <input type="number" id="qty" name="qty" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
        </div>
        <button type="submit">Create</button>
    </form>
</body>

</html>