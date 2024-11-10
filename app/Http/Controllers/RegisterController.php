<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Models\Register;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return view('frontEnd.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, $clinic)
    {


        if (session()->has('clinic')) {

            session()->forget('clinic');
        }

        session(['clinic' => $clinic]);


        return view('frontEnd.create', ['clinic' => $clinic]);
        // return view('frontEnd.create', ['success' => $request->route('success') ? $request->route('success') : null,'clinic' => $request->route('clinic')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {



        $day = $request->input('appointmentDay');
        switch ($day) {
            case 'السبت':
                $request->merge(['matchDate' => today()->addDay(2)]);
                break;
            case 'الأحد':
                $request->merge(['matchDate' => today()->addDay(3)]);
                break;
            case 'الأثنين':
                $request->merge(['matchDate' => today()->addDay(4)]);
                break;
            case 'الثلاثاء':
                $request->merge(['matchDate' => today()->addDay(5)]);
                break;
            case 'الأربعاء':
                $request->merge(['matchDate' => today()->addDay(6)]);
                break;
            case 'الخميس':
                $request->merge(['matchDate' => today()->addDay(7)]);
                break;
        }
        $clinic = session('clinic');
        $request->merge(['clinic' => $clinic]);
        $request->merge([
            'fullName' => preg_replace('/\s+/', ' ', trim($request->input('fullName')))
        ]);

        $request->validate(Register::rules(),[

             'fullName.required'=>'يجب ادخال الاسم الثلاثي حصرا',
             'age.required'=>'يجب اختيار العمر بشكل صحيح',
             'address.required'=>'يجب كتابة العنوان',
             'phoneNum.required'=>'يجب  كتابة رقم هاتف/وتساب صالح',
             'agetype.required'=>'يجب اختيار الفئة العمرية',
             'type.required'=>'يجب تحديد هل انت نازح ام مقييم',

             'appointmentDay.required'=>'يجب اختيار يوم الحجز',
        ]);

        $newregister = Register::create($request->all());
        if ($newregister) {

            // return redirect('/registration/' . $clinic)->with('success', 'تم حجز الدور.......... سوف تصلك راسلة وتساب لتأكيد الحجز');
            // or we can user redirect() -> back() -> with('success','jlsdfsf')
            // return redirect()->route('registration.create', ['clinic' => $clinic, 'success' => 'تم حجز الدور سوف تصلك راسلة وتساب لتأكيد الحجز']);
            return redirect()->route('registration.index', ['clinic' => $clinic, 'success' => 'تم حجز الدور سوف تصلك راسلة وتساب لتأكيد الحجز']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        // $information = Register::find($id);

        // return view('dashboard.registration.edit', [
        //     'information' => $information,
        // ]);


        return view('dashboard.registration.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $request->validate(Register::rules());
        $information = Register::find($id);
        $information->update($request->all());

        return redirect()->route('register.index')->with('update', 'تم التعديل بنجاج');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $information = Register::find($id);
        $information->delete();

        return redirect()->route('register.index')->with('delete ', 'تم الحذف بنجاح');
    }

    public function formclose(Request $request, $clinic)
    {
        return view('frontEnd.formClose')->with('clinic', $clinic);
    }
}
