@extends('layouts.admin')

@section('content')
   <div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('service.update',$data->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <fieldset>
            <legend>Edit Service</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Service Name</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Service Name" name="service_name" value="{{$data->service_name}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Short Description</label>
                <textarea type="text" id="editor" class="form-control" placeholder="Service" name="short_desc">{!!$data->short_desc!!} </textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Description</label>
                <textarea type="text" id="editor1" class="form-control" placeholder="Service" name="desc">{!!$data->desc!!} </textarea>
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
                <label for="disabledSelect" class="form-label">Sub Category</label>
                <select id="subcategoryid" class="form-select" name="category_id">
                    <option value="0">Select Sub Category</option>


                </select>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Regular Price</label>
                <input type="text" id="disabledTextInput" class="form-control" onkeypress="return isNumber(event)" placeholder="Regular Price" name="ragular_price">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Sale Price</label>
                <input type="text" id="disabledTextInput" class="form-control" onkeypress="return isNumber(event)" placeholder="Sale Price" name="price">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Policy</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Service" name="policy">
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
