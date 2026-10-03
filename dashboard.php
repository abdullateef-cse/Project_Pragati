<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'sakhi') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sakhi Dashboard</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f4f7f6;
}

/* Container */
.dashboard-container {
    padding: 30px;
    margin-top: 80px;
}

/* Welcome */
.welcome-box {
    background: linear-gradient(135deg, #2d7a4a, #3fa36b);
    color: white;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Layout */
.layout {
    display: flex;
    gap: 25px;
}

/* Sidebar */
.sidebar {
    width: 230px;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.sidebar a {
    display: block;
    margin-bottom: 12px;
    text-decoration: none;
    color: #444;
    padding: 12px;
    border-radius: 8px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: #e8f5ec;
    color: #2d7a4a;
}

/* Main */
.main {
    flex: 1;
}

/* Cards */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card h3 {
    margin: 0;
    color: #2d7a4a;
}

.card-value {
    font-size: 32px;
    font-weight: bold;
    margin: 10px 0;
}

/* Progress */
.progress {
    margin-top: 25px;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.bar {
    background: #ddd;
    height: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
    overflow: hidden;
}

.fill {
    height: 100%;
    background: linear-gradient(90deg, #2d7a4a, #3fa36b);
}

/* Logout */
.logout {
    margin-top: 25px;
    display: inline-block;
    color: #e74c3c;
    font-weight: bold;
}
.nav-right-items {
    display: flex;
    align-items: center;
    gap: 10px;
}
    </style>
</head>

<body>
 <header>
        <nav class="container">
            <a href="index.html" class="logo">Project Pragati</a>

            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="programs.html">Programs</a></li>
                <li><a href="impact.html">Impact</a></li>
                <li><a href="resources.html">Resources</a></li>
            </ul>

            <div class="nav-right-items">

    <span style="margin-right:15px; font-weight:500;">
        👤 <?php echo $_SESSION['user']; ?>
    </span>

    <a href="backend/auth/logout.php" class="cta-button" 
   onclick="return confirm('Are you sure you want to logout?')">
   Logout
</a>

</div>
        </nav>
    </header>


    <div class="dashboard-container">

    <!-- Welcome -->
    <div class="welcome-box">
        <h2>Welcome, <?php echo $_SESSION['user']; ?> 👋</h2>
        <p>Track your progress and manage your activities</p>
    </div>

    <div class="layout">

        <!-- Sidebar -->
        <div class="sidebar">
            <a href="#">📦 My Products</a>
            <a href="#">📈 My Sales</a>
            <a href="#">🎓 Training Progress</a>
            <a href="#">📅 Coaching Sessions</a>
        </div>

        <!-- Main -->
        <div class="main">

            <!-- Cards -->
            <div class="cards">
                <div class="card">
                    <h3>Total Products</h3>
                    <div class="card-value">8</div>
                    <p>5 active listings</p>
                </div>

                <div class="card">
                    <h3>Total Sales</h3>
                    <div class="card-value">₹12,450</div>
                    <p>This month</p>
                </div>

                <div class="card">
                    <h3>Customers</h3>
                    <div class="card-value">24</div>
                    <p>8 repeat customers</p>
                </div>
            </div>

            <!-- Progress -->
            <div class="progress">
                <h3>Training Progress</h3>

                <p>Business Basics</p>
                <div class="bar"><div class="fill" style="width:100%"></div></div>

                <p>Financial Literacy</p>
                <div class="bar"><div class="fill" style="width:75%"></div></div>

                <p>Digital Marketing</p>
                <div class="bar"><div class="fill" style="width:45%"></div></div>
            </div>

        </div>

    </div>

    

</div>

</body>
</html>