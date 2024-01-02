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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="stylesearch.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Search</title>
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
  <div id="booking" class="section form-div">
    <div class="ssticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                </div>
                <div class="col-lg-12">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <span class="form-label">Day&Time</span>
                                        <input class="form-control" type="date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
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
                            <div class="form-btn">
                                <a class="submit-btn col-lg-12 text-center" href="search.php">Search </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fixed-top mt-5">
<div class="row">
  <div class="col-md-12">
    <div class="grid search">
      <div class="grid-body">
        <div class="row">
          <div class="col-md-3">
            <h4>By category:</h4>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Morning (0h - 12h)</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Mid-Day (12h - 17h)</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> Night (17h - 0h)</label>
            </div>
            <div class="padding"></div>
            <div class="padding"></div>
            <h4>By price:</h4>
            <div class="checkbox">
                <label><input type="checkbox" class="icheck"> 50DH-100DH</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" class="icheck">100DH-150DH</label>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" class="icheck">150DH-200DH</label>
              </div>
            <div class="slider-primary">
              <div class="slider slider-horizontal" style="width: 152px;"><div class="slider-track"><div class="slider-selection" style="left: 30%; width: 50%;"></div><div class="slider-handle round" style="left: 30%;"></div><div class="slider-handle round" style="left: 80%;"></div></div><div class="tooltip top hide" style="top: -30px; left: 50.1px;"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div></div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="input-group">
              <input type="text" class="form-control" >
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <div class="padding"></div>
            <div class="row">
              <div class="col-md-6 text-right">
                <div class="btn-group">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <td class="image"><img src="https://www.bootdey.com/image/400x300/FF8C00" alt=""></td>
                  <td class="product"><strong>Product 1</strong><br>This is the product description.</td>
                  <td class="price text-right">$350</td>
                </tr>
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>