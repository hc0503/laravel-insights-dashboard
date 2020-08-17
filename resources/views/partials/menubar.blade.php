
<div id="sidebar-menu">
    <ul class="metismenu" id="side-menu">
        <li class="menu-title">@lang('global.title')</li>
        <li>
            <a href="#">
                <i class="fe-users"></i>
                <span> {{ trans('cruds.userManagement.title') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="fe-user"></i>
                        <span> {{ trans('cruds.user.title') }} </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('permissions.index') }}">
                        <i class="fe-unlock"></i>
                        <span> {{ trans('cruds.permission.title') }} </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i class="fe-briefcase"></i>
                        <span> {{ trans('cruds.role.title') }} </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fe-grid"></i>
                <span> @lang('global.business') </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li>
                    <a href="{{ route('detections.index') }}">
                        <i class="fe-activity"></i>
                        <span> @lang('global.detections') </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tags.index') }}">
                        <i class="fe-tag"></i>
                        <span> @lang('global.tags') </span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>