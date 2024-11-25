<?php
// for information for Team member
$teamMembers = [
    // profile 1
    [
        'name' => 'Allen Jefferson C. Orcino',
        'role' => 'Assistant Leader',
        'course' => 'BSIT',
        'age' => 21,
        'gender' => 'Male',
        'contact' => '09811732889',
        'address' => '208 Molina St. Purok 6 Alabang Muntinlupa City',
        'image' => 'Assets/len.jpg',
        'github' => 'https://github.com/0rcino',
        'facebook' => 'https://www.facebook.com/allen.14.aj/',
        'linkedin' => 'https://www.linkedin.com/in/allenjefferson-orcino-b82924322/?trk=opento_sprofile_topcard',
        'coursera' => 'https://www.coursera.org/user/fba21b844e5e2a0e91abcb31449b73f1'
    ],
    // profile 2
    [
        'name' => 'Jhonrey Kyle C. Lugon',
        'role' => 'Leader',
        'course' => 'BSIT',
        'age' => 22,
        'gender' => 'Male',
        'contact' => '09619669812',
        'address' => 'Baranggay Marcelo Green Village Parañaque City',
        'image' => 'Assets/kyle.jpg',
        'github' => 'https://github.com/Gekyume-31',
        'facebook' => 'https://www.facebook.com/jhonreylugon',
        'linkedin' => 'http://www.linkedin.com/in/jhonreykylelugon',
        'coursera' => 'https://www.coursera.org/learner/kyle'
    ],
    // profile 3
    [
        'name' => 'Hannah Grace Traya',
        'role' => 'Member',
        'course' => 'BSIT',
        'age' => 20,
        'gender' => 'Female',
        'contact' => '09510681571',
        'address' => 'Megsha Homeowners Tagle Compound, San Guillermo Street. Putatan, Muntinlupa City.',
        'image' => 'Assets/hannah.jpg',
        'github' => 'https://github.com/hana-tomoe',
        'facebook' => 'https://www.facebook.com/hana.gracia23',
        'linkedin' => 'https://www.linkedin.com/in/hannah-grace-traya-2a4944322',
        'coursera' => 'https://www.coursera.org/learner/hannah-grace-traya-8888'
    ],
    // profile 4
    [
        'name' => 'Ian Adrian Porciuncula',
        'role' => 'Member',
        'course' => 'BSIT',
        'age' => 21,
        'gender' => 'Male',
        'contact' => '09515695918',
        'address' => '200 Pedro Diaz St. Muntinlupa City',
        'image' => 'Assets/ian.png',
        'github' => 'https://github.com/Eyan09',
        'facebook' => 'https://www.facebook.com/Eyaaaaan7',
        'linkedin' => 'http://www.linkedin.com/in/ian-adriann-porciuncula-4126b9322',
        'coursera' => 'https://www.coursera.org/user/685d395df259e193d48f1b3eccdba104'
    ],
    // profile 5 
    [
        'name' => 'Lester Plandaño',
        'role' => 'Member',
        'course' => 'BSIT',
        'age' => 20,
        'gender' => 'Male',
        'contact' => '09994531752',
        'address' => ' 19a hyacinth st south Greenheigts village Muntinlupa city',
        'image' => 'Assets/lester.jpg',
        'github' => 'https://github.com/LesterPlandano',
        'facebook' => 'https://www.facebook.com/Lester.Gggggg',
        'linkedin' => 'https://www.linkedin.com/in/lester-planda%C3%B1o-6b86bb322?trk=contact-info',
        'coursera' => 'https://www.coursera.org/user/fba21b844e5e2a0e91abcb31449b73f1'
    ],
    
];
    // Search functionality
if (isset($_GET['query'])) {
    $query = htmlspecialchars($_GET['query']);
    $results = [];

    // Search through the team members
    foreach ($teamMembers as $member) {
        if (stripos($member['name'], $query) !== false) {
            $results[] = $member;
        }
    }

    //
}

// Database connection settings
$servername = "localhost:3307";  
$username = "root";        
$password = "lester29";            
$dbname = "group2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Insert into database
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute query to insert data into database
    $stmt->execute();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="icon" href="Assets/logo.jpg" type="image/png">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
 <link rel="stylesheet" href="grp2.css">
 <title>Group 2</title>
</head>

