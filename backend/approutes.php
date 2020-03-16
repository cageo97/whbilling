<?php
    use backend\controllers\maincontrol;
    use backend\controllers\authcontrol;
    use backend\controllers\admincontrol;


    $slim->group('', function(){
        $this->get('/buy', maincontrol::class . ':buy');
        $this->map(['get', 'post'], '/buy/{id}', maincontrol::class . ':buy_product');
    });

    $slim->group('', function(){
        $this->get('/', maincontrol::class . ':index');
        $this->get('/services', maincontrol::class . ':services');
        $this->get('/billing', maincontrol::class . ':billing');
        $this->get('/tickets', maincontrol::class . ':tickets');
    });

    $slim->group('/admin', function(){
        $this->get('', admincontrol::class . ':index');

        $this->map(['get', 'post'], '/client', admincontrol::class . ':client');
        $this->map(['get', 'post'], '/client/add', admincontrol::class . ':client_add');
        $this->map(['get', 'post'], '/client/edit/{id}', admincontrol::class . ':client_edit');

        $this->map(['get', 'post'], '/product', admincontrol::class . ':product');
        $this->map(['get', 'post'], '/product/add', admincontrol::class . ':product_action');
        $this->map(['get', 'post'], '/product/edit/{id}', admincontrol::class . ':product_action');

        $this->map(['get', 'post'], '/settings', admincontrol::class . ':settings');
    });
    

    $slim->group('/auth', function() {
        $this->map(['get', 'post'], '/login', authcontrol::class . ':login');
        $this->map(['get', 'post'], '/register', authcontrol::class . ':register');
        $this->map(['get', 'post'], '/logout', authcontrol::class . ':logout');
    });
?>