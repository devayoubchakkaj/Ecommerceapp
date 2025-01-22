@extends('base')
@section('title', ($isUpdate ? 'Edit': 'Create' ). ' Product')

@section('content')
  <h1>@yield('title')</h1>
  <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="decription">Description</label>
        <textarea type="text" id="decription" name="decription" class="form-control">{{old('decription')}}</textarea>
    </div>
    <div class="form-group">
        <label for="quantity">quantity</label>
        <input type="number" id="quantity" name="quantity" class="form-control" value="{{old('quantity')}}" >
    </div>
    <div class="form-group">
        <label for="image">image</label>
        <input type="file" id="image" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">price</label>
        <input type="number" id="price" name="price" class="form-control" value="{{old('price')}}" step="any">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary w-100" value="add">
    </div>

</form>


@endsection

