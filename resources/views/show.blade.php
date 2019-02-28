@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="nav col-md-12 navbar">
                    <a class="nav-item col-md-3 ">{{ __('Name') }}</a>
                    <a class="nav-item col-md-3 ">{{ __('Adress') }}</a>
                    <a class="nav-item col-md-3">{{ __('City') }}</a>
                    <a class="nav-item col-md-3">{{ __('Post code') }}</a>
            </div>

  <ul class="list-group">
  <li class="list-group-item active">{{}}</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>
            </div>
        </div>
    </div>
</div>
@endsection
