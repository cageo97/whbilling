<?php
    use backend\controllers\maincontrol;
    use backend\controllers\authcontrol;

    $slim->get('/', maincontrol::class . ':index');

    $slim->group('/auth', function() {
        $this->map(['get', 'post'], '/login', authcontrol::class . ':login');
    });
?>