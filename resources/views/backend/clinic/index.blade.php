@include('layouts.partial.master')
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

                                <!-- Exportable Table -->

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            @if(Auth::user()->role_id==1)
                                
                                    <a href="/backend/clinic/create" class="form-control btn btn-primary" type="button" style="font-size: 18px;">New Clinic</a>
                                
                                @else
                                @endif
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th>Clinic Name</th>
                                                
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Action</th>
                                                <th>Action</th>
                                                @else
                                                @endif
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(Auth::user()->role_id==1)

                                        @foreach ($objs as $obj)
                                       
                                            <tr>
                                                <td>{{ $obj->name }}</td>
                                                
                                                <td>{{ $obj->address }}</td>
                                                
                                                
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
                                                <td><a class="btn btn-primary" onclick="return myFunction(this.id);" id="{{ $parameter }}" href='/backend/clinic/{{ $parameter }}/add_doctor'> <i class="fas fa-edit"></i>Add</a></td>
                                                <td><a class="btn btn-success" onclick="return myFunction1(this.id);" id="{{ $parameter }}" href='/backend/clinic/{{ $parameter }}/edit'> <i class="fas fa-edit"></i>Edit</a></td>

                                                 
                                                </tr>       
                                                @endforeach
                                            @else

                                            @foreach ($obj as $objs)
                                       
                                            <tr>
                                                <td>{{ $objs->name }}</td>
                                                
                                                <td>{{ $objs->address }}</td>
                                                
                                                
                                                <td>
                                                @if($objs->status == 1)
                                                <p class="text-success">Active</p>
                                                @else
                                                <p class="text-danger">In-Active</p>
                                                @endif
                                                </td>
                                                <td>{{ $objs->created_at}}</td>
                                                <td>{{ $objs->updated_at}}</td>

                                              
                                                 
                                                </tr>       
                                                @endforeach
                                                @endif
                                        
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Clinic Name</th>
                                                
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                            @if(Auth::user()->role_id==1)
                                                <th>Action</th>
                                                <th>Action</th>
                                                @else
                                                @endif
                                              
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
     text: "If you want to confirm this,Click ok",
     icon: "warning",
     buttons: true,
     dangerMode: true,
     }).then((willDelete) => {
     if (willDelete) {
     window.location.href="/backend/clinic/"+id+"/add_doctor";
 
   }
   });
   }
    
     function myFunction1(id) {
       
       event.preventDefault();

       swal({
     title: "Are you sure?",
     text: "If you want to confirm this,Click ok",
     icon: "warning",
     buttons: true,
     dangerMode: true,
     }).then((willDelete) => {
     if (willDelete) {
     window.location.href="/backend/clinic/"+id+"/edit  ";
 
   }
  
  });
      }  

</script>       

