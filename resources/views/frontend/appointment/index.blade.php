@include('layouts.frontend.header')

<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/doctor_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span style="color:black;">Appointment History <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-3 bread">Appointment History</h1>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row d-flex">
      @foreach($appoint as $app)
      <div class="col-lg-4 ftco-animate">
        <div class="blog-entry">
          <div class="desc">
           <div class="d-flex">
            <div class="meta pt-1 text-right pr-6" style="margin-top:9%;margin-right:8%;">
             <div><span class="fa fa-calendar"></span>{{$app->date}}</div>
             <div><span class="fa fa-user"></span>
              @foreach($user as $us)
                                                      
                                <?php 
                                $a = $us->id;
                                $b = $app->user_doctor_id;
                                if($a == $b){
                                    echo $us->name;
                                }                                       
                                
                                ?>
              @endforeach                                 
             </a>
            </div>
           </div>
           <div class="text d-block">
            <h3 class="heading" >
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
            </h3>
            <p>
            @if($app->status==0)
            <a class="btn btn-primary py-2 px-3">
            Pending
            </a>
            @elseif($app->status==1)
            <a class="btn btn-secondary py-2 px-3">
            Confirmed
            </a>
            @elseif($app->status==2)
            <a class="btn btn-danger py-2 px-3">
            Denied
            </a>
            @else
            <a class="btn btn-danger py-2 px-3">
            Expired
            </a>
            @endif
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
    @endforeach
  </div>
  </div>
  
</section>

@include('layouts.frontend.footer')