@extends('template.default')

@section('page')
<div class="p-3">
  <div class="row">
    <div class="col-md-3">
      <h1> แก้ไขสินค้า </h1>
    </div>

    <div class="col-md-9">
      <form method="POST">
        {{ csrf_field() }}

        <div class="mb-3">
          <label for="name" class="form-label">ชื่อสินค้า</label>
          <input name="name" class="form-control" type="text" value="{{ $product->name }}" placeholder="ชื่อสินค้า">
        </div>
        
        <div class="mb-3">
          <label for="category_id" class="form-label">ประเภท</label>
          <select name="category_id" class="form-control">
            @foreach($categorys as $category)
            <option value="{{ $category->id }}">
              {{ $category->name }}
            </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="min_stock" class="form-label">จำนวนขั้นต่ำ</label>
          <input name="min_stock" class="form-control" type="number" value="{{ $product->min_stock }}" placeholder="จำนวนขั้นต่ำ">
        </div>

        <div class="mb-3">
          <label for="unit" class="form-label">หน่วยนับ</label>
          <input name="unit" class="form-control" type="text" value="{{ $product->unit }}" placeholder="ชิ้น">
        </div>

        @if(Session::has('PRODUCT_STORE'))
        <div class="alert alert-danger">
          {{ Session::get('PRODUCT_STORE') }}
        </div>
        @endif

        <div class="my-4">
          <button type="submit" class="btn btn-primary me-2">
            บันทึก
          </button>
          <a href="/product" class="btn text-primary">
            ยกเลิก
          </a>
        </div>

      </form>
    </div>

  </div>
</div>
@endsection