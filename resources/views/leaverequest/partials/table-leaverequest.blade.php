<!-- Data Tables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<section>
    <table id="dataTable" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Divisi</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Lama Cuti</th>
            <th>Verifikasi Ketua Departemen</th>
            <th>Verifikasi Ketua HRD</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($user_divisions))
            @for ($i = 0; $i < count($leaveRequests); $i++)
            @if ($leaveRequests[$i]['idDivisi'] === $user_divisions[0]['idDivisi'])
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $leaveRequests[$i]['name'] }}</td>
                <td>{{ $leaveRequests[$i]['namaDivisi'] }}</td>
                <td>{{ $leaveRequests[$i]['tanggalMulai'] }}</td>
                <td>{{ $leaveRequests[$i]['tanggalAkhir'] }}</td>
                <td>{{ $leaveRequests[$i]['duration'] }} Hari</td>
                @if ($leaveRequests[$i]['isAcceptedKadepartemen'] === 'pending')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-300 focus:bg-yellow-300 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKadepartemen'] }}
                    </div>
                </td>
                @elseif($leaveRequests[$i]['isAcceptedKadepartemen'] === 'rejected')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKadepartemen'] }}
                    </div>
                </td>
                @else
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKadepartemen'] }}
                    </div>
                </td>
                @endif

                @if ($leaveRequests[$i]['isAcceptedKahrd'] === 'pending')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-300 focus:bg-yellow-300 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKahrd'] }}
                    </div>
                </td>
                @elseif($leaveRequests[$i]['isAcceptedKahrd'] === 'rejected')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKahrd'] }}
                    </div>
                </td>
                @else
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKahrd'] }}
                    </div>
                </td>
                @endif

                <td>
                    @if (auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('admin.leave-request.edit', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @elseif (auth()->check() && auth()->user()->isKadepartemen())
                        <a href="{{ route('kadepartemen.leave-request.edit', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @elseif (auth()->check() && auth()->user()->isKahrd())
                        <a href="{{ route('kahrd.leave-request.edit', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @else
                        <a href="{{ route('leave-request.form.detail', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @endif

                    @if (auth()->check() && auth()->user()->isAdmin())
                        <form action="{{ route('admin.leave-request.delete', $leaveRequests[$i]['idLR']) }}" method="post" autocomplete="off">
                            @csrf
                            @method('delete')
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Delete
                                </button>
                            </div>
                        </form>
                    @endif
                </td>
            </tr>
            @endif
            @endfor
        @else
            @for ($i = 0; $i < count($leaveRequests); $i++)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $leaveRequests[$i]['name'] }}</td>
                <td>{{ $leaveRequests[$i]['namaDivisi'] }}</td>
                <td>{{ $leaveRequests[$i]['tanggalMulai'] }}</td>
                <td>{{ $leaveRequests[$i]['tanggalAkhir'] }}</td>
                <td>{{ $leaveRequests[$i]['duration'] }} Hari</td>
                @if ($leaveRequests[$i]['isAcceptedKadepartemen'] === 'pending')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-300 focus:bg-yellow-300 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKadepartemen'] }}
                    </div>
                </td>
                @elseif($leaveRequests[$i]['isAcceptedKadepartemen'] === 'rejected')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKadepartemen'] }}
                    </div>
                </td>
                @else
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKadepartemen'] }}
                    </div>
                </td>
                @endif

                @if ($leaveRequests[$i]['isAcceptedKahrd'] === 'pending')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-300 focus:bg-yellow-300 active:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKahrd'] }}
                    </div>
                </td>
                @elseif($leaveRequests[$i]['isAcceptedKahrd'] === 'rejected')
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKahrd'] }}
                    </div>
                </td>
                @else
                <td>
                    <div class="mt-2 inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ $leaveRequests[$i]['isAcceptedKahrd'] }}
                    </div>
                </td>
                @endif

                <td>
                    @if (auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('admin.leave-request.edit', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @elseif (auth()->check() && auth()->user()->isKadepartemen())
                        <a href="{{ route('kadepartemen.leave-request.edit', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @elseif (auth()->check() && auth()->user()->isKahrd())
                        <a href="{{ route('kahrd.leave-request.edit', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @else
                        <a href="{{ route('leave-request.form.detail', $leaveRequests[$i]['idLR']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    @endif

                    @if (auth()->check() && auth()->user()->isAdmin())
                        <form action="{{ route('admin.leave-request.delete', $leaveRequests[$i]['idLR']) }}" method="post" autocomplete="off">
                            @csrf
                            @method('delete')
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Delete
                                </button>
                            </div>
                        </form>
                    @endif
                </td>
            </tr>
        @endfor
        @endif
    </tbody>
</table>
</section>

<script>
    let table = new DataTable('#dataTable', {
        responsive: true
    });
</script>
