@extends('base')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Product list</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>category</th>
                    <th>quantity</th>
                    <th>image</th>
                    <th>price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td align="center">
                            <span class="badge bg-primary">
                                <a href="{{ route('categories.show', $product->category_id) }}" class="btn btn-primary">
                                    {{ $product->category?->name }}
                                </a>
                            </span>
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td><img width="100px" src="/storage/{{ $product->image }}" alt=""></td>
                        <td>{{ $product->price }} MAD</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Update</a>
                                <form method="post" action="{{ route('products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete" />
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" align='center'>
                            <h6>no data</h6>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
