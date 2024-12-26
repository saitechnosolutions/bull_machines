    <?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\LocationController;
    use App\Http\Controllers\LoginController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::middleware('auth')->group(function(){

        // DASHBOARD
        
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardindex');
        Route::resource('dashboard',DashboardController::class);

        // ========= EMPLOYEE MASTER ========= //

        Route::resource('employe',EmployeeController::class);
        // DESIGNATION
        Route::get('/employee/designation',[EmployeeController::class,'designationIndex']);
        Route::post('/designation_store',[EmployeeController::class,'designationstore']);
        Route::post('/designation_update',[EmployeeController::class,'designationupdate']);
        // BRANCH
        Route::get('/employee/branch',[EmployeeController::class,'branchIndex']);
        Route::post('/branch_store',[EmployeeController::class,'branchstore']);
        Route::post('/branch_update',[EmployeeController::class,'branchupdate']);
        // EMPLOYEE
        Route::get('/employee/creation',[EmployeeController::class,'employeecreate']);
        Route::post('/employee_store',[EmployeeController::class,'employeestore']);
        Route::post('/fetch_state',[EmployeeController::class,'fetchstate']);
        Route::post('/fetch_district',[EmployeeController::class,'fetchDistrict']);
        // DEALER
        Route::get('/dealer/creation',[EmployeeController::class,'dealercreate']);
        Route::post('/dealer_store',[EmployeeController::class,'dealerstore']);
        // ROLES
        Route::get('/employee/role',[EmployeeController::class,'rolecreate']);
        Route::post('/role_store',[EmployeeController::class,'roleStore']);
        Route::post('/role_update',[EmployeeController::class,'roleupdate']);
        Route::post('/role_assign',[EmployeeController::class,'roleassignpermission']);
        Route::post('/role_assign_fetch',[EmployeeController::class,'rolepermissionfetch']);
        // PERMISSIONS
        Route::get('/employee/permissions',[EmployeeController::class,'permissionindex']);
        Route::get('/employee/permissionassign',[EmployeeController::class,'permissionassignindex']);
        Route::post('/permission_store',[EmployeeController::class,'permissionstore']);
        Route::post('/permission_update',[EmployeeController::class,'permissionupdate']);
        // ORDERS
        Route::get('/employee/orders',[EmployeeController::class,'orderindex']);

        // ========= LOCATIONS MASTER ========= //

        // COUNTRY
        Route::get('/locations/country',[LocationController::class,'countryindex']);
        Route::post('/country_store',[LocationController::class,'countrystore']);
        // STATE
        Route::get('/locations/state',[LocationController::class,'stateindex']);
        Route::post('/state_store',[LocationController::class,'statestore']);
        // DISTRICT
        Route::get('/locations/district',[LocationController::class,'districtindex']);
        Route::post('/district_store',[LocationController::class,'districtstore']);
        // PANCHAYAT
        Route::get('/locations/panchayat',[LocationController::class,'panchayatindex']);
        Route::post('/panchayat_store',[LocationController::class,'panchayatstore']);


        // ========== ENQUIRY MASTER =========== //

        // SEGMENTS
        Route::get('/enquiry/segment',[EnquiryController::class,'segmentIndex']);
        Route::post('/segment_store',[EnquiryController::class,'segmentStore']);
        Route::post('/segment_update',[EnquiryController::class,'segmentUpdate']);
        //APPLICATION
        Route::get('/enquiry/application',[EnquiryController::class,'applicationIndex']);
        Route::post('/application_store',[EnquiryController::class,'applicationStore']);
        Route::post('/application_update',[EnquiryController::class,'applicationUpdate']);
        // HORSEPOWER
        Route::get('/enquiry/horsepower',[EnquiryController::class,'horsepowerIndex']);
        Route::post('/horsepower_store',[EnquiryController::class,'horsepowerStore']);
        Route::post('/horsepower_update',[EnquiryController::class,'horsepowerUpdate']);




        // LOGOUT

        Route::post('/logout',[LoginController::class,'logout']);
    });

    // Route::middleware('auth')->group(function () {

    // });

        Route::get('/',[LoginController::class,'loginIndex'])->name('loginindex')->middleware('notauthenticated');
        
        // LOGIN

        Route::resource('auth',LoginController::class);
        Route::post('/login',[LoginController::class,'login']);


        


    // Route::middleware('guest')->group(function () {
        
    // });

  

                    