<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>admin - clinics</title>
</head>

<body>


    <div class="section_tabel mt-5">

        {{--
        @if (request('update'))
            <div class="alert alert-success">
                {{ request('update') }}
            </div>
        @endif --}}



        @if (session('update'))
            <div class="alert alert-success">
                {{ session('update') }}
            </div>
        @endif


        <h1> الأعداد اليومية المسموحة للعيادات </h1>


        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم العيادة</th>
                    <th scope="col">العدد اليومي المسموح</th>
                    <th scope="col"> اجراء</th>

                </tr>
            </thead>
            <tbody>

                @forelse ($information as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->clinicName }}</td>
                        <td>{{ $item->dayNum }}</td>
                        <td>

                            <a href="{{ route('dashboard.clinic.show', ['id' => $item->id]) }}" class="btn btn-success">
                                تعديل
                            </a>
                        </td>



                    </tr>
                @empty
                    <tr>
                        <th scope="row">NO DATA</th>

                    </tr>
                @endforelse


            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            < /body>

            <
            /html>
