<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->        

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ (Request::is('*home*')) ? 'active':'' }}"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <!-- <li class="{{ (Request::is('*show*')) ? 'active':'' }}"><a href="{{ url('show') }}"><i class='fa fa-user'></i> <span> Data Siswa </span></a></li> -->
            <li class="{{ (Request::is('*siswa*')) ? 'active':'' }}"><a href="{{ url('siswa') }}"><i class='fa fa-user'></i> <span> Data Siswa </span></a></li>
            <!-- <li class="{{ (Request::is('*guru_piket*')) ? 'active':'' }}"><a href="{{ url('guru_piket') }}"><i class='fa fa-user'></i> <span> Data Guru Piket </span></a></li>
            <li class="{{ (Request::is('*#*')) ? 'active':'' }}"><a href="{{ url('coba') }}"><i class='fa fa-table'></i> <span> Absensi Siswa </span></a></li>
            <li class="{{ (Request::is('*#*')) ? 'active':'' }}"><a href="{{ url('coba') }}"><i class='fa fa-table'></i> <span> Rekap Absensi </span></a></li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li> -->
        </ul><!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
</aside>
