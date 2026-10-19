{{-- resources/views/dokters/edit.blade.php --}}  
<x-app-layout>  
    <x-slot name="header">  
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">  
            {{ __('Edit Dokter') }}  
        </h2>  
    </x-slot>  
  
    <div class="py-12">  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">  
                <div class="p-6 bg-white border-b border-gray-200">  
                    <form action="{{ route('dokters.update', $dokter) }}" method="POST">  
                        @csrf  
                        @method('PUT')  
                        <div class="form-group">  
                            <label for="user_id">User ID</label>  
                            <input type="text" name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $dokter->user_id) }}">  
                            @error('user_id')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="nama_dokter">Nama Dokter</label>  
                            <input type="text" name="nama_dokter" id="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" value="{{ old('nama_dokter', $dokter->nama_dokter) }}">  
                            @error('nama_dokter')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="role">Role</label>  
                            <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $dokter->role) }}">  
                            @error('role')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="nip">NIP</label>  
                            <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $dokter->nip) }}">  
                            @error('nip')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="alamat">Alamat</label>  
                            <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $dokter->alamat) }}">  
                            @error('alamat')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="tanggal_lahir">Tanggal Lahir</label>  
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $dokter->tanggal_lahir) }}">  
                            @error('tanggal_lahir')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="nik">NIK</label>  
                            <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $dokter->nik) }}">  
                            @error('nik')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="nohp">No HP</label>  
                            <input type="text" name="nohp" id="nohp" class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp', $dokter->nohp) }}">  
                            @error('nohp')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <div class="form-group">  
                            <label for="penghasilan">Penghasilan</label>  
                            <input type="number" name="penghasilan" id="penghasilan" class="form-control @error('penghasilan') is-invalid @enderror" value="{{ old('penghasilan', $dokter->penghasilan) }}">  
                            @error('penghasilan')  
                                <div class="invalid-feedback">{{ $message }}</div>  
                            @enderror  
                        </div>  
                        <button type="submit" class="btn btn-primary">Simpan</button>  
                        <a href="{{ route('dokters.index') }}" class="btn btn-secondary">Kembali</a>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div> 
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('dokters.store') }}" method="POST" class="space-y-6">
                        @csrf
                                @if ($errors->any())
                                <div class="bg-red-500 text-white p-4 rounded mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('password') border-red-500 @enderror"
                                value="{{ old('password') }}">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                            <input type="text" name="nik" id="nik" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('nik') border-red-500 @enderror"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="nama_dokter" class="block text-sm font-medium text-gray-700">Nama Dokter</label>
                            <input type="text" name="nama_dokter" id="nama_dokter" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('nama_dokter') border-red-500 @enderror"
                                value="{{ old('nama_dokter') }}">
                            @error('nama_dokter')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        
                        <div>
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                            <input type="text" name="nip" id="nip" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('nip') border-red-500 @enderror"
                                value="{{ old('nip') }}">
                            @error('nip')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <input type="text" name="alamat" id="alamat" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('alamat') border-red-500 @enderror"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('tanggal_lahir') border-red-500 @enderror"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                       
                        <div>
                            <label for="nohp" class="block text-sm font-medium text-gray-700">No HP</label>
                            <input type="text" name="nohp" id="nohp" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('nohp') border-red-500 @enderror"
                                value="{{ old('nohp') }}">
                            @error('nohp')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jadwalpraktik" class="block text-sm font-medium text-gray-700">Jadwal Praktik</label>
                            <input type="text" name="jadwalpraktik" id="jadwalpraktik" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('nohp') border-red-500 @enderror"
                                value="{{ old('jadwalpraktik') }}">
                            @error('jadwalpraktik')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                     
                        <div class="flex justify-end">
                            <button type="submit" 
                                class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</x-app-layout>  
    {{-- <div class="container mx-auto mt-4">

        <form action="{{ route('dokters.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="bg-white shadow-sm rounded-2xl border border-gray-200 p-6">

                <div class="mb-6">
                    <p class="text-sm text-black-400 mt-1">
                        Input data dokter
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-xl bg-red-50 border border-red-200 p-4">
                        <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            Email
                        </label>

                        <input type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-500 @enderror">

                        @error('email')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            Password
                        </label>

                        <input type="password"
                            name="password"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 @error('password') border-red-500 @enderror">

                        @error('password')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            NIK
                        </label>

                        <input type="text"
                            name="nik"
                            value="{{ old('nik') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            Nama Dokter
                        </label>

                        <input type="text"
                            name="nama_dokter"
                            value="{{ old('nama_dokter') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            NIP
                        </label>

                        <input type="text"
                            name="nip"
                            value="{{ old('nip') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            Tanggal Lahir
                        </label>

                        <input type="date"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            No HP
                        </label>

                        <input type="text"
                            name="nohp"
                            value="{{ old('nohp') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm text-black-400">
                            Jadwal Praktik
                        </label>

                        <input type="text"
                            name="jadwalpraktik"
                            value="{{ old('jadwalpraktik') }}"
                            placeholder="Senin - Jumat, 08:00 - 14:00"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                </div>

                <div class="mt-5">
                    <label class="block mb-2 text-sm text-black-400">
                        Alamat
                    </label>

                    <textarea name="alamat"
                            rows="3"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('alamat') }}</textarea>
                </div>
            </div>
            <div class="flex items-center justify-end gap-3">

                <a href="{{ route('dokters.index') }}"
                class="px-5 py-2.5 rounded-xl border border-gray-300 text-black-700 hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl shadow-sm transition">
                    Simpan
                </button>

            </div>

        </form>

    </div> --}}


        <div class="container mx-auto mt-4">
            {{-- Menampilkan pesan error jika ada --}}
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <form action="{{ route('pasiens.update', $pasien->id_pasien) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- <div class="mb-4">
                        <label for="id_pasien" class="block text-gray-700 text-sm font-bold mb-2">ID Pasien:</label>
                        <input type="text" id="id_pasien" name="id_pasien" value="{{ old('id_pasien', $pasien->id_pasien) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div> --}}

                    <div class="mb-4">
                        <label for="nama_pasien" class="block text-gray-700 text-sm font-bold mb-2">Nama Pasien:</label>
                        <input type="text" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin:</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="alamat_pasien" class="block text-gray-700 text-sm font-bold mb-2">Alamat Pasien:</label>
                        <textarea id="alamat_pasien" name="alamat_pasien" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('alamat_pasien', $pasien->alamat_pasien) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="profesi" class="block text-gray-700 text-sm font-bold mb-2">Profesi:</label>
                        <input type="text" id="profesi" name="profesi" value="{{ old('profesi', $pasien->profesi) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">NIK:</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik', $pasien->nik) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="nohp" class="block text-gray-700 text-sm font-bold mb-2">No HP:</label>
                        <input type="text" id="nohp" name="nohp" value="{{ old('nohp', $pasien->nohp) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="alergi" class="block text-gray-700 text-sm font-bold mb-2">Alergi:</label>
                        <textarea id="alergi" name="alergi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('alergi', $pasien->alergi) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan
                        </button>
                        <a href="{{ route('pasiens.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>

