<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);



Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    Router::prefix('admin', function ($routes) {
        //   __________________________________________________________________Categories
        $routes->connect(
            '/categories',
            ['controller' => 'Categories', 'action' => 'add']
        );
        $routes->connect(
            '/frequences',
            ['controller' => 'Frequencies', 'action' => 'add']
        );
        $routes->connect(
            '/restrictions',
            ['controller' => 'Restrictions', 'action' => 'add']
        );
        $routes->connect(
            '/zones',
            ['controller' => 'Zones', 'action' => 'add']
        );
        $routes->fallbacks(DashedRoute::class);
    });
    //   __________________________________________________________________Membres
    $routes->connect(
        '/membres',
        ['controller' => 'Users', 'action' => 'index']
    );
    $routes->connect(
        '/inscription',
        ['controller' => 'Users', 'action' => 'add']
    );
    $routes->connect(
        '/membre/:id-:login',
        ['controller' => 'Users', 'action' => 'view'],
        [
            'pass' => ['id','login'],
            'id' => '[0-9]+',
        ]
    );
    $routes->connect(
        '/membre/:id-:login/edition',
        ['controller' => 'Users', 'action' => 'edit'],
        [
            'pass' => ['id','login'],
            'id' => '[0-9]+',
        ]
    );
    //   __________________________________________________________________Login
    $routes->connect(
        '/connexion',
        ['controller' => 'Users', 'action' => 'login']
    );
    $routes->fallbacks(DashedRoute::class);
});

/*Load all plugin routes */
Plugin::routes();

