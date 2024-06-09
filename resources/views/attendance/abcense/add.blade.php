@extends('layouts.app')

@section('content')

       <div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">



                    @include('attendance.abcense.form')



                          <button type="button" id="submitFormButton" class="btn btn-primary m-2" data-table="attendance" data-view="attendance.index">
                            حفظ البيانات
                          </button>
                
                        </div>    
                          
                    </div>
              </div>
           </div>

        </div>

        @include('modals.successAdd')

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        @include('js.create')


        <script>
        $(document).ready(function() {
            $('#employeeSelect').on('change', function() {
                var selectedEmployeetId = $(this).val();
                $('#employee_id').val(selectedEmployeetId);
            });
        });
    </script>

@endsection
