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
                <div class="col-4 mt-2">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="بحث" aria-label="Recipient 's username" aria-describedby="basic-addon2" />
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">الكود</th>
                        <th scope="col">اسم العرض</th>
                        <th scope="col">الاجمالي</th>
                        <th scope="col">المدفوع</th>
                        <th scope="col">المتبقي</th>
                        <th scope="col">تاريخ العرض</th>
                        <th scope="col">تاريخ التسليم</th>
                        <th scope="col">الحالة</th>
                        <th scope="col">حالة الدفع</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="customtable">
                    @foreach ($data->offers as $offer)
                    <tr>
                        <td>{{ $offer->num }}</td>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->total }} ج</td>
                        <td>{{ $offer->payed }} ج</td>
                        <td>{{ $offer->total - $offer->payed }} ج</td>
                        <td>{{ $offer->created_at }}</td>
                        <td><span class="badge bg-warning">{{ $offer->status }}</span></td>
                        <td><span class="badge bg-success">{{ $offer->financial_state }}</span></td>
                        <td><a style="color: #3e5569;" href="{{ route('edit', ['view' => 'offers.edit']) }}"><i class="mdi mdi-eye"></i></a>&nbsp;&nbsp; <a style="color: #3e5569;" href="#"><i class="mdi mdi-delete"></i></a> &nbsp;&nbsp; <a style="color: #3e5569;" href="offer_info.html"><i class="mdi mdi-pencil"></i></a></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>الاجمالي</td>
                        <td>{{ $data->offers->sum('total') }} ج</td>
                        <td>المدفوع</td>
                        <td>{{ $data->offers->sum('payed') }} ج</td>
                        <td>المتبقي</td>
                        <td>{{ $data->offers->sum('total') - $data->offers->sum('payed') }} ج</td>
                    </tr>
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
