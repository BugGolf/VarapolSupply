@extends('template.default')

@section('page')
<div class="p-3">
  <div class="mb-4">
    <h1 class="text-success"> ข้อมูลส่วนตัว </h1>
  </div>

  <form method="POST">
    {{ csrf_field() }}

    <div class="row mb-3">
      <div class="col-md-3">
        <h3> ทั่วไป </h3>
      </div>

      <div class="col-md-9">
        <div class="form-group mb-3">
          <label for="name" class="form-label">ชื่อของท่าน</label>
          <input name="name" class="form-control" type="text" value="{{ $user->name }}" placeholder="ชื่อของท่าน">
        </div>

        <div class="form-group mb-3">
          <label for="email" class="form-label">อีเมล</label>
          <input name="email" class="form-control" type="text" value="{{ $user->email }}" placeholder="อีเมลของท่าน">
        </div>

        <div class="form-group mb-3">
          <label for="phone" class="form-label">เบอร์โทร</label>
          <input name="phone" class="form-control" type="text" value="{{ $user->phone }}" placeholder="เบอร์โทร">
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
          <input name="address_no" class="form-control" type="text" value="{{ $user->address_no }}" placeholder="บ้านเลขที่">
        </div>
        
        <div class="mb-3">
          <label for="address_group" class="form-label">หมู่ที่</label>
          <input name="address_group" class="form-control" type="text" value="{{ $user->address_group }}" placeholder="หมู่ที่">
        </div>
        
        <div class="mb-3">
          <label for="address_soi" class="form-label">ซอย</label>
          <input name="address_soi" class="form-control" type="text" value="{{ $user->address_soi }}" placeholder="ซอย">
        </div>
        
        <div class="mb-3">
          <label for="address_road" class="form-label">ถนน</label>
          <input name="address_road" class="form-control" type="text" value="{{ $user->address_road }}" placeholder="ถนน">
        </div>
        
        <div class="mb-3">
          <label for="address_district" class="form-label">ตำบล</label>
          <input name="address_district" class="form-control" type="text" value="{{ $user->address_district }}" placeholder="ตำบล">
        </div>
        
        <div class="mb-3">
          <label for="address_city" class="form-label">อำเภอ</label>
          <input name="address_city" class="form-control" type="text" value="{{ $user->address_city }}" placeholder="อำเภอ">
        </div>
        
        <div class="mb-3">
          <label for="address_province" class="form-label">จังหวัด</label>
          <input name="address_province" class="form-control" type="text" value="{{ $user->address_province }}" placeholder="จังหวัด">
        </div>
      </div>
    </div>
    
    <div class="row mb-3">
      <div class="col-md-3">
        <h3> เปลี่ยนรหัสผ่าน </h3>
      </div>
      <div class="col-md-9">
        <div class="mb-3">
          <label for="password" class="form-label">รหัสผ่านปัจจุบัน</label>
          <input name="password" class="form-control" type="password" value="{{ old('password') }}" placeholder="รหัสผ่านปัจจุบัน">
        </div>

        <div class="mb-3">
          <label for="new_password" class="form-label">รหัสผ่านใหม่</label>
          <input name="new_password" class="form-control" type="password" value="{{ old('new_password') }}" placeholder="รหัสผ่านใหม่">
        </div>
        
        <div class="mb-3">
          <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
          <input name="confirm_password" class="form-control" type="password" value="{{ old('confirm_password') }}" placeholder="ยืนยันรหัสผ่าน">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-9 offset-md-3">
        @if(Session::has('NEW_PASSWORD'))
          <div class="alert alert-success">
            {{ Session::get('NEW_PASSWORD') }}
          </div>
        @endif
        
        @if(Session::has('WRONG_PASSWORD'))
          <div class="alert alert-danger">
            {{ Session::get('WRONG_PASSWORD') }}
          </div>
        @endif

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
@endsection