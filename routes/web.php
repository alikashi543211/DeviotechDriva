<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:clear');
    return 'CACHE CLEARED'; //Return anything
});

Auth::routes();

// Start All Front routes
Route::name("front.")->group(function(){
    Route::get('/', 'Front\FrontController@index')->name('index');
    Route::get('search', 'Front\GarageController@index')->name('garages');
    Route::get('keywords', 'Front\FrontController@load_keyword')->name('ajax.load_keyword');
    Route::get('list', 'Front\FrontController@garage_list')->name('garage_list');
    Route::get('detail/{slug}', 'Front\FrontController@garage_detail')->name('garage_detail');
    Route::get('update-slugs', 'Front\FrontController@update_slugs')->name('update_slugs');
    Route::get('delete-garages', 'Front\FrontController@deleteGaragesRecord');
    Route::get('save-garage', 'Front\FrontController@save_garage')->name('save_garage')->middleware(['auth','consumer']);
});
// End All Front Routes

// Start All Admin Routes
// Admin AUTH routes
Route::get('/admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login')->name('admin.post.login');
// Admin Authenticated Routes
Route::group(['prefix'=>'admin','middleware'=>['auth','admin','two_factor_auth']],function(){
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    // Ajax Routes
    Route::get('consumer-count-chart', 'Admin\DashboardController@consumer_count_chart')->name('admin.consumer_count_chart');
    Route::get('garage-count-chart', 'Admin\DashboardController@garage_count_chart')->name('admin.garage_count_chart');
    Route::get('new-app-count-chart', 'Admin\DashboardController@new_app_count_chart')->name('admin.new_app_count_chart');
    Route::get('comp-booking-count-chart', 'Admin\DashboardController@comp_booking_count_chart')->name('admin.comp_booking_count_chart');
    Route::get('in-progress-count-chart', 'Admin\DashboardController@in_progress_count_chart')->name('admin.in_progress_count_chart');
    Route::get('pending-count-chart', 'Admin\DashboardController@pending_count_chart')->name('admin.pending_count_chart');
    Route::get('cancel-count-chart', 'Admin\DashboardController@cancel_count_chart')->name('admin.cancel_count_chart');
    Route::get('vehicles-count-chart', 'Admin\DashboardController@vehicles_count_chart')->name('admin.vehicles_count_chart');

    Route::group(['prefix' => 'consumers'], function () {
        Route::get('/', 'Admin\ConsumerController@index')->name('admin.consumer');
        Route::get('profile/{id}', 'Admin\ConsumerController@profile')->name('admin.consumer.profile');
    });

    Route::group(['prefix' => 'garage'], function () {
        Route::get('applications', 'Admin\GarageController@applications')->name('admin.garage.applications');
        Route::get('detail/{id?}', 'Admin\GarageController@detail')->name('admin.garage.detail');
        Route::get('delete/{id?}', 'Admin\GarageController@delete')->name('admin.garage.delete');
        Route::get('approve/{id?}', 'Admin\GarageController@approve')->name('admin.garage.approve');
        Route::post('revision', 'Admin\GarageController@revision')->name('admin.garage.revision');
        Route::get('decline/{id?}', 'Admin\GarageController@decline')->name('admin.garage.decline');
        Route::get('exports', 'Admin\GarageController@exports')->name('admin.garage.exports');
        Route::get('generate-code/{id?}', 'Admin\GarageController@generateCode')->name('admin.garage.gen.code');
        Route::get('overview', 'Admin\GarageController@overView')->name('admin.garage.overview');
        Route::get('overview-profile/{id?}', 'Admin\GarageController@overViewProfile')->name('admin.garage.profile');
        Route::get('overview-suspend/{id?}', 'Admin\GarageController@suspend')->name('admin.garage.suspend');
        Route::get('overview-delete/{id?}', 'Admin\GarageController@deleteOverview')->name('admin.garage.delete_overview');
    });

    Route::group(['prefix' => 'bookings'], function () {
        Route::get('', 'Admin\BookingController@index')->name('admin.booking');
        Route::get('detail/{id?}', 'Admin\BookingController@detail')->name('admin.booking.detail');
        Route::get('consumer-profile/{id?}', 'Admin\BookingController@consumerProfile')->name('admin.booking.consumer_profile');
    });

    Route::group(['prefix' => 'support'], function () {
        Route::get('enquiries', 'Admin\SupportController@tickets')->name('admin.support.enquiries');
        Route::get('enquiries/{ticket_id}', 'Admin\SupportController@detail')->name('admin.support.enquiry_detail');
        Route::post('save-comment', 'Admin\SupportController@save_comment')->name('admin.support.save_comment');
        Route::get('close-enquiry/{id?}', 'Admin\SupportController@close_enquriy')->name('admin.support.close_enquriy');
        Route::get('reports', 'Admin\SupportController@reports')->name('admin.support.reports');
    });

    Route::group(['prefix' => 'statistics'], function () {
        // Ajax Routes
        Route::get('selected-date', 'Admin\StatisticController@statistics')->name('admin.statistics.selected_date');
        Route::get('', 'Admin\StatisticController@statistics')->name('admin.statistics');
    });

    Route::group(['prefix' => 'settings'], function () {
        // Ajax Routes
        Route::get('two-factor-login', 'Admin\SettingController@twoFactorLogin')->name('admin.settings.two_factor_login');

        Route::get('', 'Admin\SettingController@settings')->name('admin.settings');
        Route::post('save', 'Admin\SettingController@save')->name('admin.settings.save');
        Route::post('update-profile', 'Admin\SettingController@updateProfile')->name('admin.settings.update_profile');
        Route::post('update-password', 'Admin\SettingController@updatePassword')->name('admin.settings.update_password');
        Route::post('invite-user', 'Admin\SettingController@inviteUser')->name('admin.settings.invite_user');
        Route::get('remove-user', 'Admin\SettingController@removeUser')->name('admin.settings.remove_user');
    });

    Route::group(['prefix' => 'marketing'], function () {
        Route::get('/consumer', 'Admin\MarketingController@consumer')->name('admin.marketing.consumer');
        Route::get('/garage', 'Admin\MarketingController@garage')->name('admin.marketing.garage');
    });

    Route::get('/emails', function () {
        return view('Admin.emails.index');
    })->name('admin.emails');



    Route::get('/notifications', function () {
        return view('Admin.notifications.notifications');
    })->name('admin.notifications');

    Route::get('/recent-activities', function () {
        return view('Admin.activities.recent_activities');
    })->name('admin.activities');


    Route::group(['prefix' => 'services'], function () {
        Route::get('list', 'Admin\ServiceController@list')->name('admin.services.list');
        Route::get('add', 'Admin\ServiceController@add')->name('admin.services.add');
        Route::get('edit/{id}', 'Admin\ServiceController@edit')->name('admin.services.edit');
        Route::post('save/{id?}', 'Admin\ServiceController@save')->name('admin.services.save');
        Route::get('delete/{id}', 'Admin\ServiceController@delete')->name('admin.services.delete');
    });

    Route::group(['prefix' => 'customer-facilities'], function () {
        Route::get('list', 'Admin\CustomerFacilityController@list')->name('admin.customerFacilities.list');
        Route::get('add', 'Admin\CustomerFacilityController@add')->name('admin.customerFacilities.add');
        Route::get('edit/{id}', 'Admin\CustomerFacilityController@edit')->name('admin.customerFacilities.edit');
        Route::post('save/{id?}', 'Admin\CustomerFacilityController@save')->name('admin.customerFacilities.save');
        Route::get('delete/{id}', 'Admin\CustomerFacilityController@delete')->name('admin.customerFacilities.delete');
    });

    Route::group(['prefix' => 'payment-types'], function () {
        Route::get('list', 'Admin\PaymentTypeController@list')->name('admin.paymentTypes.list');
        Route::get('add', 'Admin\PaymentTypeController@add')->name('admin.paymentTypes.add');
        Route::get('edit/{id}', 'Admin\PaymentTypeController@edit')->name('admin.paymentTypes.edit');
        Route::post('save/{id?}', 'Admin\PaymentTypeController@save')->name('admin.paymentTypes.save');
        Route::get('delete/{id}', 'Admin\PaymentTypeController@delete')->name('admin.paymentTypes.delete');
    });
});
// End All Admin Routes

