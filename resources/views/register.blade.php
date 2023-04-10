@extends('master')

@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="page-header-content">
                        <h1>Register</h1>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="list-inline-item">/</li>
                            <li class="list-inline-item">
                                Register
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <main class="site-main page-wrapper woocommerce single single-product">
        <section class="space-3">
            <div class="container text-center">
                <div class="row justify-content-md-center">

                    <div class="col-md-6">
                        <h2 class="font-weight-bold mb-4">Register </h2><span id="steps-indicator"
                            class="font-weight-bold mb-4">Step 1/2</span>
                        <form method="post" class="woocommerce-form woocommerce-form-register register">
                            <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel" data-slide-to="1"></li>
                                    <li data-target="#carousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <form id="candidate-form" action="">
                                        <div class="carousel-item active">
                                            <label for="name">Name:</label><br>
                                            <input type="text" id="name" class="form-control" name="name"><br>
                                            <label for="email">Email:</label><br>
                                            <input type="email" id="email" class="form-control"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email"
                                                required><br>
                                            <label for="password">Password:</label><br>
                                            <input type="password" id="password" class="form-control" name="password"><br>
                                            <label for="confirm-password">Confirm Password:</label><br>
                                            <input type="password" id="confirm-password" class="form-control"
                                                name="confirm-password"><br>
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone"
                                                    aria-describedby="phoneHelp">
                                                <small id="phoneHelp" class="form-text text-muted">We'll never share your
                                                    phone number with anyone else.</small>
                                            </div>
                                            <label for="program">Bootcamp Program:</label><br>
                                            <select class="form-control" id="field-of-study" name="field_of_study">
                                                <option value="1">Web Development</option>
                                                <option value="2">Mobile Development</option>
                                                <option value="3">Quality Assurance</option>
                                                <option value="4">Business Analyst</option>
                                                <option value="5">Graphic Design</option>
                                            </select>
                                            <br>
                                            <input type="checkbox" id="agreement" required>
                                            <label for="agreement">I agree to the <a href="/assets/XpertBot%20UA.pdf">user agreement</a></label><br>
                                            <small class="form-text text-muted">By clicking "I Agree" or using the Programs, you acknowledge that you have read this Agreement, understand it, and agree to be bound by its terms and conditions.</small>
                                            <br>
                                            <button id="next" type="button" onclick="nextStep()"
                                                data-loading-text="Loading..."> Next
                                                <div id="next-loader" class="spinner-grow" role="status"
                                                    style="display: none;">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="carousel-item">
                                            <h6 class="form-text text-muted">You can pay the fees through the Whish Money
                                                app to the following account: </h6><br>
                                            <img src="/assets/images/whish.jpeg" alt="Whish Money App"><br><br>
                                            <small class="form-text text-muted">
                                                <br>
                                                The amount due in USD is only $25<br>
                                            </small><br>
                                            <h6 class="form-text text-muted">Once done, put the transaction ID here in the
                                                input and submit.It will take a few hours for your payment to be verified,
                                                and we will get back to you shortly.</h6><br>
                                            <label for="transaction">Transaction Code:</label><br>
                                            @csrf
                                            <input type="text" id="transaction" class="form-control"
                                                name="transaction"><br>
                                            <button type="button" onClick="UpdateCandidate()">Submit</button>

                                        </div>
                                    </form>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--shop category end-->
    </main>
@endsection


@section('script')
    <script>
        var candidate_id = 0;

        function validateEmail(email) {
            var re = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
            return re.test(email);
        }

        function validatePhone(phone) {
            var re = /^(961)?(3|70|71|76|78|79|81)\d{6}$/;
            return re.test(parseInt(phone));
        }

        function showLoader() {
            $('#next-loader').show();
            $('#next-loader').attr('disabled', true);
        }

        function hideLoader() {
            $('#next-loader').hide();
            $('#next-loader').attr('disabled', false);
        }

        function nextStep() {
            const agreement = document.querySelector('#agreement');
            if (!agreement.checked) {
                event.preventDefault();
                alert('Please agree to the user agreement before submitting the form.');
            } else {
                // Get the form data
                showLoader();
                var candidate = {};
                candidate.name = $('#name').val();
                if (candidate.name == "") {
                    hideLoader();
                    return alert("Name is required.");
                }
                candidate.email = $('#email').val();
                if (!validateEmail(candidate.email)) {
                    hideLoader();
                    return alert("Please enter a valid email");
                }
                candidate.password = $('#password').val();
                let confirm_password = $('#confirm-password').val();
                if (candidate.password != confirm_password) {
                    hideLoader();
                    return alert("Password and confirm password are not identical");
                }
                candidate.phone = $('#phone').val();
                // if (!validatePhone(candidate.phone)) {
                //     hideLoader();
                //     return alert("Phone number is not valid");
                // }
                candidate.program = $('#field-of-study').val()
                // Send the form data to the API
                $.ajax({
                    type: 'POST',
                    url: '/api/candidates',
                    data: candidate,
                    success: function(response) {
                        if (response.success) {
                            var carousel = $('#carousel').carousel('next');
                            candidate_id = response.data;
                            $('#steps-indicator').text("Step 2/2");
                            // The candidate was registered successfully
                            // You can redirect the user to a different page or display a success message
                        } else {
                            var errors = response.errors;
                            var errorMessages = [];
                            for (var field in errors) {
                                errorMessages = errorMessages.concat(errors[field]);
                            }
                            hideLoader();
                            alert(errorMessages.join("\n"));
                            // There were validation errors
                            // You can display the errors on the form or in a separate error message container
                        }
                    },
                    error: function(error) {
                        // There was an error registering the candidate
                        // You can display an error message
                    }
                });
            }
        }


        function UpdateCandidate(){
            var token = $('input[name="_token"]').val();
            var transaction = $('#transaction').val();
            if(transaction=="")
            {
                return alert("Please enter a valid transaction ID. It cannot be left blank.");
            }

            var request = {
                'transaction':transaction
            }

            $.ajax({
                    type: 'PUT',
                    url: '/api/candidates/'+candidate_id,
                    headers: {'X-CSRF-TOKEN': token},
                    data: request,
                    success: function(response) {
                        if (response.success) {
                            // The candidate was registered successfully
                            // You can redirect the user to a different page or display a success message
                            alert('Your registration has been completed, we will review your payment. We will keep you updated through WhatsApp. Thank you for choosing us.!');
                        } else {
                            var errors = response.errors;
                            var errorMessages = [];
                            for (var field in errors) {
                                errorMessages = errorMessages.concat(errors[field]);
                            }
                            hideLoader();
                            alert(errorMessages.join("\n"));
                            // There were validation errors
                            // You can display the errors on the form or in a separate error message container
                        }
                    },
                    error: function(error) {
                        // There was an error registering the candidate
                        // You can display an error message
                    }
                });
        }
    </script>
@endsection
