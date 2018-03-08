<?php

Route::group(['prefix' => 'api/kegiatan', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@index',
        'create'    => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@create',
        'show'      => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@show',
        'store'     => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@store',
        'edit'      => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@edit',
        'update'    => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@update',
        'destroy'   => 'Bantenprov\Kegiatan\Http\Controllers\KegiatanController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('kegiatan.index');
    Route::get('/create',       $controllers->create)->name('kegiatan.create');
    Route::get('/{id}',         $controllers->show)->name('kegiatan.show');
    Route::post('/',            $controllers->store)->name('kegiatan.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('kegiatan.edit');
    Route::put('/{id}',         $controllers->update)->name('kegiatan.update');
    Route::delete('/{id}',      $controllers->destroy)->name('kegiatan.destroy');
});
