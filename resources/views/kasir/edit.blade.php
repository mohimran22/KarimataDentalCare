<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Pembayaran') }}
            </h2>
            <a href="{{ route('kasir.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-700 hover:opacity-90 text-white font-medium rounded-lg shadow transition">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

                {{-- Banner --}}
                <div class="bg-primary-700 px-8 py-6 text-white">
                    <h3 class="text-2xl font-semibold">Pembayaran Tindakan</h3>
                    <p class="mt-1 text-sm text-white/80">
                        {{ $kasir->tindakan->pasien->nama_pasien ?? 'N/A' }}
                        &middot;
                        {{ $kasir->tindakan->dokter->nama_dokter ?? 'N/A' }}
                    </p>
                </div>

                <form action="{{ route('kasir.update', $kasir->id) }}" method="POST"
                      class="p-8 space-y-6"
                      x-data="{
                          total: {{ (int) $kasir->total_biaya }},
                          dibayar: {{ (int) old('dibayar', $kasir->dibayar ?? 0) }},
                          get kembalian() { return Math.max(this.dibayar - this.total, 0); },
                          get kurang() { return Math.max(this.total - this.dibayar, 0); },
                          fmt(n) { return n ? new Intl.NumberFormat('id-ID').format(n) : ''; },
                          rp(n) { return 'Rp ' + new Intl.NumberFormat('id-ID').format(n || 0); },
                          setDibayar(e) {
                              this.dibayar = parseInt(e.target.value.replace(/\D/g, '')) || 0;
                              e.target.value = this.fmt(this.dibayar);
                          }
                      }">
                    @csrf
                    @method('PUT')

                    {{-- Error validasi --}}
                    @if ($errors->any())
                        <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
                            <ul class="list-disc ps-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Total Biaya --}}
                    <div class="bg-gray-50 border border-gray-200 rounded-xl px-6 py-5">
                        <p class="text-sm text-gray-500">Total Biaya</p>
                        <p class="mt-1 text-4xl font-bold text-primary-700">
                            Rp {{ number_format($kasir->total_biaya, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Jumlah Dibayar --}}
                    <div>
                        <label for="dibayar" class="block text-sm text-gray-600 mb-1">Jumlah Dibayar</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 start-0 flex items-center ps-4 text-gray-500 text-lg">Rp</span>
                            <input type="text" id="dibayar" inputmode="numeric" autocomplete="off"
                                   placeholder="0" required
                                   :value="fmt(dibayar)"
                                   @input="setDibayar($event)"
                                   class="w-full ps-12 pe-4 py-3 text-xl border border-gray-300 rounded-xl focus:ring-primary-700 focus:border-primary-700 transition">
                            {{-- Nilai angka murni yang dikirim ke server --}}
                            <input type="hidden" name="dibayar" :value="dibayar">
                        </div>
                    </div>

                    {{-- Kembalian / Kurang --}}
                    <div class="rounded-xl px-6 py-5 border"
                         :class="kurang > 0 ? 'bg-red-50 border-red-200' : 'bg-green-50 border-green-200'">
                        <p class="text-sm" :class="kurang > 0 ? 'text-red-600' : 'text-green-700'"
                           x-text="kurang > 0 ? 'Kurang' : 'Kembalian'"></p>
                        <p class="mt-1 text-3xl font-semibold"
                           :class="kurang > 0 ? 'text-red-600' : 'text-green-600'"
                           x-text="rp(kurang > 0 ? kurang : kembalian)"></p>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div>
                        <p class="text-sm text-gray-600 mb-2">Metode Pembayaran</p>
                        @php
                            $metodeAktif = old('metode_pembayaran', $kasir->metode_pembayaran ?? 'tunai');
                            $metodeList = ['tunai' => 'Tunai', 'qris' => 'QRIS', 'transfer' => 'Transfer', 'edc' => 'EDC'];
                        @endphp
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            @foreach ($metodeList as $value => $label)
                                <label class="cursor-pointer">
                                    <input type="radio" name="metode_pembayaran" value="{{ $value }}"
                                           class="peer sr-only" {{ $metodeAktif === $value ? 'checked' : '' }}>
                                    <div class="text-center px-4 py-3 rounded-xl border border-gray-300 text-gray-600 transition
                                                hover:bg-gray-50
                                                peer-checked:border-primary-700 peer-checked:bg-gray-100
                                                peer-checked:text-primary-700 peer-checked:font-semibold
                                                peer-focus-visible:ring-2 peer-focus-visible:ring-primary-700">
                                        {{ $label }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Aksi --}}
                    <div class="pt-2 flex items-center justify-end gap-3">
                        <a href="{{ route('kasir.index') }}"
                           class="px-6 py-2.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition">
                            Batal
                        </a>
                        <button type="submit"
                                class="px-8 py-2.5 rounded-lg bg-primary-700 hover:opacity-90 text-white font-semibold shadow-md transition">
                            Bayar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Pembayaran') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 px-4 py-6 bg-white shadow-lg rounded-lg">
        <form action="{{ route('kasir.update', $kasir->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Total Biaya -->
            <div class="mb-6">
                <label class="block text-lg font-medium text-gray-700">Total Biaya:</label>
                <div class="flex justify-between items-center">
                    <span class="text-9xl font-bold text-indigo-600">{{ number_format($kasir->total_biaya, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Jumlah Dibayar -->
            <div class="mb-6">
                <label for="dibayar" class="block text-lg font-medium text-gray-700">Jumlah Dibayar:</label>
                <input type="number" name="dibayar" id="dibayar" class="mt-1 border border-gray-300 rounded-lg p-3 w-full text-xl focus:ring-indigo-500 focus:border-indigo-500 transition-all" value="{{ old('dibayar', $kasir->dibayar) }}" required>
            </div>

            <!-- Kembalian -->
            <div class="mb-6">
                <label for="kembalian" class="block text-lg font-medium text-gray-700">Kembalian:</label>
                <input type="text" id="kembalian" class="mt-1 border border-gray-300 rounded-lg p-3 w-full bg-gray-100 text-xl font-semibold text-green-600" readonly>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-6">
                <label for="metode_pembayaran" class="block text-lg font-medium text-gray-700">Metode Pembayaran:</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="mt-1 border border-gray-300 rounded-lg p-3 w-full text-xl focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                    <option value="tunai" {{ old('metode_pembayaran', $kasir->metode_pembayaran) == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="qris" {{ old('metode_pembayaran', $kasir->metode_pembayaran) == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="transfer" {{ old('metode_pembayaran', $kasir->metode_pembayaran) == 'transfer' ? 'selected' : '' }}>Transfer</option>
                    <option value="edc" {{ old('metode_pembayaran', $kasir->metode_pembayaran) == 'edc' ? 'selected' : '' }}>EDC</option>
                </select>
            </div>

            <!-- Button Actions -->
            <div class="flex justify-between items-center">
                <a href="{{ route('kasir.index') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-lg shadow-md transition-all hover:scale-105">
                    Kembali
                </a>
                <button type="submit" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-blue font-bold py-2 px-6 rounded-lg shadow-md transition-all hover:scale-105">
                    Bayar
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let totalBiaya = @json($kasir->total_biaya);
            document.getElementById('dibayar').addEventListener('input', function () {
                let dibayar = parseFloat(this.value) || 0;
                let kembalian = dibayar - totalBiaya;
                document.getElementById('kembalian').value = kembalian >= 0 ? kembalian.toLocaleString('id-ID') : '0';
            });
        });
    </script>
</x-app-layout> --}}