

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <style>
    	.login__user {
  position: relative;
}

.login__user-logo {
  position: absolute;
  top: 10px;
  left: 10px;
}

.login__user-ip {
  width: 450px;
  font-size: 15px;
  padding: 10px 40px;
  background: #f3f3f3;
  border: none;
}

.login__crop {
  width: 100%;
  height: 500px;
  overflow: hidden;
}

.login__crop img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}

.login__right-1 {
  font-size: 40px;
  font-weight: 900;
  color: #198754;
  text-transform: uppercase;
}

.login__right-2 {
  font-size: 14px;
}

.login__right-3 {
  text-transform: lowercase;
  font-weight: 600;
  margin-left: 35%;
  font-size: 14px;
}

.login__right-4 {
  text-transform: lowercase;
  margin-top: 50px;
  font-size: 14px;
  margin-left: 24%;
}

.login__right-5 {
  color: #198754;
  margin-top: 50px;
  margin-left: 15px;
  font-size: 14px;
}
.login__right-5 {
  color: #198754;
  margin-top: 50px;
  margin-left: 15px;
  font-size: 14px;
}

.login__btn-submit {
  padding: 8px 40px;
  margin-left: 30%;
}

.signup__user {
  position: relative;
}

.signup__user-logo {
  position: absolute;
  top: 10px;
  left: 10px;
}

.signup__user-ip {
  width: 450px;
  font-size: 15px;
  padding: 10px 40px;
  background: #f3f3f3;
  border: none;
}

.signup__crop {
  width: 100%;
  height: 500px;
  overflow: hidden;
}

.signup__crop img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}
.my-alert-danger{
	width: 450px !important;
    padding: 10px;
}
.signup__right {
  padding-right: 70px;
}

.signup__right-1 {
  font-size: 40px;
  font-weight: 900;
  color: #198754;
  text-transform: uppercase;
}

.signup__right-2 {
  font-size: 14px;
  color: #198754;
}

.signup__right-3 {
  text-transform: lowercase;
  font-weight: 600;
  margin-left: 35%;
  font-size: 14px;
}

.signup__right-4 {
  text-transform: lowercase;
  margin-top: 50px;
  font-size: 14px;
  margin-left: 24%;
}

.signup__right-5 {
  color: #198754;
  margin-top: 50px;
  margin-left: 15px;
  font-size: 14px;
}

.signup__btn-submit {
  padding: 8px 40px;
  margin-left: 30%;
}
.login__right-2{
	color: red !important;
	 font-size: 16px !important;
}
    	
    </style>
  </head>
  <body>
    <div class="container p-3 shadow mt-5">
      <div class="d-flex flex-row bd-highlight mb-3 login">
        <div class="p-2 bd-highlight login__left">
          <div class="login__crop shadow">
            <img
              src="https://images.unsplash.com/photo-1487798452839-c748a707a6b2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=375&q=80"
              alt=""
              srcset=""
            />
          </div>
        </div>
        <div
          class="login__right d-flex flex-column align-items-center flex-grow-1 mt-5"
        >
          <p class="login__right-1">Đăng Nhập Quản Trị Cpseed</p>
         
        	@if(!empty($error))
	          	<div class="alert alert-danger my-alert-danger" role="alert">
	  				{{$error}}
				</div>
          	@endif
            
          </p>
          <form action="{{URL::to('/login')}}" method="post" class="login__form">
          	@csrf
            <div class="mb-3 login__user">
              <div class="login__user-logo">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M12 2c2.757 0 5 2.243 5 5.001 0 2.756-2.243 5-5 5s-5-2.244-5-5c0-2.758 2.243-5.001 5-5.001zm0-2c-3.866 0-7 3.134-7 7.001 0 3.865 3.134 7 7 7s7-3.135 7-7c0-3.867-3.134-7.001-7-7.001zm6.369 13.353c-.497.498-1.057.931-1.658 1.302 2.872 1.874 4.378 5.083 4.972 7.346h-19.387c.572-2.29 2.058-5.503 4.973-7.358-.603-.374-1.162-.811-1.658-1.312-4.258 3.072-5.611 8.506-5.611 10.669h24c0-2.142-1.44-7.557-5.631-10.647z"
                  />
                </svg>
              </div>
              <input
              	name="email"
                type="email"
                placeholder="tài khoản"
                class="form-control login__user-ip"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
              />
            </div>
            <div class="mb-3 login__user">
              <div class="login__user-logo">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M16 2c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6zm0-2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm-5.405 16.4l-1.472 1.6h-3.123v2h-2v2h-2v-2.179l5.903-5.976c-.404-.559-.754-1.158-1.038-1.795l-6.865 6.95v5h6v-2h2v-2h2l2.451-2.663c-.655-.249-1.276-.562-1.856-.937zm7.405-11.4c.551 0 1 .449 1 1s-.449 1-1 1-1-.449-1-1 .449-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"
                  />
                </svg>
              </div>

              <input
              	name="password"
                type="password"
                placeholder="mật khẩu"
                class="form-control login__user-ip"
                id="exampleInputPassword1"
              />
            </div>
            <div class="form-group">
				<div class="custom-control custom-checkbox">
					<input name="remember_me" type="checkbox"  id="customControlInline">
						<label class="custom-control-label" for="customControlInline">Remember me</label>
						</div>
				</div>
            
            <button
              type="submit"
              class="btn btn-success rounded-pill login__btn-submit"
            >
              Đăng nhập
            </button>
         
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
