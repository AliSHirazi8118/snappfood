@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">نمایش اطلاعات رستوران</h3>

        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-white" style="margin-top: 10px ; padding-top:20px;">
                <h5>
                    نام رستوران : {{$rest->rest_name}}
                    <br>
                    <br>
                    نوع رستوران : {{$rest->rest_type}}
                    <br>
                    <br>
                    شماره تماس : {{$rest->phone}}
                    <br>
                    <br>
                    آدرس رستوران : {{$rest->address}}
                    <br>
                    <br>
                    دسته بندی غذاها : {{$rest->food_type}}
                    <br>
                    <br>
                    ساعات کاری : {{$rest->work_times}}
                    <br>
                    <br>
                    هزینه ارسال : {{$rest->post_cash}} تومان
                    <br>
                    <br>
                    شماره حساب : {{$rest->account_number}}
                    <br>
                    <br>
                    @if ($rest->state == 'open')
                        باز است
                    @else
                        بسته است
                    @endif
                </h5>
                <img class="border border-danger rounded" src="{{asset('images/'.$rest->image)}}" alt="میتوانید عکس رستوران خود را آپلود کنید" width="400px" height="400px">
        </div>
        <form action="/state/{{ $rest->id }}" method="get">
            @if ($rest->state == 'open')
                <input type="submit" value="بستن" class="btn btn-danger btn-lg btn-block mt-1" style="height:40px; width:100px; margin-left:710px">
            @else
                <input type="submit" value="بازکردن" class="btn btn-primary btn-lg btn-block mt-1" style="height:40px; width:100px;  margin-left:710px">
            @endif
        </form>
        <a href="/RestInormations/{{ $rest->id }}/edit" class="btn btn-success btn-lg btn-block mt-2" style="margin-left: 610px ; height:40px; width:300px">ویرایش و تکمیل اطلاعات</a>
        <a href="/dashboard" class="btn btn-success btn-lg btn-block mt-2 mb-4" style="margin-left: 710px ; height:40px; width:100px">بازگشت</a>
@endsection
