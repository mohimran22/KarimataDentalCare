<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Detail Transaksi Kasir') }}
            </h2>
            <a href="{{ route('kasir.index') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-700 hover:opacity-90 text-white font-medium rounded-lg shadow transition">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

                {{-- Banner --}}
                <div class="bg-primary-700 px-8 py-6 text-white">
                    <h3 class="text-2xl font-semibold">
                        Transaksi {{ $kasir->tindakan->pasien->nama_pasien ?? 'N/A' }}
                    </h3>
                    <p class="mt-1 text-sm text-white/80">Detail transaksi kasir</p>
                </div>

                <div class="p-8">
                    {{-- Info grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">
                            <p class="text-sm text-gray-500">Dokter</p>
                            <p class="mt-1 text-lg text-gray-900">
                                {{ $kasir->tindakan->dokter->nama_dokter ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">
                            <p class="text-sm text-gray-500">Pasien</p>
                            <p class="mt-1 text-lg text-gray-900">
                                {{ $kasir->tindakan->pasien->nama_pasien ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">
                            <p class="text-sm text-gray-500">Tanggal Visit</p>
                            <p class="mt-1 text-lg text-gray-900">
                                {{ \Carbon\Carbon::parse($kasir->tindakan->tanggal_visit)->translatedFormat('d M Y') }}
                            </p>
                        </div>

                        <div class="bg-gray-50 border border-gray-200 rounded-xl px-5 py-4">
                            <p class="text-sm text-gray-500">Metode Pembayaran</p>
                            <p class="mt-1 text-lg text-gray-900">
                                {{ $kasir->metode_pembayaran ?? '-' }}
                            </p>
                        </div>
                    </div>

                    {{-- Ringkasan pembayaran --}}
                    <h4 class="mt-10 mb-4 text-lg text-gray-800">Ringkasan Pembayaran</h4>
                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-600">Keterangan</th>
                                    <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wide text-gray-600 text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Total Biaya</td>
                                    <td class="px-6 py-4 text-right text-primary-700 font-medium">
                                        Rp {{ number_format($kasir->total_biaya, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">Dibayar</td>
                                    <td class="px-6 py-4 text-right text-primary-700 font-medium">
                                        Rp {{ number_format($kasir->dibayar, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 text-gray-900 font-semibold">Kembalian</td>
                                    <td class="px-6 py-4 text-right text-green-600 font-semibold">
                                        Rp {{ number_format($kasir->kembalian, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>