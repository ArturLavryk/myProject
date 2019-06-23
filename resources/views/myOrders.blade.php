@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link href="{{ asset('css/menu.css')}}" rel="stylesheet">
<style>
    
    .pointer{
        cursor: pointer;
    }
</style>
<div class="container">
    <div class=" justify-content-center">
        <div class="col-md-12">
            @foreach($data['meal'] as $d)
            
            <br>
            <div class="dropdown">
                <div>
                <button onclick="myFunction()" class="dropbtn ">@foreach($d as $meal){{$meal->name}}{{" "}}@endforeach</button>
                </div>
                @foreach($data['option'] as $opt)
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <b>@foreach($opt as $option) {{$option[0]->name}} {{","}} @endforeach</b>
                </div>
                @endforeach 
            </div>
              
            @endforeach
        </div>
    </div>
</div>





<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

</script>

@endsection
