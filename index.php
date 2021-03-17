<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>PHP: Insert using AJAX Technique</h4>
</div><br> 

<div class="container">
 <div class="row">

    <div class="col-sm-4">
    <h4 style="color:green;text-align:center" id="success"></h4>
    <h4 class="text-center  ml-4 mb-5">Insert Records</h4>
     <form  id="formID" method="POST">

        <div class="form-group">
        <input type="text" class="form-control  mb-4" id="name" name="name" placeholder="Enter Name" required="">
        </div>

        <div class="form-group">
        <input type="age" class="form-control  mb-4" id="age" name="age" placeholder="Enter Age" required="">
        </div>

        <div class="form-group">
        <input type="phone" class="form-control mb-4" id="phone" name="phone" placeholder="Enter Phone" required="">
        </div>

        <button type="submit" class="btn btn-success" id="submitData">Create</button>  
    </form>
    </div>

  <div class="col-sm-8">
    <h4 class="text-center  ml-4  mb-5">View Records</h4>
    <table class="table table-hover table-bordered ml-4 ">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="output">
           
        </tbody>
    </table>
    
  </div>
 </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<script>


  // Fetch Data 

  function loadDatatableAjax()
		{
			$.ajax({
			dataType: "json",
			type: 'get',
			url:"fetch_action.php",
			success:function(response){
			  
        var inc =1 ;
				$.each(response, function(data,item) 
				  {
          
				  	var result = "<tr>" +
                           '<td>'+ inc +'</td>'+ 
                           '<td>'+item.name+'</td>'+
                           '<td>'+item.age+'</td>'+
                           '<td>'+item.phone+'</td>'+
                           '<td>'+
                              '<a href="javascript:void(0);"  data-id="'+item.id+'"><i class="fas fa-trash"></i></a>'+
                              '<a href=""  onClick="deleteById()"> <i class="far fa-pencil-alt"></i></a>'+
                           '</td>'+
                           '</tr>'
                           inc++;
                     $("#output").append(result);
				  })
			  }
			});
		}
   loadDatatableAjax();


  
 // Insert DATA 

  $(document).ready(function(){
    $('#submitData').on('click',function(){

        event.preventDefault();

        var name = $('#name').val();
        var age = $('#age').val();
        var phone = $('#phone').val();

       $.ajax({
          url:'insert_action.php',
          type:'post',
          data:{d_name:name, d_age:age, d_phone:phone},
          dataType:'json',
          success:function(data)
          {
            var res = '';
                  var inc=1;
                  for(i=0; i<data.length; i++)
                  {
                     res += '<tr id="'+data.id+'">'+
                           '<td>'+ inc +'</td>'+ 
                           '<td>'+data[i].name+'</td>'+
                           '<td>'+data[i].age+'</td>'+
                           '<td>'+data[i].phone+'</td>'+
                           '<td>'+
                              '<a href="javascript:void(0);"  data-id="'+data[i].id+'"><i class="fas fa-trash"></i></a>'+
                              '<a href=""  onClick="deleteById()"> <i class="far fa-pencil-alt"></i></a>'+
                           '</td>'+
                           '</tr>'
                            inc++;
                  }
                  $('#output').html(res);	
                  $("#formID")[0].reset();
          }
 
       });
      });
  });

</script> 