<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Responsive Login and Signup Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>
                    <form action="{{ route('proseslogin') }}" method="POST">
                        @csrf
                        <div class="field input-field">
                            <input name="email" type="email" placeholder="Email" class="input">
                            @error('email')
                             <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="field input-field">
                            <input name="password"  type="password" placeholder="Password" class="password">
                            <i class='bx bx-hide eye-icon'></i>

                            @error('password')
                             <small style="color:red;" >{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div> -->

                        <div class="field button-field">
                            <button type="submit" >Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                    </div>
                </div>

                <!-- <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="#" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div> -->

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>Register</header>
                    <form action="{{ route('prosesregister') }}" method="POST" >
                        @csrf
                        <div class="field input-field">
                            <input name="name" type="name" placeholder="name" class="input" value="{{ old('name') }}">
                            @error('name')
                             <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="field input-field">
                            <input name="email" type="email" placeholder="Email" class="input" value="{{ old('email') }}">
                            @error('email')
                             <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                         <div class="field input-field">
                            <input name="password" type="password" placeholder="Create password" class="input">
                            @error('password')
                             <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div>

                         <!-- <div class="field input-field">
                            <input name="confirm_password" type="confirm_password" placeholder="Confirm password" class="input">
                            @error('confirm_password')
                             <small style="color:red;">{{ $message }}</small>
                            @enderror
                        </div> -->

                        <div class="field button-field">
                            <button type="submit" >Register</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" class="link login-link">Login</a></span>
                    </div>
                </div>

                <!-- <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Login with Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="#" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div> -->

            </div>
        </section>

        <!-- JavaScript -->
        <script src="{{ asset('auth/js/javascript.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if($message = Session::get('failed'))
        <script>
            Swal.fire( '{{$message}}' );
        </script>
        @endif

         @if($message = Session::get('success'))
        <script>
            Swal.fire( '{{$message}}' );
        </script>
        @endif

         

        

    </body>
</html>