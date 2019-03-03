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
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $canteens)

                        <tr>
                            <th scope="row"></th>
                            <td>{{ $canteens->name}}</td>
                            <td>{{ $canteens->adress}}</td>
                            <td>{{ $canteens->city}}</td>
                            <td class="pcode pointer" pcode="{{ $canteens->post_code}}" ctn="{{ $canteens->id}}">{{ $canteens->post_code}}</td>
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
                    html:'<p>' +data.name+ '</p>'
                    +'<p>' +data.adress + '</p>'
                    +'<p>' +data.post_code+ '</p>',
                                                    
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    focusConfirm: false,
                    
                })
            }

        });
    });
});

</script>

@endsection
