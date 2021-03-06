@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Registrate con:') }}</small></div>
                        <div class="text-center">
                            <a href="#" class="btn btn-neutral btn-icon mr-4">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Ingrese sus datos!') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            
                            <div class="text-muted font-italic">
                                <small>{{ __('password strength') }}: <span class="text-success font-weight-700">{{ __('strong') }}strong</span></small>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div id="seleccionar" class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('Estoy de acuerdo!') }} <a data-toggle="modal" data-target="#modal-default" href="#!">{{ __('Privacy Policy') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                            <div class="col-md-4">
                                <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Politica de Privacidad</h6>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">??</span>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            
                                            <p>Edwin Hernandez mejor conocido como La Livre, con domicilio en calle 12 de octubre, Tonanitla, Edomex, 55785 y portal de internet www.LaLivre.com, es el responsable del uso y protecci??n de sus datos personales, y al respecto le informamos lo siguiente:</p>
                                            <h5>??Para qu?? fines utilizaremos sus datos personales?</h5>
                                            <p>Los datos personales que recabamos de usted, los utilizaremos para las siguientes finalidades que son necesarias para el servicio que solicita:</p>
                                            <p>Respuesta a mensajes del formulario de Registro</p>
                                            <h5>??Qu?? datos personales utilizaremos para estos fines?</h5>
                                            <p>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales</p>
                                            <p>Datos de identificaci??n y contacto</p>
                                            <h5>??C??mo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso o ejercer la revocaci??n de consentimiento?</h5>
                                            <p>Usted tiene derecho a conocer qu?? datos personales tenemos de usted, para qu?? los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la correcci??n de su informaci??n personal en caso de que est?? desactualizada, sea inexacta o incompleta (Rectificaci??n); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no est?? siendo utilizada adecuadamente (Cancelaci??n); as?? como oponerse al uso de sus datos personales para fines espec??ficos (Oposici??n). Estos derechos se conocen como derechos ARCO.</p>
                                            <p>Para el ejercicio de cualquiera de los derechos ARCO, debe enviar una petici??n v??a correo electr??nico a edwinhr553@gmail.com y deber?? contener:</p>
                                            <li>Nombre completo del titular.</li>
                                            <li>Domicilio.</li>
                                            <li>Tel??fono.</li>
                                            <li>Correo electr??nico usado en este sitio web.</li>
                                            <li>Copia de una identificaci??n oficial adjunta.</li>
                                            <li>Asunto ??Derechos ARCO??</li>
                                            <p>Descripci??n el objeto del escrito, los cuales pueden ser de manera enunciativa m??s no limitativa los siguientes: Revocaci??n del consentimiento para tratar sus datos personales; y/o Notificaci??n del uso indebido del tratamiento de sus datos personales; y/o Ejercitar sus Derechos ARCO, con una descripci??n clara y precisa de los datos a Acceder, Rectificar, Cancelar o bien, Oponerse. En caso de Rectificaci??n de datos personales, deber?? indicar la modificaci??n exacta y anexar la documentaci??n soporte; es importante en caso de revocaci??n del consentimiento, que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligaci??n legal requiramos seguir tratando sus datos personales. Asimismo, usted deber?? considerar que para ciertos fines, la revocaci??n de su consentimiento implicar?? que no le podamos seguir prestando el servicio que nos solicit??, o la conclusi??n de su relaci??n con nosotros.</p>
                                            <p>??En cu??ntos d??as le daremos respuesta a su solicitud?</p>
                                            <p>10 D??as</p>
                                            <p>??Por qu?? medio le comunicaremos la respuesta a su solicitud?</p>
                                            <p>Al mismo correo electr??nico de donde se env??o la petici??n.</p>
                                            <h5>El uso de tecnolog??as de rastreo en nuestro portal de internet</h5>
                                            <p>Le informamos que en nuestra p??gina de internet utilizamos cookies, web beacons u otras tecnolog??as, a trav??s de las cuales es posible monitorear su comportamiento como usuario de internet, as?? como brindarle un mejor servicio y experiencia al navegar en nuestra p??gina. Los datos personales que obtenemos de estas tecnolog??as de rastreo son los siguientes:</p>
                                            <p>Identificadores, nombre de usuario y contrase??as de sesi??n</p>
                                            <p>Estas cookies, web beacons y otras tecnolog??as pueden ser deshabilitadas. Para conocer c??mo hacerlo, consulte el men?? de ayuda de su navegador. Tenga en cuenta que, en caso de desactivar las cookies, es posible que no pueda acceder a ciertas funciones personalizadas en nuestros sitio web.</p>
                                            <h5>??C??mo puede conocer los cambios en este aviso de privacidad?</h5>
                                            <p>El presente aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales; de nuestras propias necesidades por los productos o servicios que ofrecemos; de nuestras pr??cticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas. Nos comprometemos a mantener actualizado este aviso de privacidad sobre los cambios que pueda sufrir y siempre podr?? consultar las actualizaciones que existan en el sitio web www.LaLivre.com.</p>
                                            <p>??ltima actualizaci??n de este aviso de privacidad: 03/11/2021</p>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" id="BtnSeleccionar" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
