@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    @include('clients.form')

                    <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="clients">
                      حفظ البيانات
                  </button>

                </div>      
               </div>
              </div>
           </div>


           <div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title m-2">عروض العميل</h3>
                        </div>
                        <div class="col-6">
                            <div class="col-12 mb-2" dir="ltr">
                                <a href="{{ route('add', ['view' => 'offers.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                                    اضافة عرض &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">رقم العرض</th>
                    <th scope="col">اسم العميل</th>
                    <th scope="col">رقم التليفون</th>
                    <th scope="col">المحافظة</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">الملاحظات</th>
                    <th scope="col">تاريخ العرض</th>
                    <th scope="col">الحالة</th>
                    <th scope="col">حالة الدفع</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="customtable">
                    @foreach ($data->offers as $item)
                    <tr id="dataRow_{{ $item['id'] }}">
                        <td>{{ $item->offer_num}}</td>
                        <td>{{ $item->client->name }}</td>
                        <td>{{ $item->client->phone }}</td>
                        <td>{{ $item->client->state}}</td>
                        <td>{{ $item->client->address }}</td>
                        <td>{{ $item->notes == null ? '................' : $item->notes}}</td>
                        <td class="date-cell">{{ $item->created_at->format('Y-m-d') }}</td>
                        <td >
                            <span class="badge {{ $item->state == 0 ? 'bg-warning' : ($item->state == 1 ? 'bg-success' : ($item->state == 2 ? 'bg-danger' : '')) }}">
                            {{ $item->state == 0 ? 'قيد الشحن' : ($item->state == 1 ? 'تم التسليم' : ($item->state == 2 ? 'رفض الاستلام' : '')) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $item->financial_state == 1 ? 'bg-success' : ($item->financial_state == 0 ? 'bg-warning' : ($item->financial_state == 2 ? 'bg-danger' : ($item->financial_state == 3 ? 'bg-warning' : '' ))) }}">
                            {{ $item->financial_state == 1 ? 'مدفوع' : ($item->financial_state == 0 ? 'عند الاستلام' : ($item->financial_state == 2 ? 'مرفوض' : ($item->financial_state == 3 ? 'متبقي' : '' ))) }}
                            </span>
                        </td>
                        <td>
                            <a style="color: #3e5569;" href="{{ route('offer_print', ['view' => 'offers.offer_print', 'table' => 'offers', 'id' => $item['id'] ]) }}">
                                <i class="mdi mdi-eye"></i>
                            </a>&nbsp;&nbsp; 
                            <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item['id'] }}', 'offers')">
                                <i class="mdi mdi-delete"></i>
                            </a> &nbsp;&nbsp; 
                            <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offers.edit', 'table' => 'offers' ,'id' => $item['id'] ]) }}">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 </div>

</div>


@include('modals.successEdit')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@include('js.edit')


@endsection
