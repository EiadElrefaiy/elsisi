<form id="Form" class="form-horizontal">
    <div class="card-body">
        <h3 class="card-title">بيانات العميل</h3>
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
                    <label for="name" class="col-sm-3 text-end control-label col-form-label">الاسم</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="اسم المستخدم" value="{{ isset($data) ? $data->name : '' }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3 text-end control-label col-form-label">رقم التليفون</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم التليفون" value="{{ isset($data) ? $data->phone : '' }}" />
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="state" class="col-sm-3 text-end control-label col-form-label">المحافظة</label>
                    <div class="col-md-9">
                        <select id="state" name="state" class="select2 form-select shadow-none" style="width: 100%; height: 36px">
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
                <div class="form-group row">
                    <label for="address" class="col-sm-3 text-end control-label col-form-label">العنوان</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="address" name="address" placeholder="العنوان" value="{{ isset($data) ? $data->address : '' }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
