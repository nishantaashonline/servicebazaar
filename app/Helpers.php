<?php
function imageupload($image){

    if($image!= ""){
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/frontend/images'), $imageName);
      return $imageName;
}
}




?>
