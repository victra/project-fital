<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <!-- @if (! Auth::guest()) -->

            <!-- <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p> -->
                    <!-- Status -->
                    <!-- <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif -->

        <!-- search form (Optional) -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->        
        @if (Auth::user()->role == 'administrator')
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header">DAFTAR MENU</li> -->
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ (Request::is('/')) ? 'active':'' }}"><a href="{{ url('/') }}"><i class='fa fa-home'></i> <span>Beranda</span></a></li>
            <!-- <li class="{{ (Request::is('*show*')) ? 'active':'' }}"><a href="{{ url('show') }}"><i class='fa fa-user'></i> <span> Data Siswa </span></a></li> -->
            <li class="{{ (Request::is('user')) ? 'active':'' }}"><a href="{{ url('user') }}"><i class='fa fa-user'></i> <span> Data User </span></a></li>
            <li class="{{ (Request::is('kelas')) ? 'active':'' }}"><a href="{{ url('kelas') }}"><i class='fa fa-building'></i> <span> Data Kelas </span></a></li>
            <li class="{{ (Request::is('siswa')) ? 'active':'' }}"><a href="{{ url('siswa') }}"><i class='fa fa-users'></i> <span> Data Siswa </span></a></li>
            <li class="{{ (Request::is('semester')) ? 'active':'' }}"><a href="{{ url('semester') }}"><i class='fa fa-calendar-o'></i> <span> Data Semester </span></a></li>
            <li class="{{ (Request::is('absensisiswa')) ? 'active':'' }}"><a href="{{ url('absensisiswa') }}"><i class='fa fa-table'></i> <span> Absensi Siswa </span></a></li>
            <li class="{{ (Request::is('cariabsensi')) ? 'active':'' }}"><a href="{{ url('cariabsensi') }}"><i class='fa fa-search'></i> <span> Cari Absensi </span></a></li>
            <!-- <li class="{{ (Request::is('rekapperminggu')) ? 'active':'' }}"><a href="{{ url('rekapperminggu') }}"><i class='fa fa-file-o'></i> <span> Rekap Absensi (Minggu) </span></a></li>
            <li class="{{ (Request::is('rekapperbulan')) ? 'active':'' }}"><a href="{{ url('rekapperbulan') }}"><i class='fa fa-file-o'></i> <span> Rekap Absensi (Bulan) </span></a></li>
            <li class="{{ (Request::is('rekappersemester')) ? 'active':'' }}"><a href="{{ url('rekappersemester') }}"><i class='fa fa-file-o'></i> <span> Rekap Absensi (Semester) </span></a></li> -->

            <li class="treeview {{ (Request::is('rekap*')) ? 'active':'' }}">
                <a href="#"><i class='fa fa-file-o'></i> <span>Rekap Absensi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li class="{{ (Request::is('rekapperhari')) ? 'active':'' }}"><a href="{{ url('rekapperhari') }}"><i class='fa fa-circle-o'></i> <span> Per Hari </span></a></li>
                    <li class="{{ (Request::is('rekapperminggu')) ? 'active':'' }}"><a href="{{ url('rekapperminggu') }}"><i class='fa fa-circle-o'></i> <span> Per Minggu </span></a></li>
                    <li class="{{ (Request::is('rekapperbulan')) ? 'active':'' }}"><a href="{{ url('rekapperbulan') }}"><i class='fa fa-circle-o'></i> <span> Per Bulan </span></a></li>
                    <li class="{{ (Request::is('rekappersemester')) ? 'active':'' }}"><a href="{{ url('rekappersemester') }}"><i class='fa fa-circle-o'></i> <span> Per Semester </span></a></li>
                </ul>
            </li>
            <!-- <li class="{{ (Request::is('*#*')) ? 'active':'' }}"><a href="{{ url('coba') }}"><i class='fa fa-table'></i> <span> Rekap Absensi </span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li> -->
        </ul><!-- /.sidebar-menu -->

        @elseif (Auth::user()->role == 'guru piket')
        <ul class="sidebar-menu">
            <li class="{{ (Request::is('/')) ? 'active':'' }}"><a href="{{ url('/') }}"><i class='fa fa-home'></i> <span>Beranda</span></a></li>
            <li class="{{ (Request::is('kelas')) ? 'active':'' }}"><a href="{{ url('kelas') }}"><i class='fa fa-building'></i> <span> Data Kelas </span></a></li>
            <li class="{{ (Request::is('siswa')) ? 'active':'' }}"><a href="{{ url('siswa') }}"><i class='fa fa-users'></i> <span> Data Siswa </span></a></li>
            <li class="{{ (Request::is('semester')) ? 'active':'' }}"><a href="{{ url('semester') }}"><i class='fa fa-calendar-o'></i> <span> Data Semester </span></a></li>            
            <li class="{{ (Request::is('absensisiswa')) ? 'active':'' }}"><a href="{{ url('absensisiswa') }}"><i class='fa fa-table'></i> <span> Absensi Siswa </span></a></li>
            <li class="{{ (Request::is('cariabsensi')) ? 'active':'' }}"><a href="{{ url('cariabsensi') }}"><i class='fa fa-search'></i> <span> Cari Absensi </span></a></li>
            <li class="treeview {{ (Request::is('rekap*')) ? 'active':'' }}">
                <a href="#"><i class='fa fa-file-o'></i> <span>Rekap Absensi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li class="{{ (Request::is('rekapperhari')) ? 'active':'' }}"><a href="{{ url('rekapperhari') }}"><i class='fa fa-circle-o'></i> <span> Per Hari </span></a></li>
                    <li class="{{ (Request::is('rekapperminggu')) ? 'active':'' }}"><a href="{{ url('rekapperminggu') }}"><i class='fa fa-circle-o'></i> <span> Per Minggu </span></a></li>
                    <li class="{{ (Request::is('rekapperbulan')) ? 'active':'' }}"><a href="{{ url('rekapperbulan') }}"><i class='fa fa-circle-o'></i> <span> Per Bulan </span></a></li>
                    <li class="{{ (Request::is('rekappersemester')) ? 'active':'' }}"><a href="{{ url('rekappersemester') }}"><i class='fa fa-circle-o'></i> <span> Per Semester </span></a></li>
                </ul>
            </li>
        </ul>

        @elseif (Auth::user()->role == 'wali kelas')
        <ul class="sidebar-menu">
            <li class="{{ (Request::is('/')) ? 'active':'' }}"><a href="{{ url('/') }}"><i class='fa fa-home'></i> <span>Beranda</span></a></li>
            <li class="{{ (Request::is('kelas')) ? 'active':'' }}"><a href="{{ url('kelas') }}"><i class='fa fa-building'></i> <span> Data Kelas </span></a></li>
            <li class="{{ (Request::is('siswa')) ? 'active':'' }}"><a href="{{ url('siswa') }}"><i class='fa fa-users'></i> <span> Data Siswa </span></a></li>
            <li class="{{ (Request::is('cariabsensi')) ? 'active':'' }}"><a href="{{ url('cariabsensi') }}"><i class='fa fa-search'></i> <span> Cari Absensi </span></a></li>
            <li class="treeview {{ (Request::is('rekap*')) ? 'active':'' }}">
                <a href="#"><i class='fa fa-file-o'></i> <span>Rekap Absensi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li class="{{ (Request::is('rekapperhari')) ? 'active':'' }}"><a href="{{ url('rekapperhari') }}"><i class='fa fa-circle-o'></i> <span> Per Hari </span></a></li>
                    <li class="{{ (Request::is('rekapperminggu')) ? 'active':'' }}"><a href="{{ url('rekapperminggu') }}"><i class='fa fa-circle-o'></i> <span> Per Minggu </span></a></li>
                    <li class="{{ (Request::is('rekapperbulan')) ? 'active':'' }}"><a href="{{ url('rekapperbulan') }}"><i class='fa fa-circle-o'></i> <span> Per Bulan </span></a></li>
                    <li class="{{ (Request::is('rekappersemester')) ? 'active':'' }}"><a href="{{ url('rekappersemester') }}"><i class='fa fa-circle-o'></i> <span> Per Semester </span></a></li>
                </ul>
            </li>
        </ul>

        @elseif (Auth::user()->role == 'guest')
        <ul class="sidebar-menu">
            <li class="{{ (Request::is('/')) ? 'active':'' }}"><a href="{{ url('/') }}"><i class='fa fa-home'></i> <span>Beranda</span></a></li>
            <li class="{{ (Request::is('kelas')) ? 'active':'' }}"><a href="{{ url('kelas') }}"><i class='fa fa-building'></i> <span> Data Kelas </span></a></li>
            <li class="{{ (Request::is('siswa')) ? 'active':'' }}"><a href="{{ url('siswa') }}"><i class='fa fa-users'></i> <span> Data Siswa </span></a></li>
            <li class="{{ (Request::is('cariabsensi')) ? 'active':'' }}"><a href="{{ url('cariabsensi') }}"><i class='fa fa-search'></i> <span> Cari Absensi </span></a></li>
            <li class="treeview {{ (Request::is('rekap*')) ? 'active':'' }}">
                <a href="#"><i class='fa fa-file-o'></i> <span>Rekap Absensi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li class="{{ (Request::is('rekapperhari')) ? 'active':'' }}"><a href="{{ url('rekapperhari') }}"><i class='fa fa-circle-o'></i> <span> Per Hari </span></a></li>
                    <li class="{{ (Request::is('rekapperminggu')) ? 'active':'' }}"><a href="{{ url('rekapperminggu') }}"><i class='fa fa-circle-o'></i> <span> Per Minggu </span></a></li>
                    <li class="{{ (Request::is('rekapperbulan')) ? 'active':'' }}"><a href="{{ url('rekapperbulan') }}"><i class='fa fa-circle-o'></i> <span> Per Bulan </span></a></li>
                    <li class="{{ (Request::is('rekappersemester')) ? 'active':'' }}"><a href="{{ url('rekappersemester') }}"><i class='fa fa-circle-o'></i> <span> Per Semester </span></a></li>
                </ul>
            </li>
        </ul>

        @else
        <ul class="sidebar-menu">
        </ul>
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
