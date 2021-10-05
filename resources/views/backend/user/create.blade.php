@include('layouts.partial.master')


<section class="content">
        <div class="container-fluid">

  <div class="row">

              <!-- this is written for alert the message box when user take action -->
              <!-- div class=row one start -->
              @if (session('success'))
              <div class="flash-message col-md-12">
                  <div class="alert alert-success ">
                      {{session('success')}}
                  </div>
              </div>
              @elseif(session('fail'))
              <div class="flash-message col-md-12">
                  <div class="alert alert-danger">
                      {{session('fail')}}
                  </div>
              </div>
              @endif
              <!-- this is end for alert the message box when user take action -->

            <!-- this is written for alert the message box when user take action -->
            @if (count($errors) > 0)
            <div class="content mt-3">
                <!-- div class=row content start -->
                <div class="animated fadeIn">
                    <!-- div class=FadeIn start -->
                    <div class="card">
                        <!-- card start -->

                        <div class="card-body">
                            <!-- card-body start -->


                            <div class="row">
                                <!-- div class=row One start -->
                                @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <!-- div class=col 12 One start -->
                                    <p class="text-danger">* {{ $error }}</p>
                                </div><!-- div class=col 12 One end -->
                                @endforeach
                            </div><!-- div class=row One end -->


                        </div> <!-- card-body end -->

                    </div><!-- card end -->
                </div><!-- div class=FadeIn start -->
            </div><!-- div class=row content end -->
            @endif
  </div>

            <!-- Input Group -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                        <form id="confirm_create_" method="POST" action="/backend/user">
                            @csrf

                            <div class="row clearfix">
                                <div class="col-md-6">
                                <p>
                                        <b>User  Name</b>
                                    </p>
                                    <div class="input-group">

                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>

                                        <div class="form-line">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control date" placeholder="Username" autocomplete="username">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                <p>
                                        <b>Email</b>
                                    </p>
                                    <div class="input-group">

                                        <div class="form-line">
                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Recipient's username" autocomplete="email">
                                        </div>
                                        <span class="input-group-addon">@example.com</span>
                                    </div>
                                </div>


                            </div>

                            <div class="row clearfix">
                            <div class="col-md-6">
                            <p>
                                        <b>Password</b>
                                    </p>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                <p>
                                        <b>Confirm Password</b>
                                    </p>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control"  name="password_confirmation" placeholder="Confirm password">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                <p>
                                        <b>Phone Number</b>
                                    </p>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="phone"  value="{{ old('phone') }}" class="form-control" placeholder="phone number">
                                        </div>

                                    </div>
                                </div>

                               
                                
                                <div class="col-md-6">
                                <p>
                                        <b>Role</b>
                                    </p>
                                <select class="form-control" onchange="getDoctorById(this.value)" name="role_id" id="role_id" value="{{ old('role_id') }}">
                                      <option value="" disabled >Select role</option>
                                      <option value="2" style="color:black;">Doctor</option>
                                      <option value="3" style="color:black;">User</option>
                                </select>
                                </div>
                                
                               
                            </div>

                            {{-- doctor --}}
                           <div class="row clearfix" id="doctor">
                                <div class="col-md-3">
                                 <p>
                                        <b>Nrc</b>
                                    </p>
                                    <div class="input-group">
                               
                                <div class="form-line">
                                            <input type="text" name="nrc"  value="{{ old('nrc') }}" class="form-control date" placeholder="NRC" autocomplete="nrc">
                                </div>

                                </div>
                                </div>
                                <div class="col-md-3">
                                 <p>
                                        <b>Degree</b>
                                    </p>
                                    <div class="input-group">
                               
                                <div class="form-line">
                                            <input type="text" name="degree"  value="{{ old('degree') }}" class="form-control date" placeholder="Degree" autocomplete="degree">
                                </div>

                                </div>
                                </div>
                                <div class="col-md-3">
                                <p>
                                        <b>Sepcialization</b>
                                </p>
                                    <select value="{{ old('specialization_id') }}" class="form-control" name="specialization_id" >
                                                @foreach($specializations as $specialization)                          
                                                <option value="{{$specialization->id}}">{{$specialization->name}}</option> 
                                                @endforeach                  
                                                </select>
                                </div>

                                <div class="col-md-3">
                                <p>
                                        <b>Status</b>
                                    </p>
                                <select class="form-control" value="{{ old('status') }}" name="status" id="status">
                                <option value="" disabled>Select status</option>
                                <option value="1"  style="color:black;">Pending</option>

                                </select>
                                </div>
                            
                           </div>

                            {{--  --}}

                            <div class="row clearfix">

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label for="">Address</label>
                                            <textarea class="form-control" name="address" id="tinymice">{{ old('address') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix">

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label for="">Description</label>
                                            <textarea class="form-control" name="description" id="tinymice">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                            <button onclick="myFunction1()" type="submit" class="btn btn-primary">
                                {{ __('Register') }}

                            </div>
                        </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </section>
            <!-- #END# Input Group -->
        <script>
        function getDoctorById(selected_doctor_id){

                let b = selected_doctor_id.split(" ");
                console.log(b);
                let doctor = document.querySelectorAll('#doctor');



         if(b[0] == 2){

                    let index = 0;
                    let length = doctor.length;
                    for (; index < length; index++) {
                        doctor[index].style.display = "block";
                    }



         }
        else{

            let index = 0;
                    let length = doctor.length;
                    for (; index < length; index++) {
                        doctor[index].style.display = "none";


                    }
        }
            }

function myFunction1() {
      
      event.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once created, you cannot change data again.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      }).then((willDelete) => {
      if (willDelete) {
      $("#confirm_create_").off("submit").submit();
      swal("You have successfully created", {
      icon: "success",
      });
    } 
  
  });
}
</script>
