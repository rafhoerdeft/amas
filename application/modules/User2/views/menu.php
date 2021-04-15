    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
        role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item <?= ($active == '1' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User2/dashBoard') ?>" title="Dashboard"><i class="la la-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- ======================================================================== -->

                <li class="nav-item <?= ($active == '6' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User2/dataRekanan') ?>" title="Rekanan"><i class="la la-group"></i>
                        <span>Rekanan</span>
                    </a>
                </li>
                <li class="nav-item <?= ($active == '7' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User2/dataKontrak') ?>" title="Kontrak"><i class="la la-paste"></i>
                        <span>Kontrak</span>
                    </a>
                </li>
                <li class="nav-item <?= ($active == '8' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User2/dataPengadaan') ?>" title="Pengadaan"><i class="ft-box"></i>
                        <span>Pengadaan</span>
                    </a>
                </li>

                <!-- =========================================================================== -->

                <li class="dropdown nav-item">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" title="Barang Jasa"><i class="ft-box"></i>
                        <span>Barang Jasa</span>
                    </a>
                    <ul class="dropdown-menu arrow">
                        <li class="<?= ($active == '9' ? 'active' : '') ?>">
                            <a class="dropdown-item" data-toggle="dropdown" href="<?= base_url('User2/dataBarangJasa') ?>" title="Histori Aset"><i class="la la-tablet"></i>
                                <span>List Data</span>
                            </a>
                        </li>
                        <li class="<?= ($active == '10' ? 'active' : '') ?>">
                            <a class="dropdown-item" data-toggle="dropdown" href="<?= base_url('User2/historiBarangJasa') ?>" title="Histori Aset"><i class="la la-history"></i>
                                <span>Histori</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- =========================================================================== -->

                <!-- <li class="dropdown nav-item <?//= ($active == '2' ? 'active' : '') ?>" data-menu="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="la la-puzzle-piece"></i>
                        <span>Aset</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu <?//= (isset($active_sub) ? ($active_sub == '2.1' ? 'active' : '') : '') ?>" data-menu="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Tambah Aset</a>
                            <ul class="dropdown-menu">
                                <?php //foreach ($dataKib as $val) { ?>
                                    <li data-menu="" class="<?//= (isset($active_sub_sub) ? ($active_sub_sub == '2.1.'.$val->id_jenis_kib ? 'active' : '') : '') ?>">
                                        <a class="dropdown-item" href="<?//= base_url('User2/tambahAset/'.$val->jenis_kib) ?>" data-toggle="dropdown">KIB <?//= $val->jenis_kib ?> - <?//= $val->nama_kib ?></a>
                                    </li>
                                <?php //} ?>
                            </ul>
                        </li>
                        <li data-menu="" class="<?//= (isset($active_sub) ? ($active_sub == '2.2' ? 'active' : '') : '') ?>">
                            <a class="dropdown-item" href="<?//= base_url('User2/dataAset') ?>">Data Aset</a>
                        </li>
                    </ul>
                </li> -->

                <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" title="Aset"><i class="la la-puzzle-piece"></i>
                        <span>Aset</span>
                    </a>
                    <ul class="dropdown-menu arrow">
                        <li class="dropdown-submenu <?= ($active == '2' ? 'active' : '') ?>">
                            <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#" title="Data Aset">
                                <i class="la la-tablet"></i>
                                <span>List Data</span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php foreach ($dataJenisKibAset as $val) { ?>
                                    <li class="<?= (isset($active_sub) ? ($active_sub == '2.'.$val->id_jenis_kib ? 'active' : '') : '') ?>">
                                        <a class="dropdown-item" href="<?= base_url('User2/dataAset/'.encode($val->id_jenis_kib)) ?>" data-toggle="dropdown"><span><?= $val->jenis_kib ?>. <?= $val->nama_kib ?></span></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="<?= ($active == '3' ? 'active' : '') ?>">
                            <a class="dropdown-item" data-toggle="dropdown" href="<?= base_url('User2/historiAset') ?>" title="Histori Aset"><i class="la la-history"></i>
                                <span>Histori</span>
                            </a>
                        </li>
                        <li class="<?= ($active == '4' ? 'active' : '') ?>">
                            <a class="dropdown-item" data-toggle="dropdown" href="<?= base_url('User2/dataMutasi') ?>" title="Mutasi Aset"><i class="ft-log-out"></i>
                                <span>Mutasi</span>
                            </a>
                        </li>
                        <li class="<?= ($active == '5' ? 'active' : '') ?>">
                            <a class="dropdown-item" data-toggle="dropdown" href="<?= base_url('User2/dataUsulanHapus') ?>" title="Usulan Hapus"><i class="ft-trash-2"></i>
                                <span>Usulan Hapus</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                
            </ul>
        </div>
    </div>