<form id="Form" class="form-horizontal">
                        <div class="card-body">
                            <h3 class="card-title"> بيانات الشحن</h3>
                            <div class="row">

                            @if(isset($data))
                            <input 
                                class="hide"
                                name="id" 
                                value="{{ $data->id }}"
                                id="id"
                                />
                            @endif

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label">مندوب التوصيل</label>
                                        <div class="col-md-9">
                                          <select
                                            id="representativesDropdown"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px">
                                            <option>اختر المندوب</option>
                                            @foreach ( Auth::guard('representative')->check() ? $withData->where('id' , Auth::guard('representative')->user()->id) : $withData as $item)
                                            <option value="{{ $item->id }}" {{ (isset($data) && $data->representative && $data->representative->name == $item->name) ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                            </select>
                                            <input class="hide" name="representative_id" type="text" value="{{ ( isset($data) && $data->representative) ? $data->representative_id : '' }}"/>
                                        </div>
                                      </div> 
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label">رقم العرض</label>
                                        <div class="col-md-9">
                                          <select
                                            id="offerDropdown"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px">
                                            <option>اختر العرض</option>
                                            @foreach ($withData2 as $item)
                                            <option value="{{ $item->id }}" {{ (isset($data) && $data->offer && $data->offer->offer_num == $item->offer_num && $data->offer) ? 'selected' : '' }}>{{ $item->offer_num }}</option>
                                            @endforeach
                                            </select>
                                            <input class="hide" name="offer_id" type="text" value="{{ isset($data) ? $data->offer_id : '' }}"/>
                                        </div>
                                      </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                        for="lname"
                                        class="col-sm-3 text-end control-label col-form-label">تاريح التسليم</label>
                                        <div class="input-group" dir="rtl">
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
                                  <div class="col-md-2">

                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label"
                                            >مصاريف الشحن</label>
                                        <div class="col-sm-9">
                                            <input
                                            name="price"
                                            value="{{ isset($data) ? $data->price : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="مصاريف الشحن"
                                            />
                                        </div>
                                      </div>
                                    </div>

                                  <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label"
                                            >خط السير</label>
                                        <div class="col-sm-9">
                                            <input
                                            name="line"
                                            value="{{ isset($data) ? $data->line : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="خط السير"
                                            />
                                        </div>
                                      </div>
                                    </div>
  
                            </div>
                        </form>
