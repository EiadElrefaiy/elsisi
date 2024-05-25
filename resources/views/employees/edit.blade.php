@extends('layouts.app')

@section('content')

      <div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    @include('employees.form')


                        <button type="button" class="btn btn-primary m-2">
                            حفظ البيانات
                          </button>                
                        </div>      
                    </div>
              </div>
           </div>
        </div>
        
@endsection
