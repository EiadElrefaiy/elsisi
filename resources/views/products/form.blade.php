              <form class="form-horizontal" id="Form">
                        <div class="card-body">
                            <h3 class="card-title"> بيانات المنتج</h3>
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
                                            name = "name"
                                            value="{{ isset($data)? $data->name : '' }}"
                                            type="text"
                                            class="form-control"
                                            id="fname"
                                            placeholder="الاسم"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group row">
                                    <label
                                        for="lname"
                                        class="col-sm-3 text-end control-label col-form-label"
                                        >السعر</label>
                                    <div class="col-sm-9">
                                        <input
                                        name = "price"
                                        value="{{ isset($data)? $data->price : '' }}"
                                        type="text"
                                        class="form-control"
                                        id="lname"
                                        placeholder="السعر"
                                        />
                                    </div>
                                   </div>
                                 </div>
                                 <div class="col-md-4">
                                  <div class="form-group row">
                                    <label
                                        for="lname"
                                        class="col-sm-3 text-end control-label col-form-label"
                                        >الكمية</label>
                                        <div class="col-sm-9">
                                        <input
                                        name = "quantity"
                                        value="{{ isset($data)? $data->quantity : '' }}"
                                        type="text"
                                        class="form-control"
                                        id="lname"
                                        placeholder="الكمية"
                                        />
                                    </div>
                                   </div>
                                 </div>

                            </div>
                        </form>
