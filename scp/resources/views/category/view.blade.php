@extends('template.default')

@section('page')
<div class="p-3">
  <div class="mb-4">
    <h1> จัดการหมวดหมู่ </h1>
  </div>

  <div class="mb-3">
    <a href="/category/add" class="btn btn-primary mr-2">
      เพิ่มหมวดหมู่
    </a>
  </div>

  <div class="card">
    <table class="table">
      <colgroup>
        <col style="width: 10%;">
        <col style="width: 70%;">
        <col style="width: 20%;">
      </colgroup>

      <tr>
        <th> รหัสหมวดหมู่ </th>
        <th> ชื่อหมวดหมู่ </th>
        <th> &nbsp; </th>
      </tr>

      @if(isset($categorys))
        @foreach($categorys as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <a href="/category/delete/{{ $category->id }}" class="btn btn-sm text-danger">
              <i class="fas fa-trash mr-2"></i> ลบ
            </a>
          </td>
        </tr>
        @endforeach
      @endif
    </table>

    @if(!isset($categorys) || !count($categorys))
      <div class="p-5 text-center">
        ไม่พบรายการ
      </div>
    @endif
  </div>
</div>
@endsection