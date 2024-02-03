<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\UserDivision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeaveRequestController extends Controller
{
    public function form(Request $request, $id = null): View
    {

        $data = LeaveRequest::where('idUser', $request->user()->id)->first();

        // if ($id) {
        //     $data = json_decode(DB::table('leave_request')->join('users', 'registrations.idUser', '=', 'users.id')->where('registrations.id_registrasi', $id)->get(), true)['0'];
        // }

        if ($id) {
            $data = LeaveRequest::join('users', 'leave_requests.idUser', '=', 'users.id')->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
                ->where('leave_requests.idLR', $id)
                ->first();
        }

        return view('leaveRequest.form', [
            'data' => $data,
            'id' => $id,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'idUser' => ['required'],
            'idDivisi' => ['required'],
            'tanggalMulai' => ['required','date'],
            'tanggalAkhir' => ['required','date'],
            'alamat' => ['required'],
            'alasanCuti' => ['required'],
        ]);

        $leaveRequest = new LeaveRequest($request->all());

        if ($leaveRequest->save()) {
            return redirect()->back()->with('success', 'Permintaan Cuti Complete');
        }

        return redirect()->back()->with('error', 'Permintaan Cuti Failed, Try Again');
    }

    public function dashboard(): View {
        
        $user = Auth::user();

        // untuk kadepartemen belom
        if($user->role === 'karyawan') {
            $data = [
                "leaveRequests" => json_decode(DB::table('leave_requests')
                    ->join('users', 'leave_requests.idUser', '=', 'users.id')
                    ->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
                    ->where('leave_requests.idUser', $user->id)
                    ->get(), true),
            ];
    
            return view('leaveRequest.dashboard', $data);
        } elseif ($user->role === 'kahrd') {
            $data = [
                "leaveRequests" => json_decode(DB::table('leave_requests')
                    ->join('users', 'leave_requests.idUser', '=', 'users.id')
                    ->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
                    ->where('leave_requests.isAcceptedKadepartemen', 'accepted')
                    ->get(), true),
            ];
    
            return view('leaveRequest.dashboard', $data);
        } elseif ($user->role === 'kadepartemen') {

            $user_division = UserDivision::join('users', 'user_divisions.idUser', '=', 'users.id')
            ->join('divisions', 'user_divisions.idDivisi', '=', 'divisions.id')
            ->where('user_divisions.idUser', $user->id)->get();

            $data = [
                "leaveRequests" => json_decode(DB::table('leave_requests')
                    ->join('users', 'leave_requests.idUser', '=', 'users.id')
                    ->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
                    ->get(), true),
                "user_divisions" => $user_division
            ];
    
            return view('leaveRequest.dashboard', $data);
        }
         else {
            $data = [
                "leaveRequests" => json_decode(DB::table('leave_requests')
                    ->join('users', 'leave_requests.idUser', '=', 'users.id')
                    ->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
                    ->get(), true),
            ];
    
            return view('leaveRequest.dashboard', $data);
        }
    }

    public function edit(Request $request, $id){
        $leaveRequest = json_decode(DB::table('leave_requests')
        ->join('users', 'leave_requests.idUser', '=', 'users.id')
        ->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
        ->get(), true)['0'];

        if ($leaveRequest) {
            $request->validate([
                'idDivisi' => ['required'],
                'tanggalMulai' => ['required','date'],
                'tanggalAkhir' => ['required','date'],
                'alamat' => ['required'],
                'alasanCuti' => ['required'],
                'isAcceptedKadepartemen'=> ['required'],
                'isAcceptedKahrd'=> ['required']
            ]);

            $leaveRequest = LeaveRequest::where('idLR', $id)->first();

            $leaveRequest->update($request->all());

            return redirect()->back()->with('success', 'Permintaan Cuti updated');
        }

        abort(404);
    }

    public function delete($id) {
        $leaveRequest = LeaveRequest::where('idLR', $id)->firstOrFail();

        if ($leaveRequest->delete()) {
            return redirect()->back()->with('success', 'Permintaan Cuti deleted');
        }
    }

    public function download() {

        $data = [
            "leaveRequests" => json_decode(DB::table('leave_requests')
                ->join('users', 'leave_requests.idUser', '=', 'users.id')
                ->join('divisions', 'leave_requests.idDivisi', '=', 'divisions.id')
                ->where('leave_requests.isAcceptedKadepartemen', 'accepted')
                ->get(), true),
        ];

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => [190, 236],
            'orientation' => 'L'
        ]);
        $mpdf->WriteHTML(view("leaverequest.partials.table-download",$data));
        $mpdf->Output();
        // $mpdf->Output('report-cuti-pegawai.pdf', 'D');
    }
}
