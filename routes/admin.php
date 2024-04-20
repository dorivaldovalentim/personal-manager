<?php
use App\Http\Controllers\Auth\AdminLoginController;

Route::domain(env("ADMIN_DOMAIN"))->prefix('admin')->name('admin.')->group(function () {
    Route::middleware("guest:admin")->group(function () {
        Route::inertia("/login", "Admin/Auth/Login")->name("login");
        Route::post("/login", [AdminLoginController::class, "store"])->name("login");
    });
});
