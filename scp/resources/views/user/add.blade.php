@extends('template.default')

@section('page')
<div class="p-3">
  @if(Session::has('USER_MESSAGE'))
  <div class="alert alert-danger mb-4">
    {{ Session::get('USER_MESSAGE') }}
  </div>
  @endif

  <div class="row">
    <div class="col-12 mb-3">
      <h1> เพิ่มพนักงาน </h1>
    </div>

    <div class="col-12">
      
      <form method="POST">
        {{ csrf_field() }}
    
        <div class="row mb-3">
          <div class="col-md-3">
            <h3> ทั่วไป </h3>
          </div>
    
          <div class="col-md-9">
            <div class="form-group mb-3">
              <label for="name" class="form-label">ชื่อพนักงาน</label>
              <input name="name" class="form-control" type="text" value="{{ old('name') }}" placeholder="ชื่อพนักงาน">
            </div>
    
            <div class="form-group mb-3">
              <label for="email" class="form-label">อีเมล</label>
              <input name="email" class="form-control" type="text" value="{{ old('email') }}" placeholder="อีเมล">
            </div>
    
            <div class="form-group mb-3">
              <label for="phone" class="form-label">เบอร์โทร</label>
              <input name="phone" class="form-control" type="text" value="{{ old('phone') }}" placeholder="เบอร์โทร">
            </div>
    
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-3">
            <h3> ความปลอดภัย </h3>
          </div>
    
          <div class="col-md-9">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input name="username" class="form-control" type="text" placeholder="ชื่อผู้ใช้งาน">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input name="password" class="form-control" type="password" placeholder="รหัสผ่าน">
            </div>
          </div>
        </div>
    
        <div class="row mb-3">
          <div class="col-md-3">
            <h3> ที่อยู่ </h3>
          </div>
    
          <div class="col-md-9">
            <div class="mb-3">
              <label for="address_no" class="form-label">บ้านเลขที่</label>
              <input name="address_no" class="form-control" type="text" value="{{ old('address_no') }}" placeholder="บ้านเลขที่">
            </div>
            
            <div class="mb-3">
              <label for="address_group" class="form-label">หมู่ที่</label>
              <input name="address_group" class="form-control" type="text" value="{{ old('address_group') }}" placeholder="หมู่ที่">
            </div>
            
            <div class="mb-3">
              <label for="address_soi" class="form-label">ซอย</label>
              <input name="address_soi" class="form-control" type="text" value="{{ old('address_soi') }}" placeholder="ซอย">
            </div>
            
            <div class="mb-3">
              <label for="address_road" class="form-label">ถนน</label>
              <input name="address_road" class="form-control" type="text" value="{{ old('address_road') }}" placeholder="ถนน">
            </div>
            
            <div class="mb-3">
              <label for="address_district" class="form-label">ตำบล</label>
              <input name="address_district" class="form-control" type="text" value="{{ old('address_district') }}" placeholder="ตำบล">
            </div>
            
            <div class="mb-3">
              <label for="address_city" class="form-label">อำเภอ</label>
              <input name="address_city" class="form-control" type="text" value="{{ old('address_city') }}" placeholder="อำเภอ">
            </div>
            
            <div class="mb-3">
              <label for="address_province" class="form-label">จังหวัด</label>
              <input name="address_province" class="form-control" type="text" value="{{ old('address_province') }}" placeholder="จังหวัด">
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-3">
            <h3> อื่น ๆ </h3>
          </div>
    
          <div class="col-md-9">
            <div class="mb-3">
              <label for="status" class="form-label">สถานะ</label>
              <select name="status" class="form-control">
                <option value="1">เปิดใช้งาน</option>
                <option value="0">ระงับใช้งาน</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="is_admin" class="form-label">ผู้ดูแล</label>
              <select name="is_admin" class="form-control">
                <option value="1">ใช่</option>
                <option value="0" selected>ไม่ใช่</option>
              </select>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-9 offset-md-3">

            <div class="my-4">
              <button type="submit" class="btn btn-primary mr-2">
                บันทึก
              </button>
              <button type="button" class="btn text-primary">
                ยกเลิก
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>

  </div>
</div>
@endsection