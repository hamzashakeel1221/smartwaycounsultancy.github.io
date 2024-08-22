<?php
session_start(); // Start the session

$conn = mysqli_connect("localhost", "root", "", "smart_way_consultancy");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['Message'];

        // Inserting Values into the Table 
        $sql = "INSERT INTO `contact us` (`Name`, `Email`, `Subject`, `Message`) VALUES ('$name', '$email', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Set session variable for success message
            $_SESSION['success_message'] = "Record Inserted Successfully";
            header("Location: ContactUs.php");
            exit(); // Ensure that the script stops after redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Contactus.css">
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;900&display=swap" rel="stylesheet">
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($_SESSION['success_message'])): ?>
                alert("<?php echo $_SESSION['success_message']; ?>");
                <?php unset($_SESSION['success_message']); // Clear the message after showing it ?>
            <?php endif; ?>
        });
    </script>
  </head>
<body class="bg-light">
    <header>
        <div class="background">
            <div class="overlay"></div>
            
            
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
          <div class="container">
              <a class="navbar-brand" href="#">
                  <img src="Pictures/logo01.png" alt="Logo" width="100" height="100" class="d-inline-block align-top ml-3 logo">
              </a>
              <button class="navbar-toggler color-t" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse text-center" id="navbarNav">
                  <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                          <a class="nav-link font-weight-bold d-flex align-items-center justify-content-center" href="index.html">
                              <i class="fas fa-home me-2"></i> Home
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link font-weight-bold d-flex align-items-center justify-content-center" href="Services.html">
                              <i class="fas fa-concierge-bell me-2"></i> Services
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link font-weight-bold d-flex align-items-center justify-content-center" href="AboutUs.html">
                              <i class="fas fa-info-circle me-2"></i> About us
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link font-weight-bold d-flex align-items-center justify-content-center" href="ContactUs.php">
                              <i class="fas fa-phone-alt me-2"></i> Contact us
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      
        
       
    
        
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-name">
                            Contact Us
                        </div>
                    </div>
                    
                </div>
            </div>
    </header>


    






<div class="container divvv">
    <h3 class="mb-5 text-black text-center" style="font-size: 30px; font-weight: bolder; text-decoration: underline;">Contact Us</h3>
    <div class="row">
        <!-- Form Section -->
        <div class="col-12">
            <div id="formSection">
                <div class="cform">
                    <h1>Request a Quote</h1>
                    <h6>Ready to Work Together? Build a project with us!</h6>
                    <form action="ContactUs.php" method="post">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container mt-5 mt-sm-0">
    <h3 class="mb-5 text-black text-center" style="font-size: 30px; font-weight: bolder; text-decoration: underline;">Our Location</h3>
    <div class="row">
        <div class="col-12">
            <div class="map">
                <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2037.3217586806354!2d18.0285926!3d59.29418329999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f77a2f9900001%3A0x343b3571c765d37c!2sMy%20Finans%20Sweden%20Ab!5e0!3m2!1sen!2s!4v1724334812572!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </p>
            </div>
        </div>
    </div>
</div>




    
     
    



<!-- --------Footer-------- -->
<footer class="footer mt-auto py-3 text-white">
    <div class="container">
        <div class="row toggles">
            <!-- Toggle Buttons -->
            <div class="col-12 col-md-4">
                <!-- Visible on small and medium screens -->
                <button class="btn btn-hover-2 text-white d-md-none" data-toggle="collapse" data-target="#toggle1" aria-expanded="false" aria-controls="toggle1">
                    <h5>Our Services</h5> 
                </button>
                <!-- Collapse on small and medium screens -->
                <div class="collapse d-md-none" id="toggle1">
                    <div class="card card-body bg-secondary text-white">
                        <ul>
                            <li>Agriculture Manpower</li>
                            <li>Construction Manpower</li>
                            <li>Hospitality Manpower</li>
                            <li>Manufacturing Manpower</li>
                            <li>Oil and Gas Manpower</li>
                            <li>Carpenter Manpower</li>
                            <li>Warehouse Manpower</li>
                            <li>HealthCare Manpower</li>
                            <li>Transportation Manpower</li>
                        </ul>
                    </div>
                </div>
                <!-- Visible directly on large screens -->
                <div class="d-none d-md-block">
                    <h5>Our Services</h5>
                    <ul>
                        <li>Agriculture Manpower</li>
                        <li>Construction Manpower</li>
                        <li>Hospitality Manpower</li>
                        <li>Manufacturing Manpower</li>
                        <li>Oil and Gas Manpower</li>
                        <li>Carpenter Manpower</li>
                        <li>Warehouse Manpower</li>
                        <li>HealthCare Manpower</li>
                        <li>Transportation Manpower</li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <!-- Visible on small and medium screens -->
                <button class="btn btn-hover-2 text-white d-md-none" data-toggle="collapse" data-target="#toggle2" aria-expanded="false" aria-controls="toggle2">
                    <h5>Contact Us</h5> 
                </button>
                <!-- Collapse on small and medium screens -->
                <div class="collapse d-md-none" id="toggle2">
                    <div class="card card-body bg-secondary text-white">
                        <strong>Phone No:</strong> +46 72 8376 278
                        <strong>Emails:</strong> smartwayconsultancy@gmail.com
                    </div>
                </div>
                <!-- Visible directly on large screens -->
                <div class="d-none d-md-block">
                    <h5>Contact Us</h5>
                    <p><strong>Phone No:</strong> +46 72 8376 278</p>
                    <p><strong>Email:</strong> smartwayconsultancy@gmail.com</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <!-- Visible on small and medium screens -->
                <button class="btn btn-hover-2 text-white d-md-none" data-toggle="collapse" data-target="#toggle3" aria-expanded="false" aria-controls="toggle3">
                    <h5>Our Location</h5> 
                </button>
                <!-- Collapse on small and medium screens -->
                <div class="collapse d-md-none" id="toggle3">
                    <div class="card card-body bg-secondary text-white">
                        <strong>Address:</strong> C/O My Finans Sweden Ab<br>
                        Uppkoparvagen 7, 120 44<br>
                        Arsta<br>
                        <strong>Postal Code:</strong> 80633
                    </div>
                </div>
                <!-- Visible directly on large screens -->
                <div class="d-none d-md-block">
                    <h5>Our Location</h5>
                    <p><strong>Address:</strong> C/O My Finans Sweden Ab<br>
                    Uppkoparvagen 7, 120 44<br>
                    Arsta<br>
                    <strong>Postal Code:</strong> 80633</p>
                </div>
            </div>
        </div>

        <!-- Bottom Row for Social Icons and Copyright -->
        <div class="row mt-3 pt-3">
            <div class="col-12 line"></div>
            <div class="col-12 col-md-6 text-center text-md-left mb-2 mb-md-0 pt-4">
                <span>Copyright © 2024 Smart Way Consultancy
                    <br> Made by Brainiacs
                </span>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right pt-4 social-icon">
            <a href="https://www.facebook.com/profile.php?id=61564135381496&mibextid=ZbWKwL" class="text-white" style="margin-right: 35px;"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/smartway__consultancy?igsh=MTdvcnhrcDBtODVtcQ==" class="text-white" style="margin-right: 35px;"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white" style="margin-right: 35px;"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white" style="margin-right: 35px;"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>

    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
