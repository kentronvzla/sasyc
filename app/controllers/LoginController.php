<?php

class LoginController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->forgetBeforeFilter('auth');
        $this->forgetBeforeFilter('verificarPermiso');
    }

    public function getLogout() {
        Sentry::logout();
        return Redirect::to('login');
    }

    public function getIndex() {
        if (Sentry::check()) {
            return Redirect::to('/');
        } else {
            return View::make('login');
        }
    }

    public function postIndex() {
        try {
            $credentials = array(
                'email' => strtolower(Input::get('email')),
                'password' => Input::get('password')
            );
            if (Input::has('mantener')) {
                Sentry::authenticateAndRemember($credentials);
            } else {
                Sentry::authenticate($credentials, false);
            }
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            return Redirect::back()->withInput()->withErrors('El usuario es requerido.');
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            return Redirect::back()->withInput()->withErrors('La contraseña es obligatoria.');
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            return Redirect::back()->withInput()->withErrors('Contraseña incorrecta, intente nuevamente.');
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::back()->withInput()->withErrors('Este usuario no existe.');
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return Redirect::back()->withInput()->withErrors('Este usuario no esta activado.');
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            return Redirect::back()->withInput()->withErrors('Este usuario se encuentra suspendido.');
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            return Redirect::back()->withInput()->withErrors('Este usuario esta bloqueado.');
        }
        return Redirect::intended('');
    }

}