// Start All Garage Routes:-
// Garage AUTH Routes
Route::group(['prefix' => 'garage'], function () {
    Route::group(['prefix' => 'email'], function () {
        Route::get('verify/{email?}', 'Garage\RegisterController@verifyEmail')->name('garage.verify_email');
        Route::get('resend-verify/{email?}', 'Garage\RegisterController@sentVerifyEmail')->name('garage.send_verify_email');
        Route::get('verify-resend/{email?}', 'Garage\RegisterController@resendVerifyEmail')->name('garage.verify_email_send');
        Route::get('verified', 'Garage\RegisterController@verified')->name('garage.verified');
    });
    Route::get('register', 'Garage\RegisterController@personalInfo')->name('garage.register');
    Route::post('register', 'Garage\RegisterController@savePersonalInfo')->name('garage.register.save');
    Route::get('paypal-status', 'Garage\AdvertisementController@getPayPalStatus')->name('paypal.status');
});
// Garage Authenticated Routes
Route::group(['prefix' => 'garage', 'middleware' => ['auth', 'garage','two_factor_auth']], function () {

    // AJAX VIEWS
    Route::post('garage-update-booking-price', 'Garage\BookingController@update_booking_price')->name('update.booking_price');
    Route::post('garage-update-inspection-mileag', 'Garage\BookingController@update_inspection_mileag')->name('update.inspection_mileag');
    Route::post('garage-update-completion-time', 'Garage\BookingController@update_completion_time')->name('update.completion_time');
    Route::post('garage-update-inspection-quotation', 'Garage\BookingController@update_inspection_quotation')->name('update.inspection_quotation');
    Route::post('extension-request', 'Garage\BookingController@extension_request')->name('garage.booking.in_progress.extension_request');

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('','Garage\DashboardController@dashboard')->name('garage.dashboard');
        Route::get('notifications','Garage\DashboardController@notifications')->name('garage.notifications');
    });

    Route::group(['prefix' => 'application'], function () {
        Route::get('/', 'Garage\RegisterController@redirection')->name('garage.application.redirection');

        Route::get('/contact-information', 'Garage\RegisterController@profile')->name('garage.application.contact_info');
        Route::post('/contact-information', 'Garage\RegisterController@saveProfile')->name('garage.application.contact_info');

        Route::get('/description', 'Garage\RegisterController@facilities')->name('garage.application.description');
        Route::post('/description', 'Garage\RegisterController@saveFacilities')->name('garage.application.description');

        Route::get('/working-hours', 'Garage\RegisterController@workingHours')->name('garage.application.working_hours');
        Route::post('/working-hours', 'Garage\RegisterController@saveWorkingHours')->name('garage.application.working_hours');

        Route::get('/gallery', 'Garage\RegisterController@images')->name('garage.application.gallery');
        Route::post('/gallery', 'Garage\RegisterController@saveImages')->name('garage.application.gallery');
        Route::post('/del-gallery', 'Garage\RegisterController@deleteGalleryImage')->name('garage.application.del.gallery');

        Route::get('/overview', 'Garage\RegisterController@overview')->name('garage.application.overview');
        Route::post('/submit', 'Garage\RegisterController@submit')->name('garage.application.submit');

        Route::post('/verify-code', "Garage\RegisterController@verifyCode")->name('garage.application.verify');

    });

    Route::group(['prefix' => 'booking'], function () {
        Route::get('','Garage\BookingController@index')->name('garage.booking');
        Route::get('pending', 'Garage\BookingController@pendingStatus')->name('garage.booking.pending');
        Route::get('inspection', 'Garage\BookingController@inspectionStatus')->name('garage.booking.inspection');
        Route::get('in-progress', 'Garage\BookingController@in_progressStatus')->name('garage.booking.in_progress');
        Route::get('next-to-in-progress', 'Garage\BookingController@next_to_in_progress')->name('garage.booking.next_to_in_progress');
        Route::get('next-to-complete', 'Garage\BookingController@next_to_complete')->name('garage.booking.next_to_complete');
        Route::get('next-to-cancel', 'Garage\BookingController@next_to_cancel')->name('garage.booking.next_to_cancel');
        Route::get('save-report', 'Garage\BookingController@save_report')->name('garage.booking.save_report');

        Route::get('complete', 'Garage\BookingController@completeStatus')->name('garage.booking.complete');
        Route::get('cancelled', 'Garage\BookingController@cancelStatus')->name('garage.booking.cancel');
        Route::get('invoice', 'Garage\BookingController@invoice')->name('garage.booking.invoice');
        Route::post('save-inspection', 'Garage\BookingController@save_inspection')->name('garage.booking.save_inspection');
        Route::post('save-progress', 'Garage\BookingController@save_progress')->name('garage.booking.save_progress');
        Route::get('consumer-profile','Garage\BookingController@consumerProfile')->name('garage.booking.consumer_profile');
        Route::get('history','Garage\BookingController@bookingHistory')->name('garage.booking.history');
        Route::get('history/detail','Garage\BookingController@historyDetail')->name('garage.booking.hisory_detail');
        Route::post('feedback', 'Garage\BookingController@save_feedback')->name('garage.booking.save_feedback');
        // Route::get('','Garage\BookingController@bookingRedirection')->name('garage.booking.redirection');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('', 'Garage\ProfileController@profile')->name('garage.profile');
    });

    Route::group(['prefix' => 'settings'], function () {
        // Ajax Routes
        Route::get('two-factor-login', 'Garage\SettingController@twoFactorLogin')->name('garage.settings.two_factor_login');
        Route::get('update-profile', 'Garage\SettingController@account_profile')->name('garage.settings.account');
        Route::post('update-profile', 'Garage\SettingController@update_profile')->name('garage.settings.account');
        Route::get('authentication','Garage\SettingController@authentication')->name('garage.settings.authentication');
        Route::post('authentication','Garage\SettingController@updatePassword')->name('garage.settings.authentication');
        Route::get('manage-members', 'Garage\SettingController@manageMembers')->name('garage.settings.members');
        Route::get('remove-account', 'Garage\SettingController@remove_account')->name('garage.settings.remove_account');
        Route::get('remove-user', 'Garage\SettingController@removeUser')->name('garage.settings.remove_user');
        Route::post('invite-user', 'Garage\SettingController@inviteUser')->name('garage.settings.invite_user');
        Route::get('delete-profile', 'Garage\SettingController@deleteProfile')->name('garage.settings.delete_profile');
    });


    // Route::get('garage/login', function () {
    //     return redirect()->route('login.login');
    // })->name('garage.login');

    Route::get('/booking/detail/{id}', function () {
        return view('garage.booking.detail');
    })->name('garage.booking.detail');

    Route::get('/settings/company-profile', function () {
        return view('garage.settings.company_profile');
    })->name('garage.settings.company');

    // Route::get('/settings/manage-members', function () {
    //     return view('garage.settings.members');
    // })->name('garage.settings.members');

    Route::prefix('advertising')->name('garage.advertising.')->middleware('sub_garage')->group(function(){
        Route::get('/', 'Garage\AdvertisementController@list')->name('list');

        Route::prefix('promo')->name('promo.')->group(function(){
            Route::get('plans', 'Garage\AdvertisementController@promoPlans')->name('plans');
            Route::get('pricing', 'Garage\AdvertisementController@promoPricing')->name('pricing');
            Route::get('overview', 'Garage\AdvertisementController@promoOverview')->name('overview');
            Route::post('submit', 'Garage\AdvertisementController@promoSubmit')->name('submit');
            Route::get('view', 'Garage\AdvertisementController@promoView')->name('view');
        });

        Route::prefix('discount')->name('discount.')->group(function (){
            Route::get('services', 'Garage\AdvertisementController@discountServices')->name('services');
            Route::get('detail', 'Garage\AdvertisementController@discountDetail')->name('detail');
            Route::get('overview', 'Garage\AdvertisementController@discountOverview')->name('overview');
            Route::post('submit', 'Garage\AdvertisementController@discountSubmit')->name('submit');
        });
    });

    Route::group(['prefix' => 'statistics'], function () {
        // AJAX Views
        Route::get('load-followers-chart', 'Garage\StatisticController@followers')->name('garage.statistics.followers');
        Route::get('load-complete-booking-chart', 'Garage\StatisticController@completeBooking')->name('garage.statistics.complete_booking');
        Route::get('load-profile-views-chart', 'Garage\StatisticController@profileViews')->name('garage.statistics.profile_views');
        Route::get('load-booking-stat-chart', 'Garage\StatisticController@bookingStatistics')->name('garage.statistics.booking_statistics');
        Route::get('', 'Garage\StatisticController@statistics')->name('garage.statistics');


        Route::get('', 'Garage\StatisticController@statistics')->name('garage.statistics');
    });

    Route::group(['prefix' => 'support'], function () {
        Route::get('/tickets', 'Garage\SupportTicketController@index')->name('garage.tickets');
        Route::get('/tickets/{ticket_id}', 'Garage\SupportTicketController@detail')->name('garage.tickets.detail');
        Route::get('/open-ticket', 'Garage\SupportTicketController@open_ticket')->name('garage.open_ticket');
        Route::post('/save-ticket', 'Garage\SupportTicketController@save_ticket')->name('garage.save_ticket');
        Route::post('/save-comment', 'Garage\SupportTicketController@save_comment')->name('garage.save_comment');
        Route::get('/close-ticket/{id?}', 'Garage\SupportTicketController@close_ticket')->name('garage.close_ticket');
    });


    Route::get('/faq', function () {
        return view('garage.support.faq');
    })->name('garage.faq')->middleware("sub_garage");
});
// End All Garage Routes

