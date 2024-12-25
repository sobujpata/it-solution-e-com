<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="{{asset('css/login.css')}}"> --}}

<style>
    a {
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-3 m-3 text-center">
                <div class="card-title text-center">
                    <h3>Login Form</h3>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="row mb-3">
                            <div class="col-1 mt-2">
                                <label for="email">
                                    <i class="fas fa-user"></i>
                                </label>
                            </div>
                            <div class="col-11">
                                <input type="text" id="email" placeholder="Email Address" required class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-1 mt-2">
                                <label for="password">
                                    <i class="fas fa-lock"></i>
                                </label>
                            </div>
                            <div class="col-11">
                                <input type="password" id="password" placeholder="Password" required class="form-control" />
                            </div>
                        </div>
                        <button onclick="SubmitLogin()" class="btn w-25 bg-primary">Next</button>
                    </form>

                    <div class="p-2 m-2"><a href="{{url('/sendOtp')}}">Forgot password?</a></div>
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
                //   showLoader();
                  let res=await axios.post("/user-login",{email:email, password:password});
                //   hideLoader()
                  if(res.status===200 && res.data['status']==='success'){
                      window.location.href="/";
                  }
                  else{
                      errorToast(res.data['message']);
                  }
              }
      }
  
  </script>