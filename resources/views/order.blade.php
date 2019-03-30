@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add order') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('order') }}" >
                        @csrf


                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="idCanteen" type="number" class="form-control{{ $errors->has('idCanteen') ? ' is-invalid' : '' }}" name="idCanteen" value="{{ $data['id_canteen'][0]}}" required>

                                @if ($errors->has('idCanteen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('idCanteen') }}</strong>
                                    </span>
                                @endif
                                <input id="time" type="time" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }} mt-3" name="time" value="" required>
                            </div>
                        </div>
                        


      @foreach($data['meal'] as $datas)
    <label for="ingredient" class="checkbox-inline ml-2">
        <input type="checkbox" name="meal[]" value="{{$datas->id}}">{{$datas->name}}
    </label>
@endforeach

<br>
<p>Options</p>
<br>

      @foreach($data['options'] as $option)
    <label for="ingredient" class="checkbox-inline ml-2">
        <input type="checkbox" name="option[]" value="{{$option->id}}">{{$option->name}}
    </label>
@endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="buton" type="submit" class="btn btn-primary pcode">
                                    {{ __('Create') }}
                                </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
