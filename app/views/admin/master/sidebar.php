        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Pagesall -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#allPages" aria-expanded="true" aria-controls="allPages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="allPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Main</h6>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/packet">Packet</a>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/packet_list">Packet - List</a>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/service">Service</a>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/about">About</a>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/team">Team</a>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/gallery">Gallery</a>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/testimoni">Testimoni</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="<?= BASEPATH; ?>admin/setting">Setting</a>
                    </div>
                </div>
            </li>

        </ul>
        <!-- End of Sidebar -->