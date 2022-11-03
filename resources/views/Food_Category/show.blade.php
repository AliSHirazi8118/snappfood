@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">نمایش اطلاعات</h3>
        <div dir="rtl" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 10px ; padding-top:20px" >
                <h5>
                    نوع غذا : {{$foodCat->food_categories}}
                    <br>
                    <br>
                    تعداد غذاهای دسته بندی : {{$foodCat->food_count}}
                    <br>
                    <br>
                    @foreach ($rest as $r)
                    رستوران های ارائه دهنده : {{$r->restaurnt_categories}}

                    @endforeach
                    <br>
                </h5>
        </div>
    <a href="/food_categories" class="btn btn-success btn-lg btn-block mt-4 mb-4" style="margin-left: 710px ; height:50px; width:100px">بازگشت</a>
@endsection