<body>
    <!-- Header -->
 <header class="main-header">
  <div class="header-content">
   <nav class="navigation">
    <ul>
     <li><a href="#Team">About Us</a></li>
    </ul>
   </nav>
  </div>
 </header>
 <!-- Logo Image -->
 <div class="logo-container">
  <img src="Assets/logo.jpg" alt="Group Logo" class="logo">
 </div>
 <!-- Contact Us -->
 <button id="contactBtn" class="contactBtn">Contact Us</button>
 <div id="contactForm" class="contactForm hidden">
  <div class="form-content">
   <span class="close" id="closeBtn">&times;</span>
   <h2>Contact Us</h2>
   <form id="contactFormElement" method="post">
    <label for="name">Name:</label>
    <input class="name" type="text" id="name" name="name" required><br>
    <label type="email">Email:</label>
    <input class="email" type="email" id="email" name="email" required><br>
    <label for="message">Message:</label><br>
    <textarea class="message" id="message" name="message" rows="5" required></textarea><br>
    <button type="submit">Send</button>
   </form>
  </div>
 </div>
 <!-- Container for search bar and result -->
 <div class="header-container">
  <!-- Search Bar -->
  <div class="searchbar">
   <form action="grp2.php" method="GET">
    <input type="text" name="query" id="query" onkeyup="showResult(this.value)" placeholder="Name Search">
    <input type="submit" value="Search">
   </form>
  </div>
 </div>
 <!-- Search and livesearch Result -->
 <div id="livesearch" class="search-results">
  <div class="search-results">
   <?php
    if (isset($query) && !empty($query)) {
        if (count($results) > 0) {
            echo "<h3>Search Results:</h3>";
            foreach ($results as $result) {
                echo "<p><strong>Existing Member:</strong> " . htmlspecialchars($result['name']) . "</p>";
                echo "<p>Role: " . htmlspecialchars($result['role']) . "</p>";
            }
        } else {
            echo "<p>Not Existing Member: '" . htmlspecialchars($query) . "'.</p>";
        }
    }
    ?>
  </div>
 </div>
 <!--Team-->
 <div class="team" id="Team">
  <h1>Group 2 <a href="#teams"><span>Our Team</span></a></h1>
  <div class="slideshow-container">
   <div class="slide">
    <img src="Assets/slideshow1.png">
   </div>
   <div class="slide">
    <img src="Assets/slideshow2.png">
   </div>
   <div class="slide">
    <img src="Assets/slideshow3.png">
   </div>
   <div style="text-align:center;">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
   </div>
  </div>
  <!-- Real-time clock -->
  <div class="time-container">
   <p id="realTime"><?php echo $greeting; ?>! Current Time: <?php echo $currentTime; ?></p>
  </div>
  <!--Team Container-->
  <h1 style="margin-top: 10rem; color: #ff5c5c;" id="teams">My Team</h1>
  <div class="team_box">
   <?php foreach ($teamMembers as $member): ?>
   <div class="profile">
    <img src="<?php echo $member['image']; ?>">
    <div class="info">
     <h2 class="names"><?php echo $member['name']; ?></h2>
     <!-- Button for info open-->
     <button class="info-btn"
      onclick="showInfo('info-container-<?php echo strtolower(str_replace(' ', '-', $member['name'])); ?>')">Info</button>
     <div id="info-container-<?php echo strtolower(str_replace(' ', '-', $member['name'])); ?>" class="info-container">
      <header>
       <h1>Information</h1>
      </header>
      <!--Information about Team Member-->
      <h2><?php echo $member['name']; ?></h2>
      <h4><?php echo $member['role']; ?></h4>
      <p>Course: <?php echo $member['course']; ?></p>
      <p>Age: <?php echo $member['age']; ?></p>
      <p>Gender: <?php echo $member ['gender']; ?></p>
      <p>Contact Number: <?php echo $member['contact']; ?></p>
      <p>Address: <?php echo $member['address']; ?></p>
      <!-- Button for info exit-->
      <button class="exit-btn"
       onclick="hideInfo('info-container-<?php echo strtolower(str_replace(' ', '-', $member['name'])); ?>')">Exit</button>
     </div>
     <!--Team icon and social media links-->
     <div class="team_icon">
      <a class="fa-brands fa-github" href="<?php echo $member['github']; ?>" target="_blank"></a>
      <a class="fa-brands fa-facebook" href="<?php echo $member['facebook']; ?>" target="_blank"></a>
      <a class="fa-brands fa-linkedin" href="<?php echo $member['linkedin']; ?>" target="_blank"></a>
      <a class="fas fa-copyright" href="<?php echo $member['coursera']; ?>" target="_blank"></a>
     </div>
    </div>
   </div>
   <?php endforeach; ?>
  </div>
  <!-- Button for scrolltotop-->
  <button onclick="scrollToTop()" id="backToTop">↑</button>
  <!-- Footer -->
  <footer class="footer">
   <div class="footer-content">
    <p>
     <i class="fas fa-copyright"></i> 2024 Group 2. All rights reserved.
    </p>
   </div>
  </footer>
  <!-- Contact Form -->
<div id="contactForm">
    <h2>Contact Us</h2>
    
    <!-- The form action is empty, meaning it submits to the same page -->
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="5" required></textarea><br>

        <button type="submit">Send Message</button>
    </form>
</div>

</body>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<script src="grp2.js"></script>

</html>