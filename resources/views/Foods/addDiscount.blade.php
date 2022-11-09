@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">اضافه کردن تخفیف</h3>


<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 50px ; padding-top:20px" >
    <form enctype="multipart/form-data" action="/addDiscount/{{$food->id}}" method="post" class="col-3">
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
        <div class="d-block" dir="rtl">
                <div class="col">
                    <input name="discount" type="text" class="form-control" value="{{$food->discount}}" placeholder="میزان تخفیف">
                </div>
                <br>
        </div>
            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:150px ; width:100px">ایجاد</button>
            <br>
            <a href="/foods" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 150px ; height:50px; width:100px">بازگشت</a>
        </form>
</div>
@endsection
