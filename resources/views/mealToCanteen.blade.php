@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add meal') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('CanteenMeal') }}" >
                        @csrf


                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="idCanteen" type="number" class="form-control{{ $errors->has('idCanteen') ? ' is-invalid' : '' }}" name="idCanteen" value="{{ $data['canteen']->id}}" required>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        
                        <div class="row">
      @foreach($data['meal'] as $datas)
      <div class="col-md-4 pt-4">
      <label for="ingredient" class="checkbox-inline ml-2">
        <input type="checkbox" name="meal[]" value="{{$datas->id}}">{{$datas->name}}
    </label>
      </div>
@endforeach
                        </div>


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
