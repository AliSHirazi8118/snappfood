@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">ویرایش دسته بندی</h3>




<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 100px ; padding-top:20px" >
    <form action="/food_categories/{{$foodCat->id}}" method="post" class="col-3">
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
                    <input name="name" type="text" class="form-control" placeholder="نام دسته بندی">
                </div>
                <br>
                <div class="col">
                    <label for="rest_cat">دسته بندی رستوران</label>
                    <select name="rest_cat" id="rest_cat">
                        @foreach ($rest as $r )
                            <option value="{{$r->id}}">{{$r->restaurnt_categories}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:100px ; width:200px">ویرایش</button>
            <br>
            <a href="/food_categories" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 100px ; height:50px; width:200px">بازگشت</a>
        </form>
</div>
@endsection
