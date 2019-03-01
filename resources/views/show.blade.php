@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" justify-content-center">
        <div class="col-md-11">
            <div class="card ">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
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
                       <td>{{ $canteens->post_code}}</td>
                </tr>
                 
      @endforeach
                </tbody>
                </table>

           
            </div>
        </div>
    </div>
</div>
@endsection
