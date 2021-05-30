@extends('template.default')

@section('page')
<div class="p-3">
  <div class="mb-4">
    @if($method == 1)
    <h1> รายงานรับสินค้า </h1>
    @else
    <h1> รายงานเบิกสินค้า </h1>
    @endif
  </div>
  <div class="card">
    <table class="table">
      <colgroup>
        <col style="width: 20%;">
        <col style="width: 40%;">
        <col style="width: 10%;">
        <col style="width: 30%;">
      </colgroup>

      <tr>
        <th> วันที่เวลา </th>
        <th> ชื่อสินค้า </th>
        <th> จำนวน </th>
        <th> ชื่อพนักงาน </th>
      </tr>

      @if(isset($transactions))
        @foreach($transactions as $ts)
        <tr>
          <td>{{ $ts->updated_at }}</td>
          <td>{{ $ts->product->name }}</td>
          <td>
            @if($method == 1)
            <span class="text-success">
              +{{ $ts->total }} {{ $ts->product->unit }}
            </span>
            @else
            <span class="text-danger">
              -{{ $ts->total }} {{ $ts->product->unit }}
            </span>
            @endif
          </td>
          <td>{{ $ts->user->name }}</td>
        </tr>
        @endforeach
      @endif
    </table>

    @if(!isset($transactions) || !count($transactions))
      <div class="p-5 text-center">
        ไม่พบรายการ
      </div>
    @endif
  </div>
</div>
@endsection