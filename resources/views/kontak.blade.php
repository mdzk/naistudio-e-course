@extends('template')
@section('title')
  Belajar PHP Dasar
@endsection
@section('content')
<div class="wrepper" style="padding: 0">
  <div class="content">

    <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand">
              <img width="300px" src="{{ url('assets/img/logo.png') }}">
            </div>

            <div class="card card-primary">
              <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-5 p-0">
                  <div class="card-header text-center"><h4>Contact Us</h4></div>
                  <div class="card-body">
                    <form method="POST">
                      <div class="form-group floating-addon">
                        <label>Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-user"></i>
                            </div>
                          </div>
                          <input id="name" type="text" class="form-control" name="name" autofocus placeholder="Name">
                        </div>
                      </div>

                      <div class="form-group floating-addon">
                        <label>Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fa fa-envelope"></i>
                            </div>
                          </div>
                          <input id="email" type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" placeholder="Type your message" data-height="150"></textarea>
                      </div>

                      <div class="form-group text-right">
                        <button type="submit" class="btn btn-round btn-lg btn-primary">
                          Send Message
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7 p-0">
                  <div id="map" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.801628152432!2d105.33165421419446!3d-5.135619953381928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40bfacb379ac1b%3A0xb4981883d4515b75!2sCV.+Naistudio!5e0!3m2!1sen!2sid!4v1554173669216!5m2!1sen!2sid" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  </div>
</div>
@endsection