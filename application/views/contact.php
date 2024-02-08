 <div class="wrapper">
	<div class="preloader">
		<div class="loading">
			<span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
		</div>
	</div><!-- /.preloader -->

	<!-- =========================
	Header
	=========================== -->
	<?php echo view("include/menus"); ?>

	<!-- =========================
	Google Map
	=========================  -->
	<section class="google-map py-0">
		<div id="map" style="height: 500px;"></div>
		<script src="assets/js/google-map.js"> </script>
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer> </script>
		<!-- CLICK HERE (https://developers.google.com/maps/documentation/embed/get-api-key) TO  LERAN MORE ABOUT GOOGLE MAPS API KEY -->
	</section><!-- /.GoogleMap -->

	<!-- ==========================
	contact layout 1
	=========================== -->
	<section class="contact-layout1">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
						<div class="row">
							<div class="col-sm-12">
								<h4 class="contact-panel__title">Get In Touch</h4>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="contact-name">Name (required)</label>
									<input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact-name"
									required>
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="contact-email">Email (required)</label>
									<input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email"
									required>
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="contact-Phone">Phone (required)</label>
									<input type="text" class="form-control" placeholder="Phone" id="contact-Phone" name="contact-phone"
									required>
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="contact-website">Website (optional)</label>
									<input type="text" class="form-control" placeholder="Website (optional)" id="contact-website"
									name="contact-website">
								</div>
							</div><!-- /.col-lg-6 -->
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="form-group mb-20">
									<label for="contact-message">Additional Details (optional)</label>
									<textarea class="form-control" placeholder="Describe your inquirey!" id="contact-message"
                      name="contact-message"></textarea>
								</div>
								<div class="custom-control custom-checkbox d-flex align-items-center  mb-20">
									<input type="checkbox" class="custom-control-input" id="terms">
									<label class="custom-control-label" for="terms">I accept the privacy and terms.</label>
								</div>
								<button type="submit" class="btn btn__secondary btn__block ">Submit Request</button>
								<div class="contact-result"></div>
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
					</form>
				</div><!-- /.col-lg-6 -->
				<div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
					<div class="contact-panel__info bg-overlay bg-overlay-primary">
						<div class="bg-img"><img src="assets/images/contact/1.jpg" alt="banner"></div>
						<div class="contact-block">
							<h5 class="contact-block__title">Our Location</h5>
							<ul class="contact-block__list list-unstyled">
								<li>Gura , Jalandhar, Pin 144409</li>
							</ul>
						</div><!-- /.contact-panel__info__block -->
						<div class="contact-block">
							<h5 class="contact-block__title">Quick Contact</h5>
							<ul class="contact-block__list list-unstyled">
								<li><a href="mailto:redcubesolutions.co.in@gmail.com"></a>Email:  redcubesolutions.co.in@gmail.com</li>
								
							</ul>
						</div><!-- /.contact-panel__info__block -->
						<div class="contact-block">
							<h5 class="contact-block__title">Opening Hours</h5>
							<ul class="contact-block__list list-unstyled">
								<li>Monday - Saturday</li>
								<li>09:00 AM - 06:00 PM</li>
							</ul>
						</div><!-- /.contact-panel__info__block -->
						<a href="contacs.html" class="btn btn__white btn__bordered btn__icon btn__xl">
							<span>Find Your Solution</span>
							<i class="icon-arrow-right"></i>
						</a>
					</div>
				</div><!-- /.col-lg-5 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.contact layout 1 -->

	<!-- ==========================
	Contact Info
	============================ -->
	<!--
	<section class="contact-info pt-0 pb-70">
	 	<div class="container">
			<div class="row">
				
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="contact-info-box">
						<h4 class="contact__info-box-title">London Office</h4>
						<ul class="contact__info-list list-unstyled">
							<li>Email: <a href="mailto:Mintech@7oroof.com">Mintech@7oroof.com</a></li>
							<li>Address: 2307 Beverley Rd Brooklyn, NY</li>
							<li>Phone: <a href="tel:5565454117">55 654 541 17</a></li>
							<li>Hours: Mon-Fri: 8am – 7pm</li>
						</ul>
					</div>
				</div>
			
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="contact-info-box">
						<h4 class="contact__info-box-title">Berlin Office</h4>
						<ul class="contact__info-list list-unstyled">
							<li>Email: <a href="mailto:Mintech@7oroof.com">Mintech@7oroof.com</a></li>
							<li>Address: 2307 Beverley Rd Brooklyn, NY</li>
							<li>Phone: <a href="tel:5565454117">55 654 541 17</a></li>
							<li>Hours: Mon-Fri: 8am – 7pm</li>
						</ul>
					</div>
				</div>
				
				<div class="col-sm-12 col-md-4 col-lg-4">
					<div class="contact-info-box">
						<h4 class="contact__info-box-title">Manchester Office</h4>
						<ul class="contact__info-list list-unstyled">
							<li>Email: <a href="mailto:Mintech@7oroof.com">Mintech@7oroof.com</a></li>
							<li>Address: 2307 Beverley Rd Brooklyn, NY</li>
							<li>Phone: <a href="tel:5565454117">55 654 541 17</a></li>
							<li>Hours: Mon-Fri: 8am – 7pm</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
  -->
	<!-- ========================
	Footer
	========================== -->
	<?php echo view("include/footermenu"); ?>

	<?php echo view("include/burgermenu"); ?>

	<div class="login-popup" id="login-popup">
		<div class="login-popup-wrapper">
			<form class="login-popup__form">
				<h3 class="login-popup__title">Login!</h3>
				<p class="login-popup__desc">Connect, organize and get things done to keep your IT business safe.</p>
				<div class="form-group mb-30">
					<label>Email (required)</label>
					<input type="text" class="form-control" placeholder="username">
				</div>
				<div class="form-group mb-20">
					<label>Password (required)</label>
					<input type="password" class="form-control" placeholder="password">
				</div>
				<div class="d-flex align-items-center justify-content-between mb-20">
					<div class="custom-control custom-checkbox d-flex align-items-center">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Remember Me!</label>
					</div>
					<a href="#" class="fz-14 font-weight-bold color-secondary">Forget Password?</a>
				</div>
				<button type="submit" class="btn btn__secondary btn__block">Login</button>
			</form>
			<div class="d-flex justify-content-center align-items-center mt-20">
				<span class="color-white fz-14 font-weight-bold">Don’t Have An Account?</span>
				<button id="go-register" class="go-register fz-14 font-weight-bold">
					<span>Register Here</span>
					<i class="icon-arrow-right"></i>
				</button>
			</div>
		</div>
	</div><!-- /.login-popup -->

	<div class="login-popup" id="register-popup">
		<div class="login-popup-wrapper">
			<form class="login-popup__form">
				<h3 class="login-popup__title">Register!</h3>
				<p class="login-popup__desc">Connect, organize and get things done to keep your IT business safe.</p>
				<div class="form-group mb-30">
					<label>Email (required)</label>
					<input type="text" class="form-control" placeholder="username">
				</div>
				<div class="form-group mb-20">
					<label>Password (required)</label>
					<input type="password" class="form-control" placeholder="password">
				</div>
				<div class="d-flex align-items-center justify-content-between mb-20">
					<div class="custom-control custom-checkbox d-flex align-items-center">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">I read & agree to
							<a href="#">Terms &
								Conditions</a></label>
					</div>
				</div>
				<button type="submit" class="btn btn__secondary btn__block">Register</button>
			</form>
			<div class="d-flex justify-content-center align-items-center mt-20">
				<span class="color-white fz-14 font-weight-bold">Have An Account?</span>
				<button id="go-login" class="go-login fz-14 font-weight-bold">
					<span>Login Here</span>
					<i class="icon-arrow-right"></i>
				</button>
			</div>
		</div>
	</div><!-- /.login-popup -->
</div>