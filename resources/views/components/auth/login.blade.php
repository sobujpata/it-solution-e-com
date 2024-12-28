
<style>
    a {
        text-decoration: none;
    }
    .card{
        width: 380px;
        padding: 30px;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 50px;
        background-color: #e3dfdf;
        border-radius: 8px;
    }
    .card:hover{
        background-color:aliceblue;
    }
    .card-title {
        text-align: center;
    }
    .login-btn{
        padding: 5px;
        background-color: #e925bf;
        color: wheat;
        width: 101px;
        font-size: 20px;
        margin: auto;
        margin-top: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .login-btn:hover{
        background-color:#14a327;
        color: #e925bf;
    }
    .forgot-btn{
        text-align: center;
        padding: 6px;
    }
    .signup-link{
        text-align: center;
        padding: 6px;
    }
    .form-control{
        padding: 5px;
        padding: 5px;
    }
    
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3 m-3 text-center">
                <div class="card-title">
                    <h2>Login Form</h2>
                </div>
                <hr>
                <div class="card-body">
                    <form action="#">
                        <div class="row mb-3">
                            <div class="col-1 mt-2">
                                <label for="email">
                                    {{-- <i class="fas fa-user"></i> --}}
                                    Email Address
                                </label>
                            </div>
                            <div class="col-11">
                                <input type="text" id="email" placeholder="Email Address" required class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 mt-2">
                                <label for="password">
                                    {{-- <i class="fas fa-lock"></i> --}}
                                    Password
                                </label>
                            </div>
                            <div class="col-11">
                                <input type="password" id="password" placeholder="Password" required class="form-control" />
                            </div>
                        </div>
                    </form>
                    <button onclick="SubmitLogin()" class="login-btn w-25 bg-primary">Next</button>
                    <div class="forgot-btn p-2 m-2"><a href="{{url('/sendOtp')}}">Forgot password?</a></div>
                    <div class="signup-link"> Not a member? <span><a href="{{ url('/registration') }}">Signup now</a></span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    async function SubmitLogin() {
              let email=document.getElementById('email').value;
              let password=document.getElementById('password').value;
  
              if(email.length===0){
                  errorToast("Email is required");
              }
              else if(password.length===0){
                  errorToast("Password is required");
              }
              else{
                  showLoader();
                  let res=await axios.post("/user-login",{email:email, password:password});
                  hideLoader()
                  if (res.status === 200 && res.data['status'] === 'success') {
                    const userRole = res.data['data'];

                    if (userRole === 'admin') {
                        // Redirect admins to dashboard
                        window.location.href = "/dashboard";
                    } else if (userRole === 'customer') {
                        // Retrieve the last location
                        const lastLocation = sessionStorage.getItem("last_location");

                        if (lastLocation) {
                            console.log("Redirecting to last location:", lastLocation);
                            sessionStorage.removeItem("last_location"); // Clear after using
                            window.location.href = lastLocation;
                        } else {
                            console.log("No last location found. Redirecting to home.");
                            window.location.href = "/";
                        }
                    } else {
                        // Handle unexpected roles
                        errorToast("Invalid user role. Please contact support.");
                    }
                } else {
                    // Show error message from response
                    errorToast(res.data['message'] || "An error occurred. Please try again.");
                }

              }
      }
  </script>