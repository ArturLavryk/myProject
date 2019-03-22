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
                            <th scope="col">{{ __('Weight') }}</th>
                            <th scope="col">{{ __('Price') }}</th>
                            
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $option)

                        <tr class=" pointer"   >
                            <th scope="row"></th>
                            <td>{{ $option->name}}</td>
                            <td>{{ $option->weight}}</td>
                            <td>{{ $option->price}}</td>
                          
                            <td><button class="btn btn-dark pcode" ctn="{{$option->id}}">Edit</button></td>
                            <td><button class="btn btn-danger del" id="del" onclick="deleteOptions(this,{{$option->id}})">Delete</button></td>
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
            url: "showSimple/" + id,
            success: function (data) {
         
                Swal.fire({
                    title: '<strong>Canteen click</strong>',
                    type: 'info',
                    html:

             '<form method="POST" action="{{ route('editOpt') }}">'
     +'@csrf'
             +'<div class="form-group">'
     +'<input id="id" name="id" type="text" class="form-control" style="display:none;" value="'+data.id+'">'
     +'<label for="name">Name</label>'
 +'<input id="name" name="name" type="text" class="form-control" value="'+data.name+'"></div>'
             +'<div class="form-group">'
     +'<label for="weight">Weight</label>'
 +'<input id="weight" name="weight" type="number" class="form-control" value="'+data.weight+'"></div>'
  +'<div class="form-group">'
     +'<label for="price">Price</label>'
 +'<input id="price" name="price" type="price" class="form-control" value="'+data.price+'"></div>'
              +'<div class="form-group">'
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