// Start All Consumer Routes:-
Route::group(['prefix' => 'consumer'], function () {
    Route::get('resend-verify', 'Consumer\RegisterController@sentVerifyEmail')->name('consumer.send_verify_email');
    Route::get('verify-resend', 'Consumer\RegisterController@resendVerifyEmail')->name('consumer.verify_email_send');
    Route::get('verify/{email?}', 'Consumer\RegisterControllerController@verifyEmail')->name('consumer.verify_email');
    Route::get('register', 'Consumer\RegisterController@registerConsumer')->name('consumer.register');
    Route::post('register', 'Consumer\RegisterController@saveConsumer')->name('consumer.register.save');
    Route::get('verify_email/{email?}', 'Consumer\RegisterController@verifyEmail')->name('consumer.verify_email');
});
Route::group(['prefix' => 'consumer', 'middleware' => ['auth', 'consumer','two_factor_auth']], function () {
    Route::group(['prefix' => 'not_verified'], function () {
        Route::get('dashboard', 'Consumer\NotVerifiedController@dashboard')->name('consumer.not_verified.dashboard');
    });
    // AJAX
    Route::get('resend-verify-email', 'Consumer\NotVerifiedController@resendVerifyEmail')->name('consumer.resend_verify_email');
    Route::post('update-display-name', 'Consumer\NotVerifiedController@updateDisplayName')->name('consumer.update.display_name');
    Route::post('save-profile-pic', 'Consumer\NotVerifiedController@saveProfilePic')->name('consumer.save_picture');
    Route::get('load-cover-profile', 'Consumer\NotVerifiedController@coverProfile')->name('consumer.load_cover_profile');
});
// Consumer Authenticated Routes
Route::group(['prefix' => 'consumer'], function () {
    Route::group(['prefix' => 'garages'], function () {
        Route::get('list','Consumer\GarageController@index')->name('consumer.garages.garage_list');
        Route::post('fetch-keyword-list', 'Consumer\GarageController@fetch_keywordlist')->name('keywordlist.fetch');
        Route::post('fetch-location-list', 'Consumer\GarageController@fetch_locationlist')->name('locationlist.fetch');
        Route::get('load-keyword-list', 'Consumer\GarageController@loadKeywordList')->name('load.keyword.list');
    });
});
Route::group(['prefix' => 'consumer', 'middleware' => ['auth', 'consumer','two_factor_auth']], function () {
    Route::get('dashboard', 'Consumer\DashboardController@dashboard')->name('consumer.dashboard');
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('','Consumer\DashboardController@notifications')->name('consumer.notifications');
    });
    // AJAX Views
    Route::get('booking/accept-extension/{booking_id?}', 'Consumer\BookingController@accept_extension')->name('consumer.booking.accept_extension');
    Route::get('booking/decline-extension/{booking_id?}', 'Consumer\BookingController@decline_extension')->name('consumer.booking.decline_extension');
    Route::get('load-phone-form', 'Consumer\DashboardController@loadPhoneForm')->name('load.phone.form');
    Route::post('save-phone-form', 'Consumer\DashboardController@savePhoneForm')->name('save.phone.form');
    Route::get('load-search-vehicle-form', 'Consumer\DashboardController@loadSearchVehicleFrom')->name('load.search.vehicle.form');
    Route::get('search-vehicle/{vrm}', 'Consumer\DashboardController@searchVehicles')->name('search.vehicle');
    Route::post('save-vehicle', 'Consumer\DashboardController@saveVehicle')->name('save.vehicle');
    Route::get('change-status', 'Consumer\DashboardController@changeStatus')->name('change.consumer.status');
    Route::get('vehicles','Consumer\VehiclesController@index')->name('consumer.vehicles');
    Route::group(['prefix' => 'settings'], function () {
        // Ajax Views
        Route::get('two-factor-login', 'Consumer\ProfileController@twoFactorLogin')->name('consumer.settings.two_factor_login');
        Route::get('account-profile','Consumer\ProfileController@index')->name('consumer.settings.account');
        Route::get('authentication','Consumer\ProfileController@authentication')->name('consumer.settings.authentication');
        Route::post('update-profile', 'Consumer\ProfileController@updateProfile')->name('consumer.settings.update');
        Route::post('update-password', 'Consumer\ProfileController@updatePassword')->name('consumer.settings.authentication_update');
        Route::get('update-status', 'Consumer\ProfileController@updateStatus')->name('consumer.settings.update_status');
    });

    Route::group(['prefix' => 'profile'], function () {
        // Ajax Routes
        Route::get('load-booking-stat-chart', 'Consumer\ProfileController@bookingStatistics')->name('consumer.statistics.booking_statistics');
        Route::get('booking-stat', 'Consumer\ProfileController@bookingStat')->name('consumer.statistics.booking_stat');
        Route::get('completed-stat', 'Consumer\ProfileController@completedStat')->name('consumer.statistics.completed_stat');
        Route::get('delayed-stat', 'Consumer\ProfileController@delayedStat')->name('consumer.statistics.delayed_stat');
        Route::get('cancelled-stat', 'Consumer\ProfileController@cancelledStat')->name('consumer.statistics.cancelled_stat');
        Route::get('reported-stat', 'Consumer\ProfileController@reportedStat')->name('consumer.statistics.reported_stat');
        Route::get('','Consumer\ProfileController@profile')->name('consumer.profile');
        Route::get('remove-garage','Consumer\ProfileController@remove_garage')->name('consumer.profile.remove_garage');
    });

    Route::group(['prefix' => 'garages'], function () {
        Route::get('detail/{garage_id}','Consumer\GarageController@garageDetail')->name('consumer.garages.garage_detail');
        Route::get('{garage_id}/book/','Consumer\GarageController@bookGarage')->name('consumer.garages.book_garage');
        Route::post('book','Consumer\GarageController@saveBooking')->name('consumer.garages.save_booking');
    });

    Route::group(['prefix' => 'booking'], function () {
        Route::get('','Consumer\BookingController@index')->name('consumer.booking');
        Route::get('pending','Consumer\BookingController@pendingStatus')->name('consumer.booking.pending');
        Route::get('accept','Consumer\BookingController@acceptBooking')->name('consumer.booking.accept');
        Route::get('inspection','Consumer\BookingController@inspectionStatus')->name('consumer.booking.inspection');
        Route::get('in-progress', 'Consumer\BookingController@in_progressStatus')->name('consumer.booking.in_progress');
        Route::get('complete', 'Consumer\BookingController@completeStatus')->name('consumer.booking.complete');
        Route::get('cancelled', 'Consumer\BookingController@cancelStatus')->name('consumer.booking.cancel');
        Route::get('invoice', 'Consumer\BookingController@invoice')->name('consumer.booking.invoice');
        Route::get('next-to-cancel', 'Consumer\BookingController@next_to_cancel')->name('consumer.booking.next_to_cancel');
        Route::get('save-report', 'Consumer\BookingController@save_report')->name('consumer.booking.save_report');
        Route::get('history', 'Consumer\BookingController@history')->name('consumer.booking.history');
        Route::get('history-detaili', 'Consumer\BookingController@historyDetail')->name('consumer.booking.history_detail');
        Route::get('feedback', 'Consumer\BookingController@feedback')->name('consumer.booking.feedback');
        Route::post('feedback', 'Consumer\BookingController@save_feedback')->name('consumer.booking.save_feedback');
    });

    Route::group(['prefix' => 'support'], function () {
        // AJax routes
        Route::get('load-tickets', 'Consumer\SupportTicketController@load_tickets')->name('consumer.load_tickets');
        Route::get('/tickets/view', 'Consumer\SupportTicketController@detailView')->name('consumer.tickets.detail_view');
        Route::get('/tickets/detail-sidebar', 'Consumer\SupportTicketController@detailSidebar')->name('consumer.tickets.ticket_view_sidebar');

        Route::get('/tickets', 'Consumer\SupportTicketController@index')->name('consumer.tickets');
        Route::get('/tickets/{ticket_id}', 'Consumer\SupportTicketController@detail')->name('consumer.tickets.detail');
        Route::get('/open-ticket', 'Consumer\SupportTicketController@open_ticket')->name('consumer.open_ticket');
        Route::post('/save-ticket', 'Consumer\SupportTicketController@save_ticket')->name('consumer.save_ticket')->middleware("consumer.email.verified");
        Route::post('/save-comment', 'Consumer\SupportTicketController@save_comment')->name('consumer.save_comment');
        Route::get('/close-ticket/{id?}', 'Consumer\SupportTicketController@close_ticket')->name('consumer.close_ticket');
    });

});
// End All Consumer Routes

