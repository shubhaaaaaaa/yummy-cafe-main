
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="sidenav-link" href="{{ route('manager.dashboard') }}" style="display: flex; align-items: center;">
                                <div class="sb-nav-link-icon ps-3"><i class="fas fa-tachometer-alt"></i></div>
                                <span class="ps-2">Dashboard</span>
                            </a>
                            <div class="sb-sidenav-menu-heading">Operational</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="sidenav-link" href="{{ route('manager.products') }}">Add Product</a>
                                    <a class="sidenav-link" href="{{ route('manager.categories') }}">Add Category</a>
                                    <a class="sidenav-link" href="{{ route('manager.display') }}">Menu Overview</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Order 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="sidenav-link" href="{{ route('manager.orders') }}">View Orders</a>
                                </nav>
                            </div>
                            <!-- <div class="sb-sidenav-menu-heading">Insights & Financials</div>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Billing History
                            </a>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Reports & Analytics
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                         {{ auth()->user()->name }}
                    </div>
                </nav>
           </div>
        </div>