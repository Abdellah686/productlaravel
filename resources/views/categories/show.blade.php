@extends('base')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Category :{{$category->name}}</h1>
        <a href="{{route('categories.index')}}" class="btn btn-primary">back</a>
    </div>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Update_product</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <div class="btn-group gap-2">
                                <a href="{{route('products.edit',$product)}}" class="btn btn-primary">Update</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" align='center'>
                            <h6>no products for category</h6>
                        </td>
                    </tr>
                @endforelse 
                    
            </tbody>
        </table>
    </div>
@endsection
