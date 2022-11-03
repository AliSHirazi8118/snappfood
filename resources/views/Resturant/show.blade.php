@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">نمایش اطلاعات</h3>
        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 10px ; padding-top:20px" >
                <h5>
                    نوع رستوران : {{$rest->restaurnt_categories}}
                    <br>
                    <br>
                    توضیحات : {{$rest->description}}
                    <br>
                    <br>
                    تعداد رستوران های این دسته بندی : {{$rest->count}}
                    <br>
                </h5>
        </div>
    <a href="/restaurant" class="btn btn-success btn-lg btn-block mt-4 mb-4" style="margin-left: 710px ; height:50px; width:100px">بازگشت</a>
@endsection
