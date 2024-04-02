
// -------------------------------------------------------- TUTORIALS PAGE --------------------------------------------------------

document.addEventListener('DOMContentLoaded', (event) => {

    // Grab the search bar element by its ID
    const searchBar = document.getElementById('searchBar');

    // Add an event listener to the search bar for input events 
    searchBar.addEventListener('input', (e) => {

        // Retrieve the text entered in the search bar and convert it to lower case
        const term = e.target.value.toLowerCase();
        const tutorials = document.querySelectorAll('.tutorial');

        // Iterate through each tutorial element
        tutorials.forEach(tutorial => {

            const title = tutorial.querySelector('.tutorial-title').textContent.toLowerCase();
            const keywords = tutorial.dataset.keywords.toLowerCase();

            // If the search term is included in either the title or the keywords
            if (title.includes(term) || keywords.includes(term)) {

                tutorial.style.display = ''; // Show the tutorial
            } 

            else {

                tutorial.style.display = 'none'; // Hide the tutorial

            }

        });
    });
});




// -------------------------------------------------------- CONTACT PAGE --------------------------------------------------------

document.addEventListener("DOMContentLoaded", function () {

    // Function to validate email format
    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    // Handle the form submission
    document.getElementById("contactForm").onsubmit = function(event) {

        // Stop form submission if validation fails
        function preventSubmission(message) {
            alert(message);
            event.preventDefault();
            return false;
        }

        // Get form fields
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var message = document.getElementById("message").value;

        // Check if name is empty
        if(name.trim() === "") {
            return preventSubmission("Please enter your name.");
        }

        // Check if email is empty or invalid
        if(email.trim() === "" || !validateEmail(email)) {
            return preventSubmission("Please enter a valid email address.");
        }

        // Check if message is empty
        if(message.trim() === "") {
            return preventSubmission("Please enter your message.");
        }

        // If all fields area filled in correctly, submit the form
        return true;
    };
});