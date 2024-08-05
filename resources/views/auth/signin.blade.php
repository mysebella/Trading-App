@extends('_layout.auth')

@section('content')
    <section class="fxt-template-animation fxt-template-layout28">

        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->

        <div class="fxt-content">
            <div class="fxt-header" style="margin-top: -30px">
                <a href="index.php.html" class="fxt-logo" style="margin-bottom: 25px">
                    <img src="{{ asset('') }}login/img/logo-28.png" alt="Logo" style="width: 180px" />
                </a>
                <ul class="fxt-switcher-wrap">
                    <li>
                        <a href="{{ route('auth.signin') }}" class="switcher-text active">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('auth.signup') }}" class="switcher-text">Register</a>
                    </li>
                    <li>
                        <a href="forgotpass.php.html" class="switcher-text">Forgot Password</a>
                    </li>
                </ul>
            </div>
            <div class="fxt-form">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                    <p>Login into your account</p>
                </div>
                <form action="{{ route('auth.signin.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-2">
                            <input type="text" class="form-control" placeholder="Username" required name="username" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" id="password" class="form-control" placeholder="Password" required
                                name="password" />
                            <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <div class="fxt-checkbox-area">

                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" />
                                    <label for="checkbox1">Keep me logged in</label>
                                </div>

                                <div id="showme" style="display: none">
                                    <a href="">
                                        <button type="button" class="fxt-btn-fill">
                                            Reload
                                        </button>
                                    </a>
                                </div>

                                <div id="loadingGif" style="display: none">
                                    <img src="{{ asset('') }}login/images/ld.gif" style="width: 100px" />
                                </div>

                                <button type="submit" class="fxt-btn-fill" id="Login" onclick="signin()">
                                    Log in
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    @if (Session::has('error'))
        <script>
            const errorMessage = @json(Session::get('error'));
            Swal.fire({
                text: errorMessage,
                icon: "error"
            });
        </script>
    @endif
@endsection
