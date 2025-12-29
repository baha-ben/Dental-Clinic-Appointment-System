// Simple client-side validation
// This script runs on the registration and login pages

document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Alert for empty fields (Basic check)
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.onsubmit = function() {
            let inputs = form.querySelectorAll("input[required]");
            for (let input of inputs) {
                if (input.value.trim() === "") {
                    alert("Please fill all required fields!");
                    return false;
                }
            }
            return true;
        };
    });

    // 2. Simple effect for the table rows
    const rows = document.querySelectorAll("tr");
    rows.forEach(row => {
        row.onmouseover = function() {
            this.style.backgroundColor = "#f2f2f2";
        };
        row.onmouseout = function() {
            this.style.backgroundColor = "";
        };
    });

});

// Function to show a simple greeting based on time
function showGreeting() {
    let hour = new Date().getHours();
    if (hour < 12) return "Good Morning";
    if (hour < 18) return "Good Afternoon";
    return "Good Evening";
}