// Start All Common Routes
Route::get('login', 'Login\LoginController@showLoginForm')->name('login.login');
Route::post('login', 'Login\LoginController@login')->name('login.post.login');
Route::get('sent_email/{email?}', 'Login\ForgotPasswordController@sentEmail')->name('login.sent_email');
Route::group(['prefix' => 'password'], function () {
    Route::get('reset-success', 'Login\ForgotPasswordController@resetSuccess')->name('login.reset_password_success');
    Route::get('resend-reset', 'Login\ForgotPasswordController@resendResetEmail')->name('login.resend_reset_password');
    Route::post('reset-password', 'Login\ForgotPasswordController@saveResetPassword')->name('login.change_password');
    Route::get('change/{email?}', 'Login\ForgotPasswordController@resetPassword')->name('login.reset_password');
    Route::post('forgot', 'Login\ForgotPasswordController@sendResetLink')->name('login.forgot_password');
    Route::get('forgot', 'Login\ForgotPasswordController@forgotPassword')->name('login.forgot_password');
});
Route::get('user-invite-admin', 'Admin\SettingController@inviteLink')->name('admin.settings.invite_link');
Route::get('user-invite-garage', 'Garage\SettingController@inviteLink')->name('garage.settings.invite_link');
Route::get('verify-login', 'Login\OtpController@verifyLogin')->name('verify_login');
Route::get('re-verify-login', 'Login\OtpController@resendVerifyLogin')->name('resend_verify_login');
Route::post('verify-login', 'Login\OtpController@matchOtp')->name('verify_login');
// By Default Home Route
Route::get('/home', 'HomeController@index')->name('home');
// End All Common Routes
