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
                          
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable" id="dynamic_field">
                                        <thead>
                                            <tr class="dynamic-added">
                                                <th>User Name</th>
                                                <th>Clinic</th>
                                                <th>Date</th>
                                                <th>Day</th>
                                                @if(Auth::user()->role_id == 2)
                                                <th>Action</th>
                                                <th>Action</th>
                                                @else
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($appoint as $app)
                                       
                                            <tr>
                                            <td>
                                                @foreach($user as $us)
                                                      
                                                      <?php 
                                                      $a = $us->id;
                                                      $b = $app->user_id;
                                                      if($a == $b){
                                                          echo $us->name;
                                                      }                                       
                                                      
                                                    ?>
                                                    
                                                      @endforeach
                                                </td>
                                            
                                                
                                                <td>
                                                @foreach($clinic as $cli)
                                                      
                                                      <?php 
                                                      $a = $cli->id;
                                                      $b = $app->clinic_id;
                                                      if($a == $b){
                                                          echo $cli->name;
                                                        break;
                                                      }                                       
                                                      
                                                    ?>
                                                    
                                                      @endforeach
                                                </td>
                                                <td>{{ $app->date}}</td>
                                                <td>{{ $app->day}}</td>

                                                  
                                                @if(Auth::user()->role_id == 2)
                                                <?php
                                                $parameter = $app->id;
                                                $parameter= Crypt::encrypt($parameter);
                                                ?>
                                                <td><a class="btn btn-info" onclick="return myFunction(this.id);" id="{{ $parameter }}" href='/backend/appointment/{{ $parameter }}/confirm'> <i class="fas fa-edit"></i> Confirm</a></td>

                                                <td>
                                                <form id="confirm_delete_{{ $parameter }}" action="{{ url('/backend/appointment', ['id' => $parameter]) }}"  method="post">
                                                <button type="submit" onclick="return myFunction1(this.id);" id="{{ $parameter }}" class="btn btn btn-danger" > <i class="fas fa-times-circle"></i> Reject</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                
                                                </form>
                                                </td>
                       
                                                @endif
                                                 
                                                </tr>       
                                                @endforeach
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>User Name</th>
                                                <th>CLinic</th>
                                                <th>Date</th>
                                                <th>Day</th>
                                                @if(Auth::user()->role_id == 2)
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
     window.location.href="/backend/appointment/"+id+"/confirm";
 
   }
   });
   }
    
    function myFunction1(id) {
      
      event.preventDefault();
      swal({
      title: "Are you sure?",
      text: "Once rejected, you will not be able to confirm.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      }).then((willDelete) => {
      if (willDelete) {
      $("#confirm_delete_"+id).off("submit").submit();
      swal("You have successfully rejected", {
      icon: "success",
      });
    } 
  
  });
      }  

</script>       
