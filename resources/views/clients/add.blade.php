@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    @include('clients.form')

                </div>      
               </div>
              </div>
           </div>
           <button type="button" class="btn btn-primary m-2">
            حفظ البيانات
        </button>
</div>

@endsection
