@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create canteen') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addcanteen') }}" >
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
                            <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="adress" type="adress" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="{{ old('adress') }}" required>

                                @if ($errors->has('adress'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('adress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_code" class="col-md-4 col-form-label text-md-right">{{ __('post_code') }}</label>

                            <div class="col-md-6">
                                <input id="post_code" type="post_code" class="form-control" name="post_code" required>
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
  title: 'Canteen created',
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
