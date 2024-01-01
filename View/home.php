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

// Create an instance of CompanyDAO
$companyDAO = new CompanyDAO();

// Get companies using the get_companies() method
$companies = $companyDAO->get_companies();
// Assume you have a function in your CityDAO to get city names
$cityDAO = new CityDAO();

// Get cities using the get_city() method
$cities = $cityDAO->get_city();

// Assume you have a function in your RouteDAO to get departure and destination cities
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
				<a class="navbar-brand text-light" href="#">Bus Booking</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a class="text-light" href="#">Home</a></li>
					<li><a class="text-light" href="#routes">Routes</a></li>
					<li><a class="text-light" href="#companies">Bus Companies</a></li>
				</ul>
			</div>
		</div>
	</nav>
	</div>
	<div id="booking" class="section form-div">
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
							<form>
                                <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<span class="form-label">Departure</span>
										<select class="form-control" name="check_in" required>
											<?php foreach ($cities as $city): ?>
												<option value="<?php echo $city->getNamecity(); ?>"><?php echo $city->getNamecity(); ?></option>
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
									<button class="submit-btn">Search</button>
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
                <h2>Our Bus Companies</h2>
                <p>Learn more about the bus companies we collaborate with.</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($companies as $company): ?>
                <div class="col-md-4">
                    <div class="company-card">
                        <img  src="data:image/jpg;base64,<?php echo base64_encode($company->getCompanyImage()); ?>" alt="<?php echo $company->getCompanyName(); ?>" class="company-image">
                        <h3><?php echo $company->getCompanyName(); ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<footer class="footer bg-primary" style="margin-top: 1000px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Contact Us</h4>
                <p>Email: info@busbooking.com</p>
                <p>Phone: +1 (555) 123-4567</p>
            </div>
            <div class="col-md-6">
                <h4>Follow Us</h4>
                <a href="#" target="_blank"><i class="bi bi-facebook" style="color: brown;"></i></a>
                <a href="#" target="_blank"><i class="bi bi-twitter"style="color: brown;"></i></a>
                <a href="#" target="_blank"><i class="bi bi-instagram"style="color: brown;"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>&copy; <?php echo date('Y'); ?> Bus Booking. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>

