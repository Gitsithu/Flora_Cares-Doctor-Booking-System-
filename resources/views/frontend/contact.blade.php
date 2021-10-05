@include('layouts.frontend.header')

<section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/doctor_5.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start" >
        <div class="col-md-9 ftco-animate pb-5" style="margin-bottom:70px !important;">
         <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
         <h1 class="mb-3 bread">Contact us</h1>
       </div>
     </div>
   </div>
  </section>
  
  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex contact-info mb-5">
        <div class="col-md-6 col-lg-3 d-flex pt-5 ftco-animate">
         <div class="align-self-stretch box text-center bg-light">
          <div class="icon d-flex align-items-center justify-content-center">
           <span class="fa fa-map-marker"></span>
         </div>
         <h3 class="mb-4">Address</h3>
         <p>198 West 21th Street, Suite 721 New York NY 10016</p>
       </div>
     </div>
     <div class="col-md-6 col-lg-3 d-flex pt-5 ftco-animate">
       <div class="align-self-stretch box text-center bg-light">
        <div class="icon d-flex align-items-center justify-content-center">
         <span class="fa fa-phone"></span>
       </div>
       <h3 class="mb-4">Contact Number</h3>
       <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
     </div>
   </div>
   <div class="col-md-6 col-lg-3 d-flex pt-5 ftco-animate">
     <div class="align-self-stretch box text-center bg-light">
      <div class="icon d-flex align-items-center justify-content-center">
       <span class="fa fa-paper-plane"></span>
     </div>
     <h3 class="mb-4">Email Address</h3>
     <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
   </div>
  </div>
  <div class="col-md-6 col-lg-3 d-flex pt-5 ftco-animate">
   <div class="align-self-stretch box text-center bg-light">
    <div class="icon d-flex align-items-center justify-content-center">
     <span class="fa fa-globe"></span>
   </div>
   <h3 class="mb-4">Website</h3>
   <p><a href="#">yoursite.com</a></p>
  </div>
  </div>
  </div>
  <div class="row no-gutters block-9">
    <div class="col-md-6 order-md-last d-flex">
      <form action="#" class="bg-light p-5 contact-form">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Your Email">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Subject">
        </div>
        <div class="form-group">
          <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Send Message" class="btn btn-secondary py-3 px-5">
        </div>
      </form>
      
    </div>
  
    <div class="col-md-6 d-flex">
     <div class="img w-100" style="background-image: url(images/about.jpg);"></div>
   </div>
  </div>
  <div class="row">
   <div class="col-md-12">
     <div id="map" class="bg-white"></div>
   </div>
  </div>
  </div>
  </section>
  
@include('layouts.frontend.footer')