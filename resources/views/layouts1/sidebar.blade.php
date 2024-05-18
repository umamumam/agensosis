<div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <hr>
            <li
                class="sidebar-item active ">
                <a href="/dashboard" class='sidebar-link'>
                <i class="bi bi-house-door-fill"></i>
                    <span>Dashboard</span>
                </a>
                

            </li>
                   
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Master Data</span>
                </a>
                
                <ul class="submenu ">
                    <li class="submenu-item  ">
                        <a href="/jenisbarang" class="submenu-link">Jenis Barang</a>
                        
                    </li>
                    <li class="submenu-item  ">
                        <a href="/barang" class="submenu-link">Data Barang</a>
                        
                    </li>
                    <li class="submenu-item  ">
                        <a href="/diskon" class="submenu-link">Diskon</a>
                        
                    </li>
                </ul>
                

            </li>
            <li
                class="sidebar-item  ">
                <a href="/user" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Data User</span>
                </a>
            </li>   
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                <i class="bi bi-cart-fill"></i>
                    <span>Transaksi Penjualan</span>
                </a>
                
                <ul class="submenu ">
                    
                    <li class="submenu-item  ">
                        <a href="/transaksi" class="submenu-link">Transaksi</a>
                        
                    </li>
                    
                    <li class="submenu-item  ">
                        <a href="/detailtransaksi" class="submenu-link">Detail Transaksi</a>
                        
                    </li>

                </ul>
                
            </li>
            <li class="sidebar-title">Other Menu</li>
            <hr>
            </li>
            <li
                class="sidebar-item  ">
                <a href="/profile" class='sidebar-link'>
                <i class="bi bi-person-fill"></i>
                    <span>Profile</span>
                </a>
            </li> 
            <li
                class="sidebar-item  ">
                <a href="#" class='sidebar-link'
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout')}}" method="post"
                 style="display: none;">
                    @csrf
                </form>

            </li>
            
        </ul>
    </div>