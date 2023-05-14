function switchForms() {
    var loginForm = document.getElementById("login");
    var regForm = document.getElementById("register");
    var adminForm = document.getElementById("admin-login");
    if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        regForm.style.display = "none";
        adminForm.style.display = "none"; // hide admin login form if it's displayed
    } else {
        loginForm.style.display = "none";
        regForm.style.display = "block";
        adminForm.style.display = "none"; // hide admin login form if it's displayed
    }
}

function switchToAdmin() {
    var loginForm = document.getElementById("login");
    var adminForm = document.getElementById("admin-login");
    loginForm.style.display = "none";
    adminForm.style.display = "block";
}

function switchToLogin() {
    var loginForm = document.getElementById("login");
    var adminForm = document.getElementById("admin-login");
    loginForm.style.display = "block";
    adminForm.style.display = "none";
}


	$('form').on('submit', function(e) {
		e.preventDefault();
		var url = $(this).attr('action');
		var formData = $(this).serialize();
		axios.post(url, formData)
			.then(function(response) {
				if (response.data === 'admin') {
					switchToAdmin();
				} else {
					window.location.href = $('#user-redirect-url').val();
				}
			})
			.catch(function(error) {
				console.log(error);
			});
	});