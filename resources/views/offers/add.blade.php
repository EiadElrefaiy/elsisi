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
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">اسم العرض</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" class="form-control" id="lname" placeholder="اسم العرض"/>
                                        </div>
                                    </div>
                                </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-end control-label col-form-label">اسم العميل</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="client_name" placeholder="اسم العميل" value="{{ isset($data) ? $data->name : '' }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 text-end control-label col-form-label">رقم التليفون</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" placeholder="رقم التليفون" value="{{ isset($data) ? $data->phone : '' }}" />
                                </div>
                            </div>
                          </div>
                       
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="state" class="col-sm-3 text-end control-label col-form-label">المحافظة</label>
                                <div class="col-md-9">
                                    <select id="state" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                        <option value="القاهرة" {{ isset($data) && $data->state == 'القاهرة' ? 'selected' : '' }}>القاهرة</option>
                                        <option value="الإسكندرية" {{ isset($data) && $data->state == 'الإسكندرية' ? 'selected' : '' }}>الإسكندرية</option>
                                        <option value="البحيرة" {{ isset($data) && $data->state == 'البحيرة' ? 'selected' : '' }}>البحيرة</option>
                                        <option value="الفيوم" {{ isset($data) && $data->state == 'الفيوم' ? 'selected' : '' }}>الفيوم</option>
                                        <option value="الغربية" {{ isset($data) && $data->state == 'الغربية' ? 'selected' : '' }}>الغربية</option>
                                        <option value="الإسماعيلية" {{ isset($data) && $data->state == 'الإسماعيلية' ? 'selected' : '' }}>الإسماعيلية</option>
                                        <option value="المنوفية" {{ isset($data) && $data->state == 'المنوفية' ? 'selected' : '' }}>المنوفية</option>
                                        <option value="المنيا" {{ isset($data) && $data->state == 'المنيا' ? 'selected' : '' }}>المنيا</option>
                                        <option value="القليوبية" {{ isset($data) && $data->state == 'القليوبية' ? 'selected' : '' }}>القليوبية</option>
                                        <option value="الوادي الجديد" {{ isset($data) && $data->state == 'الوادي الجديد' ? 'selected' : '' }}>الوادي الجديد</option>
                                        <option value="أسوان" {{ isset($data) && $data->state == 'أسوان' ? 'selected' : '' }}>أسوان</option>
                                        <option value="أسيوط" {{ isset($data) && $data->state == 'أسيوط' ? 'selected' : '' }}>أسيوط</option>
                                        <option value="بني سويف" {{ isset($data) && $data->state == 'بني سويف' ? 'selected' : '' }}>بني سويف</option>
                                        <option value="بورسعيد" {{ isset($data) && $data->state == 'بورسعيد' ? 'selected' : '' }}>بورسعيد</option>
                                        <option value="جنوب سيناء" {{ isset($data) && $data->state == 'جنوب سيناء' ? 'selected' : '' }}>جنوب سيناء</option>
                                        <option value="دمياط" {{ isset($data) && $data->state == 'دمياط' ? 'selected' : '' }}>دمياط</option>
                                        <option value="السويس" {{ isset($data) && $data->state == 'السويس' ? 'selected' : '' }}>السويس</option>
                                        <option value="الشرقية" {{ isset($data) && $data->state == 'الشرقية' ? 'selected' : '' }}>الشرقية</option>
                                        <option value="شمال سيناء" {{ isset($data) && $data->state == 'شمال سيناء' ? 'selected' : '' }}>شمال سيناء</option>
                                        <option value="سوهاج" {{ isset($data) && $data->state == 'سوهاج' ? 'selected' : '' }}>سوهاج</option>
                                        <option value="قنا" {{ isset($data) && $data->state == 'قنا' ? 'selected' : '' }}>قنا</option>
                                        <option value="كفر الشيخ" {{ isset($data) && $data->state == 'كفر الشيخ' ? 'selected' : '' }}>كفر الشيخ</option>
                                        <option value="مطروح" {{ isset($data) && $data->state == 'مطروح' ? 'selected' : '' }}>مطروح</option>
                                        <option value="الأقصر" {{ isset($data) && $data->state == 'الأقصر' ? 'selected' : '' }}>الأقصر</option>
                                        <option value="البحر الأحمر" {{ isset($data) && $data->state == 'البحر الأحمر' ? 'selected' : '' }}>البحر الأحمر</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 text-end control-label col-form-label">العنوان</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" placeholder="العنوان" value="{{ isset($data) ? $data->address : '' }}" />
                                </div>
                            </div>
                        </div>

                        <input class="hide" id="client_id" name="client_id" type="text" value="0"/>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">التاريخ</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input value="{{ date('m/d/Y') }}" name="created_at" type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy"/>
                                                <div class="input-group-append">
                                                    <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">ملاحظات</label>
                                        <div class="col-sm-9">
                                            <input name="notes" type="text" class="form-control" id="lname" placeholder="ملاحظات"/>
                                        </div>
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
                            </div>
                            <div class="form-group row">
                                @foreach ($withData2 as $index => $item)
                                    <div class="col-md-4 col-6">
                                        <input type="checkbox" id="checkbox{{ $index }}" name="checkbox{{ $index }}" value="{{ $item['name'] }}" data-price="{{ $item['price'] }}" data-name="{{ $item['name'] }}" data-id="{{ $item['id'] }}">
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
                                                        <th scope="col">ملاحظة يدوية</th>
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
                             <div class="row"></div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">سعر الطلب</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="total_form" name="total_form" placeholder="سعر الطلب"/>
                                        </div>
                                    </div>                   
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-end control-label col-form-label">المدفوع</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="payed_form" name="payed_form" placeholder="المدفوع"/>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="errorMessages" class="alert alert-danger hide"></div>
            <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="offers" data-view="offers.index">
                حفظ البيانات
            </button>
        </div>
    </div>
</div>


@include('modals.successAdd')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('js.create')

<script>
    $(document).ready(function() {
        // Attach change event listener for checkboxes
        $('input[type="checkbox"]').on('change', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const price = parseFloat($(this).data('price'));

            if ($(this).is(':checked')) {
                addItemToTable(name, 0, id);
            } else {
                removeItemFromTable(name);
            }
        });

        // Check all checkboxes and trigger change event on page load
        $('input[type="checkbox"]').each(function() {
            $(this).prop('checked', true).trigger('change');
        });

        $('#payed_form').on('input', function() {
            $('#payed').val($(this).val());
        });

        $('#total_form').on('input', function() {
            $('#total').val($(this).val());
        });

        function addItemToTable(label, price, id) {
            const table = $('#offerTable tbody');
            const row = $('<tr>').attr('data-label', label);
            if(id == 12 || id == 9 || id == 7){
                row.html(`
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
                <td> <input style="width:50%" type="text" class="form-control note" name="notes" placeholder="ملاحظة يدوية"/></td>
            `);
            }else{
                row.html(`
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
                <td> <input style="width:50%;visibility:hidden;" type="text" class="form-control note" name="notes" placeholder="ملاحظة يدوية"/></td>
            `);
            }
            table.append(row);
        }

        function removeItemFromTable(label) {
            const table = $('#offerTable tbody');
            const row = table.find(`tr[data-label="${label}"]`);
            if (row.length) {
                row.remove();
            }
        }

        window.increment = function(button) {
            const row = $(button).closest('tr');
            const quantityElement = row.find('.quantity');
            let quantity = parseInt(quantityElement.text());
            quantity++;
            quantityElement.text(quantity);
            updateRowTotal(row);
        };

        window.decrement = function(button) {
            const row = $(button).closest('tr');
            const quantityElement = row.find('.quantity');
            let quantity = parseInt(quantityElement.text());
            if (quantity > 1) {
                quantity--;
                quantityElement.text(quantity);
                updateRowTotal(row);
            }
        };

    });
</script>

@endsection
