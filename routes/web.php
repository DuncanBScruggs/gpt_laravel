<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register', 'UsersController@register');
$router->get('/getGames', 'GamesController@gamesIndex');
$router->get('/getCharacters', 'CharactersController@charactersIndex');
$router->post('/anonymousAccount', 'UsersController@createAnonymousAccount');
$router->get('/getLocations/{game_id}', 'LocationsController@gameLocationsIndex');
$router->get('/getCharacterTasks', 'CharacterTasksController@Index');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->post('/createCharacterTask', 'CharacterTasksController@createCharacterTask');
    $router->post('/deleteCharacterTask', 'CharacterTasksController@deleteCharacterTask');
    $router->get('/getUser', 'UsersController@getUser');
    $router->put('/updateAccount', 'UsersController@updateAccount');
    $router->post('/createCharacter', 'CharactersController@createCharacter');
    $router->post('/userCharactersIndex', 'CharactersController@userCharactersIndex');
});
