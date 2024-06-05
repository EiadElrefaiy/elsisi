@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <div class="row">
                <div class="col-sm-4" dir="rtl">
                    <img src="../assets/images/logo-text.png" width="300">
                </div>
                <div class="col-sm-4 text-center">
                    <h3 class="ms-auto mt-5">رقم العرض : {{ $data->offer_num }}</h3>
                </div>
                <div class="col-sm-4" dir="ltr">
                    <img style="margin-top: 30px;" src="../assets/images/sisi2.png" width="200">
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
                            <h3>الاسم : {{ $data->client->name }}</h3>
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
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <img src="../assets/images/offer.jpg" width="150" style="border-radius: 15px;">
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <h3>اسم العرض : {{ $data->name }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right text-end">
                        <address>
                            <h3>التليفون : {{ $data->client->phone }}</h3>
                        </address>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="row">
                        @foreach($data->items as $item)
                            <div class="col-sm-6">
                                <h4>{{$item->quantity}} {{ $item->product->name }}</h4>
                            </div>
                        @endforeach
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
                            لم يتم الشحن  
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 mt-4" style="margin: auto;">
                    <div class="row" style="border: 1px solid black; font-size: 20px; font-weight: bold; padding: 0px 20px;">
                        <div class="col-sm-2">
                            الاجمالي
                        </div>
                        <div class="col-sm-2" style="border-left: 1px solid black;">
                            {{ $data->total }} ج
                        </div>
                        <div class="col-sm-2">
                            خالص
                        </div>
                        <div class="col-sm-2" style="border-left: 1px solid black;">
                            {{ $data->payed }} ج
                        </div>
                        <div class="col-sm-2">
                            متبقي
                        </div>
                        <div class="col-sm-2">
                            {{ $data->total - $data->payed }} ج
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
