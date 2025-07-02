<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}"
                                        id="registerForm">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="name" name="name"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" name="password"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="check" name="check" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @push('scripts'); --}}
    <!-- Optional Bootstrap JS (for dropdowns, modals, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- <script>
        document.getElementById("registerForm").onsubmit = function(event) {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();
            const check = document.getElementById("check").checked;

            if (name === "" || name.length < 3) {
                alert("Name is required and must be at least 3 characters.");
                event.preventDefault();
                return;
            }

            if (email === "" || !email.includes("@")) {
                alert("Please enter a valid email address.");
                event.preventDefault();
                return;
            }

            if (password === "" || password.length < 6) {
                alert("Password must be at least 6 characters.");
                event.preventDefault();
                return;
            }

            if (!check) {
                alert("You must agree to the terms.");
                event.preventDefault();
                return;
            }
        };
    </script> --}}


    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {
            // Clear previous error messages
            let errorElements = document.querySelectorAll(".text-danger");
            errorElements.forEach(el => el.remove());

            let isValid = true;

            // Get form fields
            const name = document.getElementById("name");
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const check = document.getElementById("check");

            // Helper function to show error
            function showError(input, message) {
                isValid = false;
                const error = document.createElement("div");
                error.className = "text-danger";
                error.innerText = message;
                input.parentNode.appendChild(error);
            }

            // Name validation
            if (name.value.trim() === "") {
                showError(name, "Please enter your name");
            } else if (name.value.trim().length < 3) {
                showError(name, "Name must be at least 3 characters");
            }

            // Email validation
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (email.value.trim() === "") {
                showError(email, "Please enter your email");
            } else if (!email.value.match(emailPattern)) {
                showError(email, "Enter a valid email address");
            }

            // Password validation
            if (password.value.trim() === "") {
                showError(password, "Please enter your password");
            } else if (password.value.length < 6) {
                showError(password, "Password must be at least 6 characters");
            }

            // Checkbox validation
            if (!check.checked) {
                showError(check, "You must agree to the terms");
            }

            // Prevent form submission if invalid
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>
