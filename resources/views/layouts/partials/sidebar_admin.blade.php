<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Selamat Datang - {{ Auth::user()->username }}</li>
            <!-- Optionally, you can add icons to the links -->
            
            <!-- Baru -->
            {{-- <li><a href="{{ route('indexAdmin') }}"><i class='fa fa-circle-thin'></i> <span>Home</span></a></li> --}}
            <li class="{{ Request::is('admin/') ? 'active' : '' }}"><a href="{{ route('indexAdmin') }}"><i class='fa fa-dashboard'></i> <span>Data Admin</span></a></li>
            @if (!Auth::user()->hasRole('pimpinan'))
                <li class="{{ Request::is('admin/jurusankelas*') ? 'active' : '' }}"><a href="{{ route('indexJurusanKelasAdmin') }}"><i class='fa fa-building-o'></i> <span>Jurusan & Kelas</span></a></li>
                <li class="{{ Request::is('admin/jadwal*') ? 'active' : '' }}"><a href="{{ route('indexJadwalAdmin') }}"><i class='fa fa-calendar'></i> <span>Jadwal</span></a></li>
                {{-- <li class="{{ Request::is('admin/pendaftaran*') ? 'active' : '' }}"><a href="{{ route('indexPendaftaranAdmin') }}"><i class='fa fa-pencil'></i> <span>Pendaftaran</span></a></li> --}}
                <li class="{{ Request::is('admin/pembayaran*') ? 'active' : '' }}"><a href="{{ route('indexPembayaranAdmin') }}"><i class='fa fa-credit-card'></i> <span>Pembayaran</span></a></li>
                <li class="{{ Request::is('admin/seleksipenerimaan*') ? 'active' : '' }}"><a href="{{ route('indexSeleksiPenerimaanAdmin') }}"><i class='fa fa-check'></i> <span>Seleksi Penerimaan</span></a></li>
                <li class="{{ Request::is('admin/siswa*') ? 'active' : '' }}"><a href="{{ route('indexSiswaAdmin') }}"><i class='fa fa-user-circle'></i> <span>Mahasiswa</span></a></li>

                @if (Auth::user()->hasRole('superadmin'))
                    <li class="{{ Request::is('admin/user*') ? 'active' : '' }}"><a href="{{ route('indexUserAdmin') }}"><i class='fa fa-user'></i> <span>User Management</span></a></li>
                @endif
            @else
                <li class="{{ Request::is('admin/user*') ? 'active' : '' }}"><a href="{{ route('indexLaporan') }}"><i class='fa fa-file'></i> <span>Laporan</span></a></li>                
            @endif
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
