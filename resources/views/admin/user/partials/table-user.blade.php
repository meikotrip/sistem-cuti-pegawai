<!-- Data Tables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<section>
    <table id="dataTable" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            @for ($i = 0; $i < count($users); $i++)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $users[$i]['name'] }}</td>
                <td>{{ $users[$i]['role'] }}</td>
                <td>{{ $users[$i]['email'] }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', $users[$i]['id']) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Detail</a>
                    <form action="{{ route('admin.user.delete', $users[$i]['id']) }}" method="post" autocomplete="off">
                        @csrf
                        @method('delete')
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endfor
    </tbody>
</table>
</section>

<script>
    let table = new DataTable('#dataTable', {
        responsive: true
    });
</script>
