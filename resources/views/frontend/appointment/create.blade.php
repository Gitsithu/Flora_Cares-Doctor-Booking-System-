@include('layouts.frontend.header')
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5 text-center">
                <h3 class="appointment-heading">Make An Appointment</h3>
                <div class="appointment-wrap d-flex align-items-center" style="margin-top:15%;">
                    <form action="/frontend/appointment/store" method="POST" enctype="multipart/form-data" class="appointment-form ftco-animate">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="user_doctor_id" value="{{$doctor_id}}">
                        <input type="hidden"  name="clinic_id" value="{{$c_id}}">
                        @foreach($appoint as $appo)
                        <div class="row">
                            <div class="col-md-4">
                                <p style="color:black"><span class="fa fa-calendar"></span>{{$appo->day}}</p>
                            </div>
                            <div class="col-md-4">
                                <p style="color:black"><span class="fa fa-clock-o"></span>{{$appo->from_time}}</p>
                            </div>
                            <div class="col-md-4">
                                <p style="color:black"><span class="fa fa-clock-o"></span>{{$appo->to_time}}</p>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                       
                                        <input type="date" class="form-control" name="date" placeholder="Date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary py-3 px-4">Appointment</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.frontend.footer')
