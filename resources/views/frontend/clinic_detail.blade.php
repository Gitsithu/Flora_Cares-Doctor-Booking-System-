@include('layouts.frontend.header')
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Doctors</span>
                <h2 class="mb-4">Our Doctors</h2>
            </div>
        </div>	
        <div class="row">

            @foreach ($objs as $obj)                
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url({{$obj->image}});"></div>
                    </div>
                    <div class="text text-center">
                    <h3 class="mb-1">{{$obj->name}}</h3>
                    <span class="position mb-2">
                    @foreach($specializations as $specialization)                          
                                                <option value="{{$specialization->id}}">{{$specialization->name}}</option> 
                                                @endforeach
                    </span>
                    </div>
                </div>
                <div style="margin-left:22%;">
                <?php
                                                $parameter = $obj->user_doctor_id;
                                                $parameter= Crypt::encrypt($parameter);
                                                ?>
                <form action="/frontend/appointment/create/{{ $parameter }}" method="post" >
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="cid" value="{{$clinic}}">
                    @if(Auth::check())
                    <button type="submit" class="btn btn-primary">Make an Appointment</button>
                    @else
                    <a href="{{route('login')}}" class="btn btn-primary">Make an Appointment</a>
                    @endif
                    </form>
            </div>
        </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.frontend.footer')