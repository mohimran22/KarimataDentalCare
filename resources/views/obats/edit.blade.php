<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Obat') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4">
        {{-- Menampilkan pesan sukses jika ada --}}
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="px-4 py-3">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Ubah Data Obat
                        </h3>

                        <form action="{{ route('obats.update', $obat->id_obat) }}" method="POST" class="mt-4">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                                {{-- <div>
                                    <label for="id_obat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID</label>
                                    <input type="text" name="id_obat" id="id_obat" value="{{ old('id_obat') }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('id_obat') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                {{-- Nama Obat --}}
                                <div>
                                    <label for="nama_obat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Obat</label>
                                    <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('nama_obat') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Merk --}}
                                <div>
                                    <label for="merk" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Merk</label>
                                    <input type="text" name="merk" id="merk" value="{{ old('merk', $obat->merk) }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('merk') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Ukuran --}}
                                <div>
                                    <label for="ukuran" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ukuran</label>
                                    <input type="text" name="ukuran" id="ukuran" value="{{ old('ukuran', $obat->ukuran) }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('ukuran') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Harga Beli --}}
                                <div>
                                    <label for="harga_beli" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Beli</label>
                                    <input type="text" name="harga_beli" id="harga_beli" value="{{ old('harga_beli', $obat->harga_beli) }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('harga_beli') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Tanggal Beli --}}
                                <div>
                                    <label for="tanggal_beli" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Beli</label>
                                    <input type="date" name="tanggal_beli" id="tanggal_beli" value="{{ old('tanggal_beli', $obat->tanggal_beli) }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('tanggal_beli') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Supplier --}}
                                <div>
                                    <label for="supplier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Supplier</label>
                                    <input type="text" name="supplier" id="supplier" value="{{ old('supplier', $obat->supplier) }}" class="mt-1 block w-full p-2.5 text-gray-900 bg-white rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    @error('supplier') 
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end gap-3">

                                <a href="{{ route('obats.index') }}"
                                class="px-5 py-3 rounded-xl border border-gray-300 text-black-400 hover:bg-gray-100 transition">
                                    Batal
                                </a>

                                <button type="submit"
                                        class="px-6 py-3 rounded-xl bg-primary-700 text-white shadow-md hover:bg-primary-800 transition">
                                    Simpan Data
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>