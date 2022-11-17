@extends('inc.cdn')

@section('c')
    <style>
        table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }
        th, td {
            background-color: #96D4D4;
        }


    </style>
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">ویرایش اطلاعات رستوران</h3>


<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 20px ; padding-top:20px" >
    <form  enctype="multipart/form-data" action="/RestInormations/{{$restaurantData->id}}" method="post" class="col-3">
        @if ($errors->any())
        <div class="d-flex justify-content-center alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @csrf
        @method('PUT')

        <div class="d-block" dir="rtl">
            <div class="col">
                <input name="name" type="text" class="form-control" value="{{$restaurantData->rest_name}}" placeholder="نام رستوران">
            </div>
            <br>
            <div class="col">
                <input name="phone" type="phone" class="form-control" value="{{$restaurantData->phone}}" placeholder="تلفن">
            </div>
            <br>
            <div class="col">
                <input name="account_number" type="text" class="form-control" value="{{$restaurantData->account_number}}" placeholder="شماره حساب">
            </div>
            <br>
            <div class="col">
                <textarea name="address" type="text" class="form-control" value="{{old('address')}}"  placeholder="آدرس رستوران">{{$restaurantData->address}}</textarea>
            </div>
            <br>
            <div class="col">
                <input name="post_cash" type="number" class="form-control" value="{{$restaurantData->post_cash}}" placeholder="هزینه ارسال">
            </div>
            <br>




            <div class="col">
                <input name="work_times" type="text" class="form-control" value="{{$restaurantData->work_times}}" placeholder="ساعات کاری">
                <label for="work_times">تنظیم ساعات کاری</label>
                <table style="border: 1px solid black;">
                    <tr>
                      <th>روزهای هفته</th>
                      <th>ساعت شروع</th>
                      <th>ساعت پایان</th>
                    </tr>
                    <tr>
                      <td>شنبه</td>
                      <td dir="ltr"><input type="time" name="start_time_1"></td>
                      <td dir="ltr"><input type="time" name="end_time_1"></td>
                    </tr>
                    <tr>
                        <td>یکشنبه</td>
                        <td dir="ltr"><input type="time" name="start_time_2"></td>
                        <td dir="ltr"><input type="time" name="end_time_2"></td>
                      </tr>
                      <tr>
                        <td>دوشنبه</td>
                        <td dir="ltr"><input type="time" name="start_time_3"></td>
                        <td dir="ltr"><input type="time" name="end_time_3"></td>
                      </tr>
                      <tr>
                        <td>سه شنبه</td>
                        <td dir="ltr"><input type="time" name="start_time_4"></td>
                        <td dir="ltr"><input type="time" name="end_time_4"></td>
                      </tr>
                      <tr>
                        <td>چهارشنبه</td>
                        <td dir="ltr"><input type="time" name="start_time_5"></td>
                        <td dir="ltr"><input type="time" name="end_time_5"></td>
                      </tr>
                      <tr>
                        <td>پنج شنبه</td>
                        <td dir="ltr"><input type="time" name="start_time_6"></td>
                        <td dir="ltr"><input type="time" name="end_time_6"></td>
                      </tr>
                      <tr>
                        <td>جمعه</td>
                        <td dir="ltr"><input type="time" name="start_time_7"></td>
                        <td dir="ltr"><input type="time" name="end_time_7"></td>
                      </tr>
                  </table>
            </div>





            <br>
            <div class="col">
                <label>انتخاب عکس</label>
                <input name="photo" type="file"  value="{{old('photo')}}" class="form-control">
            </div>
            <br>
            <div class="col">
                <label for="rest_cat">دسته بندی رستوران</label>
                <select name="rest_cat" id="rest_cat">
                    @foreach ($restaurants as $restaurant )
                        <option value="{{$restaurant->restaurnt_categories}}">{{$restaurant->restaurnt_categories}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col">
                <label for="food_cat">دسته بندی غذاها</label>
                <select name="food_cat" id="food_cat">
                    @foreach ($foodCategories as $foodCategory )
                        <option value="{{$foodCategory->food_categories}}">{{$foodCategory->food_categories}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:100px ; width:200px">ویرایش</button>
            <br>
            <a href="/RestInormations/{{$restaurantData->id}}" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 100px ; height:50px; width:200px">بازگشت</a>
        </form>
</div>
@endsection




