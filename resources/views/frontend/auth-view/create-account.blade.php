    @extends('layouts.front.front-master', ['pageClass' => 'create-account'])

    @section('page_title')
        Register Client
    @endsection

    @section('content')


    {{-- @inject('governorates', 'App\Models\Governorate') --}}
    {{-- @inject('cities', 'App\Models\City') --}}
    @inject('bloodTypes', 'App\Models\BloodType')


    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif  

                <!-- form -->
                <form action="{{ route('register-client.store') }}" method="post">
                    @csrf

                    <div class="form-group mt-2">
                        <label for="name"> الإسم </label>
                        <input type="text" name="name" class="form-control" id="exampleInputName"
                            aria-describedby="nameHelp" placeholder="الإسم">
                    </div><!-- name -->

                    <div class="form-group mt-2">
                        <label for="email">البريد الإلكترونى </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="البريد الإلكترونى">
                    </div><!-- email -->

                    <div class="form-group mt-2">
                        <label for="d_o_b">تاريخ الميلاد </label>
                        <input placeholder="تاريخ الميلاد" name="d_o_b" class="form-control" type="text"
                            onfocus="(this.type='date')" id="d_o_b">
                    </div><!-- d_o_b -->

                    <div class="form-group mt-2">
                        <label for="bloodTypes">فصيلة الدم </label>
                        <select class="form-control" id="bloodTypes" name="blood_type_id">
                            <option selected disabled hidden value="">فصيلة الدم</option>

                            @foreach ($bloodTypes->all() as $bloodType)
                                <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                            @endforeach
                        </select>
                    </div><!-- blood_type_id -->

                    <div class="form-group mt-2">

                        <label for="governorate_id">المحافظة </label>
                        <select class="form-control" id="governorates" name="governorate_id">
                            <option selected disabled hidden value="">المحافظة</option>

                            @foreach ($cities as $city)
                                <option value="{{ $city->governorate->id }}">{{ $city->governorate->name }}</option>
                            @endforeach
                        </select>
                    </div><!-- governorate_id -->

                    <div class="form-group mt-2">
                        <label for="city_id">المدينة </label>
                        <select class="form-control" id="cities" name="city_id">
                            <option selected disabled hidden value="">المدينة</option>

                            @foreach ($cities as $city)
                                <option value="{{ $city->governorate_id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div><!-- city_id -->

                    <div class="form-group mt-2">
                        <label for="phone">رقم الهاتف </label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            aria-describedby="emailHelp" placeholder="رقم الهاتف"><!-- phone -->
                    </div><!-- phone -->

                    <div class="form-group mt-2">
                        <label for="last_donation_date">آخر تاريخ تبرع </label>
                        <input placeholder="آخر تاريخ تبرع" name="last_donation_date" class="form-control"
                            onfocus="(this.type='date')" id="last_donation_date"><!-- last_donation_date -->
                    </div><!-- last_donation_date -->

                    <div class="form-group mt-2">
                        <label for="password">كلمة المرور </label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="كلمة المرور">
                    </div><!-- password -->

                    <div class="form-group mt-2">
                        <label for="password_confirmation">تأكيد كلمة المرور </label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="password_confirmation" placeholder="تأكيد كلمة المرور">
                    </div><!-- password_confirmation -->

                    <div class="create-btn text-center mt-3">
                        <button type="submit" class="btn btn-lg btn-primary">إنشاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $("#governorates").change(function(e) {
                // alert();
                e.preventDefault();
                // get gov
                // send ajax
                // append cities

                var governorate_id = $('#governorates').val();
                if (governorate_id) {
                    $.ajax({
                        url: "{{ url('api/v1/cities?governorate_id=') }}" + governorate_id,
                        type: 'get',
                        data: {
                            // _token: "{{ csrf_token() }}",
                            // governorate_id: governorate_id
                        },
                        success: function(data) {
                            if (data.status == 1) {
                                // console.log(success);

                                $("#cities").empty();
                                $("#cities").append('<option value="">المدينة</option>');

                                $(data.data).each(function(index, city) {
                                    $("#cities").append('<option value="' + city.id + '">' + city
                                        .name + '</option>');
                                });

                            } // if(data.status == 1)
                        }, //  success: function(data)

                        error: function(jqXhr, textStatus, errorMessage) {
                            alert(errorMessage);
                        } // error


                    }); // ajax


                } else {
                    $('#cities').empty();
                    $('#cities').append('<option value="">المدينة</option>');

                } // if(governorate_id)


            }); // function(e)
        </script>
    @endpush




    @endsection
