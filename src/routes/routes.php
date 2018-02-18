<?php

Route::group(['prefix' => 'lpe-kabupaten-kota', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\LpeKabupatenKota\Http\Controllers\LpeKabupatenKotaController@index',
        'create'     => 'Bantenprov\LpeKabupatenKota\Http\Controllers\LpeKabupatenKotaController@create',
        'store'     => 'Bantenprov\LpeKabupatenKota\Http\Controllers\LpeKabupatenKotaController@store',
        'show'      => 'Bantenprov\LpeKabupatenKota\Http\Controllers\LpeKabupatenKotaController@show',
        'update'    => 'Bantenprov\LpeKabupatenKota\Http\Controllers\LpeKabupatenKotaController@update',
        'destroy'   => 'Bantenprov\LpeKabupatenKota\Http\Controllers\LpeKabupatenKotaController@destroy',
    ];

    Route::get('/',$controllers->index)->name('lpe-kabupaten-kota.index');
    Route::get('/create',$controllers->create)->name('lpe-kabupaten-kota.create');
    Route::post('/store',$controllers->store)->name('lpe-kabupaten-kota.store');
    Route::get('/{id}',$controllers->show)->name('lpe-kabupaten-kota.show');
    Route::put('/{id}/update',$controllers->update)->name('lpe-kabupaten-kota.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('lpe-kabupaten-kota.destroy');

});

