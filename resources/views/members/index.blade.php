<x-app-layout>
    {{-- Page Title --}}
    <x-page-title>Members</x-page-title>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <div class="row">
            <div class="d-grid d-lg-block col-lg-5 col-xl-6 mb-4 mb-lg-0">
                {{-- button form add data --}}
                <a href="{{ route('members.create') }}" class="btn btn-primary btn-action-icon">
                    <i class="ti ti-plus me-2"></i> Add Member
                </a>
            </div>
            <div class="col-lg-7 col-xl-6">
                {{-- form pencarian --}}
                <form action="{{ route('members.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-search" value="{{ request('search') }}" placeholder="Search member ..." autocomplete="off">
                        <button class="btn btn-primary btn-search" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        @forelse ($members as $member)
            {{-- jika data ada, tampilkan data --}}
            <div class="col-lg-6 col-xl-3">
                <div class="bg-white rounded-4 shadow-sm text-center p-4 p-lg-4-2 mb-4">
                    <div class="mb-4">
                        <img src="{{ asset('/storage/members/'.$member->profile_picture) }}" class="img-thumbnail rounded-5" width="110" alt="Images">
                    </div>
                    <h6>{{ $member->full_name }}</h6>
                    <p class="text-muted mb-4">Member {{ $member->category->name }}</p>
                    {{-- button form detail data --}}
                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-primary btn-action-icon">
                        Detail <i class="ti ti-chevron-right ms-2"></i>
                    </a>
                </div>
            </div>
        @empty
            {{-- jika data tidak ada, tampilkan pesan data tidak tersedia --}}
            <div class="col">
                <div class="alert alert-primary rounded-4 d-flex align-items-center" role="alert">
                    <i class="ti ti-info-circle fs-5 me-2"></i>
                    <div>No data available.</div>
                </div>
            </div>
        @endforelse
    </div>

    {{-- pagination --}}
    <div class="pagination-links mb-4">{{ $members->links() }}</div>
</x-app-layout>