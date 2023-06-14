@extends('murid/murid_dashboard')
@section('konten')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <div class="bg-gray-100">
        <div class="w-full text-white bg-main-color">
            <!-- Right Side -->
            <div class="w-full mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">Detail Jadwal Konsultasi</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nama Murid</div>
                                <div class="px-4 py-2">{{ $getdetail->murids->name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Tema</div>
                                <div class="px-4 py-2">{{ $getdetail->tema }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Status</div>
                                @if ($getdetail->status == 'complete')
                                    <div class="px-4 py-2"><span class="badge badge-info">{{ $getdetail->status }}d</span>
                                    </div>
                                @endif
                                @if ($getdetail->status == 'pending')
                                <div class="px-4 py-2"><span class="badge badge-danger">{{ $getdetail->status }}</span>
                                </div>
                                @endif
                                @if ($getdetail->status == 'accept')
                                <div class="px-4 py-2"><span class="badge badge-success">{{ $getdetail->status }}ed</span>
                                </div>
                            @endif
                            @if ($getdetail->status == 'reschedule')
                                <div class="px-4 py-2"><span class="badge badge-warning">{{ $getdetail->status }}d</span>
                                </div>
                            @endif
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Layanan</div>
                                <div class="px-4 py-2">{{ $getdetail->layanan->jenis_layanan }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Guru Pembimbing</div>
                                <div class="px-4 py-2">{{ $getdetail->guru->name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Keluhan</div>
                                <div class="px-4 py-2">{{ $getdetail->keluhan }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Wali Kelas</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800"
                                        href="mailto:jane@example.com">{{ $getdetail->walass->name_guru }}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Tanggal & Tempat</div>
                                <div class="px-4 py-2">{{ \Carbon\Carbon::parse($getdetail->tanggal_konseling)->format('D m/Y')}} {{ \Carbon\Carbon::parse($getdetail->tanggal_konseling)->format('h:i A')}} {{$getdetail->tempat}} </div>
                            </div>
                        </div>
                    </div>
                    @if ($getdetail->layanan->jenis_layanan != 'Bimbingan Belajar')
                    <div class="flex justify-center block w-full text-gray-900 text-lg font-bold rounded-lg p-2 my-4">
                        HASIL KONSELING
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 shadow-xs p-3 my-4">
                        @if ($getdetail->hasil_konseling == null)
                        Belum ada data hasil dari konseling ini.
                        @endif
                        @if ($getdetail->hasil_konseling != null)    
                        {{ $getdetail->hasil_konseling }}
                        @endif
                    </button>
                    @endif


                    @if ($getdetail->layanan->jenis_layanan == 'Bimbingan Belajar')
                         <div class="flex justify-center block w-full text-gray-900 text-lg font-bold rounded-lg p-2 my-4">
                        HASIL KONSELING
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 shadow-xs p-3 my-4">
                        @if ($getdetail->hasil_konseling == null)
                        Belum ada data hasil dari konseling ini.
                        @endif
                        @if ($getdetail->hasil_konseling != null)  
                        {{ $getdetail->hasil_konseling }}
                        @endif
                    </button>
                    <div class="flex justify-center block w-full text-gray-900 text-lg font-bold rounded-lg p-2 my-4">
                        KESIMPULAN WALI KELAS
                    </div>
                    <button
                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 shadow-xs p-3 my-4">
                        @if ($getdetail->kesimpulan == null)
                        Belum ada data hasil dari konseling ini.
                        @endif
                        @if ($getdetail->kesimpulan != null)    
                        {{ $getdetail->kesimpulan }}
                        @endif
                    </button>
                    @endif
                </div>
                <!-- End of about section -->
            @endsection