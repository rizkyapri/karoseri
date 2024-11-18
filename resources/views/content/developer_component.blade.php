@extends('inc.main')
@section('title', 'Developer')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
    <link rel="stylesheet" media="screen, print" href="/admin/css/notifications/toastr/toastr.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb')
        <div class="subheader">
            @component('inc._page_heading', [
                'icon' => 'dice-d6',
                'heading1' => 'Developer',
                'heading2' => 'Component',
                'sup' => 'ADDON',
                'pagedescription' => 'Components are supporting blade templates on this website',
            ])
            @endcomponent
        </div>


        <div class="alert alert-primary">
            <div class="d-flex flex-start w-100">
                <div class="mr-2 hidden-md-down">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                        <i class="ni ni-blog-read icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <x-div div :text="__('Pro Tip!')" class="h5" />
                        <p>
                            Laravel has provided one of the interesting features in its templating blade, namely Components.
                            Components allow us to chop up code so that it can be reused without having to rewrite all the
                            parts completely. Similar to sections and layouts which are also part of the blade tempalting
                            feature.
                        </p>
                        <p class="m-0">
                            Follow a slogal with a useful link or call to action <a href="#" target="_blank">Call to
                                action >></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <x-panel.show title="Contoh" subtitle="panel">
            <x-slot name="paneltoolbar">
                <x-panel.tool-bar>
                    isi panel tool-bar
                </x-panel.tool-bar>
            </x-slot>
            <x-slot name="tagpanel">
                isi tagpanel
            </x-slot>
            <p>
                ini content panel
            </p>
            <x-slot name="panelcontentfoot">
                isi panelcontent foot
            </x-slot>
        </x-panel.show>
        <x-row-column :column="2">
            <x-slot name="column1">
                <x-panel.show title="Default" subtitle="Example">
                    <x-slot name="paneltoolbar">
                        <x-panel.tool-bar>
                            <select class="custom-select custom-select-sm">
                                <option selected="">Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </x-panel.tool-bar>
                        <x-panel.tool-bar class="ml-2">
                            <div class="d-flex position-relative ml-auto" style="max-width: 8rem;">
                                <i class="fal fa-search position-absolute pos-left fs-lg px-2 py-1 mt-1 fs-xs"></i>
                                <input type="text" class="form-control form-control-sm pl-5" placeholder="Search">
                            </div>
                        </x-panel.tool-bar>
                        <x-panel.tool-bar class="ml-2">
                            <button class="btn btn-toolbar-master" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fal fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-menu-right">
                                <a class="dropdown-item" href="/dashboard">Kembali</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </x-panel.tool-bar>
                    </x-slot>
                    <x-slot name="tagpanel">
                        All panels needs to have an unique ID in order to use the panel funtions.
                        <code>.panel</code> is a container with no padding, <code>.panel-hdr</code> has a
                        <code>min-height</code> value and default <code>flexbox</code> properties. The
                        <code>.panel-toolbar</code> is inserted into <code>.panel-hdr</code> for extra elements. The
                        <code>.panel-container</code> wraps <code>.panel-content</code> which has a predefined
                        padding.
                    </x-slot>
                    <p>
                        ini content panel
                    </p>
                    <x-slot name="panelcontentfoot">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="demoCheck">
                            <label class="custom-control-label" for="demoCheck">Checkbox</label>
                        </div>
                        <x-button href="/dev_component" size="sm" :label="__('Small')" class="ml-auto" />
                    </x-slot>
                </x-panel.show>
                <x-panel.show title="Component" subtitle="Alert">
                    <h5 class="text-info">Component</h5>
                    <code>x-alert-messages</code>
                    <hr>
                    <h5 class="text-info">Example</h5>
                    <code>&lt;x-alert-messages color="danger" dismissible :title="__('Error!!')"&gt;</code>
                    <x-alert-messages color="danger" dismissible :title="__('Error!!')">
                        <strong>Well Done!</strong> You error read this important alert message.
                    </x-alert-messages>
                    <code>&lt;x-alert-messages color="warning" :title="__('Attention!!')"&gt;</code>
                    <x-alert-messages color="warning" :title="__('Attention!!')">
                        <strong>Well Done!</strong> You warning read this important alert message.
                    </x-alert-messages>
                    <code>&lt;x-alert-messages color="info" bground :title="__('Information!!')"&gt;</code>
                    <x-alert-messages color="info" bground dismissible :title="__('Information!!')">
                        <strong>Well Done!</strong> You information read this important alert message.
                    </x-alert-messages>
                    <code>&lt;x-alert-messages color="success" bground :title="__('Success!!')"&gt;</code>
                    <x-alert-messages color="success" bground dismissible :title="__('Success!!')">
                        <strong>Well Done!</strong> You successfully read this important alert message.
                    </x-alert-messages>
                    <code>&lt;x-alert-messages color="dark" bground&gt;</code>
                    <x-alert-messages color="dark" bground>
                        <span class="h6 m-0 fw-700">Task 55% Complete</span>
                        <div class="progress mt-1 progress-xs">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success-600"
                                role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>
                    </x-alert-messages>
                    <code>&lt;x-alert-messages color="primary" :title="__('Pro Tip!!!')"&gt;</code>
                    <x-alert-messages color="secondary" :title="__('Pro Tip!!!')">
                        <p>
                            Laravel has provided one of the interesting features in its templating blade, namely
                            Components.
                            Components allow us to chop up code so that it can be reused without having to rewrite all
                            the
                            parts completely. Similar to sections and layouts which are also part of the blade
                            tempalting
                            feature.
                        </p>
                        <p class="m-0">
                            Follow a slogal with a useful link or call to action <a href="#" target="_blank">Call to
                                action >></a>
                        </p>
                    </x-alert-messages>
                </x-panel.show>
            </x-slot>
            <x-slot name="column2">
                <x-panel.show title="Component" subtitle="Div or Span">
                    <x-title :l="5" :title="__('Example Span')" info class="mb-2" />
                    Script : <code>
                        &lt;x-div :text="__('Pro Tip!')" class="h5" /&gt;
                    </code>
                    <br>
                    HTML : <code>&lt;span class="h5"&gt;Pro Tip!&lt;/span&gt;</code> <br>Output : <x-div
                        :text="__('Pro Tip!')" class="h5" />
                    <hr>
                    <x-title :l="5" :title="__('Example Div')" info class="mb-2" />
                    Script <code>
                        &lt;x-div div :text="__('Pro Tip!')" class="h5" /&gt;
                    </code>
                    <br>
                    HTML : <code>&lt;div class="h5"&gt;Pro Tip!&lt;/div&gt;</code> <br>Output : <x-div div
                        :text="__('Pro Tip!')" class="h5" />
                    <hr>
                </x-panel.show>
                <x-panel.show title="Component" subtitle="Icon">
                    <x-title :l="5" :title="__('Component')" info class="mb-2" />
                    <code>x-icon</code>
                    <hr>
                    <x-title :l="5" :title="__('Variabel')" info class="mb-2" sm />
                    <code>fal = false</code>,
                    <code>far = false</code>,
                    <code>fas = false</code>,
                    <code>fad = false</code>,
                    <code>fab = false</code>,
                    <code>size = "2x - 9x"</code>,
                    <code>color = success, warning, danger, info, primary, secondary</code>,
                    <code>spin = false</code>,
                    <code>pulse = false</code>,
                    <code>beat = false</code>,
                    <code>flip = false</code>,
                    <code>shake = false</code>,
                    <code>rotate_90 = false</code>,
                    <code>rotate_180 = false</code>,
                    <code>rotate_270 = false</code>,
                    <hr>
                    <x-title :l="5" info class="mb-2" sm>Example</x-title>
                    <code>
                        &lt;x-icon fal name="coffee" size="2x"
                        color="danger"
                        /&gt;
                    </code>
                    <x-icon fal name="coffee" size="2x" color="danger" /><br>
                    <code>
                        &lt;x-icon fas name="cog" size="2x"
                        color="primary" spin /&gt;
                    </code>
                    <x-icon fas name="cog" size="2x" color="primary" spin /><br>
                    <code>
                        &lt;x-icon fad name="car-bump" size="2x"
                        color="success" /&gt;
                    </code>
                    <x-icon fad name="car-bump" size="2x" color="success" /><br>
                    <x-slot name="panelcontentfoot">
                        <a href="/icons_fontawesome_light" target="_blank">Reference</a>
                    </x-slot>
                </x-panel.show>
                <x-panel.show title="Component" subtitle="Number Style">
                    {{-- Number Style --}}
                    <h5 class="text-info">Component</h5>
                    <code>x-number-style</code>
                    <hr>
                    <h5 class="text-info">variabel</h5>
                    <code>color = success, warning, danger, info, primary, secondary</code>
                    <hr>
                    <h5 class="text-info">Example</h5>
                    <code>
                        &lt;x-number-style color="danger" :label="__('1')" /&gt;
                    </code>
                    <hr>
                    <x-number-style color="success" :label="__('11')" />
                    <x-number-style color="info" :label="__('25')" />
                    <x-number-style color="danger" :label="__('1')" />
                </x-panel.show>
                <x-panel.show title="Component" subtitle="Badge">
                    <h5 class="text-info">Component</h5>
                    <code>x-badge</code>
                    <hr>
                    <h5 class="text-info">variabel</h5>
                    <code>color = success, warning, danger, info, primary, secondary</code>
                    <hr>
                    <h5 class="text-info">Example</h5>
                    <code>
                        &lt;x-badge color="success" :label="__('News')" /&gt;
                    </code>
                    <hr>
                    <x-badge color="success" :label="__('News')" />
                    <x-badge color="info" fill :label="__('Test')" />

                </x-panel.show>
            </x-slot>
        </x-row-column>

        <x-row-column :column="1">
            <x-slot name='column1'>
                <x-panel.show title="Component" subtitle="Button">
                    <x-tabs-pills :tabs="[
                        ['id' => 'tab1', 'label' => 'Default & Outline'],
                        ['id' => 'tab2', 'label' => 'Pills'],
                        ['id' => 'tab3', 'label' => 'with ICON'],
                        ['id' => 'tab4', 'label' => 'Icon'],
                        ['id' => 'tab5', 'label' => 'Size'],
                        ['id' => 'tab6', 'label' => 'Block'],
                        ['id' => 'tab7', 'label' => 'Hover dot effect'],
                        ['id' => 'tab8', 'label' => 'Dropdown'],
                        ['id' => 'tab9', 'label' => 'Bootbox'],
                        ['id' => 'tab10', 'label' => 'Toastr'],
                    ]">
                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                            {{-- button --}}
                            <h5 class="text-info">Default Button & Outline Button</h5>
                            with color <code>&lt;x-button color="$color" :label="__('Primary')" /&gt;</code>
                            <hr>
                            <x-button color="primary" :label="__('Primary')" />
                            <x-button color="secondary" :label="__('Secondary')" />
                            <x-button color="default" :label="__('Default')" />
                            <x-button color="success" :label="__('Success')" />
                            <x-button color="warning" :label="__('Warning')" />
                            <x-button color="info" :label="__('Info')" />
                            <x-button color="danger" :label="__('Danger')" />
                            <x-button color="dark" :label="__('Dark')" />
                            <x-button color="light" :label="__('Light')" />
                            <hr>
                            with style outline <code>&lt;x-button style
                                color="$color" :label="__('Primary')" /&gt;</code>
                            <hr>
                            <x-button style color="primary" :label="__('Primary')" />
                            <x-button style color="secondary" :label="__('Secondary')" />
                            <x-button style color="default" :label="__('Default')" />
                            <x-button style color="success" :label="__('Success')" />
                            <x-button style color="warning" :label="__('Warning')" />
                            <x-button style color="info" :label="__('Info')" />
                            <x-button style color="danger" :label="__('Danger')" />
                            <x-button style color="dark" :label="__('Dark')" />
                            <x-button style color="light" :label="__('Light')" />
                            <br>
                            <div class="panel-tag mt-2 mb-2">for outline buttons also applies to btn-icon,
                                size, rounded-circle, btn-pills</div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <h5 class="text-info">Pills Button</h5>
                            with pills <code>&lt;x-button color="$color" pills :label="__('Primary')"
                                /&gt;</code>
                            <hr>
                            <x-button color="primary" pills :label="__('Primary')" />
                            <x-button color="secondary" pills :label="__('Secondari')" />
                            <x-button color="default" pills :label="__('Default')" />
                            <x-button color="success" pills :label="__('Success')" />
                            <x-button color="warning" pills :label="__('Warning')" />
                            <x-button color="info" pills :label="__('Info')" />
                            <x-button color="danger" pills :label="__('Danger')" />
                            <x-button color="dark" pills :label="__('Dark')" />
                            <x-button color="light" pills :label="__('Light')" />
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <h5 class="text-info">Button with ICON</h5>
                            with icon <code>&lt;x-button color="$color"
                                icon="$icon" :label="__('Primary')" /&gt;</code>
                            <hr>
                            <x-button color="primary" icon="print" :label="__('Print')" />
                            <x-button color="secondary" icon="volume-mute" :label="__('Mute')" />
                            <x-button color="default" icon="check" :label="__('Submit')" />
                            <x-button color="success" icon="download" :label="__('Download')" />
                            <x-button color="warning" icon="exclamation-triangle" :label="__('Scan Device')" />
                            <x-button color="info" icon="bug" :label="__('Report Bug')" />
                            <x-button color="danger" icon="times" :label="__('Delete')" />
                            <x-button color="dark" icon="eject" :label="__('Eject')" />
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                            <h5 class="text-info">Icon Button</h5>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    with btn-icon <code>&lt;x-button color="$color" icon="$icon"
                                        btnicon /&gt;</code>
                                </x-slot>
                                <x-slot name="column2">
                                    <x-button color="primary" icon="print" btnicon />
                                    <x-button color="secondary" icon="volume-mute" btnicon />
                                    <x-button color="default" icon="check" btnicon />
                                    <x-button color="success" icon="download" btnicon />
                                    <x-button color="warning" icon="exclamation-triangle" btnicon />
                                    <x-button color="info" icon="bug" btnicon />
                                    <x-button color="danger" icon="times" btnicon />
                                    <x-button color="dark" icon="eject" btnicon />
                                </x-slot>
                            </x-row-column>
                            <hr>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    with btn-icon and rounded-circle <br><code>&lt;x-button href="#"
                                        color="$color" icon="$icon" btnicon
                                        circle /&gt;</code>
                                </x-slot>
                                <x-slot name="column2">
                                    <x-button href="#" color="primary" icon="print" btnicon circle />
                                    <x-button href="#" color="secondary" icon="volume-mute" btnicon circle />
                                    <x-button href="#" color="default" icon="check" btnicon circle />
                                    <x-button href="#" color="success" icon="download" btnicon circle />
                                    <x-button href="#" color="warning" icon="exclamation-triangle" btnicon
                                        circle />
                                    <x-button href="#" color="info" icon="bug" btnicon circle />
                                    <x-button href="#" color="danger" icon="times" btnicon circle />
                                    <x-button href="#" color="dark" icon="eject" btnicon circle />
                                </x-slot>
                            </x-row-column>
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="tab5" role="tabpanel">
                            <h5 class="text-info">Button Size</h5>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    size lg (large)<code>&lt;x-button
                                        size="lg" :label="__('Large')" /&gt;</code>
                                    <x-button size="lg" :label="__('Large')" />
                                </x-slot>
                                <x-slot name="column2">
                                    size (default) <code>&lt;x-button :label="__('Default')" /&gt;</code>
                                    <x-button :label="__('Default')" />
                                </x-slot>
                            </x-row-column>
                            <hr>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    size sm (small)<code>&lt;x-button
                                        size="sm" :label="__('Small')" /&gt;</code>
                                    <x-button size="sm" :label="__('Small')" />
                                </x-slot>
                                <x-slot name="column2">
                                    size xs (smallest) <code>&lt;x-button
                                        size="xs" :label="__('Smallest')" /&gt;</code>
                                    <x-button size="xs" :label="__('Smallest')" />
                                </x-slot>
                            </x-row-column>
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="tab6" role="tabpanel">
                            <h5 class="text-info">Button Block</h5>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    size lg (large) + pills <code>&lt;x-button
                                        size="lg" block pills&gt;Large&lt;/x-button&gt;</code>
                                    <x-button size="lg" block pills :label="__('Large')" />
                                </x-slot>
                                <x-slot name="column2">
                                    size (default) + style <code>&lt;x-button block
                                        style&gt;Default&lt;/x-button&gt;</code>
                                    <x-button block style :label="__('Default')" />
                                </x-slot>
                            </x-row-column>
                            <hr>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    size sm (small)<code>&lt;x-button
                                        color="danger" size="sm" block :label="__('Small')"
                                        /&gt;</code>
                                    <x-button color="danger" size="sm" block :label="__('Small')" />
                                </x-slot>
                                <x-slot name="column2">
                                    size xs (smallest) + href="#" <code>&lt;x-button
                                        href="#" size="xs"
                                        block :label="__('Smallest')" /&gt;</code>
                                    <x-button href="#" size="xs" block :label="__('Smallest')" />
                                </x-slot>
                            </x-row-column>
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="tab7" role="tabpanel">
                            <h5 class="text-info">Hover dot effect</h5>
                            <x-row-column :column="2">
                                <x-slot name="column1">
                                    <code>&lt;x-button
                                        href="javascript:void(0);" color="$color" size="$size"
                                        icon="$icon" btnicon circle
                                        effect /&gt;</code>
                                    <hr>
                                    <x-button href="javascript:void(0);" color="primary" size="lg" icon="users"
                                        btnicon circle effect />
                                    <x-button href="javascript:void(0);" color="success" size="lg" icon="save"
                                        btnicon circle effect />
                                    <x-button href="javascript:void(0);" color="secondary" size="lg" icon="home"
                                        btnicon circle effect />
                                    <x-button href="javascript:void(0);" color="danger" size="lg" icon="trash"
                                        btnicon circle effect />
                                </x-slot>
                                <x-slot name="column2">
                                </x-slot>
                            </x-row-column>
                        </div>
                        <div class="tab-pane fade" id="tab8" role="tabpanel">
                            <h5 class="text-info">Button Dropdown</h5>
                            <hr>
                            <x-row-column :column="4">
                                <x-slot name="column1">
                                    <h5> Dropdown Default</h5>
                                    <div class="fs-lg fw-300 p-1 border-faded rounded mb-g">
                                        @php
                                            $DropdownDef = file_get_contents(resource_path('/data/DropdownDefault.md'));
                                        @endphp
                                        <pre>
                                        {!! htmlspecialchars($DropdownDef) !!}
                                        </pre>
                                    </div>
                                    <div class="btn-group">
                                        <x-button color="primary" icon="print" :label="__('Print')" dropdowntoggle
                                            toggle="dropdown" haspopup="true" expanded="false" :items="[
                                                ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                                'divider',
                                                ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                            ]" />
                                    </div>
                                </x-slot>
                                <x-slot name="column2">
                                    <h5> Dropdown Left Show</h5>
                                    <div class="fs-lg fw-300 p-1 border-faded rounded mb-g">
                                        @php
                                            $DropdownLeft = file_get_contents(
                                                resource_path('/data/DropdownLeftShow.md'),
                                            );
                                        @endphp
                                        <pre>
                                        {!! htmlspecialchars($DropdownLeft) !!}
                                        </pre>
                                    </div>
                                    <div class="btn-group dropleft">
                                        <x-button color="danger" :label="__('Pilihan')" dropdowntoggle toggle="dropdown"
                                            haspopup="true" expanded="false" :items="[
                                                ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                                'divider',
                                                ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                            ]" />
                                    </div>
                                </x-slot>
                                <x-slot name="column3">
                                    <h5> Dropdown Right Show</h5>
                                    <div class="fs-lg fw-300 p-1 border-faded rounded mb-g">
                                        @php
                                            $DropdownRight = file_get_contents(
                                                resource_path('/data/DropdownRightShow.md'),
                                            );
                                        @endphp
                                        <pre>
                                        {!! htmlspecialchars($DropdownRight) !!}
                                        </pre>
                                    </div>
                                    <div class="btn-group dropright">
                                        <x-button color="warning" :label="__('Pilihan')" dropdowntoggle toggle="dropdown"
                                            haspopup="true" expanded="false" :items="[
                                                ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                                'divider',
                                                ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                            ]" />
                                    </div>
                                </x-slot>
                                <x-slot name="column4">
                                    <h5> Dropdown Static Show</h5>
                                    <code>
                                        &lt;div class="btn-group"&gt;
                                        &lt;x-button color="secondary" :label="__('Pilihan')" dropdowntoggle
                                        toggle="dropdown"
                                        haspopup="true" expanded="false" display="static"
                                        :items="[
                                            ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                            ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                            ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                            'divider',
                                            ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                        ]"
                                        /&gt;
                                        &lt;/div&gt;
                                    </code>
                                    <hr>
                                    <div class="btn-group">
                                        <x-button color="secondary" :label="__('Pilihan')" dropdowntoggle toggle="dropdown"
                                            haspopup="true" expanded="false" display="static" :items="[
                                                ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                                ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                                'divider',
                                                ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                            ]" />
                                    </div>
                                </x-slot>
                            </x-row-column>


                            <hr>


                            <div class="btn-group">
                                <x-button color="secondary" icon="plus" btnicon circle toggle="dropdown"
                                    haspopup="true" expanded="false" display="static" :items="[
                                        ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                        ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                        ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                        'divider',
                                        ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                    ]" />
                            </div>
                            <div class="btn-group dropright">
                                <x-button color="info" icon="plus" btnicon circle toggle="dropdown" haspopup="true"
                                    expanded="false" display="static" :items="[
                                        ['label' => 'Action', 'href' => 'javascript:void(0);'],
                                        ['label' => 'Another action', 'href' => 'javascript:void(0);'],
                                        ['label' => 'Something else here', 'href' => 'javascript:void(0);'],
                                        'divider',
                                        ['label' => 'Separated link', 'href' => 'javascript:void(0);'],
                                    ]" />
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab9" role="tabpanel">
                            <x-row-column :column="2">
                                <x-slot name='column1'>
                                    <h5 class="text-info">Konfirmasi Ya atau Tidak</h5>
                                    <code>
                                        &lt;x-button href="#" icon="sign-out-alt" id="ya-atau-tidak"
                                        data-title="Konfirmasi"
                                        data-message="Apakah Anda yakin ingin logout?" data-redirect-url="/"
                                        title="Logout"
                                        :label="__('Logout')" /&gt;
                                    </code>
                                    <hr>
                                    HTML :
                                    <pre>
