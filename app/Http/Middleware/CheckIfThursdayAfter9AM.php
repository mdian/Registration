<?php

namespace App\Http\Middleware;

use App\Models\Clinic;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckIfThursdayAfter9AM
{
    public function handle(Request $request, Closure $next)
    {
        $phone = $request->input('phoneNum');
        if ($phone) {
            $clinic = session('clinic');

            $checknum = $this->chechphonenumber($phone, $clinic);
            if ($checknum >= 1) {
                return redirect()->route('registration.create', ['clinic' => $clinic, 'danger' => 'تم التسجيل مسبقا من هذا الرقم يرجى التسجيل من رقم اخر']);
            }
        }

        $clinic = $request->route('clinic');

        $allowedNumeye = 0;
        $allowedNumear = 0;
        $allowedNumoct = 0;

        if ($clinic == 'العينية') {
            $allowedNumeye = Clinic::where('clinicName', '=', $clinic)->first()->dayNum;

            $satdayDate = Carbon::now('Asia/Damascus')->addDay(2)->format('Y-m-d');

            $thirdayDate = Carbon::now('Asia/Damascus')->addDay(7)->format('Y-m-d');

            $registrationCount = DB::table('registrations')
                ->where('clinic', $clinic)
                ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
                ->count();

            if ($registrationCount == $allowedNumeye) {
                return redirect('/formclose/' . $clinic);
            }

            $currentDay = Carbon::now('Asia/Damascus')->format('l'); // 'l' returns the full name of the day in English
            // $currentTime = Carbon::now('Asia/Damascus')->format('H:i'); // 'H:i' returns time in 24-hour format
            $currentTime = Carbon::now('Asia/Damascus')->format('g:i A');
            // Check if it's Thursday and after 9 AM
            if ($currentDay === 'Thursday' && $currentTime >= '09:00' && $registrationCount <= $allowedNumeye) {
                return $next($request);
            }

            return redirect('/formclose/' . $clinic);
        }

        if ($clinic == 'الأذنية') {
            $allowedNumear = Clinic::where('clinicName', '=', $clinic)->first()->dayNum;
            $satdayDate = Carbon::now('Asia/Damascus')->addDay(2)->format('Y-m-d');

            $thirdayDate = Carbon::now('Asia/Damascus')->addDay(7)->format('Y-m-d');

            $registrationCount = DB::table('registrations')
                ->where('clinic', $clinic)
                ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
                ->count();

            if ($registrationCount == $allowedNumear) {
                return redirect('/formclose/' . $clinic);
            }

            $currentDay = Carbon::now('Asia/Damascus')->format('l'); // 'l' returns the full name of the day in English

            // $currentTime = Carbon::now('Asia/Damascus')->format('H:i'); // 'H:i' returns time in 24-hour format
            $currentTime = Carbon::now('Asia/Damascus')->format('g:i A');
            // Check if it's Thursday and after 9 AM
            if ($currentDay === 'Thursday' && $currentTime >= '09:00' && $registrationCount <= $allowedNumear) {
                return $next($request);
            }

            return redirect('/formclose/' . $clinic);
        }

        if ($clinic == 'oct') {
            $allowedNumoct = Clinic::where('clinicName', '=', $clinic)->first()->dayNum;
            $satdayDate = Carbon::now('Asia/Damascus')->addDay(2)->format('Y-m-d');

            $thirdayDate = Carbon::now('Asia/Damascus')->addDay(7)->format('Y-m-d');

            $registrationCount = DB::table('registrations')
                ->where('clinic', $clinic)
                ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
                ->count();

            if ($registrationCount == $allowedNumoct) {
                return redirect('/formclose/' . $clinic);
            }

            $currentDay = Carbon::now('Asia/Damascus')->format('l'); // 'l' returns the full name of the day in English
            // $currentTime = Carbon::now('Asia/Damascus')->format('H:i'); // 'H:i' returns time in 24-hour format
            $currentTime = Carbon::now('Asia/Damascus')->format('g:i A');
            // dd($currentTime );
            // Check if it's Thursday and after 9 AM
            if ($currentDay === 'Thursday' && $currentTime >= '09:00' && $registrationCount <= $allowedNumoct) {
                return $next($request);
            }

            return redirect('/formclose/' . $clinic);
        }

        if ($clinic == null) {
            if ($request->route()->getName() == 'registration.index') {
                $allowedNumeye = 3;
                $allowedNumear = 3;
                $allowedNumoct = 3;

                $satdayDate = Carbon::now('Asia/Damascus')->addDay(2)->format('Y-m-d');
                $thirdayDate = Carbon::now('Asia/Damascus')->addDay(7)->format('Y-m-d');

                $registrationCounteye = DB::table('registrations')
                    ->where('clinic', 'الأذنية')
                    ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
                    ->count();

                $registrationCountear = DB::table('registrations')
                    ->where('clinic', 'العينية')
                    ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
                    ->count();

                $registrationCountoct = DB::table('registrations')
                    ->where('clinic', 'oct')
                    ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
                    ->count();

                if ($registrationCounteye >= $allowedNumeye && $registrationCountear >= $allowedNumear && $registrationCountoct >= $allowedNumoct) {
                    return redirect('/formclose/' . 'finished');
                }

                return $next($request);
            }
        }

        return $next($request);

        // if ($request->route()->getName() == 'registration.index') {
        //     // dd('ddd');
        //     $allowedNumeye = 5;
        //     $allowedNumear = 5;
        //     $registrationCounteye = DB::table('registrations')
        //         ->where('clinic', 'الأذنية')
        //         ->count();

        //     $registrationCountear = DB::table('registrations')
        //         ->where('clinic', 'العينية')
        //         ->count();

        //     if ($registrationCounteye >= $allowedNumeye && $registrationCountear >= $allowedNumear) {

        //         return redirect('/formclose/' . 'finished');
        //     }
        //     return $next($request);
        // }

        // $registrationCounteye = DB::table('registrations')
        //     ->where('clinic', 'الأذنية')
        //     ->count();
        // $registrationCountear = DB::table('registrations')
        //     ->where('clinic', 'العينية')
        //     ->count();
        // dd($allowedNum);
        // if ($registrationCounteye >= $allowedNum && $registrationCountear >= $allowedNum) {

        //     return redirect('/formclose/' . 'finished');
        // }

        // $registrationCount = DB::table('registrations')
        //     ->where('clinic', $clinic)
        //     ->count();
        // $currentDay = Carbon::now('Asia/Damascus')->format('l'); // 'l' returns the full name of the day in English
        // $currentTime = Carbon::now('Asia/Damascus')->format('H:i'); // 'H:i' returns time in 24-hour format
        // // Check if it's Thursday and after 9 AM
        // if ($currentDay === 'Thursday' && $currentTime >= '09:00' && $registrationCount <= $allowedNum) {
        //     return $next($request);
        // }

        // // If the conditions are not met, redirect or return a 403 response
        // // return redirect()->route('registration.formclose')->with('clinic', $clinic);
        // return redirect('/formclose/' . $clinic);
        // or
        // return response('Forbidden', 403);
    }

    public function chechphonenumber($phone, $clinic)
    {
        $satdayDate = Carbon::now('Asia/Damascus')->addDay(2)->format('Y-m-d');

        $thirdayDate = Carbon::now('Asia/Damascus')->addDay(7)->format('Y-m-d');

        $registrationCountphone = DB::table('registrations')
            ->where('clinic', $clinic)
            ->where('phoneNum', $phone)
            ->whereBetween('matchDate', [$satdayDate, $thirdayDate])
            ->count();

        return $registrationCountphone;

        // if ($registrationCountphone >= 1) {

        //     // dd($registrationCountphone);
        //     return redirect()->route('registration.create', ['clinic' => $clinic, 'danger' => 'تم التسجيل مسبقا من هذا الرقم يرجى التسجيل من رقم اخر']);

        //     if (session('clinic')) {

        //         // return redirect('/registration/' . $clinic)->with('deprecatephone', 'تم الحجز مسبقا يرجى التسجيل من هاتف اخر');

        //         return redirect()->route('registration.create', ['clinic' => $clinic, 'danger' => 'تم التسجيل مسبقا من هذا الرقم يرجى التسجيل من رقم اخر']);
        //     };
        //     // return redirect()->with('deprecatephone', 'تم الحجز مسبقا يرجى التسجيل من هاتف اخر');

        // }
    }
}
