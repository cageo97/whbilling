<?php
    use backend\controllers\maincontrol;
    use backend\controllers\authcontrol;

    $slim->get('/', maincontrol::class . ':index');

    $slim->group('/auth', function() {
        $this->map(['get', 'post'], '/login', authcontrol::class . ':login');
        $this->map(['get', 'post'], '/register', authcontrol::class . ':register');
        $this->map(['get', 'post'], '/logout', authcontrol::class . ':logout');
    });
?>