@extends('inc.cdn')

<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($user->role == 'admin')
                        <div>
                            <a href="/food_categories" class="btn btn-primary btn-lg btn-block mt-2 mb-2" style="margin-left: 500px ;height:50px; width:220px">دسته بندی غذاها</a>
                        </div>
                        <div>
                            <a href="/restaurant" class="btn btn-success btn-lg btn-block mb-2" style="margin-left: 500px ; height:50px; width:220px">دسته بندی رستوران ها</a>
                        </div>
                        <div>
                            <a href="/discounts" class="btn btn-warning btn-lg btn-block" style="margin-left: 500px ; height:50px; width:220px">مدیریت تخفیف ها</a>
                        </div>

                    @elseif ($user->role == 'seller')
                            @foreach ($restaurantData as $data)
                                <div class="d-flex justify-content-center">
                                    <a href="/RestInormations/{{$data->id}}" class="btn btn-success btn-lg btn-block mt-2 mb-2" style="margin-left: 10px; height:50px; width:200px">تنظیمات اولیه رستوران</a>
                                    <a href="/foods" class="btn btn-primary btn-lg btn-block mt-2 mb-2" style="margin-left: 10px ;height:50px; width:200px">مدیریت غذاها</a>
                                    <a href="/foods" class="btn btn-warning btn-lg btn-block mt-2 mb-2" style="margin-left: 10px ;height:50px; width:200px">گزارش فروش</a>
                                    <a href="/order/archive" class="btn btn-info btn-lg btn-block mt-2 mb-2" style="margin-left: 10px ;height:50px; width:200px">آرشیو سفارش ها</a>
                                </div>
                                <div class="d-flex justify-content-around pt-3" style="background-color:  hsl(184, 79%, 72%); height:50px; width:100%; margin-top:50px;">
                                    <h4 class="" style=""><b>لیست سفارشات</b></h4>
                                </div>
                            @endforeach
                            @foreach ($restaurantOrders as $order)
                            <div>
                                <div class="border rounded mt-4 " dir="rtl" style="width:100% ; height:100px; background-color:  hsl(184, 79%, 72%);">
                                    <h5 class="mt-2" style="margin-right: 10px">نام مشتری : {{$order->user_name}}</h5>

                                    <table>
                                        <tr>
                                            <td>{{$order->orders}}</td>
                                            <td>{{$order->order_cash}} تومان</td>
                                            <td>{{$order->post_cash}} تومان</td>
                                            <td>{{$order->order_cash + $order->post_cash}} تومان</td>


                                            @if ($order->state == 'pending')
                                                <td>در حال بررسی...</td>
                                                <td><form action="/order/preparing/{{ $order->id }}" method="post">
                                                    @csrf
                                                    <input type="submit" value="آماده سازی" class="btn btn-success btn-lg btn-block mt-1 mb-1" style="height:40px ; width:100% ;">
                                                </form></td>
                                                <td><form action="/order/{{ $order->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="لغو" class="btn btn-danger btn-lg btn-block mt-1 mb-1" style="height:40px ; width:100% ;">
                                               </form></td>
                                            @elseif ($order->state == 'preparing')
                                                <td>در حال آماده سازی...</td>
                                                <td><form action="/order/posted/{{ $order->id }}" method="post">
                                                    @csrf
                                                    <input type="submit" value="ارسال به مقصد" class="btn btn-success btn-lg btn-block mt-1 mb-1" style="height:40px ; width:100% ;">
                                                </form></td>
                                                <td><form action="/order/{{ $order->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="لغو" class="btn btn-danger btn-lg btn-block mt-1 mb-1" style="height:40px ; width:100% ;">
                                               </form></td>
                                            @elseif ($order->state == 'Posted')
                                                <td>در حال ارسال...</td>
                                                <td><form action="/order/received/{{ $order->id }}" method="post">
                                                    @csrf
                                                    <input type="submit" value="تحویل گرفته شد" class="btn btn-success btn-lg btn-block mt-1 mb-1" style="height:40px ; width:100% ;">
                                                </form></td>
                                                <td><form action="/order/{{ $order->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="لغو" class="btn btn-danger btn-lg btn-block mt-1 mb-1" style="height:40px ; width:100% ;">
                                               </form></td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                    @else
                            <div dir="rtl" class="d-flex justify-content-center" style="">
                                @foreach ($orders as $order)
                                    <div style="height: 400px;">
                                        <table>
                                            <tr>
                                              <th>نام غذا</th>
                                              <th>تعداد</th>
                                              <th>نام رستوران</th>
                                              <th>هزینه سفارش</th>
                                              <th>هزینه ارسال</th>
                                              <th>مجموع</th>
                                              <th>وضعیت</th>
                                            </tr>
                                            <tr>
                                                <td>food</td>
                                                <td>1</td>
                                                <td>{{$order->restaurant}}</td>
                                                <td>{{$order->order_cash}}</td>
                                                <td>{{$order->post_cash}}</td>
                                                <td>{{$order->order_cash + $order->post_cash}}</td>
                                                <td>{{$order->state}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
