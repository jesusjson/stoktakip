<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="logo" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="logo" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Yetkili</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Personel İşlemleri</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?=siteUrl?>pages/index.php?kategori=personelekle" class="nav-link" data-key="t-analytics">Personel Ekle </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=siteUrl?>pages/index.php?kategori=personeller" class="nav-link" data-key="t-analytics">Personel Listesi </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#menu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="mdi mdi-speedometer"></i> <span data-key="t-dashboards">Ürün İşlemleri</span>
                    </a>
                    <div class="collapse menu-dropdown" id="menu">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?=siteUrl?>pages/index.php?kategori=personelekle" class="nav-link" data-key="t-analytics">Ürün Ekle </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=siteUrl?>pages/index.php?kategori=personeller" class="nav-link" data-key="t-analytics">Personel Listesi </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
            
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
<div class="main-content">
        