{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links (Desktop Version) -->
                <div class="hidden sm:flex space-x-8 sm:-my-px sm:ms-10">
                    @if(auth()->check() && session('user_role') == 'dokter')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pasiens.index')" :active="request()->routeIs('pasiens.*')">
                            {{ __('Pasien') }}
                        </x-nav-link>
                        <x-nav-link :href="route('tindakan.index')" :active="request()->routeIs('tindakan.*')">
                            {{ __('Tindakan') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->check() && session('user_role') == 'manager')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('dokters.index')" :active="request()->routeIs('dokters.*')">
                            {{ __('Dokter') }}
                        </x-nav-link>
                        <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.*')">
                            {{ __('Role') }}
                        </x-nav-link>
                        <x-nav-link :href="route('tindakan.index')" :active="request()->routeIs('tindakan.*')">
                            {{ __('Tindakan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('obats.index')" :active="request()->routeIs('obats.*')">
                            {{ __('Obat') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pasiens.index')" :active="request()->routeIs('pasiens.*')">
                            {{ __('Pasien') }}
                        </x-nav-link>
                        <x-nav-link :href="route('kasir.index')" :active="request()->routeIs('kasir.*')">
                            {{ __('Kasir') }}
                        </x-nav-link>
                        <x-nav-link :href="route('laporan-keuangan')" :active="request()->routeIs('laporan-keuangan')">
                            {{ __('Keuangan') }}
                        </x-nav-link>
                    @endif

                    @if(auth()->check() && session('user_role') == 'admin')
                        <!-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }} -->
                        </x-nav-link>
                        <x-nav-link :href="route('obats.index')" :active="request()->routeIs('obats.*')">
                            {{ __('Obat') }}
                        </x-nav-link>
                        <x-nav-link :href="route('pasiens.index')" :active="request()->routeIs('pasiens.*')">
                            {{ __('Pasien') }}
                        </x-nav-link>
                        <x-nav-link :href="route('kasir.index')" :active="request()->routeIs('kasir.*')">
                            {{ __('Kasir') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div x-show="open" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Add the same links you want to display on mobile, like in desktop version -->
            @if(auth()->check() && session('user_role') == 'dokter')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pasiens.index')" :active="request()->routeIs('pasiens.*')">
                    {{ __('Pasien') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tindakan.index')" :active="request()->routeIs('tindakan')">
                    {{ __('Tindakan') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->check() && session('user_role') == 'manager')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dokters.index')" :active="request()->routeIs('dokters.*')">
                    {{ __('Dokter') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tindakan.index')" :active="request()->routeIs('tindakan')">
                    {{ __('Tindakan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('obats.index')" :active="request()->routeIs('obats.*')">
                    {{ __('Obat') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pasiens.index')" :active="request()->routeIs('pasiens.*')">
                    {{ __('Pasien') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('kasir.index')" :active="request()->routeIs('kasir.*')">
                    {{ __('Kasir') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('laporan-keuangan')" :active="request()->routeIs('laporan-keuangan.*')">
                    {{ __('Keuangan') }}
                </x-responsive-nav-link>
            @endif

            @if(auth()->check() && session('user_role') == 'admin')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('obats.index')" :active="request()->routeIs('obats.*')">
                    {{ __('Obat') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pasiens.index')" :active="request()->routeIs('pasiens.*')">
                    {{ __('Pasien') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('kasir.index')" :active="request()->routeIs('kasir.*')">
                    {{ __('Kasir') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}