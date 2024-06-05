              <form  id="Form" class="form-horizontal">
                        <div class="card-body">
                        <h3 class="card-title"> بيانات الايراد</h3>
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
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label"
                                            >السعر</label>
                                        <div class="col-sm-9">
                                            <input
                                            name = "price"
                                            value="{{ isset($data)? $data->price : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="السعر"
                                            />
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
                                            >الوصف</label>
                                        <div class="col-sm-9">
                                            <input
                                            name = "description"
                                            value="{{ isset($data)? $data->description : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="الوصف"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                    <label
                                            for="fname"
                                            class="col-sm-3 text-end control-label col-form-label"
                                            >التاريخ</label>

                                        <div class="input-group" dir="rtl">
                                        <input
                                              name="created_at"
                                              value="{{ isset($data) ? \Carbon\Carbon::parse($data->created_at)->format('m/d/Y') : '' }}"
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

                                  <input class="hide" name="representative_id" value="{{ isset($data)? $data->representative_id : '0' }}" />
                                  <input class="hide" name="operation" value="revenue" />

                            </div>
                        </form>
