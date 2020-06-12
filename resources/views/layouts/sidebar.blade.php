  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{asset('adminLTE3/dist/img/AdminLTELogo.png')}}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Al-Ikhlas</span>
  </a>

<section class="sidebar">
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE3/dist/img/logos.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin Musholla</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">BERANDA</li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(Auth::user()->level == 'Admin')
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('user') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('user/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-podcast"></i>
              <p>
                Data HeadLine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('headline') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Headline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('headline/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Headline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('keuangan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Keuangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('keuangan/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Keuangan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-camera-retro"></i>
              <p>
                Data Foto
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('foto') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Foto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('foto/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Foto</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Data Video
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('video') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Data Video</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('video/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Data Video</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(Auth::user()->level == 'Bendahara')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('keuangan') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Keuangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('keuangan/add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Keuangan</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li><a href="{{ url('/logout') }}"><i class="fas fa-fw fa-home"></i> Logout</span></a></li>
        </ul>
      </nav>
    </section>