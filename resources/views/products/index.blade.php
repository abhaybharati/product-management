<x-app-layout>
<div class="container">
    <h2>Products</h2>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Description</th><th>Price</th><th>Stock</th>
                @if(auth()->user()->role === 'admin')<th>Actions</th>@endif
            </tr>
        </thead>
        <tbody>
            @forelse($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->description }}</td>
                <td>{{ $p->price }}</td>
                <td>{{ $p->stock }}</td>
                @if(auth()->user()->role === 'admin')
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                @endif
            </tr>
            @empty
                <tr><td colspan="5">No products found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
