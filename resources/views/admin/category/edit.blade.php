@extends('layouts.admin')

@section('content')
   <div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('category.update',$data->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <fieldset>
            <legend>Create Category</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Category Name</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Category" name="category" value="{{$data->category}}">
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" name="is_parent" value="1" @if($data->is_parent==1) checked @endif>
                    <label class="form-check-label" for="disabledFieldsetCheck">
                        Is Parent
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Parent Category</label>
                <select id="disabledSelect" class="form-select" name="parent_id">
                    <option value="0">Select Parent Category</option>
                    @foreach ($parentcategories as $parentcategory)
                    <option value="{{$parentcategory->id}}" @if($parentcategory->id==$data->parent_id)selected @endif>{{$parentcategory->category}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image" value="{{$data->image}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
   </div>
@endsection
