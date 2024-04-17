<?php

Route::domain(env("ADMIN_DOMAIN"))->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function() { return 'admin'; });
});
