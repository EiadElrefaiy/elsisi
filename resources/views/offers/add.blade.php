@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12" dir="rtl">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                     <form class="form-horizontal">
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
                                        <select id="clientSelect" name="client_id" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                            <option value="">اختر العميل</option>
                                            @foreach ($withData as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
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
                                      >رقم التليفون</label>
                                  <div class="col-sm-9">
                                      <input
                                      type="text"
                                      class="form-control"
                                      id="lname"
                                      placeholder="رقم التليفون"
                                      />
                                  </div>
                              </div>
                               </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                      <label
                                          for="lname"
                                          class="col-sm-3 text-end control-label col-form-label">محافظة</label>
                                      <div class="col-md-9">
                                        <select
                                          class="select2 form-select shadow-none"
                                          style="width: 100%; height: 36px">
                                        <option>القاهرة</option>
                                        <option>الإسكندرية</option>
                                        <option>البحيرة</option>
                                        <option>الفيوم</option>
                                        <option>الغربية</option>
                                        <option>الإسماعيلية</option>
                                        <option>المنوفية</option>
                                        <option>المنيا</option>
                                        <option>القليوبية</option>
                                        <option>الوادي الجديد</option>
                                        <option>أسوان</option>
                                        <option>أسيوط</option>
                                        <option>بني سويف</option>
                                        <option>بورسعيد</option>
                                        <option>جنوب سيناء</option>
                                        <option>دمياط</option>
                                        <option>السويس</option>
                                        <option>الشرقية</option>
                                        <option>شمال سيناء</option>
                                        <option>سوهاج</option>
                                        <option>قنا</option>
                                        <option>كفر الشيخ</option>
                                        <option>مطروح</option>
                                        <option>الأقصر</option>
                                        <option>البحر الأحمر</option>
                                        </select>
                                      </div>
                                    </div> 
                              </div>
                              <div class="col-md-4">
                                <div class="form-group row">
                                  <label
                                      for="lname"
                                      class="col-sm-3 text-end control-label col-form-label">العنوان</label>
                                  <div class="col-sm-9">
                                      <input
                                      type="text"
                                      class="form-control"
                                      id="lname"
                                      placeholder="العنوان"
                                      />
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
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox1" name="checkbox1">
                                      <label for="checkbox1">طقم حمام</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox2" name="checkbox2">
                                      <label for="checkbox2">طقم خلاط سوبر (3 قطع)</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox3" name="checkbox3">
                                      <label for="checkbox3">محبس زاوية شد نحاس</label>
                                  </div>
                                  <!-- Add more checkboxes as needed -->
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox1" name="checkbox1">
                                      <label for="checkbox1">طقم حمام</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox2" name="checkbox2">
                                      <label for="checkbox2">طقم خلاط سوبر (3 قطع)</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox3" name="checkbox3">
                                      <label for="checkbox3">محبس زاوية شد نحاس</label>
                                  </div>
                                  <!-- Add more checkboxes as needed -->
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox1" name="checkbox1">
                                      <label for="checkbox1">طقم حمام</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox2" name="checkbox2">
                                      <label for="checkbox2">طقم خلاط سوبر (3 قطع)</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox3" name="checkbox3">
                                      <label for="checkbox3">محبس زاوية شد نحاس</label>
                                  </div>
                                  <!-- Add more checkboxes as needed -->
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox1" name="checkbox1">
                                      <label for="checkbox1">طقم حمام</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox2" name="checkbox2">
                                      <label for="checkbox2">طقم خلاط سوبر (3 قطع)</label>
                                  </div>
                                  <div class="col-md-4 col-6">
                                      <input type="checkbox" id="checkbox3" name="checkbox3">
                                      <label for="checkbox3">محبس زاوية شد نحاس</label>
                                  </div>
                                  <!-- Add more checkboxes as needed -->
                              </div>

                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="col-12-md">
                      <div class="card">
                        <form class="form-horizontal">
                          <div class="card-body">
                              <h3 class="card-title"> اصناف العرض</h3>
                              <div class="form-group row">
                                <div class="col-md-12">
                                  <div class="card">
                                      <div class="table-responsive">
                                        <table class="table">
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
                                            <tr>
                                              <td>طقم خلاط سوبر (3 قطع)</td>
                                              <td class="button-cell">
                                                <button class="quantity-button" onclick="increment()">+</button>
                                              </td>
                                              <td>
                                                <span id="quantity">1</span>
                                              </td>
                                              <td class="button-cell">
                                                <button class="quantity-button" onclick="decrement()">-</button>
                                              </td>
                                              <td>800</td>
                                              <td>800</td>
                                            </tr>
                                            <tr>
                                              <td>طقم خلاط سوبر (3 قطع)</td>
                                              <td class="button-cell">
                                                <button class="quantity-button" onclick="increment()">+</button>
                                              </td>
                                              <td>
                                                <span id="quantity">1</span>
                                              </td>
                                              <td class="button-cell">
                                                <button class="quantity-button" onclick="decrement()">-</button>
                                              </td>
                                              <td>800</td>
                                              <td>800</td>
                                            </tr>
                                            <tr>
                                              <td colspan="5">اجمالي العرض</td>
                                              <td>1300</td>
                                            </tr>
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
           </div>
           <button type="button" class="btn btn-primary m-2">
            حفظ البيانات
          </button>

        </div>

        </div>
        @endsection
