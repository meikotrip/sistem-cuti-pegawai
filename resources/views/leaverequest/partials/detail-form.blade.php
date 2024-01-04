<section>
    <form class="space-y-6">
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" name="name" type="text" value="{{ Auth::user()->name }}" class="mt-1 block w-full" disabled/>
        </div>

        <div>
            <x-input-label for="idDivisi" :value="__('Divisi')" />
            <select id="idDivisi" name="idDivisi" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" disabled autofocus>
                <option value="1" {{ $data['idDivisi'] === 1 ? 'selected' : '' }}>Redaksi</option>
                <option value="2" {{ $data['idDivisi'] === 2 ? 'selected' : '' }}>IT</option>
                <option value="3" {{ $data['idDivisi'] === 3 ? 'selected' : '' }} >Iklan</option>
                <option value="4" {{ $data['idDivisi'] === 4 ? 'selected' : '' }} >Keuangan</option>
                <option value="5" {{ $data['idDivisi'] === 5 ? 'selected' : '' }} >Video Editor</option>
            </select>
            <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tanggalMulai" :value="__('Tanggal Mulai')" />
            <x-text-input id="tanggalMulai" name="tanggalMulai" type="date" value="{{ $data['tanggalMulai'] }}" class="mt-1 block w-full" disabled/>
            <x-input-error :messages="$errors->get('tanggalMulai')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="tanggalAkhir" :value="__('Tanggal Akhir')" />
            <x-text-input id="tanggalAkhir" name="tanggalAkhir" type="date" value="{{ $data['tanggalAkhir'] }}" class="mt-1 block w-full" disabled/>
            <x-input-error :messages="$errors->get('tanggalAkhir')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" name="alamat" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" disabled>{{ $data['alamat'] }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="alasanCuti" :value="__('Alasan Cuti')" />
            <textarea id="alasanCuti" name="alasanCuti" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" disabled>{{ $data['alasanCuti'] }}</textarea>
            <x-input-error :messages="$errors->get('alasanCuti')" class="mt-2" />
        </div>
    </form>
</section>
