<?php

use App\Http\Controllers\InDirectCommissionStatementController;
use App\Http\Controllers\landing\LandingController;
use App\Http\Controllers\PerfectMoneyController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\user\ActivePlanController;
use App\Http\Controllers\user\SupportController;
use App\Http\Controllers\user\CoinPaymentController;
use App\Http\Controllers\user\DepositController;
use App\Http\Controllers\user\NetworkController;
use App\Http\Controllers\user\PlanController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\StatementController;
use App\Http\Controllers\user\TeamController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\user\WithdrawController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/privacy', [LandingController::class, 'privacy'])->name('privacy');
Route::redirect('/user/dashboard', '/user/dashboard/index');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::get('/index', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::post('/plan/activate', [PlanController::class, 'activate'])->name('plan.activate');
    Route::resource('/plan', PlanController::class);
    Route::resource('/deposit', DepositController::class);
    Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw.index');
    Route::get('/roi/withdraw/index', [WithdrawController::class, 'roiWithdraw'])->name('roi.withdraw.roiWithdraw');
    Route::post('/roi/withdraw/store', [WithdrawController::class, 'roiWithdrawStore'])->name('roi.withdraw.roiWithdrawStore');
    Route::post('/withdraw', [WithdrawController::class, 'store'])->name('withdraw.store');
    Route::get('/statement/deposits', [StatementController::class, 'deposits'])->name('statement.deposits');
    Route::get('/statement/withdrawals', [StatementController::class, 'withdrawals'])->name('statement.withdrawals');
    Route::get('/statement/roi', [StatementController::class, 'roi'])->name('statement.roi');
    Route::get('/statement/roiWithdrawals', [StatementController::class, 'roiWithdrawals'])->name('statement.roi.withdrawals');
    Route::get('/statement/direct', [StatementController::class, 'direct'])->name('statement.direct');
    Route::get('/statement/tour/dubai', [StatementController::class, 'tourDubai'])->name('statement.tour.dubai');
    Route::get('/statement/tour/malaysia', [StatementController::class, 'tourMalaysia'])->name('statement.tour.malaysia');
    Route::get('/statement/indirect/award', [StatementController::class, 'indirectAward'])->name('statement.indirect.award');
    Route::get('/statement/inDirect', [StatementController::class, 'inDirect'])->name('statement.inDirect');
    Route::get('/statement/passive', [StatementController::class, 'passive'])->name('statement.passive');
    Route::get('/statement/ranks/direct', [StatementController::class, 'ranks'])->name('statement.ranks');
    Route::get('/statement/ranks/indirect', [StatementController::class, 'ranksIndirect'])->name('statement.ranks.indirect');
    Route::get('/statement/reward', [StatementController::class, 'reward'])->name('statement.reward');
    Route::get('/statement/globalshare', [StatementController::class, 'globalShare'])->name('statement.global.share');
    Route::get('/statement/directteam', [StatementController::class, 'directTeam'])->name('statement.direct.team');
    Route::get('/statement/inDirectteam', [StatementController::class, 'inDirectTeam'])->name('statement.inDirect.team');
    Route::get('/profile/index', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/index', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/password/change', [ProfileController::class, 'passwordChange'])->name('profile.password.change');
    Route::post('/profile/password/update', [ProfileController::class, 'passwordupdate'])->name('profile.password.update');
    Route::get('/team/{id?}', [TeamController::class, 'index'])->name('team.index');
    // Route::get('/roi/withdraw', [RoiTransactionController::class,'index'])->name('roi.withdraw');

    Route::get('/statement/indirect/level1', [InDirectCommissionStatementController::class, 'level1'])->name('statement.indirect.level1');
    Route::get('/statement/indirect/level2', [InDirectCommissionStatementController::class, 'level2'])->name('statement.indirect.level2');
    Route::get('/statement/indirect/level3', [InDirectCommissionStatementController::class, 'level3'])->name('statement.indirect.level3');
    Route::get('/statement/indirect/level4', [InDirectCommissionStatementController::class, 'level4'])->name('statement.indirect.level4');
    Route::get('/statement/indirect/level5', [InDirectCommissionStatementController::class, 'level5'])->name('statement.indirect.level5');
    Route::get('/statement/indirect/level6', [InDirectCommissionStatementController::class, 'level6'])->name('statement.indirect.level6');

    Route::get('/statement/plan/active', [ActivePlanController::class, 'index'])->name('plan.active.index');
    Route::get('/statement/plan/refund/{id}', [ActivePlanController::class, 'refundReq'])->name('plan.active.refund');

    Route::prefix('support')->group(function () {
        Route::resource('support', SupportController::class);
    });




    Route::post('/live/user/{id}', [UserDashboardController::class, 'liveUser'])->name('live.user');




    // Networker Section
    Route::prefix('network')->name('network.')->middleware(['network'])->group(function () {
        Route::get('/index', [NetworkController::class, 'index'])->name('index');
    });

    Route::post('login/user', [NetworkController::class, 'loginUser'])->name('login.user');
});

Route::get('/refund/{user}/{tid}', [RefundController::class, 'index'])->name('refund.request.confirm');

// group route
Route::prefix('payment')->name('payment.')->group(function () {
    Route::post('/success', [PerfectMoneyController::class, 'success'])->name('success');
    Route::post('/failed', [PerfectMoneyController::class, 'failed'])->name('failed');
    Route::post('/webhook', [CoinPaymentController::class, 'webhook'])->name('webhook');
});


Route::view('qr', 'user.dashboard.deposit.qr');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/socialite.php';
