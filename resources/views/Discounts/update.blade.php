@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">ویرایش کد تخفیف</h3>

<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 100px ; padding-top:20px" >
    <form action="/discounts/{{$discount->id}}" method="post" class="col-3">
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
        <div class="d-block" dir="ltr">
            <div class="col">
                <input name="code" type="text" class="form-control" placeholder="کد تخفیف">
            </div>
            <br>
            <div class="col">
                <input name="discount" type="integer" class="form-control" placeholder="میزان تخفیف">
            </div>
            <br>
            <span>زمان تخفیف را انتخاب کنید</span>
            <div class="col">
                <input name="h" type="integer" class="form-control" placeholder="چند ساعت ؟">
            </div>
            <br>
            <div class="col">
                <input name="d" type="integer" class="form-control" placeholder="چند روز ؟">
            </div>
        </div>

            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:100px ; width:200px">ویرایش</button>
            <br>
            <a href="/discounts" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 100px ; height:50px; width:200px">بازگشت</a>
        </form>
</div>
@endsection
