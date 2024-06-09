@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">

 
                    @include('attendance.attendance.form')


                    <button type="button" id="submitFormButton" class="btn btn-primary m-2" data-table="attendance">
                            حفظ البيانات
                          </button>
                
                        </div>    
                          
                    </div>
              </div>
           </div>

        </div>
        
        @include('modals.successEdit')

       <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        @include('js.edit')

        <script>
        $(document).ready(function() {
            $('#employeeSelect').on('change', function() {
                var selectedEmployeetId = $(this).val();
                $('#employee_id').val(selectedEmployeetId);
            });
        });
    </script>

@endsection
