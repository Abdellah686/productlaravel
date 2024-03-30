@extends('base')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>category list</h1>
        <a href="{{route('categories.create')}}" class="btn btn-primary">create</a>
    </div>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $categorie)
                    <tr>
                        <td>{{$categorie->id}}</td>
                        <td>{{$categorie->name}}</td>
                        <td>
                            <div class="btn-group gap-2">
                                <a href="{{route('categories.show',$categorie)}}" class="btn btn-info">show</a>
                                <a href="{{route('categories.edit',$categorie)}}" class="btn btn-primary">Update</a>
                                <form method="post" action="{{route('categories.destroy',$categorie)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete"/>                                
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
    </div>
@endsection
