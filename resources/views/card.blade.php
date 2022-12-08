@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">سبد خرید</h3>
    @if (isset($foods))
      @foreach ($foods as $key => $food)
        <div dir="rtl" class="d-flex gap-4 justify-content-center" style="margin-top: 10px ; padding-top:5px ; background-color:white" >
            <img class="border rounded mb-2" src="{{asset('images/foods/'.$food->image)}}" alt="dd" width="100px" height="100px">
            <h5>
                   نام غذا : {{$food->food_name}}
                   <br>
                   @if (isset($food->discount))
                        قیمت با تخفیف : <del>{{$food->price}}</del> >>> {{$food->price - $food->discount}} تومان
                        <br>
                        تعداد : {{$count[$key]}}
                        <br>
                        قیمت نهایی : {{($food->price - $food->discount) * $count[$key]}} تومان
                   @else
                        قیمت : {{$food->price}} تومان
                        <br>
                        تعداد : {{$count[$key]}}
                        <br>
                        قیمت نهایی : {{$food->price * $count[$key]}} تومان
                   @endif
            </h5>
               {{-- <form action="//{{ $food->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="حذف" class="btn btn-danger btn-lg btn-block mt-1" style="height:40px ; width:100px ; margin-right: 200px ;">
               </form> --}}
            </div>
        @endforeach
    @endif
<a href="/card/buy" class="btn btn-success btn-lg btn-block mt-4" style="margin-left: 670px ; height:40px; width:200px">ثبت سفارش</a>
<a href="/" class="btn btn-success btn-lg btn-block mt-1 mb-4" style="margin-left: 720px ; height:40px; width:100px">بازگشت</a>

@endsection
