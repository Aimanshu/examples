@extends('category.layouts.app')

@section('content')

<div class="container">
  <h2>Add Category</h2>
  {!! Form::open(array('url' => url(''),'method'=>'POST', 'id'=>'add_name', 'name'=>'add_name', 'class'=>'add_name')) !!}
    
    <div class="form-group">
      <label for="email">Category Name:</label>
        {{ Form::Text('CategoryName', null,["class"=>"form-control","id"=>"CategoryName","placeholder"=>"Enter category name"]) }}
    </div>
    
    <div class="form-group">
      <label>Description</label>
      {{ Form::Text('Description', null,["class"=>"form-control","id"=>"Description","placeholder"=>"Enter description"]) }}
    </div>
    
    <div class="form-group">
      <label>Please Add multiple subcategory</label>
      <button type="button" class="btn btn-primary" name="add" id="add">Add more</button>
    </div>

    <div class="form-group" id="dynamic_field">
        
    </div>    


    <button type="submit" class="btn btn-default">Submit</button>
   {!! Form::close() !!}
</div>

    
        <script>  
            $(document).ready(function(){  
                var i=0;  
                $('#add').click(function(){  
                    i++;  
                    $('#dynamic_field').append('<div id="row'+i+'"><div class="col-sm-4"><input type="text" name="SubCategory[]" placeholder="Enter sub category" class="form-control" /></div><div class="col-sm-4"><input type="text" name="Description[]" placeholder="Enter description" class="form-control" /></div><div class="col-sm-4"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><br><br>');  
                });  

                //for remove div
                $(document).on('click', '.btn_remove', function(){  
                    var button_id = $(this).attr("id");   
                    $('#row'+button_id+'').remove();  
                });  

                //for save data    
                $('#submit').click(function(){            
                    $.ajax({  
                            url:"name.php",  
                            method:"POST",  
                            data:$('#add_name').serialize(),  
                            success:function(data)  
                            {  
                                alert(data);  
                                $('#add_name')[0].reset();  
                            }  
                    });  
                });  
             });  
        </script>

    @section('css')
        <style>
        </style>
    @stop

@endsection