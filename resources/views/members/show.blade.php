<x-app-layout>
    {{-- Page Title --}}
    <x-page-title>Detail Member</x-page-title>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <div class="d-grid gap-3 d-sm-flex flex-sm-row-reverse">
            <div class="d-grid gap-3 d-sm-flex">
                {{-- button form edit data --}}
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-action-icon">
                    <i class="ti ti-edit me-2"></i> Edit
                </a>
                {{-- button modal hapus data --}}
                <button type="button" class="btn btn-danger btn-action-icon" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $member->id }}"> 
                    <i class="ti ti-trash me-2"></i> Delete
                </button>
            </div>
            {{-- button kembali ke halaman index --}}
            <a href="{{ route('members.index') }}" class="btn btn-secondary btn-action-icon me-sm-auto">
                <i class="ti ti-chevron-left me-2"></i> Close
            </a>
        </div>
    </div>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
        {{-- tampilkan detail data --}}
        <div class="d-flex flex-column flex-xl-row">
            <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
                <img src="{{ asset('/storage/members/'.$member->profile_picture) }}" class="img-thumbnail rounded-5 shadow-sm" width="200" alt="Profile Picture">
            </div>
            <div class="flex-grow-1 ms-xl-5">
                <div class="table-responsive">
                    <table class="table table-striped lh-lg">
                        <tr>
                            <td width="180">Category</td>
                            <td width="10">:</td>
                            <td>{{ $member->category->name }}</td>
                        </tr>
                        <tr>
                            <td>Join Date</td>
                            <td>:</td>
                            <td>{{ date('F j, Y', strtotime($member->join_date)) }}</td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td>:</td>
                            <td>{{ $member->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>{{ $member->gender }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{ $member->address }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $member->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>:</td>
                            <td>{{ $member->phone_number }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal hapus data --}}
    <div class="modal fade" id="modalDelete{{ $member->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <i class="ti ti-trash me-2"></i> Delete Member
                    </h1>
                </div>
                <div class="modal-body">
                    {{-- informasi data yang akan dihapus --}}
                    <p class="mb-2">
                        Are you sure to delete <span class="fw-medium mb-2">{{ $member->full_name }}</span>?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-action-icon" data-bs-dismiss="modal">Cancel</button>
                    {{-- button hapus data --}}
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-action-icon"> Yes, delete it! </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>