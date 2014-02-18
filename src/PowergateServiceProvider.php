<?php

use Illumate\Support\ServiceProvider;

class PowergateServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('domain', 'Ballen\PowergateClient\Domain');
        $this->app->bind('record', 'Ballen\PowergateClient\Record');
    }

}
