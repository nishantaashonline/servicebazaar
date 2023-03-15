@extends('layouts.admin')

@section('content')
   <div class="container">
    <form method="post" enctype="multipart/form-data" action="{{route('service.store')}}">
        @csrf
        <fieldset>
            <legend>Create Service</legend>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Service Name</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Service" name="service_name">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Short Description</label>
                <textarea type="text" id="editor" class="form-control" placeholder="Service" name="short_desc"> </textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Description</label>
                <textarea type="text" id="editor1" class="form-control" placeholder="Service" name="desc"> </textarea>
            </div>


            <div class="mb-3">
                <label for="disabledSelect" class="form-label">Parent Category</label>
                <select id="disabledSelect" class="form-select" onchange="subcategory(this)">
                    <option value="0">Select Parent Service</option>
                    @foreach ($parentcategories as $parentcategory)
                    <option value="{{$parentcategory->id}}">{{$parentcategory->category}}</option>
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
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
   </div>

<script>
      function subcategory(element){
value=element.value;
$.ajax({
type: "get",
url: "{{route('admin.service.subcategory')}}",
data: {id: value},

dataType: "text",
success: function(result){

    $("#subcategoryid").append(result);
}
});
        }


        function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
@endsection
