<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Register;
use Illuminate\Http\Request;

// use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\InformationExport;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $information = Clinic::all();

        return view('dashboard.clinics.index', ['information' => $information]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $clinic = Clinic::find($id);

        return view('dashboard.clinics.edit', ['clinic' => $clinic, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $clinic = Clinic::find($id);

        $request->validate(Clinic::rules());

        $clinic->update($request->all());

        return redirect()->route('admin.home')->with('update', 'تم التعديل بنجاج');
        // return redirect()->route('admin.home',['update' => 'تم التعديل بنجاج']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }

    public function showall(Request $request)
    {
        $request = request();
        $query = Register::query();

        $fullName = $request->query('fullName');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $clinic = $request->query('clinic');

        if ($fullName) {
            $query->where('fullName', 'like', '%' . $fullName . '%');
        }

        if ($startDate) {
            $query->where('matchDate', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('matchDate', '<=', $endDate);
        }

        if ($clinic) {
            $query->where('clinic', $clinic);
        }

        $information = $query->orderBy('age', 'asc')->orderBy('clinic', 'asc')->get();
        session(['information' => $information]);
        $information = $query->orderBy('age', 'asc')->orderBy('clinic', 'asc')->paginate(5);

        return view('dashboard.registration.index', ['information' => $information]);
    }

    public function extractData()
    {
        // $request = request();
        // $query = Register::query();
        // dd($query->get());
        // $fullName = 'وليد';
        // $startDate = $request->input('start_date');
        // $endDate = $request->input('end_date');
        // $clinic = $request->input('clinic');

        // if ($fullName) {
        //     $query->where('fullName', 'like', '%' . $fullName . '%');
        // }

        // if ($startDate) {
        //     $query->where('matchDate', '>=', $startDate);
        // }

        // if ($endDate) {
        //     $query->where('matchDate', '<=', $endDate);
        // }

        // if ($clinic) {
        //     $query->where('clinic', $clinic);
        // }

        // $information = $query->orderBy('age', 'asc')->orderBy('clinic', 'asc')->get();

        $information = session('information');

        // dd($information);

        $downloadsPath = getenv('USERPROFILE') . '\\Downloads\\patients.csv';

        // $handle = fopen('/Downloads/patients.csv', 'w');

        $handle = fopen($downloadsPath, 'w');

        if ($handle) {
            fprintf($handle, chr(0xef) . chr(0xbb) . chr(0xbf));

            fputcsv($handle, ['الاسم الثلاثي', 'العمر', 'الفئة العمرية', 'العيادة', 'العنوان', 'رقم الهاتف', 'اليوم الموافق', 'تاريخ التسجيل', 'تاريخ التعديل']);

            if ($information) {
                foreach ($information as $student) {
                    fputcsv($handle, [
                        $student->fullName,
                        $student->age,
                        $student->agetype,
                        $student->clinic,
                        $student->address,
                        $student->phoneNum,
                        // $student->classroom->value,
                        $student->appointmentDay,
                        // $student->gender->value,
                        $student->created_at,
                        $student->updated_at,
                    ]);
                }

                fclose($handle);

                // return redirect('/admin/showall');
                return redirect()->back();
            }
        } else {
            dd('can not open the file for exproting');
        }
    }
}
