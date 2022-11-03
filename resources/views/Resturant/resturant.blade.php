@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">انواع رستوران ها</h3>

    @if (isset($rest))
        @foreach ($rest as $r )
        <div dir="rtl" class="d-flex gap-4 justify-content-center" style="margin-top: 10px ; padding-top:5px ; background-color:rgb(216, 242, 232)" >
           <h5>
                   رستوران های : {{$r->restaurnt_categories}}
                   <br>
                   تعداد : {{$r->count}}
               </h5>
               <a href="/restaurant/{{ $r->id }}/edit" class="btn btn-primary btn-lg btn-block mt-1 mb-2" style="margin-right: 500px ; height:40px; width:100px">ویرایش</a>
               <form action="/restaurant/{{ $r->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <input type="submit" value="حذف" class="btn btn-danger btn-lg btn-block mt-1" style="height:40px; width:100px">
               </form>
               <a href="/restaurant/{{ $r->id }}" class="btn btn-primary btn-lg btn-block mt-1 mb-2" style="margin-right: 0px ; margin-left:0px;  height:40px; width:100px">نمایش</a>
       </div>

       @endforeach
    @endif
<a href="/restaurant/create" class="btn btn-success btn-lg btn-block mt-4" style="margin-left: 660px ; height:50px; width:200px">دسته بندی جدید</a>
<a href="/dashboard" class="btn btn-success btn-lg btn-block mt-1 mb-4" style="margin-left: 710px ; height:50px; width:100px">بازگشت</a>

@endsection
