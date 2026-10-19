<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tindakan') }}
        </h2>
    </x-slot>

    <!-- Add Select2 CSS -->
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Add jQuery and Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <div class="bg-primary-700 px-8 py-6 rounded-t-lg">
                    <h2 class="text-2xl text-white">
                        Ubah Data Tindakan
                    </h2>
                    <p class="text-blue-100 mt-1 text-sm">
                        Ubah data tindakan pasien
                    </p>
                </div>
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-700 p-4">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('tindakan.update', $tindakan->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="bg-white shadow-sm rounded-2xl border border-gray-200 p-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                <div>
                                    <label for="dokter_id" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Dokter
                                    </label>

                                    <select name="dokter_id"
                                            id="dokter_id"
                                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                            required>

                                        <option value="">Pilih Dokter</option>

                                        @foreach ($dokters as $dokter)
                                            <option value="{{ $dokter->id_dokter }}"
                                                {{ old('dokter_id', $tindakan->dokter_id) == $dokter->id_dokter ? 'selected' : '' }}>
                                                {{ $dokter->nama_dokter }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="pasien_id" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Pasien
                                    </label>

                                    <select name="pasien_id"
                                            id="pasien_id"
                                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                            required>

                                        @if($tindakan->pasien)
                                            <option value="{{ $tindakan->pasien->id_pasien }}" selected>
                                                {{ $tindakan->pasien->nama_pasien }}
                                            </option>
                                        @else
                                            <option value="">Pilih Pasien</option>
                                        @endif

                                    </select>
                                </div>

                                <div>
                                    <label for="tanggal_visit" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Tanggal Visit
                                    </label>

                                    <input type="date"
                                        name="tanggal_visit"
                                        id="tanggal_visit"
                                        value="{{ old('tanggal_visit', $tindakan->tanggal_visit) }}"
                                        class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        required>
                                </div>

                                <div>
                                    <label for="jam" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Jam
                                    </label>

                                    <input type="time" name="jam" id="jam" value="{{ old('jam', $tindakan->jam) }}" class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
                                </div>

                            </div>

                            <div class="mt-6 space-y-5">

                                <div>
                                    <label for="tindakan" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Tindakan Umum
                                    </label>

                                    <textarea name="tindakan" id="tindakan" rows="3" class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ $tindakan->tindakan }}</textarea>
                                </div>

                                <div>
                                    <label for="pemakaian_obat" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Pemakaian Obat
                                    </label>

                                    <textarea name="pemakaian_obat" id="pemakaian_obat" rows="3" class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ $tindakan->pemakaian_obat }}</textarea>
                                </div>

                                <div>
                                    <label for="tindak_lanjut" class="block mb-2 text-sm font-semibold text-gray-700">
                                        Tindak Lanjut
                                    </label>

                                    <textarea name="tindak_lanjut" id="tindak_lanjut" rows="3" class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ $tindakan->tindak_lanjut }}</textarea>
                                </div>

                            </div>
                        </div>

                        {{-- Kasus --}}
                        <div class="bg-white shadow-sm rounded-2xl border border-gray-200 p-6">

                            <div class="flex items-center justify-between mb-5">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800">
                                        Kasus Tindakan
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Tambahkan detail kasus pasien
                                    </p>
                                </div>

                                <button type="button" id="add-kasus" class="bg-primary-700 hover:bg-blue-700 text-white px-4 py-2 rounded-xl transition">
                                    + Tambah Kasus
                                </button>
                            </div>

                                <div id="kasus-fields" class="space-y-4">

                                    @forelse ($tindakan->kasus as $kasus)

                                        <div class="kasus-item border border-gray-200 rounded-2xl p-4 bg-gray-50">

                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                                                <input type="text"
                                                    name="kasus[]"
                                                    value="{{ old('kasus.' . $loop->index, $kasus->kasus) }}"
                                                    placeholder="Kasus"
                                                    class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    required>

                                                <input type="text"
                                                    name="diagnosa[]"
                                                    value="{{ old('diagnosa.' . $loop->index, $kasus->diagnosa) }}"
                                                    placeholder="Diagnosa"
                                                    class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    required>

                                                <input type="text"
                                                    name="tindakan_khusus[]"
                                                    value="{{ old('tindakan_khusus.' . $loop->index, $kasus->tindakan_khusus) }}"
                                                    placeholder="Tindakan"
                                                    class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                                                <input type="text"
                                                    name="biaya[]"
                                                    value="{{ old('biaya.' . $loop->index, number_format((float) $kasus->biaya, 0, ',', '.')) }}"
                                                    placeholder="Biaya"
                                                    class="biaya-input rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    required>

                                            </div>

                                            <div class="mt-4 text-right">
                                                <button type="button"
                                                    class="remove-kasus bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">
                                                    Hapus
                                                </button>
                                            </div>

                                        </div>

                                    @empty

                                        {{-- Kalau belum ada kasus --}}
                                        <div class="kasus-item border border-gray-200 rounded-2xl p-4 bg-gray-50">

                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                                                <input type="text"
                                                    name="kasus[]"
                                                    placeholder="Kasus"
                                                    class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    required>

                                                <input type="text"
                                                    name="diagnosa[]"
                                                    placeholder="Diagnosa"
                                                    class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    required>

                                                <input type="text"
                                                    name="tindakan_khusus[]"
                                                    placeholder="Tindakan"
                                                    class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                                                <input type="text"
                                                    name="biaya[]"
                                                    placeholder="Biaya"
                                                    class="biaya-input rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    required>

                                            </div>

                                            <div class="mt-4 text-right">
                                                <button type="button"
                                                    class="remove-kasus bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">
                                                    Hapus
                                                </button>
                                            </div>

                                        </div>

                                    @endforelse

                                </div>
                        </div>

                        {{-- Footer --}}
                        <div class="flex items-center justify-end gap-3">

                            <a href="{{ route('tindakan.index') }}"
                            class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                                Batal
                            </a>

                            <button type="submit"
                                    class="bg-primary-700 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-xl shadow-sm transition">
                                Simpan
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
function formatRupiah(value) {
    let angka = String(value).replace(/\D/g, '');

    if (!angka) {
        return '';
    }

    return new Intl.NumberFormat('id-ID').format(parseInt(angka, 10));
}

