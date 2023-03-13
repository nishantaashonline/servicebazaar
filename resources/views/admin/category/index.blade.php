@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h3>Category list</h3>
        <a href="{{route('category.create')}}" class="btn btn-primary">Create Category</a>
    </div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Sub Category</th>
        <th scope="col">Parent Category</th>
        <th scope="col">Action</th>


      </tr>
    </thead>
    <tbody>

        @foreach ($categories as $category)
        @php
       $count=$count+1;
    @endphp
        <tr>
            <th scope="row">{{$count}}</th>
            <td><img src="{{asset('assets/frontend/images/'.$category->image)}}" class="img-thumbnail image-50"></td>
            <td>{{$category->category}}</td>
            @if($category->parent_id!=0)
            @php
                $parentcategory=DB::table('categories')->where('id',$category->parent_id)->first();
            @endphp
                <td>{{$parentcategory->category}}</td>
                @else
                <td>No</td>
            @endif
            <td>
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
                <a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        @endforeach


    </tbody>
  </table>
</div>
@endsection
