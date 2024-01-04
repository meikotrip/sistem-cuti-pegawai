<section>
    <form method="post" action="{{ route('kahrd.leave-request.edit', $data['idLR']) }}" class="space-y-6">
        @csrf
            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" name="name" type="text" value="{{ $data['name'] }}" class="mt-1 block w-full" readonly required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="idDivisi" :value="__('Divisi')" />
                <input type="text" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" value="{{ $data['namaDivisi'] }}" readonly>
                <input type="hidden" name="idDivisi" value="{{ $data['idDivisi'] }}">
                <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="tanggalMulai" :value="__('Tanggal Mulai')" />
                <x-text-input id="tanggalMulai" name="tanggalMulai" type="date" value="{{ $data['tanggalMulai'] }}" class="mt-1 block w-full" readonly/>
                <x-input-error :messages="$errors->get('tanggalMulai')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="tanggalAkhir" :value="__('Tanggal Akhir')" />
                <x-text-input id="tanggalAkhir" name="tanggalAkhir" type="date" value="{{ $data['tanggalAkhir'] }}" class="mt-1 block w-full" readonly/>
                <x-input-error :messages="$errors->get('tanggalAkhir')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="alamat" :value="__('Alamat')" />
                <textarea id="alamat" name="alamat"" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" readonly>{{ $data['alamat'] }}</textarea>
                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="alasanCuti" :value="__('Alasan Cuti')" />
                <textarea id="alasanCuti" name="alasanCuti" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" readonly>{{ $data['alasanCuti'] }}</textarea>
                <x-input-error :messages="$errors->get('alasanCuti')" class="mt-2" />
            </div>

            <x-text-input id="isAcceptedKadepartemen" name="isAcceptedKadepartemen" value="{{ $data['isAcceptedKadepartemen'] }}" type="hidden" class="mt-1 block w-full"/>

            <div>
                <x-input-label for="isAcceptedKahrd" :value="__('Verifikasi Ketua HRD')" />
                <select id="isAcceptedKahrd" name="isAcceptedKahrd" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" autofocus>
                    <option value="pending" {{ $data['isAcceptedKahrd'] === "pending" ? 'selected' : '' }}>Pending</option>
                    <option value="accepted" {{ $data['isAcceptedKahrd'] === "accepted" ? 'selected' : '' }}>Accepted</option>
                    <option value="rejected" {{ $data['isAcceptedKahrd'] === "rejected" ? 'selected' : '' }} >Rejected</option>
                </select>
                <x-input-error :messages="$errors->get('isAcceptedKahrd')" class="mt-2" />
            </div>

        <div class="flex items-center gap-4">
            <x-primary-button id="submit-btn">{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</section>
