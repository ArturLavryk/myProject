@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<div class="container">
    <!-- Control the column width, and how they should appear on different devices -->

   @foreach ($data as $meal)
   

    <div class="row">
      <div class="col-sm-4" style="background-color:yellow; text-align: center;">
          <p>{{$meal->name}}</p>
          <p>{{$meal->description}}</p>
      </div>
        <div class="col-sm-4" style="background-color:orange;text-align: center;">
             <p>{{$meal->name}}</p>
          <p>{{$meal->description}}</p>
            
        </div>
        <div class="col-sm-4" style="background-color:yellow;text-align: center;">
            
             <p>{{$meal->name}}</p>
          <p>{{$meal->description}}</p>
        </div>
    </div>
    <br>

@endforeach
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
    $('.pcode').click(function () {
        id = $(this).attr('ctn');
    console.log(id);

        $.ajax({
            url: "get-ctn/" + id,
            success: function (data) {
         


            }

        });
    });
    

});




</script>

@endsection
