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
                                <table class="table table-bordered table-striped table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Bank Name</th>
                                                <th>Bank Number</th>
                                                <th>Payment Slip</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        

                                        @foreach ($obj as $objs)
                                       
                                            <tr>
                                                <td>{{ $objs->user_name }}</td>
                                                <td>{{ $objs->bank_name }}</td>
                                                <td>{{ $objs->amount }}</td>
                                                <td><img src="{{ $objs->payment_shot }}" width="50" height="50" /></td>
                                                
                                                <td>{{ $objs->created_at}}</td>
                                                <td>{{ $objs->updated_at}}</td>

                                                <?php
                                                $parameter = $objs->user_id;
                                                $parameter= Crypt::encrypt($parameter);
                                                ?>

                                                @if(Auth::user()->role_id==1)
                                                @if($objs->status == 2)
                                                <td style="text-align:center;"><a class="btn btn-info" onclick="return myFunction1(this.id);" id="{{ $parameter }}" href='/home/{{ $parameter }}/active'> <i class="fas fa-edit"></i> Active</a></td>
                                                @elseif($objs->status == 1)
                                                <td style="text-align:center;"><a class="btn btn-danger" onclick="return myFunction2(this.id);" id="{{ $parameter }}" href='/home/{{ $parameter }}/inactive'> <i class="fas fa-edit"></i> Inactive</a></td>
                                                @endif
                                                @endif
                                                </tr>       
                                                @endforeach
                                        
                                        
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Bank Name</th>
                                                <th>Bank Number</th>
                                                <th>Payment Slip</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                @if(Auth::user()->role_id==1)
                                                <th>Action</th>
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
     window.location.href="/backend/home/"+id+"/active  ";
 
   }
  
  });
      }  
   function myFunction2(id) {
       
       event.preventDefault();

       swal({
     title: "Are you sure?",
     text: "If you want to confirm this,Click ok",
     icon: "warning",
     buttons: true,
     dangerMode: true,
     }).then((willDelete) => {
     if (willDelete) {
     window.location.href="/backend/home/"+id+"/inactive  ";
 
   }
  
  });
      }  

</script>