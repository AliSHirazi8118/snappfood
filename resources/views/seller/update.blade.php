@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">ویرایش اطلاعات رستوران</h3>


<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 20px ; padding-top:20px" >
    <form  enctype="multipart/form-data" action="/RestInormations/{{$restInfo->id}}" method="post" class="col-3">
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
                <input name="name" type="text" class="form-control" value="{{$restInfo->rest_name}}" placeholder="نام رستوران">
            </div>
            <br>
            <div class="col">
                <input name="phone" type="phone" class="form-control" value="{{$restInfo->phone}}" placeholder="تلفن">
            </div>
            <br>
            <div class="col">
                <input name="account_number" type="number" class="form-control" value="{{$restInfo->account_number}}" placeholder="شماره حساب">
            </div>
            <br>
            <div class="col">
                <textarea name="address" type="text" class="form-control" value="{{$restInfo->address}}"  placeholder="آدرس رستوران"></textarea>
            </div>
            <br>
            <div class="col">
                <input name="post_cash" type="number" class="form-control" value="{{$restInfo->post_cash}}" placeholder="هزینه ارسال">
            </div>
            <br>
            <div class="col">
                <input name="work_times" type="text" class="form-control" value="{{$restInfo->work_times}}" placeholder="ساعات کاری">
            </div>
            <br>
            <div class="col">
                <label>انتخاب عکس</label>
                <input name="photo" type="file" class="form-control">
            </div>
            <br>
            <div class="col">
                <label for="rest_cat">دسته بندی رستوران</label>
                <select name="rest_cat" id="rest_cat">
                    @foreach ($rest as $r )
                        <option value="{{$r->restaurnt_categories}}">{{$r->restaurnt_categories}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col">
                <label for="food_cat">دسته بندی غذاها</label>
                <select name="food_cat" id="food_cat">
                    @foreach ($food as $f )
                        <option value="{{$f->food_categories}}">{{$f->food_categories}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:100px ; width:200px">ویرایش</button>
            <br>
            <a href="/dashboard" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 100px ; height:50px; width:200px">بازگشت</a>
        </form>
</div>
@endsection




