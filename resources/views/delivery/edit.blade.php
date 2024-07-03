@extends('layouts.app')

@section('content')

    <div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    @include('delivery.form')

                    <div id="errorMessages" class="alert alert-danger hide"></div>

                    <button type="button" id="submitFormButton" class="btn btn-primary m-2" data-table="delivery">
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

                $('#representativesDropdown').change(function() {
                // Fill hidden input with product_id
                $('input[name="representative_id"]').val($(this).val());
                });

                $('#offerDropdown').change(function() {
                // Fill hidden input with offer_id
                $('input[name="offer_id"]').val($(this).val());
                });
            });
        </script>


@endsection
