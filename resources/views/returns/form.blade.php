                    <form id="Form" class="form-horizontal">
                        <div class="card-body">
                            <h3 class="card-title"> بيانات المرتجع</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label">العرض</label>
                                        <div class="col-md-9">
                                          <select
                                            id="offerDropdown"
                                            class="select2 form-select shadow-none"
                                            style="width: 100%; height: 36px">
                                            <option value="">رقم العرض</option>
                                                @foreach ($withData as $item)
                                                    <option value="{{ $item->id }}">{{ $item->offer_num }}</option>
                                                @endforeach
                                            </select>
                                            <input class="hide" name="offer_id" type="text" value=""/>
                                        </div>
                                      </div> 
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label for="productDropdown" class="col-sm-3 text-end control-label col-form-label">المنتج</label>
                                        <div class="col-md-9">
                                            <select id="productDropdown" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
                                                <option value="">المنتج</option>
                                            </select>
                                            <input class="hide" name="product_id" type="text" value=""/>
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label
                                            for="lname"
                                            class="col-sm-3 text-end control-label col-form-label">الكمية</label>
                                            <div class="col-sm-9">
                                            <input
                                            name="quantity"
                                            type="text"
                                            class="form-control"
                                            id="lname"
                                            placeholder="الكمية"
                                            />
                                        </div>
                                    </div>                   
                                  </div>

                                  <input class="hide" name="price" type="text" value=""/>

                            </div>
                        </form>
