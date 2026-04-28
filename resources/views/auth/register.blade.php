@extends('template')

@section('content')
<div class="hero-wrap" style="background: linear-gradient(rgba(129, 218, 209, 0.4), rgba(129, 218, 209, 0.4)), 
     url('https://themewagon.github.io/direngine/images/bg_1.jpg');">
    
    <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.15);"></div>
    
    <div class="container" style="height: 100%; display: flex; align-items: center; justify-content: center; padding-top: 80px; padding-bottom: 50px;">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 ftco-animate">
                
                <div class="login-wrap p-5 w-100 mx-auto" style="
                    max-width: 420px; 
                    background: rgba(255, 255, 255, 0.15);
                    backdrop-filter: blur(25px) saturate(180%);
                    -webkit-backdrop-filter: blur(25px) saturate(180%);
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    border-radius: 24px; 
                    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
                    position: relative;
                    overflow: hidden;">
                    
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 50%; background: linear-gradient(180deg, rgba(255,255,255,0.15) 0%, transparent 100%); pointer-events: none;"></div>

                    <h3 class="mb-4 text-center" style="color: #fff; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; text-shadow: 0 2px 10px rgba(0,0,0,0.2); position: relative; z-index: 1;">Register</h3>
                    
                    <form action="{{ route('register') }}" method="POST" class="signin-form" style="position: relative; z-index: 1;">
                        @csrf

                        @if ($errors->any())
                            <div class="alert" style="background: rgba(220, 53, 69, 0.25); backdrop-filter: blur(10px); color: #fff; border: 1px solid rgba(220, 53, 69, 0.3); border-radius: 12px; font-size: 13px; margin-bottom: 20px;">
                                <ul class="mb-0 pl-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <style>
                            .glass-input::placeholder { color: rgba(255,255,255,0.7) !important; }
                            .glass-input:focus { 
                                border-bottom: 2px solid rgba(255,255,255,0.8) !important; 
                                background: rgba(255,255,255,0.1) !important; 
                                color: #fff !important; 
                                box-shadow: none !important;
                            }
                            input:-webkit-autofill {
                                -webkit-box-shadow: 0 0 0 30px rgba(129, 218, 209, 0.2) inset !important;
                                transition: background-color 5000s ease-in-out 0s;
                                -webkit-text-fill-color: #fff !important;
                            }
                        </style>

                        <div class="form-group mb-4" style="position: relative; margin-top: 5px;">
                            <label style="position: absolute; top: -22px; left: 0; color: #fff; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Full Name</label>
                            <span class="icon-user" style="position: absolute; top: 50%; transform: translateY(-50%); left: 0; color: rgba(255,255,255,0.9); font-size: 18px;"></span>
                            <input type="text" name="name" class="form-control glass-input" placeholder="Full Name" value="{{ old('name') }}" style="background: rgba(255,255,255,0.05) !important; border: none; border-bottom: 1px solid rgba(255,255,255,0.4); color: #fff !important; border-radius: 4px; padding-left: 35px; box-shadow: none; height: 40px; font-size: 15px;" required autofocus>
                        </div>

                        <div class="form-group mb-4" style="position: relative; margin-top: 22px;">
                            <label style="position: absolute; top: -22px; left: 0; color: #fff; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Email Address</label>
                            <span class="icon-envelope" style="position: absolute; top: 50%; transform: translateY(-50%); left: 0; color: rgba(255,255,255,0.9); font-size: 18px;"></span>
                            <input type="email" name="email" class="form-control glass-input" placeholder="Email" value="{{ old('email') }}" style="background: rgba(255,255,255,0.05) !important; border: none; border-bottom: 1px solid rgba(255,255,255,0.4); color: #fff !important; border-radius: 4px; padding-left: 35px; box-shadow: none; height: 40px; font-size: 15px;" required>
                        </div>
                        
                        <div class="form-group mb-4" style="position: relative; margin-top: 22px;">
                            <label style="position: absolute; top: -22px; left: 0; color: #fff; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Password</label>
                            <span class="icon-lock" style="position: absolute; top: 50%; transform: translateY(-50%); left: 0; color: rgba(255,255,255,0.9); font-size: 18px;"></span>
                            <input type="password" name="password" class="form-control glass-input" placeholder="Password" style="background: rgba(255,255,255,0.05) !important; border: none; border-bottom: 1px solid rgba(255,255,255,0.4); color: #fff !important; border-radius: 4px; padding-left: 35px; box-shadow: none; height: 40px; font-size: 15px;" required>
                        </div>

                        <div class="form-group mb-5" style="position: relative; margin-top: 22px;">
                            <label style="position: absolute; top: -22px; left: 0; color: #fff; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">Confirm Password</label>
                            <span class="icon-lock" style="position: absolute; top: 50%; transform: translateY(-50%); left: 0; color: rgba(255,255,255,0.9); font-size: 18px;"></span>
                            <input type="password" name="password_confirmation" class="form-control glass-input" placeholder="Confirm Password" style="background: rgba(255,255,255,0.05) !important; border: none; border-bottom: 1px solid rgba(255,255,255,0.4); color: #fff !important; border-radius: 4px; padding-left: 35px; box-shadow: none; height: 40px; font-size: 15px;" required>
                        </div>

                        <div class="form-group mt-2">
                            <button type="submit" class="btn submit w-100" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(5px); color: #fff; border: 1px solid rgba(255,255,255,0.4); border-radius: 12px; height: 50px; font-weight: 700; font-size: 14px; letter-spacing: 2px; transition: all 0.4s ease; text-transform: uppercase;">Sign Up</button>
                        </div>
                        
                        <div class="form-group text-center mt-4 mb-0">
                            <p style="color: rgba(255, 255, 255, 0.85); font-size: 13px;">Already have an account? <a href="{{ route('login') }}" style="color: #fff; font-weight: 700; text-decoration: none; border-bottom: 1px solid rgba(255,255,255,0.6);">Sign In</a></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection