@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<style>
    .bp{
          
    }
</style>
<div class="container">
    <!-- Control the column width, and how they should appear on different devices -->
    <div class="row">
   @foreach ($data as $canteen)
   

   
        <div class="col-sm-3 bp simple px-1 py-1" style="background-color:yellow; background-clip: content-box; text-align: center;" myid="{{$canteen->id}}">
          <p>{{$canteen->name}}</p>
          <p>{{$canteen->adress}}</p>
          <p>{{$canteen->city}}</p>
          <p>{{$canteen->post_code}}</p>
          <td><a href="/myProject/public/orderMeal/{{$canteen->id}}"><button class="btn btn-dark pcode" ctn="{{$canteen->id}}">Add meal</button></a></td>
      </div>
        
    
 

@endforeach
 </div>
</div>
<script>
//    $(document).ready(function(){
//            $('.pcode').click(function () {
////            console.log('aasd')
//            
//            Swal.fire(
//  'Yours post code!',
//  $(this).attr('pcode'),
//  'success'
//);
//            });
//        });

$(document).ready(function () {
    $('.simple2').click(function () {
        id = $(this).attr('myid');
        console.log(id);
        $.ajax({
            url: "showmeal/" + id,
            method: 'get',
            success: function (data) {
                console.log(data);
Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
);
            }
                   

        });
                
    });
    
  $('.simple').click(function () {
        id = $(this).attr('myid');
        CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log(id);
        $.ajax({
            url: "showmeal" ,
            method: 'post',
            data: {_token: CSRF_TOKEN,'id':id},
            success: function (data) {
                console.log(data);
Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
);
            }
                   

        });
                
    });
    
});







</script>

@endsection
