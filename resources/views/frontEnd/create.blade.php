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





        @if (request('danger') && $errors->count() == 0)
            <div class="alert alert-danger">
                {{ request('danger') }}
            </div>
        @endif

        {{--  @if (request('success') && $errors->count() == 0)
            <div class="alert alert-success">
                {{ request('success') }}
            </div>
        @endif --}}

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

            <h1 class="text-center mb-5"> التسجيل في العيادة {{ $clinic }}</h1>
            {{ $clinic }}



            <!-- <! ------- start form --------->
            <form action="{{ route('registration.store') }}" method="POST">

                @csrf
                @method('POST')
                <div class="mb-3">



                    <x-form.input type="text" name="fullName" label="الاسم الثلاثي" />

                </div>
                <div class="mb-3">
                    <input type="hidden" name="clinic" class="form-control" id="d"
                        placeholder="Example input placeholder">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="matchDate" class="form-control" id="d"
                        placeholder="Example input placeholder" value="{{ today() }}">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">العمر</label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror "
                        id="formGroupExampleInput" placeholder="" name="age" value="{{ old('age') }}">
                    @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <h6 class="mt-4">الفئة العمرية</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('agetype') is-invalid @enderror " type="radio"
                        name="agetype" value="سنة" id="flexRadioDefault1"
                        {{ old('agetype') == 'سنة' ? 'checked' : '' }}>
                    @error('agetype')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label class="form-check-label" for="flexRadioDefault1">
                        سنة
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('agetype') is-invalid @enderror " type="radio"
                        name="agetype" value="شهر" id="flexRadioDefault2"
                        {{ old('agetype') == 'شهر' ? 'checked' : '' }}>
                    @error('agetype')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label class="form-check-label @error('agetype') is-invalid @enderror " for="flexRadioDefault2">
                        شهر
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('agetype') is-invalid @enderror" type="radio" name="agetype"
                        value="يوم" id="flexRadioDefault2" {{ old('agetype') == 'يوم' ? 'checked' : '' }}>
                    @error('agetype')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <label class="form-check-label" for="flexRadioDefault2">
                        يوم
                    </label>
                </div>



                {{-- <H6 class="mt-3">نازح/مقيم:</H6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('type') is-invalid @enderror" type="radio"
                            name="type" value="نازح" id="flexRadioDefault2"
                            {{ old('type') == 'نازح' ? 'checked' : '' }}>
                @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <label class="form-check-label" for="flexRadioDefault2">
                    نازح
                </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input  @error('type') is-invalid @enderror" type="radio"
                name="type" value="مقيم" id="flexRadioDefault2"
                {{ old('type') == 'مقيم' ? 'checked' : '' }}>
            @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <label class="form-check-label" for="flexRadioDefault2">
                مقيم
            </label>
        </div> --}}

                <x-form.radio name="type" label="نازح/مقيم:" :options="['placed' => 'مقيم', 'displaced' => 'نازح']" />




                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label"> :مكان السكن</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror "
                        id="formGroupExampleInput" placeholder="" value="{{ old('address') }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">رقم الهاتف/ يجب ان يبدأ النداء ب 00 </label>
                    <input type="number" class="form-control @error('phoneNum') is-invalid @enderror "
                        id="formGroupExampleInput2" placeholder="" name="phoneNum" value="{{ old('phoneNum') }}">
                    @error('phoneNum')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- يوم التسجيل --}}

                <div class="dayofappointment">
                    <H6 class="mt-3"> اختر يوم الحجر :</H6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('appointmentDay') is-invalid @enderror" type="radio"
                            value="السبت" name="appointmentDay" id="flexRadioDefault2"
                            {{ old('appointmentDay') == 'السبت' ? 'checked' : '' }}>
                        @error('appointmentDay')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault2">
                            السبت
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('appointmentDay') is-invalid @enderror" type="radio"
                            value="الأحد" name="appointmentDay" id="flexRadioDefault2"
                            {{ old('appointmentDay') == 'الأحد' ? 'checked' : '' }}>
                        @error('appointmentDay')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault2">
                            الاحد
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('appointmentDay') is-invalid @enderror" type="radio"
                            value="الأثنين" name="appointmentDay" id="flexRadioDefault2"
                            {{ old('appointmentDay') == 'الأثنين' ? 'checked' : '' }}>
                        @error('appointmentDay')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault2">
                            الاثنين
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('appointmentDay') is-invalid @enderror" type="radio"
                            value="الثلاثاء" name="appointmentDay" id="flexRadioDefault2"
                            {{ old('appointmentDay') == 'الثلاثاء' ? 'checked' : '' }}>
                        @error('appointmentDay')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault2">
                            الثلاثاء
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('appointmentDay') is-invalid @enderror" type="radio"
                            value="الأربعاء" name="appointmentDay" id="flexRadioDefault2"
                            {{ old('appointmentDay') == 'الأربعاء' ? 'checked' : '' }}>
                        @error('appointmentDay')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault2">
                            الاربعاء
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('appointmentDay') is-invalid @enderror" type="radio"
                            value="الخميس" name="appointmentDay" id="flexRadioDefault2"
                            {{ old('appointmentDay') == 'الخميس' ? 'checked' : '' }}>
                        @error('appointmentDay')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-check-label" for="flexRadioDefault2">
                            الخميس
                        </label>
                    </div>

                </div>


                <button type="submit" class="btn btn-primary mt-3">تسجيل</button>
            </form>
            <!-- <! ------- End form ------->


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>


{{-- @push('style')
    <style>
        .form_section {

            background-color: rgb(215, 210, 224) !important;
        }
    </style>
@endpush

@push('scripts')
@endpush --}}
