<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Artisan;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\FrontendController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\MessageController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\WishlistController;
    use App\Http\Controllers\OrderController;
    use App\Http\Controllers\ProductReviewController;
    use App\Http\Controllers\PostCommentController;
    use App\Http\Controllers\CouponController;
    use App\Http\Controllers\PayPalController;
    use App\Http\Controllers\NotificationController;
    use App\Http\Controllers\HomeController;
    use \UniSharp\LaravelFilemanager\Lfm;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\InquiryController;
    use App\Http\Controllers\ProductController;
    use App\Models\User;
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

    // CACHE CLEAR ROUTE
    Route::get('cache-clear', function () {
        Artisan::call('optimize:clear');
        request()->session()->flash('success', 'Successfully cache cleared.');
        return redirect()->back();
    })->name('cache.clear');
        Route::get('storage-link', function () {
        Artisan::call('storage:link');
        request()->session()->flash('success', 'Successfully storage link.');
        return redirect()->back();
    })->name('storage.link');
    Route::get('schedule-link', function () {
        Artisan::call('schedule:run ');
        request()->session()->flash('success', 'Successfully storage link.');
        return redirect()->back();
    })->name('schedule.run');
    Route::get('down-app', function () {
        Artisan::call('down');
        request()->session()->flash('success', 'Successfully site down.');
        return redirect()->back();
    })->name('down');
    
Route::get('/test-proc-open', function () {
    $process = proc_open('php -v', [
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w']
    ], $pipes);

    if (is_resource($process)) {
        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);

        return response()->json([
            'message' => 'proc_open is enabled.',
            'output' => $output
        ]);
    } else {
        return response()->json([
            'message' => 'proc_open is disabled.'
        ]);
    }
});

Route::post('/stock-list',[SearchController::class,'search' ])->name('search');
Route::get('/get/model/{id}',[SearchController::class,'getModel' ]);
Route::get('/get/model/code/{id}',[SearchController::class,'getModelCode' ]);
Route::get('/sort/{sortOption}',[SearchController::class,'sort' ]);
Route::get('/change/currency/{value}/{type}',[SearchController::class,'changeCurrency' ]);


    // STORAGE LINKED ROUTE
    Route::get('storage-link',[AdminController::class,'storageLink'])->name('storage.link');


    Auth::routes(['register' => false]);



// Frontend Routes
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/stock-list', [FrontendController::class, 'stockList'])->name('stock-list');
    Route::get('/how-to-buy', [FrontendController::class, 'howBuy'])->name('how.buy');
    Route::get('/about-mh', [FrontendController::class, 'companyProfile'])->name('about');
    Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
    Route::get('/why-choes-us', [FrontendController::class, 'whyChoesUs'])->name('why.choes.us');
    Route::get('/freight-table', [FrontendController::class, 'freightTable'])->name('freight.table');
    Route::get('/bank-information', [FrontendController::class, 'bnakInformation'])->name('bank.info');
    Route::get('/endorsements', [FrontendController::class, 'endorsement'])->name('endorsement');
    Route::get('/product/{id}', [SearchController::class, 'productById'])->name('productById');
    Route::get('/car/categories/{id}', [FrontendController::class, 'productById'])->name('productByIdCat');
    Route::get('/types/products/{id}', [FrontendController::class, 'productByType'])->name('category');
    Route::get('/vehicle-inquiry', [FrontendController::class, 'vehicleInquiry'])->name('vehicle.inquiry');
    Route::get('/contact-details', [FrontendController::class, 'vehicleInquiry'])->name('contact.details');
    Route::get('/car-details/{id}', [FrontendController::class, 'carDetails'])->name('car.details');
    Route::post('/send-inquiry', [InquiryController::class, 'store'])->name('inquiry.send');


// Backend section start

    Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/file-manager', function () {
            return view('backend.layouts.file-manager');
        })->name('file-manager');
        // user route
        Route::resource('users', 'UsersController');
        // Banner
        Route::resource('banner', 'BannerController');
        // Brand
        Route::resource('brand', 'BrandController');
        Route::resource('type', 'TypeController');
        Route::resource('freights', 'FreightController');
        Route::resource('countries', 'CountryController');
        Route::resource('engine', 'EngineController');
        Route::resource('fueltype', 'FuelTypeController');
        Route::resource('grade', 'GradeController');
        Route::resource('transmission', 'TransMissionController');
        Route::resource('accessories', 'AccessoryController');
        Route::resource('color', 'ColorController');
        Route::get('/inquiry', [SearchController::class, 'inquiry'])->name('inquiry.backend');
        // Profile
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin-profile');
        Route::post('/profile/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');
        // Category
        Route::resource('/category', 'CategoryController');
        // Product
        Route::resource('/product', 'ProductController');
         Route::get('/product/search/stock', [ProductController::class, 'SearchByStockId'])->name('SearchByStockId');
        // Ajax for sub category
        Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
        // POST category

        // Post tag

        // Post

        // Message
        Route::resource('/message', 'MessageController');
        Route::get('/message/five', [MessageController::class, 'messageFive'])->name('messages.five');


        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('setting/update', [AdminController::class, 'settingsUpdate'])->name('settings.update');

        // Notification
        Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('admin.notification');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('all.notification');
        Route::delete('/notification/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
        // Password Change
        Route::get('change-password', [AdminController::class, 'changePassword'])->name('change.password.form');
        Route::post('change-password', [AdminController::class, 'changPasswordStore'])->name('change.password');
        Route::get('backups', [AdminController::class, 'showBackups'])->name('backups.index');
     Route::get('backups/download/{file}', [AdminController::class, 'downloadBackup'])->name('backups.download');
      Route::delete('backups/delete/{file}', [AdminController::class, 'deleteBackup'])->name('backups.delete');
    });