<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/login', 'loginController@index');
Route::post('/login/checkLogin', 'loginController@checkLogin');
Route::get('/login/successlogin', 'loginController@successlogin');
Route::get('/login/logout', 'loginController@logout');

Route::view('/login/register', 'register');
Route::post('login/register', 'loginController@registerUser');

Route::get('/', 'WorkspaceController@showProjectsInWorkspace');

Route::post('/create-project', 'ProjectsController@createProject');

Route::get('/projects', 'ProjectsController@index');

Route::get('/projects/delete/{id}', ['uses' => 'ProjectsController@deleteProject']);

Route::get('/projects/{name}', ['uses' => 'IssueController@index']);

Route::get('/projects/{name}/users', ['uses' => 'ProjectsController@showUsers']);

Route::post('/projects/{name}/users/add-user', ['uses' => 'ProjectsController@addUser']);

Route::get('/projects/{name}/users/{id}', ['uses' => 'ProjectsController@removeUser']);

Route::post('/projects/users/{user_id}/{project_id}', ['uses' => 'UserController@updateRole']);

Route::get('/settings', 'WorkspaceController@settings');

Route::post('/settings/submit', 'UserController@updateUser');

Route::get('/projects/{name}/close-issue/{issue_id}', ['uses' => 'IssueController@closeIssue']);

Route::post('/projects/{name}/create-issue', ['uses' => 'IssueController@reportIssue']);

Route::post('/projects/{name}/update-issue-status/{issue_id}', ['uses' => 'IssueController@editStatus']);

Route::post('/projects/{name}/update-issue-priority/{issue_id}', ['uses' => 'IssueController@editPriority']);