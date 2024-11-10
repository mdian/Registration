<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الفورم مغلق حتى يوم الخميس</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @if ($clinic == 'الأذنية' || $clinic == 'العينية' || $clinic == 'oct')
        <div class="text-center alert alert-danger"> لقد انتهى التسجيل على العيادة <span
                class="bg-info">{{ $clinic }}</span> بسبب اكتمال
            العدد</div>
        <a href="{{ route('registration.index') }}" class="btn btn-success"> الصفحة الرئيسية</a>
    @else
        <div class="text-center alert alert-danger">
            انتهى التسجيل على كافة عيادات واقسام مشفى الحكمة لهذا الاسبوع بسبب اكتمال العدد المحدد
        </div>
        <a href="{{ route('registration.index') }}" class="btn btn-success"> العودة الى الصفحة الرئيسية</a>
    @endif




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
