<x-app-layout>
    {{-- Page Title --}}
    <x-page-title>Dashboard</x-page-title>

    {{-- tampilkan pesan selamat datang --}}
    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-3 d-block mt-xxl-n4">
                <img class="img-fluid px-xl-4 mt-xxl-n5" src="{{ asset('images/roda1.jpg') }}">
            </div>
            <div class="col-lg-9">
                <h4 class="mt-3 mt-lg-0 mb-2">Selamat datang di <strong>Kelas Sepatu Roda</strong>!</h4>
                <p class="text-muted fw-light mb-4">
                    Sepatu roda telah menjadi bagian dari aktivitas rekreasi dan olahraga yang populer di berbagai kalangan. Dari anak-anak hingga orang dewasa, meluncur dengan sepatu roda memberikan kesenangan tersendiri.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- menampilkan informasi jumlah member per kategori --}}
        @foreach ($categories as $category)
            <div class="col-lg-6 col-xl-3">
                <div class="bg-white rounded-4 shadow-sm p-4 p-lg-4-2 mb-4">
                    <div class="d-flex align-items-center justify-content-start">
                        <div class="me-4">
                            <img src="{{ asset('/storage/categories/'.$category->image) }}" class="img-thumbnail rounded-4" width="50" alt="Images">
                        </div>
                        <div>
                            <p class="text-muted mb-1"><small>Member {{ $category->name }}</small></p>
                            <h5 class="fw-bold mb-0">{{ $category->members_count }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>