@extends('inc.inc')

@section('content')


<style>
    div.scrollmenu {
    background-color: #333;
    overflow: auto;
    white-space: nowrap;
    }

    div.scrollmenu a {
    display: inline-block;
    color: rgb(133, 20, 185);
    text-align: center;
    padding: 14px;
    text-decoration: none;
    }

    div.scrollmenu a:hover {
    background-color: rgb(137, 11, 97);
    color: white;
    }

</style>


<div id="cards" class="d-flex justify-content-around">
    <div style="margin-top: 50px;">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/fastfood.webp')}}" alt="" width="200px" height="150px">
        </a>
    </div>
    <div style=" margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/irani.jpg')}}" alt="" width="200px" height="150px">
        </a>
    </div>
    <div style=" margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/salad.webp')}}" alt="" width="200px" height="150px">
        </a>
    </div>
    <div style=" margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/kebabs.jpg')}}" alt="" width="200px" height="150px">
        </a>
    </div>
    <div style=" margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/seafood.webp')}}" alt="" width="200px" height="150px">
        </a>
    </div>
    <div style=" margin-top: 50px">
        <a href="#">
            <img  class="border border-white rounded" src="{{asset('snappfood/worldly.jpg')}}" alt="" width="200px" height="150px">
        </a>
    </div>
</div>



@if (isset($foods))

<img src="{{asset('images/foodParty.jpg')}}" class="pr-2" alt="..." width="100%" height="700px" style="margin-top: 80px;">
<div class="d-flex justify-content-start" dir="rtl">
    <div id="foodParty" class="d-flex scrollmenu justify-content-around"  style="background-color:rgb(29, 1, 20) ; margin-bottom: 100px; width:100%; height:380px; -webkit-flex-wrap: wrap; flex-wrap: wrap;">
        @foreach ($foods as $food)
        <div class="card border-primary text-center mb-2 text-dark" style="width: 202px;">
            <img src="{{asset('images/foods/' . $food->image)}}" class="pr-2" alt="..." width="200px" height="150px">
            <div class="card-body">
              <h5 class="card-title">{{$food->food_name}}</h5>
              <h6 class="card-text">قیمت در فودپارتی : {{$food->price - $food->discount}} تومان</h6>
              <h6 class="card-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
                </svg>
                @foreach ($restaurants as $restaurant)
                    @if ($restaurant->seller_id == $food->restaurant_id)
                            <b>{{$restaurant->rest_name}}</b>
                    @endif
                @endforeach
              </h6>
              <h6><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
              </svg> 4.5</h6>

              <h6>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                    <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                  </svg> 247 نظر
              </h6>
              <a href="food/data/{{$food->id}}">مشاهده بیشتر <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
              </svg></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@endsection
