@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">نمایش اطلاعات</h3>
    <div class="d-flex ">
        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 20px; padding-top:100px; width: 50%" >
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
                    تعداد مورد نظر :
                    <form action="/card/add/{{$food->id}}/{{$food->restaurant_id}}" method="GET">
                        <input type="number" value="1" name="count" min="1" max="50" style="width: 20%; height:50px">
                        <input type="submit" value="افزودن به سبد خرید +" class="btn btn-primary btn-lg btn-block mt-1">
                    </form>
                </h5>
                <img class="border rounded mb-4" src="{{asset('images/foods/'.$food->image)}}" alt="dd" width="250px" height="250px">
        </div>
        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 20px ;padding-right: 50px ; padding-top:50px ;  width: 50%" >
                <h5>
                    @foreach ($restaurantData as $data)
                    نام رستوران : {{$data->rest_name}}
                    <br>
                    <br>
                    نوع رستوران : {{$data->rest_type}}
                    <br>
                    <br>
                    دسته بندی غذاها: {{$data->food_type}}
                    <br>
                    <br>
                    آدرس : {{$data->address}}
                    <br>
                    <br>
                    تلفن : {{$data->phone}}
                    <br>
                    <br>
                    هزینه ارسال : {{$data->post_cash}} تومان
                    <br>
                    <br>
                    @if ($data->state == 'open')
                        باز است
                    @else
                        بسته است
                    @endif
                    <br>
                    <a href="/" class="btn btn-primary btn-lg btn-block mt-4 mb-4" style="height:50px; width:100%">نمایش غذاهای این رستوران</a>
                </h5>
                <img class="border rounded mb-4" src="{{asset('images/'.$data->image)}}" alt="dd" width="250px" height="300px">
                @endforeach
        </div>
    </div>
    <a href="/" class="btn btn-success btn-lg btn-block mt-4 mb-4" style="margin-left: 720px ; height:50px; width:100px">بازگشت</a>
@endsection
