    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
        role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                <li class="nav-item <?= ($active == '1' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User2') ?>"><i class="la la-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown nav-item <?= ($active == '2' ? 'active' : '') ?>" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-puzzle-piece"></i>
                        <span>Aset</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu nav-item <?= (isset($active_sub) ? ($active_sub == '2.1' ? 'active' : '') : '') ?>" data-menu="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Tambah Aset</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($dataKib as $val) { ?>
                                    <li data-menu="" class="nav-item <?= (isset($active_sub_sub) ? ($active_sub_sub == '2.1.'.$val->id_jenis_kib ? 'active' : '') : '') ?>">
                                        <a class="dropdown-item" href="<?= base_url('User2/tambahAset/'.$val->jenis_kib) ?>" data-toggle="dropdown">KIB <?= $val->jenis_kib ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li data-menu="" class="nav-item <?= (isset($active_sub) ? ($active_sub == '2.2' ? 'active' : '') : '') ?>">
                            <a class="dropdown-item" href="<?= base_url('User2/dataAset') ?>">Data Aset</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($active == '3' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?= base_url('User2/dataKontrak') ?>"><i class="la la-credit-card"></i>
                        <span>KIB</span>
                    </a>
                </li>
                <!-- <li class="nav-item <?//= ($active == '4' ? 'active' : '') ?>">
                    <a class="nav-link" href="<?//= base_url('User2/dataPengadaan') ?>"><i class="ft-box"></i>
                        <span>Pengadaan</span>
                    </a>
                </li> -->
                <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="la la-television"></i><span>Templates</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Vertical</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item" href="../vertical-menu-template"
                                        data-toggle="dropdown">Classic Menu</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="../vertical-modern-menu-template"
                                        data-toggle="dropdown">Modern Menu</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="../vertical-compact-menu-template"
                                        data-toggle="dropdown">Compact Menu</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="../vertical-content-menu-template"
                                        data-toggle="dropdown">Content Menu</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="../vertical-overlay-menu-template"
                                        data-toggle="dropdown">Overlay Menu</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">Horizontal</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item" href="../horizontal-menu-template"
                                        data-toggle="dropdown">Classic</a>
                                </li>
                                <li data-menu=""><a class="dropdown-item" href="../horizontal-menu-template-nav"
                                        data-toggle="dropdown">Full Width</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>