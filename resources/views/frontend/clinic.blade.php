@include('layouts.frontend.header')
<div class="container">
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

</div>
	<section class="hero-wrap js-fullheight" style="background-image: url('/frontend/images/doctor_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>

		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">


			</div>
		</div>
	</section>

	<section class="ftco-section bg-light ftco-no-pt intro">
		<div class="container">
			<div class="row">
				@foreach($objs as $obj)
				<div class="col-md-4 d-flex align-self-stretch" style="margin-top:50px;">
					<div class="d-block services d-flex justify-content-between" >
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-stethoscope"></span>
						</div>
                        
						<div class="media-body">
						<h3 class="heading">{{$obj->name}}</h3>
						<?php
                                                $parameter = $obj->id;
                                                $parameter= Crypt::encrypt($parameter);
                                                ?>
							<p class="mb-0"><a href="/frontend/clinic/detail/{{ $parameter }}" style="background-color:white !important; color:#fd4c82 !important;" class="btn btn-primary py-2 px-3">More Detail</a></p>
							<!-- <a href="#" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a> -->
						</div>
					</div>
				</div>
                
                @endforeach
                

			</div>
            
		</div>
	</section>


@include('layouts.frontend.footer')

