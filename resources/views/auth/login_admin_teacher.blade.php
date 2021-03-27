
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Login</title>


<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link href="{{ asset('css/loginstyle.css') }}" rel="stylesheet">


<style type="text/css">
  html body.bg-full-screen-image { background-image: none !important; }

  body { background-color: #b3f1f1d2 !important; }
    
    .ball {
    position: absolute;
    border-radius: 100%;
    opacity: 0.5;
    }

    .fix{
    position:fixed;
    bottom:0px;
    left:0%;
}
</style>
</head>

<body>
<!-- login page start -->
<div id="app">
    <main class="py-4">

        <div class="container">
            <div class="row justify-content-center" style="margin-top: -5em">
                <div class="col-md-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">

                    <div class="card-header-logo mt-top" >
                        <div class="row justify-content-center pr-3 pl-3">
                            <figure class="m-0">
                             <h2 style="color: azure"></h2>   {{-- <img class="img-fluid" alt="Responsive image" src="{{ asset('images/logo/logo.png') }}" alt=""> --}}
							 <span class="login100-form-logo">
                                <!-- <i class="zmdi zmdi-landscape"></i> -->
                                <img src="{{asset('StudentLogin/images/icons/logo.png')}}" alt="" class="rounded-circle" width="120" height="120" >
                            </span>
							</figure>

                        </div>

                    </div>

                    <div class="card" style="border-radius: 3px">
                        <div class="card-header card-header-admin">{{ __('CAS SYSTEM') }}</div>


                        <div class="card-body">
                            <form id="login-form" action="{{ route('teacher.login.submit') }}" method="post" role="form" style="display: block;">

								{{ csrf_field() }}

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="label_login" for="login">
                                            {{ __('Teacher Login') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                          <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                            <div class="input-group">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text input-icon">
                                                  <i class="fa fa-user text-white" aria-hidden="true"></i>
                                                </div>
                                              </div>
                                              <input id="email" type="email" class="form-control input-size " name="email" value="{{ old('email') }}" required  autofocus placeholder="email">
                                            </div>

											@if ($errors->has('email'))
												<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                      <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text input-icon">
                                              <i class="fa fa-lock text-white" aria-hidden="true"></i>
                                            </div>
                                          </div>
                                          <input id="password" type="password" class="form-control input-size " name="password" required autocomplete="current-password" placeholder="password">
                                        </div>

                                        @if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary glow position-relative w-100">
                                            {{ __('Login') }}
                                        </button>

                                    </div>

                                </div>

                            </form>
                            
                                <div class="text-center mb-2">
                                        
                                            <small class="text-muted">{{ __('Forgot Your Password? Cantact Administrator') }}</small>
                                        
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
</div>
<img class="fix" src="{{ asset('images/cas-background.svg') }}" alt="background">


<!-- login page ends -->


<script>
    // Some random colors
const colors = ["#3CC157", "#2AA7FF", "#1B1B1B", "#FCBC0F", "#F85F36"];

const numBalls = 50;
const balls = [];

for (let i = 0; i < numBalls; i++) {
  let ball = document.createElement("div");
  ball.classList.add("ball");
  ball.style.background = colors[Math.floor(Math.random() * colors.length)];
  ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
  ball.style.top = `${Math.floor(Math.random() * 2)}vh`;
  ball.style.transform = `scale(${Math.random()})`;
  ball.style.width = `${Math.random()}em`;
  ball.style.height = ball.style.width;
  
  balls.push(ball);
  document.body.append(ball);
}

// Keyframes
balls.forEach((el, i, ra) => {
  let to = {
    x: Math.random() * (i % 2 === 0 ? -11 : 11),
    y: Math.random() * 12
  };

  let anim = el.animate(
    [
      { transform: "translate(0, 0)" },
      { transform: `translate(${to.x}rem, ${to.y}rem)` }
    ],
    {
      duration: (Math.random() + 1) * 5000, // random duration
      direction: "alternate",
      fill: "both",
      iterations: Infinity,
      easing: "ease-in-out"
    }
  );
});
</script>
</body>
</html>
