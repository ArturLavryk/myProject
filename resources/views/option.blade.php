@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create options') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addoption') }}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required>

                                @if ($errors->has('weight'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="buton" type="submit" class="btn btn-primary pcode">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function () {
    $('#buton').click(function () {
      Swal.fire({
  position: 'top-end',
  type: 'success',
  title: 'Option created',
  showConfirmButton: false,
  timer: 1500
})


    });
});
//$(document).ready(function(){
//   
//   $('#buton').click(function(){
//        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//       var name = $('#name').val();
//                  console.log(name);
//                  var adress = $('#adress').val();
//                  console.log(adress);
//       $.ajax({
//           type:'POST',
//           url:"{{ route('addcanteen') }}",
//           data: {_token: CSRF_TOKEN, name: name},
//           dataType: "json",
//                   contentType: false,
//          processData: false,
//           success:function(data){
//               Swal.fire({
//  position: 'top-end',
//  type: 'success',
//  title: 'Your work has been saved',
//  showConfirmButton: false,
//  timer: 1500
//});
//           }
//       });
//               
//   }) ;
//});
</script>

@endsection
