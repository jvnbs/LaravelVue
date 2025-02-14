<?php

use Illuminate\Support\Facades\Route;

Route::prefix('adminpnlx')->middleware('PreventBackAndForward')->group(function () {

    Route::match(['GET', 'POST'], '/', [App\Http\Controllers\adminpnlx\AuthAdminController::class, 'login'])->name('Admin.login');
    Route::get('register', [App\Http\Controllers\adminpnlx\AuthAdminController::class, 'register'])->name('Admin.register');

    Route::middleware(['AuthAdmin'])->group(function () {
        Route::get('dashboard', [App\Http\Controllers\adminpnlx\DashboardControoler::class, 'index'])->name('Dashboard');
        Route::get('logout', [App\Http\Controllers\adminpnlx\DashboardControoler::class, 'logout'])->name('Admin.logout');
        Route::get('profile', [App\Http\Controllers\adminpnlx\DashboardControoler::class, 'profile'])->name('Admin.profile');
        Route::post('profile-update', [App\Http\Controllers\adminpnlx\DashboardControoler::class, 'profileUpdate'])->name('Admin.profileUpdate');
        Route::get('change-password', [App\Http\Controllers\adminpnlx\DashboardControoler::class, 'changePassword'])->name('Admin.changePassword');

        Route::middleware(['CheckPermission'])->group(function () {


            Route::get('acls', [App\Http\Controllers\adminpnlx\AclController::class, 'index'])->name('Acl.index');
            Route::get('acls/create', [App\Http\Controllers\adminpnlx\AclController::class, 'create'])->name('Acl.create');
            Route::post('acls/store', [App\Http\Controllers\adminpnlx\AclController::class, 'store'])->name('Acl.store');
            Route::get('acls/view/{id}', [App\Http\Controllers\adminpnlx\AclController::class, 'show'])->name('Acl.show');
            Route::get('acls/edit/{id}', [App\Http\Controllers\adminpnlx\AclController::class, 'edit'])->name('Acl.edit');
            Route::post('acls/update/{id}', [App\Http\Controllers\adminpnlx\AclController::class, 'update'])->name('Acl.update');
            Route::get('acls/destroy/{enaclid?}', [App\Http\Controllers\adminpnlx\AclController::class, 'delete'])->name('Acl.delete');
            Route::get('acls/update-status/{id}/{status}', [App\Http\Controllers\adminpnlx\AclController::class, 'changeStatus'])->name('Acl.changeStatus');
            Route::post('acl/add-more/add-more', [App\Http\Controllers\adminpnlx\AclController::class, 'addMoreRow'])->name('acl.addMoreRow');
            Route::get('acl/delete-function/{id}', [App\Http\Controllers\adminpnlx\AclController::class, 'delete_function'])->name('acl.delete_function');


            Route::get('users', [App\Http\Controllers\adminpnlx\UserController::class, 'index'])->name('User.index');
            Route::get('users/create', [App\Http\Controllers\adminpnlx\UserController::class, 'create'])->name('User.create');
            Route::post('users/store', [App\Http\Controllers\adminpnlx\UserController::class, 'store'])->name('User.store');
            Route::get('users/view/{id}', [App\Http\Controllers\adminpnlx\UserController::class, 'show'])->name('User.show');
            Route::get('users/edit/{id}', [App\Http\Controllers\adminpnlx\UserController::class, 'edit'])->name('User.edit');
            Route::post('users/update/{id}', [App\Http\Controllers\adminpnlx\UserController::class, 'update'])->name('User.update');
            Route::get('users/delete/{id}', [App\Http\Controllers\adminpnlx\UserController::class, 'delete'])->name('User.delete');
            Route::get('users/status/{id}/{status}', [App\Http\Controllers\adminpnlx\UserController::class, 'changeStatus'])->name('User.changeStatus');
            Route::get('users-pdf', [App\Http\Controllers\adminpnlx\UserController::class, 'generatePDF'])->name('User.pdf');
            Route::get('users-html-pdf', [App\Http\Controllers\adminpnlx\UserController::class, 'htmlPdf'])->name('User.htmlPdf');
            Route::get('users-export', [App\Http\Controllers\adminpnlx\UserController::class, 'export'])->name('User.export');
            Route::get('users-import', [App\Http\Controllers\adminpnlx\UserController::class, 'import'])->name('User.import');
            Route::post('users-import-save', [App\Http\Controllers\adminpnlx\UserController::class, 'importSubmit'])->name('User.importSubmit');
            Route::get('users-qr-code', [App\Http\Controllers\adminpnlx\UserController::class, 'QrCode'])->name('User.QrCode');
            Route::get('users-print', [App\Http\Controllers\adminpnlx\UserController::class, 'print'])->name('User.print');

            Route::get('staffs', [App\Http\Controllers\adminpnlx\StaffController::class, 'index'])->name('Staff.index');
            Route::get('staffs/create', [App\Http\Controllers\adminpnlx\StaffController::class, 'create'])->name('Staff.create');
            Route::post('staffs/store', [App\Http\Controllers\adminpnlx\StaffController::class, 'store'])->name('Staff.store');
            Route::get('staffs/view/{id}', [App\Http\Controllers\adminpnlx\StaffController::class, 'show'])->name('Staff.show');
            Route::get('staffs/edit/{id}', [App\Http\Controllers\adminpnlx\StaffController::class, 'edit'])->name('Staff.edit');
            Route::post('staffs/update/{id}', [App\Http\Controllers\adminpnlx\StaffController::class, 'update'])->name('Staff.update');
            Route::get('staffs/delete/{id}', [App\Http\Controllers\adminpnlx\StaffController::class, 'delete'])->name('Staff.delete');
            Route::get('staffs/status/{id}/{status}', [App\Http\Controllers\adminpnlx\StaffController::class, 'changeStatus'])->name('Staff.changeStatus');
            Route::get('staffs-pdf', [App\Http\Controllers\adminpnlx\StaffController::class, 'generatePDF'])->name('Staff.pdf');

            Route::get('roles', [App\Http\Controllers\adminpnlx\RoleController::class, 'index'])->name('Role.index');
            Route::get('roles/create', [App\Http\Controllers\adminpnlx\RoleController::class, 'create'])->name('Role.create');
            Route::post('roles/store', [App\Http\Controllers\adminpnlx\RoleController::class, 'store'])->name('Role.store');
            Route::get('roles/view/{id}', [App\Http\Controllers\adminpnlx\RoleController::class, 'show'])->name('Role.show');
            Route::get('roles/edit/{id}', [App\Http\Controllers\adminpnlx\RoleController::class, 'edit'])->name('Role.edit');
            Route::post('roles/update/{id}', [App\Http\Controllers\adminpnlx\RoleController::class, 'update'])->name('Role.update');
            Route::get('roles/delete/{id}', [App\Http\Controllers\adminpnlx\RoleController::class, 'delete'])->name('Role.delete');
            Route::get('roles/status/{id}/{status}', [App\Http\Controllers\adminpnlx\RoleController::class, 'changeStatus'])->name('Role.changeStatus');

            Route::get('banners', [App\Http\Controllers\adminpnlx\BannerController::class, 'index'])->name('Banner.index');
            Route::get('banners/create', [App\Http\Controllers\adminpnlx\BannerController::class, 'create'])->name('Banner.create');
            Route::post('banners/store', [App\Http\Controllers\adminpnlx\BannerController::class, 'store'])->name('Banner.store');
            Route::get('banners/view/{id}', [App\Http\Controllers\adminpnlx\BannerController::class, 'show'])->name('Banner.show');
            Route::get('banners/edit/{id}', [App\Http\Controllers\adminpnlx\BannerController::class, 'edit'])->name('Banner.edit');
            Route::post('banners/update/{id}', [App\Http\Controllers\adminpnlx\BannerController::class, 'update'])->name('Banner.update');
            Route::get('banners/delete/{id}', [App\Http\Controllers\adminpnlx\BannerController::class, 'delete'])->name('Banner.delete');
            Route::get('banners/status/{id}/{status}', [App\Http\Controllers\adminpnlx\BannerController::class, 'changeStatus'])->name('Banner.changeStatus');


            Route::get('products', [App\Http\Controllers\adminpnlx\ProductController::class, 'index'])->name('Product.index');
            Route::get('products/create', [App\Http\Controllers\adminpnlx\ProductController::class, 'create'])->name('Product.create');
            Route::post('products/store', [App\Http\Controllers\adminpnlx\ProductController::class, 'store'])->name('Product.store');
            Route::get('products/view/{id}', [App\Http\Controllers\adminpnlx\ProductController::class, 'show'])->name('Product.show');
            Route::get('products/edit/{id}', [App\Http\Controllers\adminpnlx\ProductController::class, 'edit'])->name('Product.edit');
            Route::post('products/update/{id}', [App\Http\Controllers\adminpnlx\ProductController::class, 'update'])->name('Product.update');
            Route::get('products/delete/{id}', [App\Http\Controllers\adminpnlx\ProductController::class, 'delete'])->name('Product.delete');
            Route::get('products/status/{id}/{status}', [App\Http\Controllers\adminpnlx\ProductController::class, 'changeStatus'])->name('Product.changeStatus');


            Route::get('categories', [App\Http\Controllers\adminpnlx\CategoryController::class, 'index'])->name('Category.index');
            Route::get('categories/create', [App\Http\Controllers\adminpnlx\CategoryController::class, 'create'])->name('Category.create');
            Route::post('categories/store', [App\Http\Controllers\adminpnlx\CategoryController::class, 'store'])->name('Category.store');
            Route::get('categories/view/{id}', [App\Http\Controllers\adminpnlx\CategoryController::class, 'show'])->name('Category.show');
            Route::get('categories/edit/{id}', [App\Http\Controllers\adminpnlx\CategoryController::class, 'edit'])->name('Category.edit');
            Route::post('categories/update/{id}', [App\Http\Controllers\adminpnlx\CategoryController::class, 'update'])->name('Category.update');
            Route::get('categories/delete/{id}', [App\Http\Controllers\adminpnlx\CategoryController::class, 'delete'])->name('Category.delete');
            Route::get('categories/status/{id}/{status}', [App\Http\Controllers\adminpnlx\CategoryController::class, 'changeStatus'])->name('Category.changeStatus');

            Route::get('blogs', [App\Http\Controllers\adminpnlx\BlogController::class, 'index'])->name('Blog.index');
            Route::get('blogs/create', [App\Http\Controllers\adminpnlx\BlogController::class, 'create'])->name('Blog.create');
            Route::post('blogs/store', [App\Http\Controllers\adminpnlx\BlogController::class, 'store'])->name('Blog.store');
            Route::get('blogs/view/{id}', [App\Http\Controllers\adminpnlx\BlogController::class, 'show'])->name('Blog.show');
            Route::get('blogs/edit/{id}', [App\Http\Controllers\adminpnlx\BlogController::class, 'edit'])->name('Blog.edit');
            Route::post('blogs/update/{id}', [App\Http\Controllers\adminpnlx\BlogController::class, 'update'])->name('Blog.update');
            Route::get('blogs/delete/{id}', [App\Http\Controllers\adminpnlx\BlogController::class, 'delete'])->name('Blog.delete');
            Route::get('blogs/status/{id}/{status}', [App\Http\Controllers\adminpnlx\BlogController::class, 'changeStatus'])->name('Blog.changeStatus');

        });

    });

    Route::get('table/{tableName}', function ($tableName) {
        $table = getTableSchemaWithRecords($tableName);
        $html = '<h2> Records</h2>';
        if (!empty($table['records'])) {
            $headers = array_keys((array) $table['records'][0]);

            $html .= '<table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">';
            $html .= '<thead><tr>';

            foreach ($headers as $header) {
                $html .= '<th>' . $header . '</th>';
            }
            $html .= '</tr></thead>';

            $html .= '<tbody>';
            foreach ($table['records'] as $record) {
                $html .= '<tr>';
                foreach ($headers as $header) {
                    $html .= '<td>' . (isset($record->$header) ? $record->$header : '') . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</tbody></table>';
        } else {
            $html .= '<p>No records found.</p>';
        }

        return $html;
    });

});


Route::get('/{any}', function () {
    return view('welcome'); // Vue app serve karega
})->where('any', '.*');
