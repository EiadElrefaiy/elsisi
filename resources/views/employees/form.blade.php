                <form id="Form" class="form-horizontal">
                        <div class="card-body">
                            <h3 class="card-title"> بيانات الموظف</h3>
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
                                            >الاسم</label>
                                        <div class="col-sm-9">
                                            <input
                                            name="name" 
                                            value="{{ isset($data)? $data->name : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="اسم المستخدم"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label">العنوان</label>
                                        <div class="col-sm-9">
                                            <input
                                            name="address"
                                            value="{{ isset($data) ? $data->address : '' }}"
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
                                            >الراتب</label>
                                        <div class="col-sm-9">
                                            <input
                                            name="salary" 
                                            value="{{ isset($data)? $data->salary : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="lname"
                                            placeholder="الراتب"
                                            />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label"
                                            >رقم التليفون</label>
                                        <div class="col-sm-9">
                                            <input
                                            name="phone" 
                                            value="{{ isset($data)? $data->phone : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="lname"
                                            placeholder="رقم التليفون"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
