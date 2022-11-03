@extends('inc.cdn')

@section('c')
<h3 class="d-flex justify-content-center text-white" style="padding-top: 20px">ویرایش دسته بندی</h3>




<div dir="ltr" class="d-flex gap-4 justify-content-center bg-light" style="margin-top: 100px ; padding-top:20px" >
    <form action="/restaurant/{{$rest->id}}" method="post" class="col-3">
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
                    <input name="name" type="text" class="form-control" placeholder="{{$rest->restaurnt_categories}}">
                </div>
                <br>
                <div class="col">
                    <textarea name="des" type="text" class="form-control" placeholder="{{$rest->description}}"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mr-4 mb-2" style="margin-right: 50px; margin-left:100px ; width:200px">ویرایش</button>
            <br>
            <a href="/restaurant" class="btn btn-primary btn-lg btn-block mt-1 mb-4" style="margin-left: 100px ; height:50px; width:200px">بازگشت</a>
        </form>
</div>
@endsection
