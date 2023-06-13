@extends('guru/guru_master')
@section('konten')
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    </style>
    <div class="bg-gray-100">
        <div class="w-full text-white bg-main-color">
            <!-- Right Side -->
            <div class="w-full mx-2">
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
                            @php $isFirstRow = true; @endphp
                            @foreach ($kerawanandetail as $kerawanan)
                                @if ($isFirstRow)
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Nama Murid</div>
                                        <div class="px-4 py-2">{{ $kerawanan->murid->name }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Nipd</div>
                                        <div class="px-4 py-2">{{ $kerawanan->murid->nipd }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Kelas</div>
                                        <div class="px-4 py-2">{{ $kerawanan->murid->kelas->tingkat_kelas }}
                                            {{ $kerawanan->murid->kelas->jurusan }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Guru Pembimbing</div>
                                        <div class="px-4 py-2">{{ $kerawanan->gurus->name }}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">WaliKelas</div>
                                        <div class="px-4 py-2">{{ $kerawanan->walass->name_guru }}</div>
                                    </div>
                                @endif
                                @php $isFirstRow = false; @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="">
                        <div class="flex justify-center block w-full text-gray-900 text-lg font-bold rounded-lg p-2 my-4">
                            Kerawanan
                        </div>
    
                        @foreach ($kerawanandetail as $kerawanan)
                            <button
                                class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 shadow-xs p-3 my-4">
                                <div class="text-teal-600" style="font-weight: bold;">-
                                    {{ $kerawanan->jeniskerawanan->jenis_kerawanan }}</div>
                            </button>
                        @endforeach
                        <div class="flex justify-center block w-full text-gray-900 text-lg font-bold rounded-lg p-2 my-4">
                            Kesimpulan
                        </div>
                        <button
                            class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-100 shadow-xs p-3 my-4">
                            @php $isFirstRow = true; @endphp
                            @foreach ($kerawanandetail as $item)
                                @if ($isFirstRow)
                                    @if ($item->kesimpulan == null)
                                        <p>
                                            Belum ada data hasil dari konseling ini.
                                        </p>
                                    @else
                                        <div style="font-weight: bold;">" {{ $item->kesimpulan }} "</div>
                                    @endif
                                    @php $isFirstRow = false; @endphp
                                @endif
                            @endforeach
                        </button>
                    </div>
                    </div>
                <!-- End of about section -->

                {{-- <div class="bg-gray-100">
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
                        <span class="tracking-wide">Detail</span>
                    </div>
                    <div class="text-gray-700">
                        @php $isFirstRow = true; @endphp
                        @foreach ($kerawanandetail as $kerawanan)
                            @if ($isFirstRow)
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Name</div>
                                    <div class="px-4 py-2">{{ $kerawanan->murid->name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nipd</div>
                                    <div class="px-4 py-2">{{ $kerawanan->murid->nipd }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Kelas</div>
                                    <div class="px-4 py-2">{{ $kerawanan->murid->kelas->tingkat_kelas }}
                                        {{ $kerawanan->murid->kelas->jurusan }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Guru Bk</div>
                                    <div class="px-4 py-2">{{ $kerawanan->gurus->name }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">WaliKelas.</div>
                                    <div class="px-4 py-2">{{ $kerawanan->walass->name_guru }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800">{{ $kerawanan->murid->email }}</a>
                                    </div>
                                </div>
                            </div>

                            @endif
                        @php $isFirstRow = false; @endphp
                        @endforeach
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Kerawanan</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                @foreach ($kerawanandetail as $kerawanan)
                                <li>
                                    <div class="text-teal-600" style="font-weight: bold;">- {{ $kerawanan->jeniskerawanan->jenis_kerawanan }}</div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Kesimpulan</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                @php $isFirstRow = true; @endphp
                                @foreach ($kerawanandetail as $item)
                                @if ($isFirstRow)
                                    <li>
                                        <div class="text-teal-600" style="font-weight: bold;">" {{ $item->kesimpulan }} "</div>
                                    </li>
                                    @php $isFirstRow = false; @endphp
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
    </div> --}}
            @endsection
