@extends('partials.master')

@section('css')
@endsection

@section('content')

		<section id="body">
			<div class="container">
					<div class="col-md-9 col-sm-8">
						<div class="row" id="article-single">
							<a href="index.html">< BACK</a>
							</br>
							</br>
							<h1>Stay informed</h1>
							<p>Be a part of our mailing list to receive updates, news and our newsletters.</p>
							<br/>
							<form>
								<div class="row">
									<div class="col-md-offset-1 col-md-11">
										<div class="col-md-12">
											<label>Name<span class="yellow-txt">*</span></label>
											<input type="text" class="" placeholder="Type your name" required>
										</div>
										<div class="col-md-6">
											<label>Position</label>
											<input type="text" class="" placeholder="Type your position">
										</div>
										<div class="col-md-6">
											<label>Phone/Mobile Number</label>
											<input type="text" class="" placeholder="Type your phone number">
										</div>
										<div class="col-md-12">
											<label>Company</label>
											<input type="text" class="" placeholder="Type your company">
										</div>
										<div class="col-md-12">
											<label>Email<span class="yellow-txt">*</span></label>
											<input type="text" class="" placeholder="Type your email" required>
										</div>
										<input type="submit" value="Submit">
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 sidebar">
						<div id="weather">
							<h3>WEATHER</h3>
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6">
									Thu 07:45<br/>
									<span>17 <span class="celsius">&#8451;</span></span>	<br/>
									Berlin
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									Thu 07:45<br/>
									<span>32 <span class="celsius">&#8451;</span></span>	<br/>
									Abu Dhabi
								</div>
							</div>
							<br/>
							<h3>TWITTER</h3>
							<img src="img/twitter.png" width="100%">
							<br/>
							<br/>
							<h3>FACEBOOK</h3>
							<img src="img/facebook.png" width="100%">
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<footer id="footer">
			<div class="container">
				<div class="col-md-3  col-sm-3">
					<h4>Website</h4>
					<ul>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Disclaimer</a></li>
					</ul>
				</div>
				<div class="col-md-6  col-sm-6">
					<a href="newsletter.html">Subscribe here for updates and our newsletter</a>
					<!--<h4>Website</h4>
					<ul>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Disclamer</a></li>
					</ul>-->
				</div>
				<div class="col-md-3  col-sm-3">
					<ul class="socials">
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					</ul>
					<span id="copyright">
						©Privacy policy / Rights <br/> stand 2020
					</span>
				</div>
			</div>
		</footer>
	
		<script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. 
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>-->
    </body>
</html>
