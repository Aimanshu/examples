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
         <label>Select Start and End Date</label>
         <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control"/>
     </div>   

    <div class="form-group">
      <label>Please Add multiple subcategory</label>
      <button type="button" class="btn btn-primary" name="add" id="add">Add more</button>
    </div>

     <!----For save cateogory---->   
    <div class="form-group">
       {!! Form::open(array('url' => url('save/category'),'method'=>'POST', 'id'=>'save_category', 'name'=>'save_category', 'class'=>'save_category')) !!}
       <div id="dynamic_field">

       </div>
       {!! Form::close() !!}
    </div>    
    
    <!----For Data Show----> 
    <div class="col-sm-3">
         1</div>
      <div class="col-sm-3">
          Loan
      </div>
      <div class="col-sm-3">
          This is loan category
      </div>
      <div class="col-sm-3">
          <button type="button" class="btn btn-info">Edit</button>
          <button type="button" class="btn btn-danger">Delete</button>
      </div>

     
    <button type="submit" class="btn btn-default">Submit</button>
   {!! Form::close() !!}
</div>

    
      <script type= text/javascript>  

        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });

            $(document).ready(function(){  
                var i=0;
                var limit=5;  //for limit 4 box
                $('#add').click(function(){  
                    i++;  
                    if(limit <=i){
                        alert("You cann't add more the 4")
                    }else{
                        $('#dynamic_field').append('<div id="row'+i+'"><div class="col-sm-3"><input type="number" name="SubId[]" placeholder="Enter sub id" class="form-control" /></div><div class="col-sm-3"><input type="text" name="SubCategory[]" placeholder="Enter sub category" class="form-control" /></div><div class="col-sm-3"><input type="text" name="Description[]" placeholder="Enter description" class="form-control" /></div><div class="col-sm-3"><button type="button" class="btn btn-success btn_save" name="saveCategorybtn" id="'+i+'">Save</button><button type="button" class="btn btn-info btn_edit">Edit</button><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div><br><br>');
                    }
                      
                });  

                //for remove div
                $(document).on('click', '.btn_remove', function(){  
                    var button_id = $(this).attr("id");   
                    $('#row'+button_id+'').remove();  
                });
                
                //for Save Data
                $(document).on('click', '.btn_save', function(){  
                    var button_id_save = $(this).attr("id");   
                    saveCategorybtn();
                });


                //for Edit Data
                $(document).on('click', '.btn_edit', function(){  
                    var button_id_edit = $(this).attr("id");   
                });
                
             });  


              //for save data    
                function saveCategorybtn(){
                //$('#saveCategorybtn').click(function(){      
                    var baseurl = "http://127.0.0.1:8000"+"/save/category";
                    
                    $.ajax({  
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url:baseurl,  
                        method:"Post",  
                        data:$('#save_category').serialize(),  
                        success:function(data)  
                        {  
                            alert(data);  
                        }  
                    });  
                }
                //}); 
        </script>

    @section('css')
        <style>
        </style>
    @stop

@endsection
