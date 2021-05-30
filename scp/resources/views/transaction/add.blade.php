@extends('template.default')

@section('page')
<div class="p-3">
  <div class="row">
    <div class="col-md-3">
      @if($method == 1)
      <h1> รับเข้าคลัง </h1>
      @else
      <h1> เบิกสินค้า </h1>
      @endif
    </div>

    <div class="col-md-9">
      <form method="POST">
        <input name="method" type="hidden" value="{{ $method }}">
        {{ csrf_field() }}

        <div class="mb-3">
          <label for="product_id" class="form-label">ชื่อสินค้า</label>
          <select name="product_id" class="form-control">
            @foreach($products as $product)
            <option value="{{ $product->id }}">
              {{ $product->name }}: เหลือ ({{ $product->in_stock }} {{ $product->unit }})
            </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="total" class="form-label">จำนวน</label>
          <input name="total" class="form-control" type="number" value="{{ old('total') }}" placeholder="จำนวน">
        </div>

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