@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                     <form id="Form" class="form-horizontal">

                     <input class="hide" name="state" type="text" value="0"/>
                     <input class="hide" name="financial_state" type="text" value="0"/>
                     <input class="hide" name="represenative_id" type="text" value="0"/>
                     <input class="hide" name="offer_num" type="text" value="{{ rand(1000, 9999) }}"/>
                     <input class="hide" id="total" name="total" type="text" value="0"/>
                     <input class="hide" id="payed" name="payed" type="text" value="0"/>
                     
                     
                        <div class="card-body">
                            <h3 class="card-title"> بيانات العميل</h3>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group row">
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
                                      />
                                  </div>
                              </div>
                               </div>
                               
                              <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-end control-label col-form-label">العميل</label>
                                    <div class="col-md-9">
                                        <select id="clientSelect" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                            <option value="">اختر العميل</option>
                                            @foreach ($withData as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        <input class="hide" id="client_id" name="client_id" type="text" value="0"/>
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
                                            value = "{{date('m/d/Y')}}"
                                            name="created_at"
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
                                      class="col-sm-3 text-end control-label col-form-label"
                                      >ملاحظات</label>
                                  <div class="col-sm-9">
                                      <input
                                      name="notes"                                      
                                      type="text"
                                      class="form-control"
                                      id="lname"
                                      placeholder="ملاحظات"
                                      />
                                  </div>
                              </div>
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
                                      <input type="checkbox" id="checkbox{{ $index }}" name="checkbox{{ $index }}" value="{{ $item['name'] }}" data-price ="{{ $item['price'] }}" data-name ="{{ $item['name'] }}" data-id="{{ $item['id'] }}">
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
                                                          <!-- Items will be added here dynamically -->
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
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
                                  />
                              </div>
                          </div>                   
                        </div>
                       </div>
                      </div>
                      </form>
                      </div>
                    </div>


    <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="offers" data-view="offers.index">
    حفظ البيانات
    </button>

</div>


@include('modals.successAdd')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('js.create')

    <script>
        $(document).ready(function() {
            $('#clientSelect').on('change', function() {
                var selectedClientId = $(this).val();
                $('#client_id').val(selectedClientId);
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

          function removeItemFromTable(label) {
              const table = document.querySelector('#offerTable tbody');
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
              const table = document.querySelector('#offerTable tbody');
              let total = 0;
              table.querySelectorAll('.total').forEach(totalCell => {
                  total += parseFloat(totalCell.textContent);
              });
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
      </script>
@endsection
