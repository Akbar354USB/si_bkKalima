<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">John Doe</p>
      <p class="app-sidebar__user-designation">Frontend Developer</p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item" href=""><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="{{ route('siswa-index') }}"><i class="icon fa fa-circle-o"></i>Data Siswa</a></li>
        <li><a class="treeview-item" href="{{ route('kelas-index') }}"><i class="icon fa fa-circle-o"></i>Data Kelas</a><li>
        <li><a class="treeview-item" href="{{ route('tatib-index') }}"><i class="icon fa fa-circle-o"></i>Data Tatib</a></li>
        <li><a class="treeview-item" href="{{ route('sanksi-index') }}"><i class="icon fa fa-circle-o"></i>Data Sanksi</a></li>
      </ul>
    </li>
    <li><a class="app-menu__item" href="{{ route('kelas-index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Manajemen User</span></a></li>
    <li><a class="app-menu__item" href="{{ route('laporan-index') }}"><i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">Lapor Pelanggaran</span></a></li>
    <li><a class="app-menu__item" href="{{ route('riwayat-count') }}"><i class="app-menu__icon fa fa-history"></i><span class="app-menu__label">Riwayat Pelanggaran</span></a></li>
  </ul>
</aside>