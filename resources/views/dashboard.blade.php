@extends('inc.cdn')

<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($user->role == 'admin')
                        <div>
                            <a href="/food_categories" class="btn btn-primary btn-lg btn-block mt-2 mb-2" style="margin-left: 500px ;height:50px; width:220px">دسته بندی غذاها</a>
                        </div>
                        <div>
                            <a href="/restaurant" class="btn btn-success btn-lg btn-block mb-2" style="margin-left: 500px ; height:50px; width:220px">دسته بندی رستوران ها</a>
                        </div>
                        <div>
                            <a href="/discounts" class="btn btn-warning btn-lg btn-block" style="margin-left: 500px ; height:50px; width:220px">مدیریت تخفیف ها</a>
                        </div>
                    @elseif ($user->role == 'seller')
                        @if (isset($info))
                            @foreach ($info as $data)
                            <div>
                                <a href="/RestInormations/{{$data->id}}" class="btn btn-success btn-lg btn-block mt-2 mb-2" style="margin-left: 450px ;height:50px; width:260px">تنظیمات اولیه رستوران</a>
                                <a href="/foods" class="btn btn-primary btn-lg btn-block mt-2 mb-2" style="margin-left: 450px ;height:50px; width:260px">مدیریت غذاها</a>
                            </div>
                            @endforeach

                        {{-- @else
                            <div>
                                <a href="/RestInormations/create" class="btn btn-primary btn-lg btn-block mt-2 mb-2" style="margin-left: 450px ;height:50px; width:260px">تکمیل مشخصات رستوران</a>
                            </div> --}}
                        @endif


                    @endif

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
