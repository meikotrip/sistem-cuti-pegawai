<style>
    #dataTable {
        border-collapse: collapse;
        width: 100%;
    }

    #dataTable th, #dataTable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    #dataTable th {
        background-color: #f2f2f2;
    }
</style>
<h2 align="center">LAPORAN CUTI PEGAWAI SRIWIJAYA POST</h2>
<table id="dataTable" class="display" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Divisi</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Lama Cuti</th>
            <th>Alasan Cuti</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < count($leaveRequests); $i++)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $leaveRequests[$i]["name"] }}</td>
            <td>{{ $leaveRequests[$i]["namaDivisi"] }}</td>
            <td>{{ $leaveRequests[$i]["tanggalMulai"] }}</td>
            <td>{{ $leaveRequests[$i]["tanggalAkhir"] }}</td>
            <td>{{ $leaveRequests[$i]["duration"] }} Hari</td>
            <td>{{ $leaveRequests[$i]["alasanCuti"] }}</td>
        </tr>
        @endfor
    </tbody>
</table>