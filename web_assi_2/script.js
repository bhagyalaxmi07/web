$(document).ready(function () {
    $('#registrationForm').on('submit', function (e) {
        const firstname = $('#firstname').val().trim();
        const lastname = $('#lastname').val().trim();
        const email = $('#email').val().trim();
        const password = $('#password').val().trim();

        if (!firstname || !lastname || !email || !password) {
            alert('Please fill in all required fields.');
            e.preventDefault(); // Prevent form submission
        }
    });
});
