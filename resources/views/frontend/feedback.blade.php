@include('layouts.frontend.header')



<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/doctor.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start" >
        <div class="col-md-9 ftco-animate pb-5" style="margin-bottom:70px !important;">
         <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Feed Back <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-3 bread">Feed Back</h1>
       </div>
     </div>
   </div>
  </section>

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

  <section class="ftco-section contact-section">
    <div class="container">
  <div class="row no-gutters block-9">
    <div class="col-md-6 order-md-last d-flex">
      <form action="/frontend/feedback/store" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <input type="hidden" name="feedback_id">
      <div class="form-group">
        <select value="{{ old('user_id') }}" class="form-control" name="user_id">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
        </div>

        <div class="form-group">

          <input type="email" name="email" class="form-control" placeholder="Your Email">

        </div>

        <div class="form-group">
        <select value="{{ old('user_doctor_id') }}" class="form-control" name="user_doctor_id" >
        @foreach($doctor as $doc)
        <option value="{{$doc->id}}">{{$doc->name}}</option>
        @endforeach
        </select>
        </div>

        <div class="form-group">
        <select value="{{ old('clinic_id') }}" class="form-control" name="clinic_id" >
        @foreach($clinic as $cli)
        <option value="{{$cli->id}}">{{$cli->name}}</option>
        @endforeach
        </select>
        </div>

        <div class="form-group">
          <input type="text" name="phone" class="form-control" placeholder="Your Phone Number">
        </div>

        <div class="form-group">
          <textarea id="" cols="30" rows="7" class="form-control" name="feedback" placeholder="Feedback"></textarea>
        </div>

        <div class="form-group">
          <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
        </div>
      </form>

    </div>

  </div>
  </section>

@include('layouts.frontend.footer')
