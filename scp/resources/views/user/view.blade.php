@extends('template.default')

@section('page')
<div class="p-3">
  <div class="mb-4">
    <h1> จัดการพนักงาน </h1>
  </div>

  <div class="mb-3">
    <a href="/user/add" class="btn btn-primary mr-2">
      เพิ่มพนักงาน
    </a>
  </div>

  <div class="card">
    <table class="table">
      <colgroup>
        <col style="width: 10%;">
        <col style="width: 40%;">
        <col style="width: 15%;">
        <col style="width: 15%;">
        <col style="width: 20%;">
      </colgroup>

      <tr>
        <th> รหัสสินค้า </th>
        <th> ชื่อพนักงาน </th>
        <th> สถานะ </th>
        <th> ผู้ดูแล </th>
        <th> &nbsp; </th>
      </tr>

      @if(isset($users))
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>
            <a href="/user/edit/{{ $user->id }}" style="text-decoration: none;">
              {{ $user->name }}
            </a>
          </td>
          <td> 
            @if($user->status) 
            <span class="text-success">เปิดใช้งาน</span>
            @else
            <span class="text-danger">ระงับใช้งาน</span>
            @endif
          </td>
          <td> 
            @if($user->is_admin) 
            <span class="text-danger">ใช่</span>
            @else
            <span class="text-dark">ไม่ใช่</span>
            @endif
          </td>
          <td>
            @if(!$user->is_admin)
            <a href="/user/delete/{{ $user->id }}" class="btn btn-sm text-danger">
              <i class="fas fa-trash mr-2"></i> ลบ
            </a>
            @endif
          </td>
        </tr>
        @endforeach
      @endif
    </table>

    @if(!isset($users) || !count($users))
      <div class="p-5 text-center">
        ไม่พบรายการ
      </div>
    @endif
  </div>
</div>
@endsection