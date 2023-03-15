@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h3>Category list</h3>
        <a href="{{route('category.create')}}" class="btn btn-primary">Create Category</a>
    </div>
<table class="table"  id="example">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Service Name</th>
        <th scope="col">Regular Price</th>
        <th scope="col">Price</th>

        <th scope="col">Category</th>
        <th scope="col">Short Description</th>
        <th scope="col">Action</th>


      </tr>
    </thead>
    <tbody>

        @foreach ($services as $service)
        @php
       $count=$count+1;
    @endphp
        <tr>
            <th scope="row">{{$count}}</th>
            <td><img src="{{asset('assets/frontend/images/'.$service->image)}}" class="img-thumbnail image-50"></td>
            <td>{{$service->service_name}}</td>
            <td>{{$service->ragular_price}}</td>
            <td>{{$service->price}}</td>
            @if($service->category_id!=0)
            @php
                $category=DB::table('categories')->where('id',$service->category_id)->first();
            @endphp
                <td>{{$category->category}}</td>
                @else
                <td>No</td>
            @endif
            <td>{!!$service->short_desc!!}</td>
            <td>
               <div class="d-flex">
                <a href="{{route('service.edit',$service->id)}}" class="btn btn-success">Edit</a>
                <form action="{{route('service.destroy',$service->id)}}" method="POST">
                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
               </div>

            </td>
          </tr>
        @endforeach


    </tbody>
  </table>
</div>
@endsection
