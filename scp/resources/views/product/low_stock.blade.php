@extends('template.default')

@section('page')
<div class="p-3">
  <div class="mb-4">
    <h1> รายงานสินค้าคงเหลือน้อย </h1>
  </div>

  <div class="card">
    <table class="table">
      <colgroup>
        <col style="width: 10%;">
        <col style="width: 30%;">
        <col style="width: 20%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 20%;">
      </colgroup>

      <tr>
        <th> รหัสสินค้า </th>
        <th> ชื่อสินค้า </th>
        <th> ประเภท </th>
        <th> ขั้นต่ำ </th>
        <th> คงเหลือ </th>
        <th> &nbsp; </th>
      </tr>

      @if(isset($products))
        @foreach($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>
            <a href="/product/edit/{{ $product->id }}" style="text-decoration: none;">
              {{ $product->name }}
            </a>
          </td>
          <td>{{ $product->category_name ?? "ไม่มีหมวดหมู่" }}</td>
          <td class="text-success">{{ $product->min_stock }} {{ $product->unit }}</td>
          <td class="text-danger">{{ $product->in_stock }} {{ $product->unit }}</td>
          <td>
            <a href="/product/delete/{{ $product->id }}" class="btn btn-sm text-danger">
              <i class="fas fa-trash mr-2"></i> ลบ
            </a>
          </td>
        </tr>
        @endforeach
      @endif
    </table>

    @if(!isset($products) || !count($products))
      <div class="p-5 text-center">
        ไม่พบรายการ
      </div>
    @endif
  </div>
</div>
@endsection