<?php
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Checkout\v2\CartController as CartControllerV2;
use App\Http\Controllers\Api\Client\Orders\BusinessOrderController;
use App\Http\Controllers\Api\Core\HomeController;
use App\Http\Controllers\Api\Core\ServiceController;
use App\Http\Controllers\Api\Coupons\CouponsController;
use App\Http\Controllers\Api\Orders\OrdersController;
use App\Http\Controllers\Api\Settings\SettingsController;
use App\Http\Controllers\Dashboard\BusinessProject\ProjectBranchController;
use App\Http\Controllers\Dashboard\Client\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VersionController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('client')->group(function () {

    Route::post('business_orders', [BusinessOrderController::class, 'index']);

    Route::get('client-project/{project}/order-stats', [BusinessOrderController::class, 'show']);

    Route::get('orders/today', [BusinessOrderController::class, 'todayOrders'])->name('orders.today');
    Route::get('orders/completed', [BusinessOrderController::class, 'completedOrders'])->name('orders.completed');
    Route::get('orders/canceled', [BusinessOrderController::class, 'canceledOrders'])->name('orders.canceled');

    Route::get('client/project-branches', [ProjectBranchController::class, 'getByClientProject'])->name('project-branches');

});

Route::post('check_update', [VersionController::class, 'checkUpdate'])->name('check_update');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/verify', [AuthController::class, 'verify']);

Route::prefix('client-admin')->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'doLogin']);
});

Route::get('/client-project/{id}/order-stats', [BusinessOrderController::class, 'orderStats']);
Route::get('/client-projects', [BusinessOrderController::class, 'allProjects']);

Route::get('/settings', function () {
    $setting = Setting::select('logo', 'site_name', 'site_description')->first();

    return response()->json([
        'status' => true,
        'data'   => [
            'logo'             => $setting ? asset($setting->logo) : null,
            'site_name'        => $setting?->site_name,
            'site_description' => $setting?->site_description,
        ],
    ]);
});

Route::get('/get_avail_times_from_date', [CartControllerV2::class, 'getAvailableTimesFromDate']);
Route::post('/changeOrderSchedule', [CartControllerV2::class, 'changeOrderSchedule'])->name('changeOrderSchedule');

Route::get('/getOrderData/{order_id}', [OrdersController::class, 'getOrderData'])->name('getOrderData');

//Route::post('/payment-callback/{type?}',[CheckoutController::class,'callbackPayment']);

Route::prefix('home')->group(function () {
    Route::get('/index', [HomeController::class, 'index']);
    Route::get('/search', [HomeController::class, 'search']);
});
Route::get('services/{id}', [ServiceController::class, 'serviceDetails']);
Route::get('/coupons', [CouponsController::class, 'allCoupons']);
Route::get('contact', [ServiceController::class, 'getContact']);
require __DIR__ . '/settings.router.php';

Route::middleware(['auth:sanctum', 'abilities:user'])->group(function () {
    Route::get('settings/walletDetails', [SettingsController::class, 'walletDetails']);
    require __DIR__ . '/core.router.php';
    require __DIR__ . '/auth.router.php';
    require __DIR__ . '/users.router.php';
    require __DIR__ . '/checkout.router.php';
    require __DIR__ . '/payment.router.php';
    require __DIR__ . '/order.router.php';
    require __DIR__ . '/cars.router.php';
    require __DIR__ . '/complaint.router.php';

});

Route::prefix('techn')->group(function () {
    require __DIR__ . '/techn/techn.router.php';
});

Route::prefix('admin')->group(function () {
    require __DIR__ . '/admin/admin.router.php';
});
