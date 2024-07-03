@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <div class="row">
                <div class="col-sm-4" dir="rtl">
                  <img src="{{ asset('assets/images/logo-text.png') }}" width="300">
                </div>
                <div class="col-sm-4 text-center">
                    <h3 class="ms-auto mt-5">رقم العرض : {{ $data->offer_num }}</h3>
                </div>
                <div class="col-sm-4" dir="ltr">
                  <img style="margin-top: 30px;" src="{{ asset('assets/images/sisi2.png') }}" width="200">
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <h3>رقم عرض : {{ $data->offer_num }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <h3>اليوم : {{ \Carbon\Carbon::parse($data->created_at)->locale('ar')->translatedFormat('l') }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <h3>التاريخ : {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="pull-right text-end">
                        <address>
                            <h3>اسم العميل : {{ $data->client->name }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="pull-right text-end">
                        <address>
                            <h3>العنوان : {{ $data->client->address }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="pull-right text-end">
                        <address>
                            <h3>التليفون : {{ $data->client->phone }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <h3>عرض : {{ $data->name }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <img src="{{ asset('assets/images/offer.jpg') }}" width="150" style="border-radius: 15px;">
                        </address>
                    </div>
                </div>
                <div class="col-12 mt-4 container-fluid" >
                    <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-11">
                    <div class="row">
                        @foreach($data->items as $item)
                            <div class="col-sm-6">
                                @if($item->product->name == 'صرف حوض وش 1.5 بوصة Red Sea')
                                <h2 style="font-size:25px;"><span style="font-size:30px;">{{$item->quantity}}</span> {{ $item->product->name }}</h2>
                                @else
                                <h2>{{$item->quantity}} {{ $item->product->name }} {{$item->notes}}</h2>
                                @endif
                            </div>
                        @endforeach
                        @php
                            $totalReturns = 0;
                        @endphp
                    </div>

                    </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-4">
                    <h3>ملحوظة : {{ $data->notes ? $data->notes: '_________________________________________________________'}}</h3>
                </div>
                <div class="col-sm-12 mt-4" style="border: 1px solid black; font-size: 20px; font-weight: bold; padding: 0px 20px;">
                    <div class="row">
                        <div class="col-sm-3">
                            سعر العرض
                        </div>
                        <div class="col-sm-3" style="border-left: 1px solid black;">                           
                           {{ $data->total }} ج
                        </div>
                        <div class="col-sm-3">
                            مصاريف الشحن
                        </div>
                        <div class="col-sm-3">
                            {{ $data->deliveries->where("offer_id" , $data->id)->sum('price') }}  
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 mt-4" style="margin: auto;">
                    <div class="row" style="border: 1px solid black; font-size: 20px; font-weight: bold; padding: 0px 20px;">
                        <div class="col-sm-2">
                            الاجمالي
                        </div>
                        <div class="col-sm-2" style="border-left: 1px solid black;">
                            {{ ($data->total - $data->payed) + ($data->deliveries->where("offer_id" , $data->id)->sum('price'))}} ج
                        </div>
                        <div class="col-sm-2">
                            خالص
                        </div>
                        <div class="col-sm-2" style="border-left: 1px solid black;">
                            {{ ($data->total - $data->payed) + ($data->deliveries->where("offer_id" , $data->id)->sum('price')) }} ج
                        </div>
                        <div class="col-sm-2">
                            متبقي
                        </div>
                        <div class="col-sm-2" >
                            {{ $data->payed }} ج
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-5 text-center">
                    <h3 style="line-height: 1.8;">استلمت انا / _________________________  العرض الموضح اعلاه خالي من العيوب كما هو متفق عليه مع الشركة وان الشركة غير مسئولة عن البضاعة الكسر بعد الاستلام</h3>
                </div>
                <div class="col-sm-12">
                    <div class="pull-right mt-4 text-end">
                        <hr />
                        <div class="row">
                            <div class="col-sm-4">
                                <h2>شارع المعاهدة - طنطا - الغربية</h2>
                            </div>
                            <div class="col-sm-4">
                                <h2>0100300762</h2>
                            </div>
                            <div class="col-sm-4">
                                <h2>01100930858</h2>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

