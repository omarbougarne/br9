<!-- 
// Assuming you have included your City model and CityDAO files
require_once __DIR__ . '/../Model/city/cityDAO.php';
require_once __DIR__ . '/../Model/city/modelCity.php';



// ... rest of your code ...


// Create an instance of CityDAO
$cityDAO = new CityDAO();

// Get the list of cities
$cities = $cityDAO->get_city();

// Loop through the cities and display them
foreach ($cities as $city) {
    echo $city->getNamecity() ;
}
 -->
 <?php
require_once __DIR__ . '/../Model/city/cityDAO.php';
require_once __DIR__ . '/../Model/city/modelCity.php';
require_once __DIR__ . '/../Model/route/routedao.php';
require_once __DIR__ . '/../Model/route/modelroute.php';
require_once __DIR__ . '/../Model/company/companydao.php';
require_once __DIR__ . '/../Model/company/modelcompany.php';


$companyDAO = new CompanyDAO();
$companies = $companyDAO->get_companies();
$cityDAO = new CityDAO();
$cities = $cityDAO->get_city();
$routedao = new RouteDAO();
$routes = $routedao->get_routes();
?>
 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bus Booking</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="style.css" />
	
</head>

<body>
	<div class="bg-primary">
	<nav class="navbar  bg-primary main-nav">
		<div class="container bg-primary">
			<div class="navbar-header bg-primary">
				<a class="navbar-brand text-light" href="home.php">Bus Booking</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a class="text-light" href="home.php">Home</a></li>
					<li><a class="text-light" href="#companies">Bus Companies</a></li>
				</ul>
			</div>
		</div>
	</nav>
	</div>
	<div id="booking" class="section form-div sticky-top">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
								Perspiciatis.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
            <form method="post" action="controllerhoraire.php?action=search">
                                <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Departure</span>
										<select class="form-control" name="check_in" required>
											<?php foreach ($cities as $city): ?>
												<option value="<?php  echo $city->getNamecity(); ?>"><?php echo $city->getNamecity(); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Destination</span>
										<select class="form-control" name="check_out" required>
											<?php foreach ($cities as $city): ?>
												<option value="<?php echo $city->getNamecity(); ?>"><?php echo $city->getNamecity(); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Day&Time</span>
											<input class="form-control" type="date" required>
										</div>
									</div>
									
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Travelers</span>
											<select class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									
									</div>
								</div>
								<div class="form-btn">
									<a class="submit-btn" href="search.php" >Search </a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section id="companies" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Our Bus Companies</h2>
                <p class="text-center">Learn more about the bus companies we collaborate with.</p>
            </div>
        </div>
        <div class="row " style="margin-top: 100px;">
            <?php foreach ($companies as $company): ?>
                <div class="col-lg-3" >
                    <div class="company-card">
                        <img class=""  src="data:image/jpg;base64,<?php echo base64_encode($company->getCompanyImage()); ?>" alt="<?php echo $company->getCompanyName(); ?>" class="company-image">
                        <h3><?php echo $company->getCompanyName(); ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div style="margin-top: 500px;">
    <div class="container" >
        <div class="row" >
            <div class="col-md-12 text-center">
			<h2 class="book">Book in 3 steps</h2>
                <p><b>Simple, Fast, Secure</b></p>
                <p>Thanks to our online booking platform, reserving your coach ticket has never been easier.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4  etape1">
                <h3>Step 1</h3>
                <p><strong>choose</strong></p>
				<i class="bi bi-bus-front"></i>
                <p>Find the offer that suits you and select the seats of your choice.</p>
            </div>
            <div class="col-md-4  etape2">
                <h3>Step 2</h3>
                <p><strong>Book</strong></p>
				<i class="bi bi-ticket-perforated-fill"></i>
                <p>Choose from our various payment methods (by card or cash) and pay securely. You will receive a confirmation of your reservation by email and SMS.</p>
            </div>
            <div class="col-md-4  etape3">
                <h3>Step 3</h3>
                <p><strong>Get In</strong></p>
				<i class="bi bi-suitcase"></i>
                <p>Meet at the departure address with your ticket code, present it at boarding, and board the bus with peace of mind.</p>
            </div>
        </div>
    </div>
	</div>
<section style="margin-top: 100px;">
  <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
  <p class="text-center mb-5">
    Find the answers for the most frequently asked questions below
  </p>

  <div class="row">
    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i><b> A simple
        question?</b></h6>
      <p>
        <strong><u>Absolutely!</u></strong> We work with top payment companies which guarantees
        your
        safety and
        security. All billing information is stored on our payment processing partner.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i><b> A question
        that
        is longer then the previous one?</b></h6>
      <p>
        <strong><u>Yes, it is possible!</u></strong> You can cancel your subscription anytime in
        your
        account. Once the subscription is
        cancelled, you will not be charged next month.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i><b> A simple
        question?</b>
      </h6>
      <p>
        Currently, we only offer monthly subscription. You can upgrade or cancel your monthly
        account at any time with no further obligation.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i><b> A simple
        question?</b>
      </h6>
      <p>
        Yes. Go to the billing section of your dashboard and update your payment information.
      </p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i><b> A simple
        question?</b>
      </h6>
      <p><strong><u>Unfortunately no</u>.</strong> We do not issue full or partial refunds for any
        reason.</p>
    </div>

    <div class="col-md-6 col-lg-4 mb-4">
      <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i><b> Another
        question that is longer than usual</b></h6>
      <p>
        Of course! We happy to offer a free plan to anyone who wants to try our service.
      </p>
    </div>
  </div>
</section>
<footer class="text-center text-lg-start bg-body-tertiary text-muted bg-primary">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#" class="text-light">Angular</a>
          </p>
          <p>
            <a href="#" class="text-light">React</a>
          </p>
          <p>
            <a href="#" class="text-light">Vue</a>
          </p>
          <p>
            <a href="#" class="text-light">Laravel</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#" class="text-light">Pricing</a>
          </p>
          <p>
            <a href="#" class="text-light">Settings</a>
          </p>
          <p>
            <a href="#" class="text-light">Orders</a>
          </p>
          <p>
            <a href="#" class="text-light">Help</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
      </div>
	    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); margin-top:100px;">
    &copy; 2024 Copyright
  </div>
</footer>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>

