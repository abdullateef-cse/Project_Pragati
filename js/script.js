// Handle animations for .animate-on-load elements
document.addEventListener("DOMContentLoaded", () => {
    const animateElements = document.querySelectorAll(".animate-on-load");
    
    // Make elements visible with a small delay for staggered effect
    animateElements.forEach((element, index) => {
        setTimeout(() => {
            element.classList.add("visible");
        }, index * 100); // 100ms delay between each element
    });

    const form = document.getElementById("villageForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(form);

        fetch("backend/villages/submit_village.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            if (data === "success") {
                showPopup("✅ Request submitted successfully!");
                form.reset();
            } else {
                showPopup("❌ Something went wrong");
            }
        })
        .catch(() => {
            showPopup("⚠️ Server error");
        });
    });
});

function showPopup(message) {
    alert(message); // temporary
}

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("volunteerForm");

    if (!form) return; // important (so it doesn't break other pages)

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(form);

        fetch("backend/volunteers/submit_volunteer.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            if (data === "success") {
                showPopup("Application submitted successfully!", true);
                form.reset();
            } else {
                showPopup("Something went wrong", false);
            }
        })
        .catch(() => {
            showPopup("Server error", false);
        });
    });
});

// Load stats from backend
fetch("backend/admin/get_stats.php")
.then(res => res.json())
.then(data => {
    document.getElementById("villageCount").innerText = data.village;
    document.getElementById("volunteerCount").innerText = data.volunteer;
    document.getElementById("sessionCount").innerText = data.sessions;
    document.getElementById("investment").innerText = data.investment;
});

// Admin functions
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
    .then(() => location.reload());
}

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


document.getElementById("partnerForm")?.addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("backend/partners/submit_partner.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        if (data === "success") {
            alert("Partner request submitted successfully!");
            this.reset();
        } else {
            alert("Something went wrong!");
        }
    })
    .catch(err => console.error(err));
});