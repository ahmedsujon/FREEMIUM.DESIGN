<?php

Route::get('/', 'Web\Fontend\HomeController@index')->name('welcome');

Route::get('items/{slug}', 'Web\Fontend\ItemController@details')->name('item.details');

Route::get('all_items', 'Web\Fontend\ItemController@index')->name('all_items');

Route::get('/category/{slug}', 'Web\Fontend\ItemController@itemByCategory')->name('category.items');

Route::get('/tag/{slug}', 'Web\Fontend\ItemController@itemByTag')->name('tag.items');

Route::get('about_us', 'Web\Fontend\AboutController@index')->name('about_us');

Route::get('advertise', 'Web\Fontend\AdvertiseController@index')->name('advertise');

Route::get('contact_info', 'Web\Fontend\ContactController@index')->name('contact_info');

Route::post('contact', 'Web\Fontend\ContactController@sendMessage')->name('contact.send');

Route::post('subscribe', 'Web\Fontend\SubscriberController@store')->name('subscriber.store');

Route::get('resource_info', 'Web\Fontend\SubmitionController@index')->name('resource_info');

Route::post('/resource_submit', 'Web\Fontend\SubmitionController@sendMessage')->name('resource.submit');

Route::get('/search', 'Web\Fontend\SearchController@index')->name('search');


Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return redirect('admin/dashboard');
    });

    Route::get('dashboard', 'Web\Admin\DashboardController@index')->name('admin.dashboard');

    Route::resource('category', 'Web\Admin\CategoryController', ['as' => 'admin']);

    Route::resource('items', 'Web\Admin\ItemController', ['as' => 'admin']);

    Route::resource('tags', 'Web\Admin\TagController', ['as' => 'admin']);

    Route::resource('feature_item', 'Web\Admin\FeatureController', ['as' => 'admin']);

    Route::resource('contact_info', 'Web\Admin\ContactController', ['as' => 'admin']);

    Route::resource('subscriber', 'Web\Admin\SubscriberController', ['as' => 'admin']);

    Route::resource('resource_submit', 'Web\Admin\SubmitionController', ['as' => 'admin']);

    Route::resource('advertise', 'Web\Admin\AdvertiseController', ['as' => 'admin']);
});

Auth::routes();

Route::get('admin/dashboard', 'Web\Admin\DashboardController@index')->name('admin.dashboard');