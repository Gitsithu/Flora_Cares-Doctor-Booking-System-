@include('layouts.frontend.header')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/doctor_4.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Appointment <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-3 bread">Token</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center pb-5 mb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Your Token</span>
					<h2>Accepted Token List</h2>
				</div>
			</div>
			<div class="row">
            @foreach ($token as $toke)
                
            
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="block-7">
						
						<div class="text-center p-4">
							<span class="excerpt d-block">TOKEN NUMBER</span>
							<span class="price"> <span class="number">{{$toke->token_number}}</span></span>
							
							<ul class="pricing-text mb-5">
								<li><span class="fa fa-check mr-2"></span>
                                @foreach($clinic as $cli)
                                                      
                                <?php 
                                $a = $cli->id;
                                $b = $toke->clinic_id;
                                if($a == $b){
                                    echo $cli->name;
                                break;
                                }                                       
                                
                                ?>
                            
                                @endforeach
                                </li>
								<li><span class="fa fa-check mr-2"></span>
                                  @foreach($user as $us)
                                                      
                                <?php 
                                $a = $us->id;
                                $b = $toke->user_doctor_id;
                                if($a == $b){
                                    echo $us->name;
                                }                                       
                                
                                ?>
                                @endforeach                                 
                                </li>
								<li><span class="fa fa-check mr-2"></span>{{$toke->date}}</li>
							</ul>
                            @if($toke->status==1)
							<a href="#" class="btn btn-secondary d-block px-3 py-3">
                            Valid
                            </a>
                            @else
                            <a href="#" class="btn btn-danger d-block px-3 py-3">
                            Expire
                            </a>
                            @endif
                            
						</div>
					</div>
				</div>
                @endforeach
            </div>
		</div>
	</section>
@include('layouts.frontend.footer')
