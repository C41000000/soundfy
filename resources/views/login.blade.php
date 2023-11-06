<title> @yield('title','Login') </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="../../css/auth/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="../../js/auth/login.js"></script>
<script src="../../js/layouts/main.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
            #message-danger, #message-success{
                position: absolute;
                bottom: 0;
                min-width: 100vw;
            }
        </style>
<body>
    @if(session()->has('error-message'))
        <div id="message-danger" class="alert alert-danger">
            {{session('error-message')}}
        </div>
    @endif
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
                         <div class="center-image">
                             <img style="border-radius: 3em" src="../../img/logo-nav.png">
                         </div>
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="{{route('login')}}" method="post" name="login">
                       @csrf
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Senha</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <p class="text-center">Ao cadastrar você aceita os  <a href="#">Termos de uso</a></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                 <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                 </i> Login com Google
                                 </a>
                              </p>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Não possui conta? <a href="#" id="signup">Cadastre-se aqui</a></p>
                           </div>
                        </form>

				</div>
			</div>
			  <div id="second">
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Criar Usuário</h1>
                           </div>
                        </div>
                        <form action="{{route('cadastro')}}" method='POST' name="registration">
                            @csrf
                           <div class="form-group">
                              <label for="exampleInputEmail1">Nome Completo</label>
                              <input type="text"  name="nome" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Nome Completo">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Nome de usuário</label>
                              <input type="text"  name="nome_usuario" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Nome de usuário">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Senha</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Digite sua senha">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <button type="submit" id="auth" class=" btn btn-block mybtn btn-primary tx-tfm">Castre-se gratuitamente</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="#" id="signin">Já possui conta?</a></p>
                              </div>
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>

</body>


