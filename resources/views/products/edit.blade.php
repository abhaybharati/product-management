<x-app-layout>
<div class="container">
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required>{{ old('description', $product->description) }}</textarea>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</div>
</x-app-layout>
