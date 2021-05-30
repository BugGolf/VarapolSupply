@extends('template.default')

@section('page')
<div class="p-3">
  <div class="row">
    <div class="col-12 mb-3">
      <h1> เพิ่มหมวดหมู่ </h1>
    </div>

    <div class="col-12">
      <form method="POST">
        {{ csrf_field() }}

        <div class="mb-3">
          <input name="name" class="form-control" type="text" value="{{ old('name') }}" placeholder="ชื่อหมวดหมู่">
        </div>

        @if(Session::has('CATEGORY_STORE'))
        <div class="alert alert-danger">
          {{ Session::get('CATEGORY_STORE') }}
        </div>
        @endif

        <div class="my-4">
          <button type="submit" class="btn btn-primary me-2">
            บันทึก
          </button>
          <a href="/category" class="btn text-primary">
            ยกเลิก
          </a>
        </div>

      </form>
    </div>

  </div>
</div>
@endsection