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
	<section class="hero-wrap js-fullheight" style="background-image: url('/frontend/images/bg_11.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
							  <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-6 ftco-animate pb-5" style="margin-bottom:70px !important;">
         <p class="breadcrumbs">
		 						<form action="/search" method="post">
                                {{ csrf_field() }}
								<div>
                                  <input type="text" id="new" class="form-control" placeholder="Search Doctor Name here" name="q">
								  <button type="submit" id="new2" class="btn btn-secondary py-4 px-4">Search</button>
								  </div>
                              </form></p>

       </div>
     </div>
   </div>
	</section>

	<section class="ftco-section bg-light ftco-no-pt intro">
		<div class="container">
			<div class="row">
				@foreach($objs as $obj)
				<div class="col-md-4 d-flex align-self-stretch" style="margin-top:50px;">
					<div class="d-block services d-flex justify-content-between" >
						<div class="icon d-flex align-items-center justify-content-center" >
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
                <br>
			</div>
		</div>
	</section>


	<section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb bg-light">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 col-lg-5 d-flex">
					<div class="img w-100 d-flex align-self-stretch align-items-center" style="background-image:url(/frontend/images/about_1.jpg);">
					</div>
				</div>
				<div class="col-md-6 col-lg-7 pl-lg-5">
					<div class="py-md-4">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
								<span class="subheading">Welcome to Flora Cares</span>
								<h2 class="mb-4">We Are Best Agency <br> For Your Health</h2>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
								<ul class="list-services">
									<li class="d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
										<p>Qualified Groomer</p>
									</li>
									<li class="d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
										<p>Over 20 Years of Experienced</p>
									</li>
									<li class="d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
										<p>Who Care For Your Health</p>
									</li>
									<li class="d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
										<p>Best Health Care</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@include('layouts.frontend.footer')

