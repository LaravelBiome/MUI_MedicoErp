<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Ghaya') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#accountSetting" aria-expanded="true">
          <i class="material-icons">person</i>
          <p>{{ __('Profile Settings') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="accountSetting">
          <ul class="nav">
        <!--- USER PROFILE TESTING   <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li> ----->
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'patient' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('patient.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Patient list') }}</p>
        </a>
      </li>
      <!-------calendar ------->
      <li class="nav-item{{ $activePage == 'calendar' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('calendar.index') }}">
          <i class="material-icons">calendar_today</i>
            <p>{{ __('Calendar') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
