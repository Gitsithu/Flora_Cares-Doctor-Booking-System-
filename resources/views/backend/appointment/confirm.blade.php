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
                                                <th>Status</th>
                                                
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

                                                  
                                                <td>
                                                <p class="text-success">Confirmed</p>
                                                    </td>
                                                </tr>       
                                                @endforeach
                                                
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>User Name</th>
                                                <th>Clinic</th>
                                                <th>Date</th>
                                                <th>Day</th>
                                                <th>Status</th>
                                                
                        
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
            

 
