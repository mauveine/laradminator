
<li class="nav-item mT-30">
    <a class="sidebar-link {{ parse_route('dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="fas fa-home"></i>
        </span>
        <span class="title">{{ __('basic.home_title') }}</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ parse_route('posts') ? 'active' : '' }}" href="{{ route(ADMIN . '.posts') }}">
        <span class="icon-holder">
            <i class="fas fa-layer-group"></i>
        </span>
        <span class="title">{{ __('basic.posts_title') }}</span>
    </a>
</li>
