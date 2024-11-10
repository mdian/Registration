<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{--
    @stack('style') --}}

    <style>
        .form_section {

            background-color: rgb(244, 244, 245) !important;
            border-radius: 1%;
            padding: 10px;
        }
    </style>

</head>

<body>


    <div class="content mt-5 nwsub">


        <div class="form_section col-md-6 mx-auto">
            @if ($errors->any())

                <div class="alert alert-danger">
                    <h3>Error</h3>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1 class="text-center mb-5"> تعديل اعداد العيادات</h1>



            <!-- <! ------- start form --------->

            <form action="{{ route('dashboard.clinic.update', ['id' => $id]) }}" method="POST">

                @csrf
                @method('PUT')
                {{-- <div class="mb-3">

                    <input type="text" name="clinicName" label="اسم العياده "
                        value="{{ $clinic->clinicName }}" />

                </div> --}}

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"> العيادة</label>
                    <input type="text" class="form-control @error('clinicName') is-invalid @enderror "
                        id="formGroupExampleInput" placeholder="Example input placeholder" name="clinicName"
                        value="{{ $clinic->clinicName }}" readonly>
                    @error('clinicName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">العدد اليومي</label>
                    <input type="number" class="form-control @error('dayNum') is-invalid @enderror "
                        id="formGroupExampleInput" placeholder="Example input placeholder" name="dayNum"
                        value="{{ $clinic->dayNum }}">
                    @error('dayNum')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">تعديل</button>
            </form>
            <!-- <! ------- End form ------->


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
