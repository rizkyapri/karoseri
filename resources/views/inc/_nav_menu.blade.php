<ul id="js-nav-menu" class="nav-menu">
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a href="/dashboard" title="Dashboard" data-filter-tags="application dashboard">
            <i class="fal fa-home"></i>
            <span class="nav-link-text" data-i18n="nav.application_dashboard">Stok Barang</span>
        </a>
    </li>

    {{-- @if (auth()->user()->getRoleNames()->first() == 'Admin') --}}
        @include('inc.mainmenu._menu_master')
    {{-- @endif --}}
    {{-- @if (auth()->user()->getRoleNames()->first() == 'Purchasing')
        @include('inc.mainmenu._menu_purchasing')
    @endif
    @if (auth()->user()->getRoleNames()->first() == 'Gudang')
        @include('inc.mainmenu._menu_gudang')
    @endif --}}
    @if (auth()->user()->getRoleNames()->first() == 'Admin')
        @if (App\Helpers\Fitures::isMainMenuTemplateActive())
            @include('inc.mainmenu._menu_depelover')
            @include('inc.mainmenu._menu_intel_app')
            @include('inc.mainmenu._menu_tools_component_app')
            @include('inc.mainmenu._menu_plugin_addon_app')
            @include('inc.mainmenu._menu_layouts_app')
        @endif
    @endif
    <div class="m-0 w-100 p-2"></div>
    <li class="{{ Request::is('about') ? 'active' : '' }}">
        <a href="/about" title="About" data-filter-tags="application about">
            <i class="fal fa-info-circle"></i>
            <span class="nav-link-text" data-i18n="nav.application_about">About</span>
        </a>
    </li>
</ul>
