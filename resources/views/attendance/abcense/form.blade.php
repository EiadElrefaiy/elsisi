              <form id="Form" class="form-horizontal">
                        <div class="card-body">
                            <h3 class="card-title"> الغياب</h3>
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
                                            class="col-sm-3 text-end control-label col-form-label">الموظف</label>
                                        <div class="col-md-9">
                                          <select
                                            id="employeeSelect"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px">
                                            <option>اختر الموظف</option>
                                            @foreach ($withData as $item)
                                                <option value="{{ $item->id }}" {{ (isset($data) && $data->employee->name == $item->name) ? 'selected' : '' }}> {{ $item->name }}</option>
                                            @endforeach
                                            </select>
                                            <input class="hide" name="employee_id" id="employee_id" type="text" value="{{  (isset($data) && $data->employee->id)  }}">
                                        </div>
                                      </div> 
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <div class="input-group" dir="rtl">
                                            <input
                                              value="{{ isset($data) ? \Carbon\Carbon::parse($data->created_at)->format('m/d/Y') : '' }}"
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

                                  <div class="col-md-4">
                                    <div class="form-group row">
                                      <label
                                          for="lname"
                                          class="col-sm-3 text-end control-label col-form-label">ملاحظات</label>
                                      <div class="col-sm-9">
                                          <input
                                          name="notes"
                                          value="{{ isset($data)? $data->notes : '' }}"
                                          type="text"
                                          class="form-control"
                                          id="lname"
                                          placeholder="ملاحظات"
                                          />
                                      </div>
                                  </div>                   
                                </div>

                                <input class="hide" name="operation" type="text" value="absence">
                            
                              </div>
                        </form>
