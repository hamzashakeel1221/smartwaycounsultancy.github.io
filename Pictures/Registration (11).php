<?php
session_start(); // Start the session

$conn = new mysqli("localhost", "root", "", "smart_way_consultancy");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['full-name'];
        $dob = $_POST['DOB'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $occupation = $_POST['occupation'];

        // Inserting Values into the Employee Table 
        $sqlE = "INSERT INTO `employee`(`Name`, `DOB`, `Email`, `Phone`, `Gender`, `Occupation`) VALUES ('$name','$dob','$email','$phone','$gender','$occupation')";

        if ($conn->query($sqlE) === TRUE) {
            // Get the last inserted employee ID
            $last_id = $conn->insert_id;

            // Inserting values into the Company Table
            $cName = $_POST['company-name'];
            $cAddress = $_POST['address'];
            $sRequired = $_POST['service'];
            $pRequired = $_POST['personRequired'];
            $jobType = $_POST['JobType'];
            $contractLength = $_POST['Contract'];

            $sqlC = "INSERT INTO `company`(`pid`, `CName`, `CAddress`, `ServiceRequired`, `PersonRequired`, `JobType`, `ContractLength`) VALUES ('$last_id', '$cName','$cAddress','$sRequired','$pRequired','$jobType','$contractLength')";

            if ($conn->query($sqlC) === TRUE) {
                // Set session variable for success message
                $_SESSION['success_message'] = "Record Inserted Successfully";
                header("Location: Registration.php"); // Redirect to the same page to show the alert
                exit(); // Ensure that the script stops after redirect
            } else {
                echo "Error: " . $sqlC . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sqlE . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="CSS/RegistrationStyle.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <title>Registration Form</title>

   <script>
       function validateForm() {
           const nameField = document.querySelector('input[name="full-name"]');
           const occupationField = document.querySelector('input[name="occupation"]');
           const companyNameField = document.querySelector('input[name="company-name"]');

           const namePattern = /^[a-zA-Z\s]+$/;

           if (!namePattern.test(nameField.value)) {
               alert("Please enter a valid name (alphabets only).");
               nameField.focus();
               return false;
           }
           if (!namePattern.test(occupationField.value)) {
               alert("Please enter a valid occupation (alphabets only).");
               occupationField.focus();
               return false;
           }
           if (!namePattern.test(companyNameField.value)) {
               alert("Please enter a valid company name (alphabets only).");
               companyNameField.focus();
               return false;
           }

           // If all validations pass
           return true;
       }
   </script>
</head>
<body>
    <div class="container">
        <header>Registration</header>
        <form action="Registration.php" method="post" onsubmit="return validateForm()">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="full-name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="DOB" placeholder="Enter birth date" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" name="phone" placeholder="Enter mobile number" required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <select required name="gender">
                                <option value="" disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Occupation</label>
                            <input type="text" name="occupation" placeholder="Enter your occupation" required>
                        </div>
                    </div>
                </div>
                <div class="details family">
                    <span class="title">Company Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Company Name</label>
                            <input type="text" name="company-name" placeholder="Enter Company name" required>
                        </div>
                        <div class="input-field">
                            <label>Company Address</label>
                            <input type="text" name="address" placeholder="Enter Company Address" required>
                        </div>
                        <div class="input-field">
                            <label>Service required</label>
                            <select required name="service">
                                <option value="" disabled selected>Select Service Type</option>
                                <option value="1">Construction ManPower</option>
                                <option value="2">Oil and Gas ManPower</option>
                                <option value="3">Hospitality ManPower</option>
                                <option value="4">Manafacturing ManPower</option>
                                <option value="5">Agriculture ManPower</option>
                                <option value="6">HealthCare ManPower</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Person required</label>
                            <input type="number" name="personRequired" placeholder="Enter Employee required " required>
                        </div>
                        <div class="input-field">
                            <label>Job Type</label>
                           <select name="JobType" required >
                            <option value="" disabled selected>Select Job Type</option>
                            <Option>Full Time</Option>
                            <option>Part Time</option>
                            <option>Internship</option>
                           </select>
                        </div>
                        <div class="input-field">
                            <label>Contract Length</label>
                            <select name="Contract" required>
                                <option value="" disabled selected>Select Contract Length</option>
                                <Option>None</Option>
                                <option>6 Months</option>
                                <option>1 year</option>
                            </select>
                        </div>
                    </div>
                    <div class="buttons">
                        <button type="submit" name="submit" class="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <?php
    // Check for the success message and show an alert
    if (isset($_SESSION['success_message'])) {
        echo '<script>
            alert("' . $_SESSION['success_message'] . '");
            window.location.href = "index.html";
        </script>';
        // Unset the session variable after displaying the alert
        unset($_SESSION['success_message']);
    }
    ?>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
