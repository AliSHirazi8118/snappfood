@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">نمایش اطلاعات</h3>
        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 10px ; padding-top:20px" >
                <h5>
                    نام غذا : {{$food->food_name}}
                    <br>
                    <br>
                    قیمت : {{$food->price}} تومان
                    <br>
                    <br>
                    دسته بندی غذا : {{$food->food_cat}}
                    <br>
                    <br>
                    مواد اولیه : {{$food->material}}
                    <br>
                    <br>
                    @if (isset($food->discount))
                        قیمت نهایی با تخفیف {{$food->discount}} تومانی >>> {{$food->price - $food->discount}} تومان
                    @endif
                    <br>
                    <br>
                </h5>
                <img class="border rounded mb-4" src="{{asset('images/foods/'.$food->image)}}" alt="dd" width="200px" height="200px">

        </div>
    <a href="/foods" class="btn btn-success btn-lg btn-block mt-4 mb-4" style="margin-left: 720px ; height:50px; width:100px">بازگشت</a>
@endsection
