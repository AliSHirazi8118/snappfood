@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">ویرایش اطلاعات غذا</h3>


<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 50px ; padding-top:20px" >
    <form enctype="multipart/form-data" action="/foods/{{$food->id}}" method="post" class="col-3">
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
                    <input name="name" type="text" class="form-control" value="{{$food->food_name}}" placeholder="نام غذا">
                </div>
                <br>
                <div class="col">
                    <textarea name="material" type="text" class="form-control" value="{{$food->material}}" placeholder="مواد اولیه">{{$food->material}}</textarea>
                </div>
                <br>
                <div class="col">
                    <input name="price" type="text" class="form-control" value="{{$food->price - $food->discount}}" placeholder="قیمت">
                </div>
                <br>
                <div class="col">
                    <label>انتخاب عکس</label>
                    <input name="photo" type="file" class="form-control">
                </div>
                <br>
                <div class="col">
                    <label for="food_cat">دسته بندی غذا </label>
                    <select name="food_cat" id="food_cat">
                        @foreach ($foodCat as $f )
                            <option value="{{$f->food_categories}}">{{$f->food_categories}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:100px ; width:200px">ایجاد</button>
            <br>
            <a href="/foods" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 100px ; height:50px; width:200px">بازگشت</a>

        </form>
</div>
@endsection
