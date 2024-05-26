<form id="Form">   
    <div class="row" dir="ltr">

       <div class="col-md-6" dir="rtl">
        <div class="card">
            <h3 class="card-title m-3">صورة</h3>
                <div class="admin-picture" style="width: 200px; height: 200px;">
                    <div class="edit-admin-image">
                    <img id="adminImage" src="{{ isset($data) && isset($data->image) ? Storage::url('public/' . $data->image) : URL::asset('assets/images/businessman.png') }}" alt="Admin Picture">
                    </div>
                </div>
                <span style="position: relative; bottom: 45px; left:60px;" class="text-center">
                <a href="#">
                    <span id="uploadButton" style="padding: 5px 10px; background-color: #6352ca; border-radius: 50px;" class="mdi mdi-grease-pencil font-24 text-white"></span>
                </a>    
                <input type="file" id="fileInput" style="display: none;">
                </span>
            <p class="admin-role" style="color: #3e5569; font-size: 25px; position: relative; bottom: 25px;">المشرف</p>    
        <div class="card-body">
      </table>
       </div>
    </div>
  </div>






  <div class="col-md-6" dir="rtl">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal">
              <div class="card-body">
                  <h3 class="card-title"> بيانات المشرف</h3>
                  <div class="form-group row">
                 
                  @if(isset($data))
                  <input 
                      class="hide"
                      name="id" 
                      value="{{ $data->id }}"
                      id="id"
                    />
                  @endif

                  <label
                    for="fname"
                    class="col-sm-3 text-end control-label col-form-label"
                    >الاسم</label
                  >
                  <div class="col-sm-9">
                    <input 
                      name="name" 
                      value="{{ isset($data)? $data->name : '' }}"
                      type="text"
                      class="form-control"
                      id="name"
                      placeholder="اسم المستخدم"
                    />
                    <input 
                      name="position" 
                      value="{{ isset($data)? $data->position : 0 }}"
                      type="text"
                      class="form-control"
                      id="position"
                      style="display:none;"
                    />

                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="lname"
                    class="col-sm-3 text-end control-label col-form-label"
                    >رقم التليفون</label
                  >
                  <div class="col-sm-9">
                    <input
                      name="phone" 
                      value="{{ isset($data)? $data->phone : '' }}"
                      type="text"
                      class="form-control"
                      id="phone"
                      placeholder="رقم التليفون"
                    />
                  </div>
                </div>
              </form>
            </div>      
        </div>
      <div class="col-md-12">
            <div class="card">
                  <div class="card-body">     
                    <h3 class="card-title">كلمة السر</h3>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >كلمة السر</label
                      >
                      <div class="col-sm-9">
                        <input
                          name="password"
                          type="password"
                          class="form-control"
                          id="password"
                          placeholder="كلمة السر"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="lname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >تأكيد كلمة السر</label
                      >
                      <div class="col-sm-9">
                        <input
                          name="password_confirmation"
                          type="password"
                          class="form-control"
                          id="password_confirmation"
                          placeholder="تأكيد كلمة السر"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
           </div>    
        </div>
      </form>   
      