&lt;a href="#" id="ya-atau-tidak" data-title="Konfirmasi"
data-message="Apakah Anda yakin ingin logout?" data-redirect-url="/" title="Logout"
class="btn btn-info waves-effect waves-themed"&gt;
&lt;i class="fal  fa-sign-out-alt mr-2"&gt;&lt;/i&gt;
Logout
&lt;/a&gt;
                                    </pre>
                                    <x-button href="#" icon="sign-out-alt" id="ya-atau-tidak"
                                        data-title="Konfirmasi" data-message="Apakah Anda yakin ingin logout?"
                                        data-redirect-url="/" title="Logout" :label="__('Logout')" />
                                </x-slot>
                                <x-slot name='column2'>
                                    <h5 class="text-info">Pemberitahuan</h5>
                                    <code>
                                        &lt;x-button href="#" icon="save" color="info" id="eksekusi"
                                        data-title="Informasi !!" data-message="Data sukses di simpan"
                                        data-redirect-url="/dashboard" title="Simpan" :label="__('Simpan')" /&gt;
                                    </code>
                                    <hr>
                                    HTML :
                                    <pre>
&lt;a href="#" id="eksekusi" data-title="Informasi !!"
data-message="Data sukses di simpan" data-redirect-url="/dashboard" title="Simpan"
class="btn btn-info waves-effect waves-themed"&gt;
&lt;i class="fal  fa-save mr-2"&gt;&lt;/i&gt;
Simpan
&lt;/a&gt;
                                    </pre>
                                    <x-button href="#" icon="save" color="info" id="eksekusi"
                                        data-title="Informasi !!" data-message="Data sukses di simpan"
                                        data-redirect-url="/dashboard" title="Simpan" :label="__('Simpan')" />
                                </x-slot>
                            </x-row-column>


                        </div>
                        <div class="tab-pane fade" id="tab10" role="tabpanel">
                            <x-row-column :column="4">
                                <x-slot name='column1'>
                                    <code>
                                        &lt;x-button color="success" size="sm" :label="__('Success')"
                                        onclick="showToast('Success','Data sukses di simpan', 'success')" /&gt;
                                    </code>
                                    <hr>
                                    <x-button color="success" size="sm" :label="__('Success')"
                                        onclick="showToast('Success','Data sukses di simpan', 'success')" />
                                </x-slot>
                                <x-slot name='column2'>
                                    <code>
                                        &lt;x-button color="info" size="sm" :label="__('Info')"
                                        onclick="showToast('Info','Data telah di hapus', 'info')" /&gt;
                                    </code>
                                    <hr>
                                    <x-button color="info" size="sm" :label="__('Info')"
                                        onclick="showToast('Info','Data telah di hapus', 'info')" />
                                </x-slot>
                                <x-slot name='column3'>
                                    <code>
                                        &lt;x-button color="danger" size="sm" :label="__('Error')"
                                        onclick="showToast('Error','Ada Masalah', 'error')" /&gt;
                                    </code>
                                    <hr>
                                    <x-button color="danger" size="sm" :label="__('Error')"
                                        onclick="showToast('Error','Ada Masalah', 'error')" />
                                </x-slot>
                                <x-slot name='column4'>
                                    <code>
                                        &lt;x-button color="warning" size="sm" :label="__('Warning')"
                                        onclick="showToast('Warning','Mohon di perhatikan', 'warning')" /&gt;
                                    </code>
                                    <hr>
                                    <x-button color="warning" size="sm" :label="__('Warning')"
                                        onclick="showToast('Warning','Mohon di perhatikan', 'warning')" />
                                </x-slot>
                            </x-row-column>
                        </div>
                    </x-tabs-pills>
                    @php
                        $markdownContent = file_get_contents(resource_path('/data/button.md'));
                    @endphp
                    <pre>
                        {!! htmlspecialchars($markdownContent) !!}
                    </pre>
                </x-panel.show>
            </x-slot>
        </x-row-column>
    </main>
@endsection
@section('pages-script')
    <script src="/admin/js/notifications/toastr/toastr.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 100,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "infoSound": '',
                "successSound": '',
                "warningSound": '',
                "errorSound": '',
                "pusherSound": '',
            }

            // Fungsi untuk menampilkan pemberitahuan Toastr
            window.showToast = function(title, message, type) {
                toastr[type](message, title);
            }

            //showToast("Sukses!", "Ini pesan sukses", "success");
            //showToast("Informasi", "Ini pesan informasi", "info");
            //showToast("Error", "Ini pesan error", "error");
            //showToast("Peringatan", "Ini pesan peringatan", "warning");
        });
    </script>
@endsection
