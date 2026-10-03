<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data View - Project Pragati</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #f5f7f6;
        }

        h1 {
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 20px;
        }

        .toggle-buttons {
            margin-bottom: 20px;
        }

        button {
            padding: 8px 14px;
            margin-right: 10px;
            cursor: pointer;
            border: none;
            background: var(--accent);
            color: white;
            border-radius: var(--radius);
        }

        button:hover {
            background: #25663e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: var(--shadow);
            border-radius: var(--radius);
            overflow: hidden;
        }

        th {
            background: var(--primary-dark);
            color: white;
        }

        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background: #333;
            color: white;
        }

        .admin-card {
            background: white;
            padding: 20px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            margin-top: 20px;
        }

        .section-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        button.active {
            background: var(--primary-dark);
        }

        .delete-btn {
            background: #e74c3c;
        }

        .delete-btn:hover {
            background: #c0392b;
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
                <a href="index.html" class="login-icon" title="Back">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </nav>
    </header>

    <main class="container">
        <h1>Admin Dashboard</h1>
        <p style="color: var(--text-muted);">Manage village requests and volunteer applications</p>

        <!-- Toggle Buttons -->
        <div class="toggle-buttons">
            <button id="villageBtn" onclick="showSection('village')">Village Requests</button>
            <button id="volunteerBtn" onclick="showSection('volunteer')">Volunteer Applications</button>
            <button id="partnerBtn" onclick="showSection('partner')">Partner Requests</button>
        </div>

        <!-- Village Section -->
        <div id="villageSection" class="admin-card">
            <h2>Village Requests</h2>
            <p class="section-desc">Manage requests submitted by villages</p>

            <table id="villageTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Village</th>
                        <th>Panchayat</th>
                        <th>Contact</th>
                        <th>Phone</th>
                        <th>Women</th>
                        <th>Livelihood</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Volunteer Section -->
        <div id="volunteerSection" class="admin-card" style="display:none;">
            <h2>Volunteer Applications</h2>
            <p class="section-desc">Manage volunteer registrations</p>

            <table id="volunteerTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Commitment</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <!-- Partner Section -->
        <div id="partnerSection" class="admin-card" style="display:none;">
            <h2>Partner Requests</h2>
            <p class="section-desc">Manage partner inquiries</p>

            <table id="partnerTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Organization</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div style="margin-bottom:20px;">
            <a href="index.html" style="
        text-decoration:none;
        padding:8px 14px;
        background:#2d7a4a;
        color:white;
        border-radius:5px;
    ">← Back to Website</a>
        </div>
    </main>
    <script>
        // Toggle Sections
        function showSection(type) {
            document.getElementById("villageSection").style.display = "none";
            document.getElementById("volunteerSection").style.display = "none";
            document.getElementById("partnerSection").style.display = "none";

            document.getElementById("villageBtn").classList.remove("active");
            document.getElementById("volunteerBtn").classList.remove("active");
            document.getElementById("partnerBtn").classList.remove("active");

            if (type === "village") {
                document.getElementById("villageSection").style.display = "block";
                document.getElementById("villageBtn").classList.add("active");
            }
            else if (type === "volunteer") {
                document.getElementById("volunteerSection").style.display = "block";
                document.getElementById("volunteerBtn").classList.add("active");
            }
            else {
                document.getElementById("partnerSection").style.display = "block";
                document.getElementById("partnerBtn").classList.add("active");
            }
        }
        // Load Village Data
        fetch("backend/villages/get_requests.php")
            .then(res => res.json())
            .then(data => {
                let table = document.querySelector("#villageTable tbody");

                data.forEach(row => {
                    table.innerHTML += `
                        <tr>
                            <td>${row.id}</td>
                            <td>${row.village_name}</td>
                            <td>${row.panchayat}</td>
                            <td>${row.contact_person}</td>
                            <td>${row.phone}</td>
                            <td>${row.women_count}</td>
                            <td>${row.livelihood}</td>
                            <td>${row.created_at}</td>
                            <td><button class="delete-btn" onclick="deleteVillage(${row.id})">Delete</button></td>
                        </tr>
                    `;
                });
            });

        // Load Volunteer Data
        fetch("backend/volunteers/get_volunteers.php")
            .then(res => res.json())
            .then(data => {
                let table = document.querySelector("#volunteerTable tbody");

                data.forEach(row => {
                    table.innerHTML += `
                        <tr>
                            <td>${row.id}</td>
                            <td>${row.name}</td>
                            <td>${row.email}</td>
                            <td>${row.phone}</td>
                            <td>${row.role}</td>
                            <td>${row.commitment}</td>
                            <td>${row.created_at}</td>
                            <td><button onclick="deleteVolunteer(${row.id})">Delete</button></td>
                        </tr>
                    `;
                });
            });
        // Load Partner Data
        fetch("backend/partners/get_partners.php")
            .then(res => res.json())
            .then(data => {
                let table = document.querySelector("#partnerTable tbody");
                table.innerHTML = "";

                data.forEach(row => {
                    table.innerHTML += `
                <tr>
                    <td>${row.id}</td>
                    <td>${row.name}</td>
                    <td>${row.email}</td>
                    <td>${row.organization}</td>
                    <td>${row.message}</td>

                    <td>
                        <select onchange="updateStatus(${row.id}, this.value)">
                            <option value="Pending" ${row.status === 'Pending' ? 'selected' : ''}>Pending</option>
                            <option value="Contacted" ${row.status === 'Contacted' ? 'selected' : ''}>Contacted</option>
                        </select>
                    </td>

                    <td>${row.created_at}</td>

                    <td>
                        <button class="delete-btn" onclick="deletePartner(${row.id})">Delete</button>
                    </td>
                </tr>
            `;
                });
            });
        // Delete Village
        function deleteVillage(id) {
            if (!confirm("Delete this entry?")) return;

            fetch("backend/villages/delete_village.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + id
            })
                .then(res => res.text())
                .then(() => {
                    showSection('village');
                    location.reload();
                });
        }

        // Delete Volunteer
        function deleteVolunteer(id) {
            if (!confirm("Delete this entry?")) return;

            fetch("backend/volunteers/delete_volunteer.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + id
            })
                .then(() => location.reload());
        }
        showSection('village');

        // Update Partner Status
        function updateStatus(id, status) {
            fetch("backend/partners/update_partner_status.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `id=${id}&status=${status}`
            })
                .then(res => res.text())
                .then(data => {
                    if (data !== "success") {
                        alert("Failed to update status");
                    }
                });
        }


        // Delete Partner
        function deletePartner(id) {
    if (!confirm("Delete this partner request?")) return;

    fetch("backend/partners/delete_partner.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + id
    })
    .then(res => res.text())
    .then(() => location.reload());
}
    </script>

</body>

</html>