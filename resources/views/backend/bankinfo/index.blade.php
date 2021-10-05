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
                                
                                    <a href="/backend/bankinfo/create" class="form-control btn btn-primary" type="button" style="font-size: 18px;">New Bank</a>
                                
                                @else
                                @endif
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable" id="dynamic_field">
                                        <thead>
                                            <tr class="dynamic-added">
                                                <th>Bank Type</th>
                                                <th>User Name</th>
                                                <th>Bank Number</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($objs as $obj)
                                       
                                            <tr>
                                                <td>{{ $obj->name }}</td>
                                                <td>{{ $obj->user_name }}</td>
                                                <td>{{ $obj->number }}</td>
                                                
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

                                                <td><a class="btn btn-info" onclick="return myFunction(this.id);" id="{{ $parameter }}" href='/backend/bankinfo/{{ $parameter }}/edit'> <i class="fas fa-edit"></i> Edit</a></td>

                                                <td>
                                                <form id="confirm_delete_{{ $obj->id }}" action="{{ url('/backend/bankinfo/destroy', ['id' => $obj->id]) }}"  method="post">
                                                <button type="submit" onclick="return myFunction1(this.id);" id="{{ $obj->id }}" class="btn btn btn-danger" > <i class="fas fa-times-circle"></i> Delete</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="" />
                                                </form>
                                                </td>
                       
                                                 
                                                </tr>       
                                                @endforeach
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Bank Type</th>
                                                <th>User Name</th>
                                                <th>Bank Number</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action</th>
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
     window.location.href="/backend/bankinfo/"+id+"/edit";
 
   }
   });
   }
    
    function myFunction1(id) {
      
      event.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      }).then((willDelete) => {
      if (willDelete) {
      $("#confirm_delete_"+id).off("submit").submit();
      swal("You have successfully deleted", {
      icon: "success",
      });
    } 
  
  });
      }  

</script>       
