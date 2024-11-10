<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



    <style>
        .text-small {
            font-size: .6rem;
        }
    </style>
</head>
</head>

<body>


    <div class="container">
        <div class="row">



            <div class="">

                <h4 class="mt-4">بيانات المرضى</h4>
                <a href="{{ route('export.csv') }}" class="btn btn-success">
                    تصدير
                    اكسل</a>



                <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mt-3">
                    {{-- <x-form.input type="text" class="form-control form-control-sm" name="fullName"
                        label="الاسم الثلاثي" /> --}}

                    <div class="input-group input-group-sm mb-3 mx-2">

                        <input type="text" name="fullName" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" placeholder="الاسم الثلاثي"
                            value="{{ request('fullName') }}">
                    </div>


                    <div class="input-group input-group-sm mb-3 mx-2">
                        <label for="">من: </label>
                        <input type="date" name="start_date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" value="{{ request('start_date') }}">
                    </div>

                    <div class="input-group input-group-sm mb-3 mx-2">
                        <label for="">الى: </label>
                        <input type="date" name="end_date" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" value="{{ request('end_date') }}">
                    </div>

                    <div class="input-group input-group-sm mb-3 mx-2">
                        <select name="clinic" class="form-select form-select-sm " aria-label="Small select example">
                            <option value="">الكل</option>
                            <option value="العينية" @selected(request('clinic') == 'العينية')>العينية</option>
                            <option value="الأذنية" @selected(request('clinic') == 'الأذنية')>الأذنية</option>
                            <option value="oct" @selected(request('clinic') == 'oct')>OCT</option>
                        </select>
                    </div>

                    {{-- <button type="submit" class="btn btn-primary text-small py-0 btn-sm">فلتر</button> --}}


                    <div class="input-group input-group-sm mb-3 mx-2 w-50">

                        <input type="submit" class="form-control btn btn-primary btn-sm " value="filter">
                    </div>


                </form>
            </div>



            <div class="section_tabel mt-5 text-small">


                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">الاسم</th>
                            <th scope="col">العمر</th>
                            <th scope="col">سنة/شهر</th>
                            <th scope="col">رقم الهاتف</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">العيادة</th>
                            <th scope="col">يوم الحجز</th>
                            <th scope="col">تاريخ الحجز</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- {{ dd($information) }} --}}
                        @forelse ($information as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->fullName }}</td>

                                <td>{{ $item->age }}</td>
                                <td>{{ $item->agetype }}</td>
                                <td>{{ $item->phoneNum }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->clinic }}</td>
                                <td>{{ $item->appointmentDay }}</td>
                                <td>{{ $item->matchDate }}</td>

                            </tr>
                        @empty
                            <tr>
                                <th scope="row">NO DATA</th>

                            </tr>
                        @endforelse





                    </tbody>
                </table>



            </div>

            {{-- {{ $information->links() }} --}}

            {{ $information->withQueryString()->links() }}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
