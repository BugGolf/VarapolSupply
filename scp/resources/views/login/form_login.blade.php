@extends('template.login')

@section('page')
  <div class="p-5">
    <div class="col-12 col-lg-6 offset-lg-3">
      <div class="card">
        <div class="p-5">
          <div class="mb-4">
            <h2 class="text-primary"> LOGIN </h2>
          </div>

          <form method="POST">
            {{ csrf_field() }}

            <div class="mb-3">
              <label for="username" class="form-label d-none">Username</label>
              <input name="username" class="form-control" type="text" value="{{ old('username') }}" placeholder="Username">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label d-none">Password</label>
              <input name="password" class="form-control" type="password" value="{{ old('password') }}" placeholder="Password">
            </div>

            @if ($errors->any())
            <div class="alert alert-danger mb-3" role="alert">
              ขออภัย! ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง
            </div>
            @endif

            <div class="my-3">
              <button type="submit" class="btn btn-primary mr-2">
                เข้าสู่ระบบ
              </button>
              <button type="button" class="btn text-primary">
                ยกเลิก
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
