<section class="sidebar d-none d-md-block text-white shadow-sm">
    {{-- Brand --}}
    <div class="sidebar-brand text-center mb-5">
        {{-- Logo --}}
        <img src="{{ asset('images/roda1.jpg') }}" alt="Logo">
        {{-- Title --}}
        <h5 class="mt-4 mb-3"> ROLLER SKATE</h5>
    </div>
    {{-- Sidebar Menu --}}
    <div class="sidebar-menu">
        <x-sidebar-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <i class="ti ti-layout-dashboard fs-4 me-3"></i>
            <span>Dashboard</span>
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('members.index') }}" :active="request()->routeIs('members.*')">
            <i class="ti ti-users fs-4 me-3"></i>
            <span>Members</span>
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.*')">
            <i class="ti ti-list-details fs-4 me-3"></i>
            <span>Categories</span>
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('report.index') }}" :active="request()->routeIs('report.*')">
            <i class="ti ti-file-text fs-4 me-3"></i>
            <span>Report</span>
        </x-sidebar-link>
        <x-sidebar-link href="{{ route('about') }}" :active="request()->routeIs('about')">
            <i class="ti ti-file-info fs-4 me-3"></i>
            <span>About</span>
        </x-sidebar-link>
    </div>
</section>