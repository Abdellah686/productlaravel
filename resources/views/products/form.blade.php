@extends('base')
@section('title', ($isUpdate ? 'Update' : 'Create') . ' product')

@php
    $route = route('products.store');
    if ($isUpdate) {
        $route = route('products.update', $product);
    }
@endphp

@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($isUpdate)
            @method('PUT')
        @endif
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" />
        </div>
        <div class="form-group mb-3">
            <label for="description">description</label>
            <textarea type="text" name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">quantity</label>
            <input type="text" name="quantity" id="quantity" class="form-control"
                value="{{ old('quantity', $product->quantity) }}" />
        </div>
        <div class="form-group mb-3">
            <label for="image">image</label>
            <input type="file" name="image" id="image" class="form-control" />
            @if ($product)
                <img width="100px" src="/storage/{{ $product->image }}" alt="" />
            @endif
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">category</label>
            <select class="form-select" name="category_id" id="category_id">
                <option selected>Select one</option>
                @foreach ($categories as $category)
                    <option @selected(old('category_id',$product->category_id)===$category->id) value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="price">price</label>
            <input type="text" name="price" id="price" class="form-control"
                value="{{ old('price', $product->price) }}" />
        </div>
        <div class="form-group my-3">
            <input type="submit" value="{{ $isUpdate ? 'Edit' : 'Create' }}" class="btn btn-primary w-100 " />
        </div>
    @endsection
</form>
