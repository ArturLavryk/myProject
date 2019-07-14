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
                <table class="table table-striped table-hover">
                    <thead id="table" class="table-dark">
                        <tr > 
                            <th scope="col">@</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Adress') }}</th>
                            <th scope="col">{{ __('City') }}</th>
                            <th scope="col">{{ __('Post code') }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $canteens)
                    
                        <tr class=" pointer"   >
                            <th scope="row"></th>
                            <td>{{ $canteens->name}}</td>
                            <td>{{ $canteens->adress}}</td>
                            <td>{{ $canteens->city}}</td>
                            <td>{{ $canteens->post_code}}</td>
                            <td><button class="btn btn-dark pcode" ctn="{{$canteens->id}}">Edit</button></td>
                            <td><a href="{{route("myCanteens", ['id' => $canteens->id])}}"><button class="btn btn-dark pcode" ctn="{{$canteens->id}}">Add meal</button></a></td>
                            <td><button class="btn btn-danger del" id="del" onclick="deletectn(this,{{$canteens->id}})">Delete</button></td>
                        </tr>
                   
                        @endforeach
                    </tbody>
                </table>


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
