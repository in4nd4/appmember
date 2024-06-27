<x-app-layout>
    {{-- Page Title --}}
    <x-page-title>Add Member</x-page-title>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
        {{-- form add data --}}
        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6">
                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" autocomplete="off">
                            <option selected disabled value="">- Select category -</option>
                            @foreach ($categories as $category)
                                <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        {{-- pesan error untuk category --}}
                        @error('category')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="mb-3 ps-xl-3">
                        <label class="form-label">Join Date <span class="text-danger">*</span></label>
                        <input type="text" name="join_date" class="form-control datepicker @error('join_date') is-invalid @enderror" value="{{ old('join_date') }}" autocomplete="off">
                        
                        {{-- pesan error untuk join date --}}
                        @error('join_date')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="text-body-tertiary mb-4-2">

            <div class="row">
                <div class="col-xl-6">
                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" autocomplete="off">
                        
                        {{-- pesan error untuk full name --}}
                        @error('full_name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" class="form-check-input" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="gender" class="form-check-input" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
                            <label class="form-check-label">Female</label>
                        </div>

                        {{-- pesan error untuk gender --}}
                        @error('gender')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
        
                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror" autocomplete="off">{{ old('address') }}</textarea>
                        
                        {{-- pesan error untuk address --}}
                        @error('address')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off">
                        
                        {{-- pesan error untuk email --}}
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3 pe-xl-3">
                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" autocomplete="off">
                        
                        {{-- pesan error untuk phone number --}}
                        @error('phone_number')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="mb-3 ps-xl-3">
                        <label class="form-label">Profile Picture <span class="text-danger">*</span></label>
                        <input type="file" accept=".jpg, .jpeg, .png" name="profile_picture" id="image" class="form-control @error('profile_picture') is-invalid @enderror" autocomplete="off">
            
                        {{-- pesan error untuk profile picture --}}
                        @error('profile_picture')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- preview profile picture --}}
                        <div class="mt-4">
                            <img id="imagePreview" src="{{ asset('images/no-image.svg') }}" class="img-thumbnail rounded-5 shadow-sm" width="50%" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="pt-4 pb-2 mt-5 border-top">
                <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                    {{-- button simpan data --}}
                    <button type="submit" class="btn btn-primary btn-action">Save</button>
                    {{-- button kembali ke halaman index --}}
                    <a href="{{ route('members.index') }}" class="btn btn-secondary btn-action">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>