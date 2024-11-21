<li class="{{ Request::is('admin/profil_admin*') ? 'active' : '' }}">
    <a href="{{ route('profil_admin') }}" title="Profil Admin" data-filter-tags="admin profil">
        <i class="fal fa-user-circle"></i>
        <span class="nav-link-text" data-i18n="nav.admin_profil">Profil Admin</span>
    </a>
</li>
<li class="nav-title">Master</li>
<li class="{{ Request::is('product/*') ? 'active' : '' }}">
    <a href="{{ route('product.index') }}" title="Profil Admin" data-filter-tags="admin profil">
        <i class="fal fa-shopping-bag"></i>
        <span class="nav-link-text" data-i18n="nav.admin_profil">Produk</span>
    </a>
</li>
<li class="{{ Request::is('supplier/*') ? 'active' : '' }}">
    <a href="{{ route('supplier.index') }}" title="Profil Admin" data-filter-tags="admin profil">
        <i class="fa fa-cubes"></i>
        <span class="nav-link-text" data-i18n="nav.admin_profil">Supplier</span>
    </a>
</li>
<li class="nav-title">Transaksi</li>
<li class="{{ Request::is('incoming/*') ? 'active' : '' }}">
    <a href="{{ route('incoming.index') }}" title="Profil Admin" data-filter-tags="admin profil">
        <i class="fa fa-sign-in"></i>
        <span class="nav-link-text" data-i18n="nav.admin_profil">Barang Masuk</span>
    </a>
</li>
<li class="{{ Request::is('outcoming/*') ? 'active' : '' }}">
    <a href="{{ route('outcoming.index') }}" title="Profil Admin" data-filter-tags="admin profil">
        <i class="fa fa-sign-out"></i>
        <span class="nav-link-text" data-i18n="nav.admin_profil">Barang Keluar</span>
    </a>
</li>