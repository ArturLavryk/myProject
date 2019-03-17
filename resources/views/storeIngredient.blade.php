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
                            <th scope="col">{{ __('Ingredient name') }}</th>
                            <th scope="col">{{ __('Meal name') }}</th>
                             <th scope="col">{{ __('Description meal') }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $allData)

                        <tr class=" pointer"   >
                            <th scope="row"></th>
                            <td>{{ $allData->name}}</td>
                            <td>{{ $allData->mealName}}</td>
                            <td>{{ $allData->mealDescription}}</td>
                            <td><button class="btn btn-dark pcode" ctn="{{$allData->id}}">Edit</button></td>
                            <td><button class="btn btn-danger del" id="del" onclick="deleteing(this,{{$allData->id}})">Delete</button></td>
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
            url: "get-ing/" + id,
            success: function (data) {
         
                Swal.fire({
                    title: '<strong>Edit ingredient</strong>',
                    type: 'info',
                    html:

             '<form method="POST" action="{{ route('editIngredient') }}">'
     +'@csrf'
             +'<div class="form-group">'
     +'<input id="id" name="id" type="text" class="form-control" style="display:none;" value="'+data.id+'">'
     +'<label for="name">Name</label>'
 +'<input id="name" name="name" type="text" class="form-control" value="'+data.name+'"></div>'
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
