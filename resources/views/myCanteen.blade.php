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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $canteens)

                        <tr class=" pointer"   >
                            <th scope="row"></th>
                            <td>{{ $canteens->name}}</td>
                            <td>{{ $canteens->adress}}</td>
                            <td>{{ $canteens->city}}</td>
                            <td>{{ $canteens->post_code}}</td>
                            <td><a href="/myProject/public/canteenMeal/{{$canteens->id}}"><button class="btn btn-dark pcode" ctn="{{$canteens->id}}">Add meal</button></a></td>
                            <td><button class="btn btn-danger del" id="del" onclick="deletectn(this,{{$canteens->id}})">Delete</button></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


@endsection
