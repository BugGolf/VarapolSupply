<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top ">
  <div class="container-fluid">
    <a class="navbar-brand" href="/" style="font-weight: bold;">
      SCP
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/">หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/transaction/outcome">เบิกสินค้า</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            รายงาน
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/transaction/reportIncome">รายงานรับสินค้า</a></li>
            <li><a class="dropdown-item" href="/transaction/reportOutcome">รายงานเบิกสินค้า</a></li>
            <li><a class="dropdown-item" href="/product/lowStock">รายงานสินค้าคงเหลือน้อย</a></li>
          </ul>
        </li>

        @php
        use App\Http\Controllers\UserService;
        @endphp

        @if(UserService::isAdmin())
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ผู้ดูแล
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/product">จัดการสินค้า</a></li>
            <li><a class="dropdown-item" href="/category">จัดการหมวดหมู่</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/user">จัดการพนักงาน</a></li>
          </ul>
        </li>
        @endif
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <a class="nav-link" href="/profile" class="mr-2">
          <i class="fas fa-user mr-2"></i> โปรไฟล์
        </a>
        <a class="nav-link" href="/logout">
          <i class="fas fa-sign-out-alt mr-2"></i> ออกจากระบบ
        </a>
      </ul>

    </div>

  </div>
</nav>