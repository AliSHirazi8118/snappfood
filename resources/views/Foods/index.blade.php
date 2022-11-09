@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">غذاهای ساخته شده</h3>
    @if (isset($foods))
        @foreach ($foods as $f )
        <div dir="rtl" class="d-flex gap-4 justify-content-center" style="margin-top: 10px ; padding-top:5px ; background-color:white" >
            <img class="border rounded mb-2" src="{{asset('images/foods/'.$f->image)}}" alt="dd" width="100px" height="100px">
            <h5>
                   نام غذا : {{$f->food_name}}
                   <br>
                   @if (isset($f->discount))
                        قیمت با تخفیف : <del>{{$f->price}}</del> >>> {{$f->price - $f->discount}} تومان
                   @else
                        قیمت : {{$f->price}} تومان
                   @endif
            </h5>

               <form action="/foods/{{ $f->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="حذف" class="btn btn-danger btn-lg btn-block mt-1" style="height:40px ; width:100px ; margin-right: 200px ;">
               </form>
               <a href="/foods/{{ $f->id }}/edit" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style=" height:40px; width:100px">ویرایش</a>
               <a href="/foods/{{ $f->id }}" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-right: 0px ; margin-left:0px;  height:40px; width:100px">نمایش</a>
               <a href="/AddDiscountPage/{{ $f->id }}" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-right: 0px ; margin-left:0px;  height:40px; width:200px">اضافه کردن تخفیف</a>
               <form action="/addFoodParty/{{ $f->id }}" method="post">
                    @csrf
                    @if ($f->food_party == 'no')
                        <input type="submit" value="اضافه کردن به فودپارتی" class="btn btn-lg text-white btn-block mt-1" style="background-color:#FF00A4 ; height:40px ; width:200px">
                    @else
                        <input type="submit" value="برداشتن از فودپارتی" class="btn btn-lg text-white btn-block mt-1" style="background-color:#FF00A4 ; height:40px ; width:200px">
                    @endif
                </form>



            </div>

       @endforeach
    @endif
<a href="/foods/create" class="btn btn-success btn-lg btn-block mt-4" style="margin-left: 670px ; height:40px; width:200px">افزودن غذای جدید</a>
<a href="/dashboard" class="btn btn-success btn-lg btn-block mt-1 mb-4" style="margin-left: 720px ; height:40px; width:100px">بازگشت</a>

@endsection
