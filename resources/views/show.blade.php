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
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $canteens)

                        <tr class=" pointer"  >
                            <th scope="row"></th>
                            <td class=""  >{{ $canteens->name}}</td>
                            <td>{{ $canteens->adress}}</td>
                            <td>{{ $canteens->city}}</td>
                            <td>{{ $canteens->post_code}}</td>
                            <td><button class="btn btn-dark pcode" my_id="{{$canteens->id}}">Edit</button></td>
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
//    $('.pcode').click(function () {
//        id = $(this).attr('ctn');
//    console.log(id);
//
//        $.ajax({
//            url: "get-ctn/" + id,
//            success: function (data) {
//         
//                Swal.fire({
//                    title: '<strong>Canteen click</strong>',
//                    type: 'info',
//                    html:'<p>' +data.name+ '</p>'
//                    +'<p>' +data.adress + '</p>'
//                    +'<p>' +data.post_code+ '</p>',
//                                                    
//                    showCloseButton: true,
//                    showCancelButton: false,
//                    showConfirmButton: false,
//                    focusConfirm: false
//                    
//                })
//            }
//
//        });
//    });
    
    $('.pcode').click(function(){
    id=$(this).attr('my_id');
console.log(id);

$.ajax({ 
    url: "getcanteen/" + id,
    
    saccess: function (data) {
        console.log(data.name);
        Swal.fire({
        title:'<strong>Canteen edit</strong>',
        type:'info',
        html:'<p>' +data.id+ '</p>',
//                    +'<p>' +data.adress + '</p>'
//                    +'<p>' +data.post_code+ '</p>',
//        '<form method="POST" action="">'
//+'<p>'+data.id+'</p>'
//+'</form>',

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
