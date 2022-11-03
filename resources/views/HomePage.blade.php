@extends('inc.inc')

@section('content')
<div class="d-flex justify-content-around">
    <div style="margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/fastfood.webp')}}" alt="" width="300px" height="200px">
        </a>
    </div>
    <div style="margin-left: 50px; margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/irani.jpg')}}" alt="" width="300px" height="200px">
        </a>
    </div>
    <div style="margin-left: 50px; margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/salad.webp')}}" alt="" width="300px" height="200px">
        </a>
    </div>
    <div style="margin-left: 50px; margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/kebabs.jpg')}}" alt="" width="300px" height="200px">
        </a>
    </div>
</div>
<div class="d-flex justify-content-around">
    <div style="margin-left: 50px; margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/seafood.webp')}}" alt="" width="300px" height="200px">
        </a>
    </div>
    <div style="margin-left: 50px; margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/worldly.jpg')}}" alt="" width="300px" height="200px">
        </a>
    </div>
</div>





@endsection
