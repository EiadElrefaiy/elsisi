@extends('layouts.app')

@section('content')

       <div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">


                    @include('returns.form')

                    <div id="errorMessages" class="alert alert-danger hide"></div>

                    <button type="button" id="submitFormButton" class="btn btn-primary m-2" data-table="returns" data-view="returns.index">
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
              // Initialize Select2 for better styling (optional)
              $('.select2').select2();

              $('#offerDropdown').change(function() {
                  var selectedId = $(this).val();
                  $.ajax({
                      url: "{{ route('edit') }}",
                      type: 'GET',
                      data: {
                          id: selectedId,
                          view: "offers.edit",
                          table: "offers",
                          type: 1
                      },
                      success: function(response) {
                          // Populate productDropdown with the response items
                          console.log(response); // Debugging: log the response to the console
                          var dropdown = $('#productDropdown');
                          dropdown.empty(); // Clear existing options
                          dropdown.append('<option value="">المنتج</option>'); // Add default option

                          if (response.data && response.data.items && response.data.items.length > 0) {
                              $.each(response.data.items, function(index, item) {
                                dropdown.append('<option value="' + item.product_id + '" data-price="' + (item.product.price ? item.product.price : 0)  + '">' + item.product.name + '</option>');
                              });

                              // Fill hidden input with offer_id
                              $('input[name="offer_id"]').val(selectedId);
                          } else {
                              console.error('No items found in the response');
                          }
                      },
                      error: function(xhr) {
                          // Handle error here
                          console.error('Error:', xhr);
                      }
                  });
              });

              // Change event for productDropdown
              $('#productDropdown').change(function() {
              // Fill hidden input with product_id
              $('input[name="product_id"]').val($(this).val());
              
              // Retrieve the data-price attribute of the selected option and set it to the hidden input
              var price = $(this).find(':selected').attr('data-price');
              $('input[name="price"]').val(price);
          });

          });
    </script>

@endsection
