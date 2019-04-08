@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<style>
    .pointer{
        cursor: pointer;
    }
</style>
<div class="container">
    <div class=" justify-content-center">
        <div class="col-md-11">
            <div class="card ">
                <h3 class="mt-3 text-center">Meals</h3>
                <table class="table table-hower ">
                    <thead class="">
                        <tr>
                            <th>@</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ( $data['meal'] as $meal)
                        <tr > 
                            <td scope="col">@</td>
                            <td scope="col">{{ $meal->name }}</td>
                            <td scope="col">{{ $meal->description }}</td>
                            <td scope="col">{{ $meal->price }} Zl</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <h3 class="mt-5 text-center">Options</h3>
                <table class="table table-hover">
                    <thead class="">
                        <tr>
                            <th>@</th>
                            <th>Name</th>
                            <th>Weight</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                @foreach($data['option'] as $option)
                <tbody>
                        <tr class=" pointer"   >
                            <th scope="row">@</th>
                            <td>{{ $option->name}}</td>
                            <td>{{ $option->weight}}</td>
                            <td>{{ $option->price}} Zl</td>
                        </tr>
                   
                        @endforeach

                        <tr>
                            <th scope="col" class="table-danger">{{__('All Price')}}</th>
                            <th scope="col" class="table-danger">{{$data['price']}} Zl</th>
                            <th class=""></th>
                            <th class=""></th>
                        </tr>
                    </tbody>
                </table>
                <div class="float-right mr-3">
                    <form action="{{route('enter')}}">
                        <input id="orderId" name="orderId" style="display:none" value="{{$data['order']}}">
                        <button type="submit" class="btn btn-danger float-right col-md-3 mb-2 "> Submit </button>
                    </form>
               
                </div>
            </div>
        </div>
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
    $('.pcode').click(function () {
        id = $(this).attr('ctn');
    console.log(id);

        $.ajax({
            url: "get-ctn/" + id,
            success: function (data) {
         
                Swal.fire({
                    title: '<strong>Canteen click</strong>',
                    type: 'info',
                    html:

             '<form method="POST" action="{{ route('edit') }}">'
     +'@csrf'
             +'<div class="form-group">'
     +'<input id="id" name="id" type="text" class="form-control" style="display:none;" value="'+data.id+'">'
     +'<label for="name">Name</label>'
 +'<input id="name" name="name" type="text" class="form-control" value="'+data.name+'"></div>'
             +'<div class="form-group">'
     +'<label for="adress">Address</label>'
 +'<input id="adress" name="adress" type="adress" class="form-control" value="'+data.adress+'"></div>'
  +'<div class="form-group">'
     +'<label for="city">City</label>'
 +'<input id="city" name="city" type="city" class="form-control" value="'+data.city+'"></div>'
              +'<div class="form-group">'
     +'<label for="post_code">Post code</label>'
 +'<input id="post_code" name="post_code" type="post_code" class="form-control" value="'+data.post_code+'"></div>'
             +'<button id="buton" type="submit" class="btn btn-primary">Edit</button>'
             +'</form>',
                                                    
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    focusConfirm: false
                    
                })
            }

        });
    });
    

});




</script>

@endsection
