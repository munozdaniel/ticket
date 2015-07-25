{{ content() }}

<div id="login-page">
    <div class="container">
        {{ form('sesion/validar',"class":"form-login") }}

            <h2 class="form-login-heading">Iniciar Sesión</h2>
            <div class="login-wrap">
                {{ text_field('nombre',"class":"form-control","placeholder":"Nombre de Usuario","autofocus":"") }}
                <br>
                {{ password_field('password',"class":"form-control","placeholder":"Contraseña") }}

                <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="#modalOlvido"> Olvidó su contraseña?</a>
		                </span>
                </label>
                <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> INGRESAR</button>
                <hr>

                <div class="login-social-link centered">
                    <p>o puede ingresar mediante una red social.</p>
                    <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                    <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                </div>
                <div class="registration">
                    Todavía no tienes una cuenta?<br/>
                    <a class="" href="#">
                        Crear Cuenta
                    </a>
                </div>

            </div>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalOlvido" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        {{ end_form() }}

    </div>
</div>
{% block script_footer %}

    {{ javascript_include('assets/js/jquery.js') }}

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    {{ javascript_include('assets/js/jquery.backstretch.min.js') }}
<script>
    $.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>
{% endblock %}