function attachRupiahFormat(input) {

    input.addEventListener('input', function () {

        let angka = this.value.replace(/\D/g, '');

        this.value = angka
            ? new Intl.NumberFormat('id-ID').format(parseInt(angka, 10))
            : '';

    });

}

document.querySelectorAll('.biaya-input').forEach(input => {

    attachRupiahFormat(input);

});

document.getElementById('add-kasus').addEventListener('click', function () {

    const container = document.getElementById('kasus-fields');

    const field = document.createElement('div');

    field.className =
        'kasus-item border border-gray-200 rounded-2xl p-4 bg-gray-50';

    field.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            <input type="text"
                name="kasus[]"
                placeholder="Kasus"
                class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                required>

            <input type="text"
                name="diagnosa[]"
                placeholder="Diagnosa"
                class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                required>

            <input type="text"
                name="tindakan_khusus[]"
                placeholder="Tindakan"
                class="rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

            <input type="text"
                name="biaya[]"
                placeholder="Biaya"
                class="biaya-input rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                required>

        </div>

        <div class="mt-4 text-right">

            <button type="button"
                class="remove-kasus bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">
                Hapus
            </button>

        </div>
    `;

    container.appendChild(field);

    attachRupiahFormat(
        field.querySelector('.biaya-input')
    );

});

document.getElementById('kasus-fields').addEventListener('click', function (e) {

    if (e.target.classList.contains('remove-kasus')) {

        const item = e.target.closest('.kasus-item');

        if (item) {
            item.remove();
        }

    }

});
</script>
</x-app-layout>
<script>
$(document).ready(function () {

    $('#dokter_id').select2({
        placeholder: 'Pilih Dokter',
        width: '100%',
        allowClear: true
    });

    $('#pasien_id').select2({

        placeholder: 'Pilih Pasien',
        allowClear: true,
        width: '100%',

        ajax: {

            url: "{{ route('autocomplete-pasien') }}",
            dataType: 'json',
            delay: 250,

            data: function (params) {

                return {
                    q: params.term,
                    dokter_id: $('#dokter_id').val()
                };

            },

            processResults: function (data) {

                return {

                    results: $.map(data, function (item) {

                        return {
                            id: item.id_pasien,
                            text: item.nama_pasien
                        };

                    })

                };

            },

            cache: true
        }

    });

});
</script>