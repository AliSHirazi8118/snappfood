@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">کدهای تخفیف</h3>

    @if (isset($discount))
        @foreach ($discount as $d )
        <div dir="rtl" class="d-flex gap-4 justify-content-center" style="margin-top: 10px ; padding-top:0px ; background-color:rgb(216, 242, 232)" >
                <h5>
                   کد تخفیف : {{$d->code}}
                   <br>
                   میزان تخفیف : {{$d->discounts}}%
                   <br>
               </h5>
               <a href="/discounts/{{ $d->id }}/edit" class="btn btn-primary btn-lg btn-block mt-1 mb-1" style="margin-right: 500px ; height:50px; width:100px">ویرایش</a>
               <form action="/discounts/{{ $d->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <input type="submit" value="حذف" class="btn btn-danger btn-lg btn-block mt-1" style="margin-left: 0px ; width:100px">
               </form>
               <a href="/discounts/{{ $d->id }}" class="btn btn-primary btn-lg btn-block mt-1 " style="margin-right: 0px ; margin-left:0px;  height:50px; width:100px">نمایش</a>
       </div>

       @endforeach
    @endif
<a href="/discounts/create" class="btn btn-success btn-lg btn-block mt-4" style="margin-left: 660px ; height:50px; width:200px">تخفیف جدید</a>
<a href="/dashboard" class="btn btn-success btn-lg btn-block mt-1 mb-4" style="margin-left: 710px ; height:50px; width:100px">بازگشت</a>

@endsection
