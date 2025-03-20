<div class="col-12 col-md-3 border-end">
    <div class="card-body">
        <h4 class="subheader">Business settings</h4>
        <div class="list-group list-group-transparent">
            <a href="{{ route('admin.settings.index') }}"
                class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('admin/settings') ? 'active' : '' }}">General
                Settings</a>
            <a href="{{ route('admin.commission-settings.index') }}"
                class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('admin/commission-settings') ? 'active' : '' }}">Commission Settings</a>
        </div>
    </div>
</div>
