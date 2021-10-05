@if(Auth::user()->role_id == 3)
@include('layouts.frontend.header')
<!-- Exportable Table -->
<section class="content">
        <div class="container-fluid">
        <div class="row">
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
{{--  --}}
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Profile</span>
                <h2 class="mb-4">Edit Profile</h2>
            </div>
        </div>	
        <div class="row">
            @foreach ($objs as $obj)
            <div class="col-md-12 col-lg-12 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url({{$obj->image}});"></div>
                    </div>
                    <div class="text text-center">
                        <h3 class="mb-1">{{ $obj->name }}</h3>
                        <span class="position mb-2">{{ $obj->email }}</span>
                        <div class="faded">
                            <ul class="text-center" style="list-style-type: none;">
                                <li style="margin-right: 3%;">{{ $obj->phone }}</li>
                                <li style="margin-right: 3%;">{{ $obj->address }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                                                $parameter = $obj->id;
                                            $parameter= Crypt::encrypt($parameter);
                                        ?>
                <div style="margin-left:49%;"><a class="btn btn-success" onclick="return myFunction(this.id);" id="{{ $parameter }}"  href='/home/edit/{{ $parameter }}'> Edit</a></div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{--  --}}
@include('layouts.frontend.footer')
@else
@include('layouts.partial.master')
<!-- Exportable Table -->
<section class="content">
        <div class="container-fluid">
        <div class="row">
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
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            @if(Auth::user()->role_id==1)
                                    <a href="/backend/user/create" class="form-control btn btn-primary" type="button" style="font-size: 18px;">New User</a>
                                @else
                                @endif
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number
                                                <th>Image</th>
                                                </th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Role</th>
                                                @endif
                                                
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Aciton</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($objs as $obj)
                                            <tr>
                                                <td>{{ $obj->name }}</td>
                                                <td>{{ $obj->email }}</td>
                                                <td>{{ $obj->phone }}</td>
                                                <td><img src="{{ $obj->image }}" width="50" height="50" /></td>
                                                @if(Auth::user()->role_id==1)
                                                <td>
                                                    <b>
                                                        @if($obj->role_id == 2)
                                                        <p class="text-primary">Doctor</p>
                                                        @elseif($obj->role_id == 3)
                                                        <p class="text-primary">User</p>
                                                        @else
                                                        <p class="text-danger">Admin</p>
                                                        @endif
                                                    </b>
                                                </td>
                                                @endif

                                               
                                                
                                                <td>
                                                @if($obj->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                                </td>

                                                

                                                <td>{{ $obj->created_at}}</td>
                                                <td>{{ $obj->updated_at}}</td>

                                                

                                                <?php
                                                $parameter = $obj->id;
                                                $parameter= Crypt::encrypt($parameter);
                                                ?>

                                                <td style="text-align:center;"><a class="btn btn-success" onclick="return myFunction(this.id);" id="{{ $parameter }}" href='/home/edit/{{ $parameter }}'> Edit</a></td>
                                                


                                                

                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone Number</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Role</th>
                                                @endif
                                                
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                        </div>
                    </div>
                </div>
</div>
                </div>
        </section>
            <!-- #END# Exportable Table -->
<script>
        function myFunction(id) {
       event.preventDefault();
       swal({
     title: "Are you sure?",
     text: "If you want to update this,Click ok",
     icon: "warning",
     buttons: true,
     dangerMode: true,
     }).then((willDelete) => {
     if (willDelete) {
     window.location.href="/home/edit/"+id;
   }
   });
   }
        //  function myFunction1() {
        //      if(!confirm("Are You Sure to delete this ?"))
        //      event.preventDefault();
        //  }
        function myFunction1(id) {
       event.preventDefault();
       swal({
     title: "Are you sure?",
     text: "If you want to active this user,Click ok",
     icon: "warning",
     buttons: true,
     dangerMode: true,
     }).then((willDelete) => {
     if (willDelete) {
        window.location.href="/backend/home/active/"+id;
   }
   });
   }
        //  function myFunction1() {
        //      if(!confirm("Are You Sure to delete this ?"))
        //      event.preventDefault();
        //  }

        function myFunction2(id) {
       event.preventDefault();
       swal({
     title: "Are you sure?",
     text: "If you want to Inactive this user,Click ok",
     icon: "warning",
     buttons: true,
     dangerMode: true,
     }).then((willDelete) => {
     if (willDelete) {
        window.location.href="/backend/home/inactive/"+id;
   }
   });
   }
        //  function myFunction1() {
        //      if(!confirm("Are You Sure to delete this ?"))
        //      event.preventDefault();
        //  }

</script>
@endif