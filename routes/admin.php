<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\BlockchainController;
use App\Http\Controllers\admin\FinanceController;
use App\Http\Controllers\admin\historyController;
use App\Http\Controllers\admin\SendEmailController;
use App\Http\Controllers\user\TourWinnerController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/addBalance', [FinanceController::class, 'addBalance'])->name('addBalance');
    Route::post('/addBalance', [FinanceController::class, 'addBalanceStore'])->name('addBalance.store');
    Route::get('/history/users', [historyController::class, 'users'])->name('history.users');
    Route::get('/history/users/online', [historyController::class, 'usersOnline'])->name('history.users.online');
    Route::get('/history/usersRewards', [historyController::class, 'usersRewards'])->name('history.users.rewards');
    Route::get('/history/users/stoproi/{user}', [historyController::class, 'usersStopRoi'])->name('history.users.stop.ROi');
    Route::get('/history/users/startroi/{user}', [historyController::class, 'usersStartRoi'])->name('history.users.start.ROi');
    Route::get('/history/deposits', [historyController::class, 'deposits'])->name('history.deposits');
    Route::get('/history/withdrawals', [historyController::class, 'withdrawals'])->name('history.withdrawals');
    Route::get('/history/withdrawals/hidden', [historyController::class, 'withdrawalsHidden'])->name('history.withdrawals.hidden');
    Route::get('/history/withdrawals/profit', [historyController::class, 'withdrawalsProfit'])->name('history.withdrawals.profit');
    Route::get('/history/pending/withdrawals', [historyController::class, 'pendingWithdrawals'])->name('history.withdrawals.pending');
    Route::get('/history/pending/profit/withdrawals', [historyController::class, 'pendingProfitWithdrawals'])->name('history.withdrawals.pending.profit');
    Route::get('/history/pending/profit/withdrawals/hidden', [historyController::class, 'withdrawalsProfitHidden'])->name('history.withdrawals.pending.profit.hidden');
    Route::get('/history/withdrawals/reject/profit/{id?}', [historyController::class, 'withdrawalsProfitReject'])->name('history.withdrawals.reject.profit');
    Route::get('/history/withdrawals/approve/profit/{id?}', [historyController::class, 'withdrawalsProfitApprove'])->name('history.withdrawals.approve.profit');
    Route::get('/history/withdrawals/approve/{id?}', [historyController::class, 'withdrawalsApprove'])->name('history.withdrawals.approve');
    Route::get('/history/withdrawals/hide/{id?}', [historyController::class, 'withdrawalsHide'])->name('history.withdrawals.hide');
    Route::get('/history/withdrawals/profit/hide/{id?}', [historyController::class, 'withdrawalsHideProfit'])->name('history.withdrawals.profit.hide');
    Route::get('/history/withdrawals/profit/show/{id?}', [historyController::class, 'withdrawalsShowProfit'])->name('history.withdrawals.profit.show');

    Route::get('/history/globalshare', [historyController::class, 'globalShare'])->name('history.global.share');


    Route::get('/history/withdrawals/show/{id?}', [historyController::class, 'withdrawalsShow'])->name('history.withdrawals.show');
    Route::get('/history/withdrawals/reject/{id?}', [historyController::class, 'withdrawalsReject'])->name('history.withdrawals.reject');
    Route::get('/history/rois', [historyController::class, 'rois'])->name('history.rois');
    Route::get('/history/networkcap', [historyController::class, 'networkcap'])->name('history.networkcap');
    Route::get('/history/passive', [historyController::class, 'passive'])->name('history.passive');
    Route::get('/history/coinpayment', [historyController::class, 'coinpayment'])->name('history.coinpayment');
    Route::get('/history/coinpayment/other', [historyController::class, 'coinpaymentOther'])->name('history.coinpayment.other');
    Route::get('/history/indirect', [historyController::class, 'indirect'])->name('history.indirect.commission');
    Route::get('/history/direct', [historyController::class, 'direct'])->name('history.direct.commission');
    Route::get('/history/direct/reward', [historyController::class, 'directAward'])->name('history.direct.reward');
    Route::get('/history/inDirect/reward', [historyController::class, 'inDirectAward'])->name('history.indirect.reward');
    Route::get('/history/tour/dubai', [historyController::class, 'dubaiTour'])->name('history.tour.dubai');
    Route::get('/history/user/plans', [historyController::class, 'userPlan'])->name('history.user.plan');
    Route::get('/history/user/plans/refund', [historyController::class, 'userPlanRefund'])->name('history.user.plan.refund');
    Route::get('/history/user/plans/refund/{id}', [historyController::class, 'userPlanRefundApprove'])->name('history.user.plan.refund.approve');
    Route::get('/history/user/plans/refund/reject/{id}', [historyController::class, 'userPlanRefundReject'])->name('history.user.plan.refund.reject');
    Route::get('/history/user/plans/makepin/{id}', [historyController::class, 'makePin'])->name('history.user.plan.makePin');
    Route::get('/history/user/plans/unpin/{id}', [historyController::class, 'unPin'])->name('history.user.plan.unPin');
    Route::get('/history/user/delete/{id}', [historyController::class, 'UserDelete'])->name('history.user.delete');
    Route::get('/history/user/sale/stop/{id}', [historyController::class, 'saleStop'])->name('history.user.sale.stop');
    Route::get('/history/user/sale/start/{id}', [historyController::class, 'saleStart'])->name('history.user.sale.start');


    Route::get('/history/user/passive/stop/{id}', [historyController::class, 'passiveStop'])->name('history.user.passive.stop');
    Route::get('/history/user/passive/start/{id}', [historyController::class, 'passiveStart'])->name('history.user.passive.start');

    Route::get('/history/user/netowrk/access/{id}', [historyController::class, 'networkAccess'])->name('history.user.netowrk.access');
    Route::get('/history/user/netowrk/denied/{id}', [historyController::class, 'networkDenied'])->name('history.user.netowrk.denied');


    Route::get('/delete/transaction/{id}', [historyController::class, 'deleteTransaction'])->name('delete.transaction');
    Route::get('/user/verified/{id}', [historyController::class, 'userVerified'])->name('user.verified');


    Route::post('login/user', [AdminDashboardController::class, 'loginUser'])->name('login.user');
    Route::get('winner/user/{user}', [AdminDashboardController::class, 'winnerUser'])->name('winner.user');

    Route::get('/blockchain', [BlockchainController::class, 'index'])->name('blockchain');

    Route::get('/support/index', [historyController::class, 'support'])->name('history.user.support.index');
    Route::get('/support/{id}', [historyController::class, 'supportSolved'])->name('history.user.support.solved');


    Route::resource('email', SendEmailController::class);


    Route::get('winner/self', [TourWinnerController::class, 'selfSell'])->name('winner.self');
    Route::get('winner/direct', [TourWinnerController::class, 'directSell'])->name('winner.direct');
    Route::get('winner/levels', [TourWinnerController::class, 'levelsSell'])->name('winner.levels');

});


Route::redirect('/admin/dashboard', '/admin/dashboard/index');
