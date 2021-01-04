<div style="margin-top: 150px">
        <section class="page-div" id="contact">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="div-heading text-uppercase mt-1" style="color: white;">Contact Me</h2>
                <h3 class="div-subheading contact-subhead mb-3">Will be a pleasure hearing from you :)</h3>
              </div>
            </div>
            <div class="row">

              <div class="col-lg-12">
              <form method="POST" action="{{ route('mail.send') }}">
              @include('partials.error-message');
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" name="name" type="text" placeholder="Your Name *" required="required" >
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="Your Email *" required="required" >
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phone" placeholder="Your Phone *" required="required" >
                        <p class="help-block text-danger"></p>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" name="mail_message" placeholder="Your Message *" required="required" ></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                    <div id="success"></div>

                    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" >Send Message</button>

                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            </div>
          </div>
        </section>

      </div>