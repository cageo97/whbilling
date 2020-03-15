<?php
    use backend\controllers\maincontrol;
    use backend\controllers\authcontrol;
    use backend\controllers\admincontrol;


    $slim->group('', function(){
        $this->get('/', maincontrol::class . ':index');
        $this->get('/services', maincontrol::class . ':services');
        $this->get('/billing', maincontrol::class . ':billing');
        $this->get('/tickets', maincontrol::class . ':tickets');
    });

    $slim->group('/admin', function(){
        $this->get('', admincontrol::class . ':index');
    });
    

    $slim->group('/auth', function() {
        $this->map(['get', 'post'], '/login', authcontrol::class . ':login');
        $this->map(['get', 'post'], '/register', authcontrol::class . ':register');
        $this->map(['get', 'post'], '/logout', authcontrol::class . ':logout');
    });
?>