@extends('base')
@section('title', 'Products')

@section('content')
 <div class="d-flex justify-content-between align-items-center">
 <h1>Product List</h1>
 <a href="{{route('products.create')}}" class="btn btn-primary">Create</a>

 </div>  
  <table class="table">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  @forelse($products as $product) 
  <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->decription}}</td>
      <td>{{$product->quantity}}</td>
      <td><img width="100px" src="storage/{{$product->image}}" alt=""></td>
      <td>{{$product->price}} Mad</td>
      <td>
        <div class="btn-group">
            <a href="{{route('products.edit',$product)}}" class="btn btn-primary">Update</a>
            <form action="{{route('products.destroy',$product)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>

        </div>
      </td>
    </tr>
  @empty
  <tr>
    <td colspan="6" align="center"><h2>No Product</h2></td>
  </tr>
  
  @endforelse
    
  </tbody>
</table>
{{$products->links()}}
@endsection