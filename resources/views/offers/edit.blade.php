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
                            <h3 class="card-title"> بيانات العميل</h3>
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
                                      for="lname"
                                      class="col-sm-3 text-end control-label col-form-label"
                                      >اسم العرض</label>
                                  <div class="col-sm-9">
                                      <input
                                      name="name"
                                      type="text"
                                      class="form-control"
                                      id="lname"
                                      placeholder="اسم العرض"
                                      value="{{ isset($data)? $data->name : '' }}"
                                      @if(Auth::guard('representative')->check()) readonly @endif
                                      />
                                  </div>
                              </div>
                               </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">العميل</label>
                                        <div class="col-md-9">
                                          <select
                                            id="clientSelect"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px"
                                            @if(Auth::guard('representative')->check()) disabled @endif>
                                            >
                                            
                                            <option value="">اختر العميل</option>
                                            @foreach ($withData as $item)
                                                <option value="{{ $item->id }}" {{ ($data->client && isset($data) && $data->client->name == $item->name) ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                          </select>
                                          <input class="hide" id="client_id" name="client_id" type="text" value="{{ $data->client_id }}"/>
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
                                          value="{{ isset($data) ? \Carbon\Carbon::parse($data->created_at)->format('m/d/Y') : '' }}"
                                          type="text"
                                          class="form-control mydatepicker"
                                          placeholder="mm/dd/yyyy"
                                          @if(Auth::guard('representative')->check()) readonly @endif
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
                                      class="col-sm-3 text-end control-label col-form-label"
                                      >ملاحظات</label>
                                  <div class="col-sm-9">
                                      <input
                                      name="notes"
                                      type="text"
                                      class="form-control"
                                      id="lname"
                                      placeholder="ملاحظات"
                                      value="{{ isset($data)? $data->notes : '' }}"
                                      @if(Auth::guard('representative')->check()) readonly @endif
                                      />
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
                                        <option value="0" {{ (isset($data) && $data->state == 0) ? 'selected' : '' }}>قيد الشحن</option>
                                        <option value="2" {{ (isset($data) && $data->state == 2) ? 'selected' : '' }}>رفض الاستلام</option>
                                        <option value="1" {{ (isset($data) && $data->state == 1) ? 'selected' : '' }}>تم التسليم</option>
                                      </select>
                                      <input class="hide" id="state" name="state" type="text" value="{{ $data->state }}"/>
                                    </div>
                                  </div> 
                            </div>

                              <div class="col-md-4">
                                <div class="form-group row">
                                    <label
                                        for="lname"
                                        class="col-sm-3 text-end control-label col-form-label">حالة الدفع</label>
                                    <div class="col-md-9">
                                      <select
                                        id="financialSateSelect"
                                        class="select2 form-select shadow-none"
                                        style="width: 100%; height: 36px">
                                        <option value="0" {{ (isset($data) && $data->financial_state == 0) ? 'selected' : '' }}>عند الاستلام</option>
                                        <option value="1" {{ (isset($data) && $data->financial_state == 1) ? 'selected' : '' }}>مدفوع</option>
                                        <option value="3" {{ (isset($data) && $data->financial_state == 3) ? 'selected' : '' }}>متبقي</option>
                                        <option value="2" {{ (isset($data) && $data->financial_state == 2) ? 'selected' : '' }}>ملغي</option>
                                      </select>
                                       <input class="hide" id="financial_state" name="financial_state" type="text" value="{{ $data->financial_state }}"/>
                                    </div>
                                  </div> 
                            </div>

                            <div class="col-md-6">
                              <span style="padding: 5px 15px; font-size: 18px;" class="badge {{ $data->state == 0 ? 'bg-warning' : ($data->state == 1 ? 'bg-success' : ($data->state == 2 ? 'bg-danger' : '')) }}">
                                    {{ $data->state == 0 ? 'قيد الشحن' : ($data->state == 1 ? 'تم التسليم' : ($data->state == 2 ? 'رفض الاستلام' : '')) }}
                              </span>
                            </div>

                            <div class="col-md-6" dir="ltr">
                              <span style="padding: 5px 15px; font-size: 18px;" class="badge {{ $data->financial_state == 1 ? 'bg-success' : ($data->financial_state == 0 ? 'bg-warning' : ($data->financial_state == 2 ? 'bg-danger' : ($data->financial_state == 3 ? 'bg-warning' : '' ))) }}">
                                  {{ $data->financial_state == 1 ? 'مدفوع' : ($data->financial_state == 0 ? 'عند الاستلام' : ($data->financial_state == 2 ? 'ملغي' : ($data->financial_state == 3 ? 'متبقي' : '' ))) }}
                              </span>
                            </div>


                            </div>
                        </form>
                        </div>      
                    </div>
                    <div class="col-12-md">
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
                                        class="offer"
                                        type="checkbox" 
                                        id="checkbox{{ $index }}" 
                                        name="items[]" 
                                        value="{{ $item['id'] }}" 
                                        data-price="{{ $item['price'] }}" 
                                        data-name="{{ $item['name'] }}" 
                                        data-id="{{ $item['id'] }}"
                                        @if(Auth::guard('representative')->check()) disabled @endif
                                        @if($data->items && isset($data) && $data->items->pluck('product_id')->contains($item['id'])) 
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
                                  <h3 class="card-title">اصناف العرض</h3>
                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <div class="card">
                                              <div class="table-responsive">
                                                  <table class="table" id="offerTable">
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
                                                            <td class="label_name">{{ $item->product->name }}</td>
                                                            <td class="button-cell">
                                                                <button type="button" class="quantity-button" onclick="increment(this)"
                                                                @if(Auth::guard('representative')->check()) disabled @endif
                                                                >+</button>
                                                            </td>
                                                            <td>
                                                                <span class="quantity">{{ $item->quantity }}</span>
                                                            </td>
                                                            <td class="button-cell">
                                                                <button type="button" class="quantity-button" onclick="decrement(this)"
                                                                @if(Auth::guard('representative')->check()) disabled @endif
                                                                >-</button>
                                                            </td>
                                                            <td class="price">{{ $item->price }}</td>
                                                            <td class="total">{{ $item->price * $item->quantity }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                    <tr id="data_base_total">
                                                    <td colspan="5">اجمالي العرض</td>
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
           </div>




                    <div class="col-12-md">
                      <div class="card">
                        <form class="form-horizontal">
                          <div class="card-body">
                                <div class="row mb-2">
                                  <div class="col-sm-8">
                                    <h3 class="card-title mb-2">المرتجعات</h3>
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
                                        class="return"
                                        type="checkbox" 
                                        id="return_checkbox{{ $index }}" 
                                        name="items[]" 
                                        value="{{ $item['id'] }}" 
                                        data-price="{{ $item['price'] }}" 
                                        data-name="{{ $item['name'] }}" 
                                        data-id="{{ $item['id'] }}"
                                        @if($data->returns && isset($data) && $data->returns->pluck('product_id')->contains($item['id'])) 
                                          checked 
                                        @endif
                                      >
                                      <label for="return_checkbox{{ $index }}">{{ $item['name'] }}</label>
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
                                  <h3 class="card-title">اصناف المرتجع</h3>
                                  <div class="form-group row">
                                      <div class="col-md-12">
                                          <div class="card">
                                              <div class="table-responsive">
                                                  <table class="table" id="offerReturnTable">
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
                                                      @foreach ($data->returns as $item)
                                                        <tr data-label="{{ $item->product->name }}">
                                                            <td class="hide id">{{ $item->product_id }}</td>
                                                            <td class="label_name">{{ $item->product->name }}</td>
                                                            <td class="button-cell">
                                                                <button type="button" class="quantity-button" onclick="incrementReturn(this)">+</button>
                                                            </td>
                                                            <td>
                                                                <span class="quantity">{{ $item->quantity }}</span>
                                                            </td>
                                                            <td class="button-cell">
                                                                <button type="button" class="quantity-button" onclick="decrementReturn(this)">-</button>
                                                            </td>
                                                            <td class="price">{{ $item->price }}</td>
                                                            <td class="total">{{ $item->price * $item->quantity }}</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                    <tr id="data_base_total_returns">
                                                    <td colspan="5">اجمالي المرتجعات</td>
                                                    <td>
                                                        {{ $data->returns->reduce(function ($carry, $return) {
                                                            return $carry + ($return->price * $return->quantity);
                                                        }, 0) }}
                                                    </td>
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

           <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="offers">
            حفظ البيانات
          </button>
        </div>

        @include('modals.successEdit')

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        @include('js.edit')

    <script>
        $(document).ready(function() {

          $('#clientSelect').on('change', function() {
                var selectedClientId = $(this).val();
                $('#client_id').val(selectedClientId);
                console.log('Client ID set to:', selectedClientId);
            });

            $('#stateSelect').on('change', function() {
                var selectedState = $(this).val();
                $('#state').val(selectedState);
                console.log('State set to:', selectedState);
            });

            $('#financialSateSelect').on('change', function() {
                var selectedFinancialSate = $(this).val();
                $('#financial_state').val(selectedFinancialSate);
                console.log('Financial State set to:', selectedFinancialSate);
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
          document.querySelectorAll('.offer').forEach(checkbox => {
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


          document.querySelectorAll('.return').forEach(checkbox => {
              checkbox.addEventListener('change', function () {
                  const id = this.getAttribute('data-id');
                  const name = this.getAttribute('data-name');
                  const price = parseFloat(this.getAttribute('data-price'));

                  if (this.checked) {
                      addItemToTableReturn(name, price , id);
                  } else {
                      removeItemFromTableReturn(name);
                  }
                  updateTotalReturn();
              });
          });

          function addItemToTable(label, price , id) {
              const table = document.querySelector('#offerTable tbody');
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

          function addItemToTableReturn(label, price , id) {
              const table = document.querySelector('#offerReturnTable tbody');
              const row = document.createElement('tr');
              row.setAttribute('data-label', label);
              row.innerHTML = `
                  <td class="hide id">${id}</td>
                  <td class="label_name">${label}</td>
                  <td class="button-cell">
                      <button type="button" class="quantity-button" onclick="incrementReturn(this)">+</button>
                  </td>
                  <td>
                      <span class="quantity">1</span>
                  </td>
                  <td class="button-cell">
                      <button type="button" class="quantity-button" onclick="decrementReturn(this)">-</button>
                  </td>
                  <td class="price">${price}</td>
                  <td class="total">${price}</td>
                  
                  <td></td>
              `;
              table.appendChild(row);
          }

          function removeItemFromTable(label) {
              const table = document.querySelector('#offerTable tbody');
              const row = table.querySelector(`tr[data-label="${label}"]`);
              if (row) {
                  table.removeChild(row);
              }
          }

          function removeItemFromTableReturn(label) {
              const table = document.querySelector('#offerReturnTable tbody');
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

          function incrementReturn(button) {
              const row = button.closest('tr');
              const quantityElement = row.querySelector('.quantity');
              let quantity = parseInt(quantityElement.textContent);
              quantity++;
              quantityElement.textContent = quantity;
              updateRowTotalReturn(row);
              updateTotalReturn();
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

          function decrementReturn(button) {
              const row = button.closest('tr');
              const quantityElement = row.querySelector('.quantity');
              let quantity = parseInt(quantityElement.textContent);
              if (quantity > 1) {
                  quantity--;
                  quantityElement.textContent = quantity;
                  updateRowTotalReturn(row);
                  updateTotalReturn();
              }
          }


          function updateRowTotal(row) {
              const quantity = parseInt(row.querySelector('.quantity').textContent);
              const price = parseFloat(row.querySelector('.price').textContent);
              const total = quantity * price;
              row.querySelector('.total').textContent = total;
          }


          function updateRowTotalReturn(row) {
              const quantity = parseInt(row.querySelector('.quantity').textContent);
              const price = parseFloat(row.querySelector('.price').textContent);
              const total = quantity * price;
              row.querySelector('.total').textContent = total;
          }

          function updateTotal() {
              const table = document.querySelector('#offerTable tbody');
              let total = 0;
              table.querySelectorAll('.total').forEach(totalCell => {
                  total += parseFloat(totalCell.textContent);
              });
              $("#data_base_total").hide();
              const totalRow = document.createElement('tr');
              totalRow.innerHTML = `
                  <td colspan="5">اجمالي العرض</td>
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

          function updateTotalReturn() {
              const table = document.querySelector('#offerReturnTable tbody');
              let total = 0;
              table.querySelectorAll('.total').forEach(totalCell => {
                  total += parseFloat(totalCell.textContent);
              });
              $("#data_base_total_returns").hide();
              const totalRow = document.createElement('tr');
              totalRow.innerHTML = `
                  <td colspan="5">اجمالي المرتجعات</td>
                  <td>${total}</td>
                  <td></td>
              `;
              //document.getElementById("total").value = total;
              const existingTotalRow = table.querySelector('tr.total-row');
              if (existingTotalRow) {
                  table.removeChild(existingTotalRow);
              }
              totalRow.classList.add('total-row');
              table.appendChild(totalRow);
          }
      </script>

        @endsection
