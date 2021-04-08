    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
        role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item <?= ($active == '1' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User3') ?>"><i class="la la-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
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
                                        <a class="dropdown-item" href="<?//= base_url('User3/tambahAset/'.$val->jenis_kib) ?>" data-toggle="dropdown">KIB <?//= $val->jenis_kib ?> - <?//= $val->nama_kib ?></a>
                                    </li>
                                <?php //} ?>
                            </ul>
                        </li>
                        <li data-menu="" class="<?//= (isset($active_sub) ? ($active_sub == '2.2' ? 'active' : '') : '') ?>">
                            <a class="dropdown-item" href="<?//= base_url('User3/dataAset') ?>">Data Aset</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown nav-item <?= ($active == '2' ? 'active' : '') ?>" data-menu="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="la la-puzzle-piece"></i>
                        <span>Data Aset</span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($dataKib as $val) { ?>
                            <li class="<?= (isset($active_sub) ? ($active_sub == '2.'.$val->id_jenis_kib ? 'active' : '') : '') ?>">
                                <a class="dropdown-item" href="<?= base_url('User3/dataAset/'.encode($val->id_jenis_kib)) ?>" data-toggle="dropdown"><?= $val->jenis_kib ?>. <?= $val->nama_kib ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item <?= ($active == '3' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User3/historiAset') ?>"><i class="la la-history"></i>
                        <span>Histori Aset</span>
                    </a>
                </li>
                <li class="nav-item <?= ($active == '4' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User3/dataMutasi') ?>"><i class="ft-log-out"></i>
                        <span>Mutasi Aset</span>
                    </a>
                </li>
                <li class="nav-item <?= ($active == '5' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User3/dataUsulanHapus') ?>"><i class="ft-trash-2"></i>
                        <span>Usulan Hapus</span>
                    </a>
                </li>
                <!-- <li class="nav-item <?//= ($active == '6' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?//= base_url('User3/historiAset') ?>"><i class="ft-box"></i>
                        <span>Histori Aset</span>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>