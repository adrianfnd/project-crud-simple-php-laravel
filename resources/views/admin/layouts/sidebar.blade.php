<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
      <div class="sidebar-header">
          <div class="d-flex justify-content-between">
              <div class="logo">
                  <a href="#"><img src="assets/images/logo/logo.png" alt="Logo" srcset="" style="height: 30px; width: auto;"></a>
              </div>
              <div class="toggler">
                  <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
              </div>
          </div>
      </div>
      <div class="sidebar-menu">
          <ul class="menu">
              <li class="sidebar-title">Menu</li>

              <li class="sidebar-item active">
                  <a href="{{ route('buku.index') }}" class='sidebar-link'>
                      <i class="bi bi-book-fill"></i>
                      <span>Buku</span>
                  </a>
              </li>

              <li class="sidebar-item">
                  <a href="{{ route('logout') }}" class='sidebar-link'>
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Logout</span>
                  </a>
              </li>
          </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
