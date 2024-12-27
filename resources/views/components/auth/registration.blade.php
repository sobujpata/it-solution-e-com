<style>
    a {
        text-decoration: none;
    }
    .card{
        width: 400px;
        padding: 30px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;
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
        padding: 3px;
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
                    <h2>Registration Form</h2>
                </div>
                <hr>
                <div class="card-body">
                    <form action="#">
                        <div class="form-group p-2">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group p-2">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group p-2">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group p-2">
                            <label for="mobile">Mobile No</label>
                            <input type="text" id="mobile" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="form-group p-2">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="check" style="display: flex; align-items: center; margin: 10px 0;">
                            <input 
                                class="form-check-input" 
                                id="condition" 
                                type="checkbox" 
                                value="" 
                                style="margin-right: 10px; width:20px;"
                            >
                            <label 
                                class="form-check-label" 
                                for="condition" 
                                style="font-size: 14px; color: rgb(55, 53, 128) 53, 112) 53, 112) 50, 117) 51, 51) 51, 51) 51, 51) 51, 51);"
                            >
                                I accept all terms & condition
                            </label>
                        </div>
                        
                        <button onclick="onRegistration()" class="login-btn btn mt-3 w-25  bg-success text-white">Sign Up</button>
                    </form>

                    <div class="signup-link">Already have an account?  <span><a href="{{ url('/login') }}">Login now</a></span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

async function onRegistration() {
    let firstName = document.getElementById('firstName').value.trim();
    let lastName = document.getElementById('lastName').value.trim();
    let email = document.getElementById('email').value.trim();
    let mobile = document.getElementById('mobile').value.trim();
    let password = document.getElementById('password').value.trim();
    let condition = document.getElementById('condition').checked;

    if (email === "") {
        errorToast('Email is required');
    } else if (firstName === "") {
        errorToast('First Name is required');
    } else if (lastName === "") {
        errorToast('Last Name is required');
    } else if (mobile === "") {
        errorToast('Mobile is required');
    } else if (password === "") {
        errorToast('Password is required');
    } else if (!condition) {
        errorToast('Please accept the terms & conditions.');
    } else {
        try {
            let button = document.querySelector('button');
            button.disabled = true;

            let res = await axios.post("/user-registration", {
                firstName: firstName,
                lastName: lastName,
                email: email,
                mobile: mobile,
                password: password
            });

            button.disabled = false;

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(() => window.location.href = '/login', 2000);
            } else {
                errorToast(res.data['message']);
            }
        } catch (error) {
            errorToast('Something went wrong. Please try again later.');
        }
    }
}

  </script>