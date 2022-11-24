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
            width: 80px;

        }
        td:hover {background-color:  #FF00A4; color: white}
</style>

<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">نمایش اطلاعات رستوران</h3>

        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-white" style="margin-top: 10px; padding-bottom:20px ; padding-right: 100px ; padding-top:20px;">
                <h5 >
                    نام رستوران : {{$restaurantData->rest_name}}
                    <br>
                    <br>
                    نوع رستوران : {{$restaurantData->rest_type}}
                    <br>
                    <br>
                    شماره تماس : {{$restaurantData->phone}}
                    <br>
                    <br>
                    آدرس رستوران : {{$restaurantData->address}}
                    <br>
                    <br>
                    دسته بندی غذاها : {{$restaurantData->food_type}}
                    <br>
                    <br>
                    هزینه ارسال : {{$restaurantData->post_cash}} تومان
                    <br>
                    <br>
                    شماره حساب : {{$restaurantData->account_number}}
                    <br>
                    <br>
                    @if ($restaurantData->state == 'open')
                        باز است
                    @else
                        بسته است
                    @endif
                </h5>
                <img class="border border-danger rounded" src="{{asset('images/'.$restaurantData->image)}}" alt="میتوانید عکس رستوران خود را آپلود کنید" width="300px" height="400px">

                <div id="map" class="border border-danger rounded" style="height: 400px; width: 300px; margin-left: 10px"></div>
                <script>
                    var map = L.map('map').setView([35.681067, 51.373966], 15); // Tehran
                    var marker = L.marker([35.681067, 51.373966]).addTo(map);
                    var popup = L.popup();

                    function onMapClick(e) {
                        popup
                            .setLatLng(e.latlng)
                            .setContent("مختصات جغرافیایی نقطه انتخاب شده " + e.latlng.toString())
                            .openOn(map);
                    }
                    map.on('click', onMapClick);

                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                </script>
                @if (count($times) == 14)
                <div  style="height: 400px; width: 300px; margin-left: 60px">
                    <table>
                        <tr>
                          <th>روزهای هفته</th>
                          <th>ساعت شروع</th>
                          <th>ساعت پایان</th>
                        </tr>
                        <tr>
                          <td>شنبه</td>
                          <td>{{$times[0]}}</td>
                          <td>{{$times[1]}}</td>
                        </tr>
                        <tr>
                            <td>یکشنبه</td>
                            <td>{{$times[2]}}</td>
                            <td>{{$times[3]}}</td>
                          </tr>
                          <tr>
                            <td>دوشنبه</td>
                            <td>{{$times[4]}}</td>
                            <td>{{$times[5]}}</td>
                          </tr>
                          <tr>
                            <td>سه شنبه</td>
                            <td>{{$times[6]}}</td>
                            <td>{{$times[7]}}</td>
                          </tr>
                          <tr>
                            <td>چهارشنبه</td>
                            <td>{{$times[8]}}</td>
                            <td>{{$times[9]}}</td>
                          </tr>
                          <tr>
                            <td>پنج شنبه</td>
                            <td>{{$times[10]}}</td>
                            <td>{{$times[11]}}</td>
                          </tr>
                          <tr>
                            <td>جمعه</td>
                            <td>{{$times[12]}}</td>
                            <td>{{$times[13]}}</td>
                          </tr>
                      </table>
                </div>
                @endif
        </div>
        <form action="/state/{{ $restaurantData->id }}" method="get">
            @if ($restaurantData->state == 'open')
                <input type="submit" value="بستن" class="btn btn-danger btn-lg btn-block mt-1" style="height:40px; width:100px; margin-left:730px">
            @else
                <input type="submit" value="بازکردن" class="btn btn-primary btn-lg btn-block mt-1" style="height:40px; width:100px;  margin-left:730px">
            @endif
        </form>
        <a href="/RestInormations/{{ $restaurantData->id }}/edit" class="btn btn-success btn-lg btn-block mt-2" style="margin-left: 630px ; height:40px; width:300px">ویرایش و تکمیل اطلاعات</a>
        <a href="/dashboard" class="btn btn-success btn-lg btn-block mt-2 mb-4" style="margin-left: 730px ; height:40px; width:100px">بازگشت</a>
@endsection
