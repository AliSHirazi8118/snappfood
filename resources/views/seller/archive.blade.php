@extends('inc.cdn')

@section('c')

<style>
    table, th, td {
        border: 1px solid white;
        border-collapse: collapse;
        text-align: center;
        height: 50px;
    }
    th, td {
        background-color:  hsl(184, 79%, 72%);
        width: 200px;
    }
    td:hover {background-color:  #FF00A4; color: white}
</style>


<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">آرشیو سفارش های رستوران</h3>
    @if (isset($archive))
        <div dir="rtl" class="d-flex gap-4 justify-content-center" style="margin-top: 10px ; padding-top:5px ; background-color:white" >
            <table>
                <tr>
                    <th>نام مشتری</th>
                    <th>سفارش دریافتی</th>
                    <th>هزینه سفارش</th>
                    <th>هزینه ارسال</th>
                    <th>مجموع</th>
                    <th>کد تخفیف</th>
                    <th>آخرین وضعیت سفارش</th>
                    <th>تاریخ سفارش</th>
                </tr>
                @foreach ($archive as $data )
                <tr>
                    <td>{{$data->user_name}}</td>
                    <td>{{$data->orders}}</td>
                    <td>{{$data->order_cash}} تومان</td>
                    <td>{{$data->post_cash}} تومان</td>
                    <td>{{$data->post_cash + $data->order_cash}} تومان</td>
                    <td>{{$data->discount}}</td>
                    <td>تحویل گرفته شد</td>
                    <td>{{$data->deleted_at}}</td>
                </tr>
                @endforeach
            </table>
            </div>
    @endif
{{-- <a href="/foods/create" class="btn btn-success btn-lg btn-block mt-4" style="margin-left: 670px ; height:40px; width:200px">افزودن غذای جدید</a> --}}
<a href="/dashboard" class="btn btn-success btn-lg btn-block mt-1 mb-4" style="margin-left: 720px ; height:40px; width:100px">بازگشت</a>

@endsection
