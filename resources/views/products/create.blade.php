<x-app-layout>
<div class="container">
    <h2>Add Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Description</label>
            <textarea name="description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" step="0.01" required>
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" required>
        </div>
        <button type="submit">Add</button>
    </form>
</div>
</x-app-layout>
