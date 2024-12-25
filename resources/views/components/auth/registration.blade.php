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
                    <h3>Registration Form</h3>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="form-group p-2">
                            <input type="text" id="firstName" class="form-control" placeholder="Enter Your First Name">
                        </div>
                        <div class="form-group p-2">
                            <input type="text" id="lastName" class="form-control" placeholder="Enter Your Last Name">
                        </div>
                        <div class="form-group p-2">
                            <input type="text" id="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group p-2">
                            <input type="text" id="mobile" class="form-control" placeholder="Enter Your Phone number">
                        </div>
                        <div class="form-group p-2">
                            <input type="password" id="password" class="form-control" placeholder="Enter Your Password">
                        </div>
                        {{-- <div class="form-group p-2">
                            <input type="text" class="form-control" placeholder="Enter Your Confirm Password">
                        </div> --}}
                        <div class="form-check px-5 mb-3">
                            <input class="form-check-input ml-5" id="condition" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked" style="float: left;">
                                I accept all terms & condition
                            </label>
                          </div>
                        {{-- <input type="submit" value="Sign Up" class="btn btn-success btn-md w-25" /> --}}
                        <button onclick="onRegistration()" class="btn mt-3 w-25  bg-success text-white">Sign Up</button>
                    </form>

                    <div class="pt-2 mt-1">Already have an account?  <span><a href="{{ url('/login') }}">Login now</a></span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    onRegistration();
    async function onRegistration() {
  
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let email = document.getElementById('email').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;
        let condition = document.getElementById('condition').value;
  console.log(condition);
          if(email.length===0){
              errorToast('Email is required')
          }
          else if(firstName.length===0){
              errorToast('First Name is required')
          }
          else if(lastName.length===0){
              errorToast('Last Name is required')
          }
          else if(mobile.length===0){
              errorToast('Mobile is required')
          }
          else if(password.length===0){
              errorToast('Password is required')
          }
          else if(condition === ""){
              errorToast('Please Check Terms & Condition is required')
          }
          else{
            //   showLoader();
              let res=await axios.post("/user-registration",{
                  email:email,
                  firstName:firstName,
                  lastName:lastName,
                  mobile:mobile,
                  password:password
              })
            //   hideLoader();
              if(res.status===200 && res.data['status']==='success'){
                  successToast(res.data['message']);
                  setTimeout(function (){
                      window.location.href='/login'
                  },2000)
              }
              else{
                  errorToast(res.data['message'])
              }
          }
      }
  </script>