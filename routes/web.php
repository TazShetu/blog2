<?php

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


Auth::routes();


Route::get('/test', function(){
   return "Tag Page";
    // here we r calling posts method from Category.php which defines the relation
});



Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);


Route::get('/results', function (){

    $posts = \App\Post::where('title','like', '%' . request('query') . '%')->get();

    $query = request('query');

    $categories = \App\Category::take(5)->get();
    $setting = \App\Setting::first();

    return view('results', compact('posts', 'query', 'categories', 'setting'));
});


Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);







Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
//    prefix is what goes before route
    // here it is admin/*/*  like this

    Route::get('/home', 'HomeController@index')->name('home');
    // HomeController er modhe 'auth' middleware construct kora
// so everything inside HomeController will go through 'auth' middleware
    // but we put it here for the prefix

    // Post create
    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);
    // post store
    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    // post view
    Route::get('/posts', [
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    // post edit
    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);
    // post update
    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    // post trash
    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    // post trash view
    Route::get('/posts/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    // post kill (permanent delete)
    Route::get('/posts/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);

    // post restore
    Route::get('/posts/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    // Category create
    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);
    // Category store
    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    // Categories view
    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    // Categories edit
    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);
    // Category update
    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    // Categories delete
    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);


    // tags view
    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    // tag create
    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);
    // tags store
    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    // tags edit
    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);
    // tags update
    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    // tags delete
    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);


    // view users
    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    // create users
    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);
    // store users
    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    // delete user
    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);


    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);
    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);


    Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);
    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);
    // here we r not passing any id cz only Auth user can update their own profile
    // use Auth inside update()




    //Settings
    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);
    Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);



});
































