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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>Clinic Name</th>
                                                <th>Doctor Name</th>
                                                <th>date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($clinic as $obj)
                                       
                                            <tr>
                                                <td>{{ $obj->name }}</td>
                                                <td>{{ $obj->user_name }}</td>
                                                <td>{{ $obj->date }}</td>
                                                <td>{{ $obj->from_time }}</td>
                                                <td>{{ $obj->to_time }}</td>
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

                                                 
                                                </tr>       
                                                @endforeach
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>Clinic Name</th>
                                                <th>Doctor Name</th>
                                                <th>date</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                               
                        
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
    function myFunction() {
        if(!confirm("Are You Sure to update this ?"))
        event.preventDefault();
    }
    

</script>       

