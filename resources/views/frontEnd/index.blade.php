<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="row">



            <h1 class="my-5 text-center display-4 font-weight-bold text-primary">
                التسجيل في مشفى الحكمة
            </h1>









            @if (request('danger') && $errors->count() == 0)
                <div class="alert alert-danger">
                    {{ request('danger') }}
                </div>
            @endif

            @if (request('success') && $errors->count() == 0)
                <div class="alert alert-success">
                    {{ request('success') }}
                </div>
            @endif
            {{-- <a href="{{ route('registration.create', ['clinic' => 'العينية']) }}"> حجز العيادة العينية</a>
            <a href="{{ route('registration.create', ['clinic' => 'الأذنية']) }}"> حجز العيادة الاذنية</a>
            <a href="{{ route('registration.create', ['clinic' => 'oct']) }}"> OCT حجز صورة </a> --}}

            <div class="col-md-7 col-12 mt-5">

                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <a href="{{ route('registration.create', ['clinic' => 'العينية']) }}"
                        class="btn btn-primary mb-2 w-50">
                        حجز العيادة العينية
                    </a>
                    <a href="{{ route('registration.create', ['clinic' => 'الأذنية']) }}"
                        class="btn btn-secondary mb-2 w-50">
                        حجز العيادة الاذنية
                    </a>
                    <a href="{{ route('registration.create', ['clinic' => 'oct']) }}" class="btn btn-info mb-2 w-50">
                        OCT حجز صورة
                    </a>
                </div>


            </div>

            <div class="col-md-5 col-12">

                <marquee width="100%" direction="up" height="40%hv" scrollamount="1"
                    class="font-weight-bold text-justify" behavior="scroll">
                    📌 موقع المشفى: أوتوستراد #ادلب ← #باب_الهوى, بعد مفرق معرة مصرين. ⏎ آلية الحجز: يبدأ الحجز للعيادات
                    العينية والأذنية واستقصاءات كصورة (OCT - طبوغرافيا قرنية) في تمام الساعة التاسعة صباحاً من يوم
                    الخميس وذلك في كل أسبوع حتى اكتمال العدد المطلوب (الحجز لأيام الأسبوع التالي فقط). سوف يتم ارسال
                    موعد الحجز عبر رسالة واتس أب على الرقم المُرسل وذلك قبل اليوم الذي سجلت به. وفي حال تم تغيير الموعد
                    لسبب طارئ، سيتم إعلامكم بتغيير الموعد عبر رسالة واتس أب وذلك قبل يوم الحجز المُرسل لكم سابقاً.
                    #تنويه: ● تعتبر طريقة الحجز السابقة عن طريق الاتصال مُلغاة. ● يتم الحجز مرة واحدة فقط في الأسبوع لكل
                    مستفيد، وفي حال الحاجة لحجز لمستفيد آخر أو لعيادة أخرى يجب الحجز بواسطة جهاز آخر. ● في حال كانت
                    البيانات المُرسلة خاطئة لن يتم الحجز وخاصةً رقم الواتس. ❶ صورة فلورسين FFA: كل أيام الأسبوع ما عدا
                    الجمعة والسبت - يجب أن يكون المريض صائمًا لمدة 4 ساعات. ⏎ الإستقصاءات الأذنية لا تحتاج لحجز مُسبق.
                    يكفي القدوم إلى المشفى من الساعة 9 صباحاً حتى 1 ظهراً مع الإحالة من طبيب مختص وذلك في الأيام المحددة
                    وفق ما يلي: ❶ تخطيط معاوقة سمعية: كل أيام الأسبوع ما عدا الجمعة والسبت. ❷ تخطيط السمع بالنغمة
                    الصافية PTA: يوم الثلاثاء فقط. ❸ تخطيط جذع الدماغ ABR: هذا التخطيط بحاجة لحجز مُسبق في العيادة
                    الأذنية - المريض الذي عمره أقل من 12 سنة يجب أن يكون صائمًا. المشفى يحتوي على مركز ثابت لـ لقاح
                    كورونا. على من يرغب بأخذ اللقاح لأول مرة، يرجى زيارة المركز ضمن المشفى. ومن أخذ جرعة سابقة ويريد
                    جرعات إضافية عليه إحضار كرت اللقاح معه. رقم الاستعلامات: +352681593284.


                </marquee>

            </div>


        </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
