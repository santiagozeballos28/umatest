@extends('auth.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Registro</b></a>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger" style="margin-left: 0%; margin-right: 0%;">
                <strong>Oops!</strong> Existe algunos problemas con su entrada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg">Registrar una cuenta nueva</p>
            <form action="{{ url('/auth/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nombre completo" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                 <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Apellidos" name="apellido" value="{{ old('apellido') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{ old('direccion') }}"/>
                    <span class="glyphicon glyphicon-globe form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="{{ old('telefono') }}"/>
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback">
                    <select name="genero" class="form-control">
                       <option value="M">M</option>
                       <option value="F">F</option>
                   </select>
                </div>


                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Correo electronico" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Repetir contraseña" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                        </div>
                    </div><!-- /.col -->
                    <div style=" width: 150px; margin-left: 100px;">
                        <button type="submit" class="btn btn-primary form-control" >Registrar</button>
                    </div><!-- /.col -->
                </div>
            </form>


        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('auth.scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
