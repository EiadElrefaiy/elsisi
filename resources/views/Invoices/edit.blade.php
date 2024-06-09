@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <form id="Form" class="form-horizontal">

                      <input value="{{$data->total}}" class="hide" id="total" name="total" type="text" value="0"/>
                      <input value="{{$data->payed}}" class="hide" id="payed" name="payed" type="text" value="0"/>

                        <div class="card-body">
                            <h3 class="card-title"> المورد</h3>
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group row">

                                    @if(isset($data))
                                    <input 
                                        class="hide"
                                        name="id" 
                                        value="{{ $data->id }}"
                                        id="id"
                                      />
                                    @endif

                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">المورد</label>
                                        <div class="col-md-9">
                                          <select
                                            id="supplierSelect"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px">
                                            <option value="">اختر المورد</option>
                                            @foreach ($withData as $item)
                                                <option value="{{ $item->id }}" {{ (isset($data) && $data->supplier->name == $item->name) ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                          </select>
                                          <input class="hide" id="supplier_id" name="supplier_id" type="text" value="{{ $data->supplier_id }}"/>
                                        </div>
                                      </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                        for="lname"
                                        class="col-sm-3 text-end control-label col-form-label">التاريخ</label>
                                        <div class="col-md-9">
                                        <div class="input-group">
                                          
                                        <input
                                          name="created_at"
                                          value="{{ isset($data) ? \Carbon\Carbon::parse($data->created_at)->format('m/d/Y') : date('m/d/Y') }}"
                                          type="text"
                                          class="form-control mydatepicker"
                                          placeholder="mm/dd/yyyy"
                                        />

                                          <div class="input-group-append">
                                            <span class="input-group-text h-100"
                                              ><i class="mdi mdi-calendar"></i></span>
                                           </div>
                                         </div>
                                      </div>
                                    </div> 
                                </div>
                           
                               <div class="col-md-4">
                                <div class="form-group row">
                                    <label
                                        for="lname"
                                        class="col-sm-3 text-end control-label col-form-label">حالة العرض</label>
                                    <div class="col-md-9">
                                      <select
                                        id="stateSelect"
                                        class="select2 form-select shadow-none"
                                        style="width: 100%; height: 36px">
                                        <option value="0" {{ (isset($data) && $data->state == 0) ? 'selected' : '' }}>متبقي له</option>
                                        <option value="2" {{ (isset($data) && $data->state == 2) ? 'selected' : '' }}>خالص</option>
                                      </select>
                                      <input class="hide" id="state" name="state" type="text" value="{{ $data->state }}"/>
                                    </div>
                                  </div> 
                            </div>

                            <div class="col-md-6">
                                <span style="padding: 5px 15px; font-size: 18px;" class="badge {{ $data->state == 0 ? 'bg-warning' : ($data->state == 1 ? 'bg-success' : '' )}}">
                                    {{ $data->state == 0 ? 'متبقي له' : ($data->state == 1 ? 'خالص' : '') }}
                              </span>
                           </div>

                              </div>
                        </form>
                        </div>      
                    </div>

                            
                    </div>

                    <div class="col-md-6">
                      <div class="card">
                        <form class="form-horizontal">
                              <div class="card-body">
                                <div class="row">
                                  <h3 class="card-title mb-2">صورة الفاتورة</h3>
                                  <div class="col-md-12 text-center">
                                    <a href="{{ isset($data) && isset($data->image) ? Storage::url('public/' . $data->image) : URL::asset('/assets/images/bill.png') }}" style="position: relative; right: 30px;"><img id="InvoiceImage" width="200" height="200" src="{{ isset($data) && isset($data->image) ? Storage::url('public/' . $data->image) : URL::asset('/assets/images/bill.png') }}"></a>
                                   
                                    <span style="position: relative; top: 95px; left:170px;" class="text-center">
                                      <a href="#">
                                          <span id="uploadButton" style="padding: 5px 10px; background-color: #6352ca; border-radius: 150px;" class="mdi mdi-grease-pencil font-24 text-white"></span>
                                      </a>    
                                      <input type="file" id="fileInput" style="display: none;">
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                         </form>
                       </div>

                       <div class="col-md-6">
                      <div class="card">
                        <form class="form-horizontal">
                          <div class="card-body">
                                <div class="row mb-2">
                                  <div class="col-sm-8">
                                    <h3 class="card-title mb-2">اصناف المخزن</h3>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="input-group">
                                      <div class="input-group-append">
                                        <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"
                                          ><i class=" fas fa-search"></i></span>
                                      </div>
                                      <input
                                        type="text"
                                        class="form-control"
                                        placeholder="بحث"
                                        aria-label="Recipient 's username"
                                        aria-describedby="basic-addon2"
                                      />
                                    </div>    
                    
                                  </div>
                                </div>

                                <div class="form-group row">
                                  @foreach ($withData2 as $index => $item)
                                    <div class="col-md-4 col-6">
                                      <input 
                                        type="checkbox" 
                                        id="checkbox{{ $index }}" 
                                        name="items[]" 
                                        value="{{ $item['id'] }}" 
                                        data-price="{{ $item['price'] }}" 
                                        data-name="{{ $item['name'] }}" 
                                        data-id="{{ $item['id'] }}"
                                        @if(isset($data) && $data->items->pluck('product_id')->contains($item['id'])) 
                                          checked 
                                        @endif
                                      >
                                      <label for="checkbox{{ $index }}">{{ $item['name'] }}</label>
                                    </div>
                                  @endforeach
                                </div>

                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="col-12-md">
                      <div class="card">
                          <form class="form-horizontal">
                              <div class="card-body">
                                  <h3 class="card-title">اصناف الفاتورة</h3>
                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <div class="card">
                                              <div class="table-responsive">
                                                  <table class="table" id="invoiceTable">
                                                      <thead class="thead-light">
                                                          <tr>
                                                              <th scope="col">الصنف</th>
                                                              <th scope="col"></th>
                                                              <th scope="col">العدد</th>
                                                              <th scope="col"></th>
                                                              <th scope="col">السعر</th>
                                                              <th scope="col">الاجمالي</th>
                                                              <th scope="col"></th>
                                                          </tr>
                                                      </thead>

                                                      <tbody class="customtable">
                                                      @foreach ($data->items as $item)
                                                        <tr data-label="{{ $item->product->name }}">
                                                            <td class="hide id">{{ $item->product_id }}</td>
                                                            <td class="label_name">{{ $item->invoice->name }}</td>
                                                            <td class="button-cell">
                                                                <button type="button" class="quantity-button" onclick="increment(this)">+</button>
                                                            </td>
                                                            <td>
                                                                <span class="quantity">{{ $item->quantity }}</span>
                                                            </td>
                                                            <td class="button-cell">
                                                                <button type="button" class="quantity-button" onclick="decrement(this)">-</button>
                                                            </td>
                                                            <td class="price">{{ $item->price }}</td>
                                                            <td class="total">{{ $item->price * $item->quantity }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                    <tr id="data_base_total">
                                                    <td colspan="5">اجمالي الفاتورة</td>
                                                    <td>{{$data->total}}</td>
                                                    <td></td>
                                                    </tr>
                                                        <!-- Additional rows will be added here dynamically -->
                                                    </tbody>

                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
              </div>

              <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal">
                               <div class="card-body">
                           <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                              <label
                                  for="lname"
                                  class="col-sm-3 text-end control-label col-form-label">المدفوع</label>
                              <div class="col-sm-9">
                                  <input
                                  type="text"
                                  class="form-control"
                                  id="payed_form"
                                  name="payed_form"
                                  placeholder="المدفوع"
                                  value="{{$data->payed}}"
                                  />
                              </div>
                          </div>                   
                        </div>
                       </div>
                      </div>
                      </form>
                      </div>
                    </div>
              
           </div>
           <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="invoices">
            حفظ البيانات
          </button>


          @include('modals.successEdit')

          <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

          @include('js.edit')

          <script>
          $(document).ready(function() {

            $('#supplierSelect').on('change', function() {
                  var selectedSupplierId = $(this).val();
                  $('#supplier_id').val(selectedSupplierId);
                  console.log('Supplier ID set to:', selectedSupplierId);
              });

              $('#stateSelect').on('change', function() {
                  var selectedState = $(this).val();
                  $('#state').val(selectedState);
                  console.log('State set to:', selectedState);
              });

            // Toggle the datepicker when clicking the calendar icon
            $('.input-group-append .input-group-text').on('click', function() {
                $(this).closest('.input-group').find('.mydatepicker').datepicker('show');
            });

          });
      </script>

           <script>
                $(document).ready(function() {
                    $('#payed_form').on('input', function() {
                        $('#payed').val($(this).val());
                    });
                });
            </script>

        <script>
          document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
              checkbox.addEventListener('change', function () {
                  const id = this.getAttribute('data-id');
                  const name = this.getAttribute('data-name');
                  const price = parseFloat(this.getAttribute('data-price'));

                  if (this.checked) {
                      addItemToTable(name, price , id);
                  } else {
                      removeItemFromTable(name);
                  }
                  updateTotal();
              });
          });

          function addItemToTable(label, price , id) {
              const table = document.querySelector('#invoiceTable tbody');
              const row = document.createElement('tr');
              row.setAttribute('data-label', label);
              row.innerHTML = `
                  <td class="hide id">${id}</td>
                  <td class="label_name">${label}</td>
                  <td class="button-cell">
                      <button type="button" class="quantity-button" onclick="increment(this)">+</button>
                  </td>
                  <td>
                      <span class="quantity">1</span>
                  </td>
                  <td class="button-cell">
                      <button type="button" class="quantity-button" onclick="decrement(this)">-</button>
                  </td>
                  <td class="price">${price}</td>
                  <td class="total">${price}</td>
                  
                  <td></td>
              `;
              table.appendChild(row);
          }

          function removeItemFromTable(label) {
              const table = document.querySelector('#invoiceTable tbody');
              const row = table.querySelector(`tr[data-label="${label}"]`);
              if (row) {
                  table.removeChild(row);
              }
          }

          function increment(button) {
              const row = button.closest('tr');
              const quantityElement = row.querySelector('.quantity');
              let quantity = parseInt(quantityElement.textContent);
              quantity++;
              quantityElement.textContent = quantity;
              updateRowTotal(row);
              updateTotal();
          }

          function decrement(button) {
              const row = button.closest('tr');
              const quantityElement = row.querySelector('.quantity');
              let quantity = parseInt(quantityElement.textContent);
              if (quantity > 1) {
                  quantity--;
                  quantityElement.textContent = quantity;
                  updateRowTotal(row);
                  updateTotal();
              }
          }

          function updateRowTotal(row) {
              const quantity = parseInt(row.querySelector('.quantity').textContent);
              const price = parseFloat(row.querySelector('.price').textContent);
              const total = quantity * price;
              row.querySelector('.total').textContent = total;
          }

          function updateTotal() {
              const table = document.querySelector('#invoiceTable tbody');
              let total = 0;
              table.querySelectorAll('.total').forEach(totalCell => {
                  total += parseFloat(totalCell.textContent);
              });
              $("#data_base_total").hide();
              const totalRow = document.createElement('tr');
              totalRow.innerHTML = `
                  <td colspan="5">اجمالي الفاتورة</td>
                  <td>${total}</td>
                  <td></td>
              `;
              document.getElementById("total").value = total;
              const existingTotalRow = table.querySelector('tr.total-row');
              if (existingTotalRow) {
                  table.removeChild(existingTotalRow);
              }
              totalRow.classList.add('total-row');
              table.appendChild(totalRow);
          }
      </script>

@endsection
