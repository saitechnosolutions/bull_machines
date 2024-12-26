<?php

namespace App\Http\Controllers;

use App\DataTables\BranchDataTable;
use App\DataTables\DealerDataTable;
use App\DataTables\DesignationDataTable;
use App\DataTables\EmployeeDataTable;
use App\DataTables\PermissionDataTable;
use App\DataTables\RoleDataTable;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Dealer;
use App\Models\Designation;
use App\Models\District;
use App\Models\Employee;
// use App\Models\Permission;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class EmployeeController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        try {
            return view( 'pages.masters.employee' );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    // DESIGNATION

    public function designationIndex( DesignationDataTable $dataTable ) {
        try {
            return $dataTable->render( 'pages.masters.employee.designation' );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function designationstore( Request $request ) {
        try {
            $designationName = $request->designationName;

            Designation::create( [
                'designation_name'=>$designationName,
            ] );

            return response()->json( [
                'status' => 201,
                'message' => 'Designation created successfully'
            ], 201 );

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating Designation', 400 ] );
            Log::error( $th );
        }
    }

    public function designationupdate( Request $request ) {
        try {
            $designationName = $request->designationName;
            $designationID = $request->designationID;

            $designation = Designation::find( $designationID );

            $designation->update( [
                'designation_name'=>$designationName,
            ] );

            return response()->json( [
                'status' => 201,
                'message' => 'Designation Updated successfully'
            ], 200 );

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating Designation', 400 ] );
            Log::error( $th );
        }
    }

    // BRANCH

    public function branchIndex( BranchDataTable $dataTable ) {
        try {
            return $dataTable->render( 'pages.masters.employee.branch' );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function branchstore( Request $request ) {
        try {
            $branchName = $request->branchName;
            $branchID = $request->branchID;

            if ( !$branchID ) {
                Branch::create( [
                    'branch_name'=>$branchName,
                ] );

                return response()->json( [
                    'status' => 201,
                    'message' => 'Branch created successfully'
                ], 201 );
            } else {
                $branch = Branch::find( $branchID );

                $branch->update( [
                    'branch_name'=>$branchName,
                ] );

                return response()->json( [
                    'status' => 201,
                    'message' => 'Branch Updated successfully'
                ], 200 );
            }

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating Branch', 400 ] );
            Log::error( $th );
        }
    }

    public function branchupdate( Request $request ) {
        try {
            $branchName = $request->branchName;
            $branchID = $request->branchID;

            $branch = Branch::find( $branchID );

            $branch->update( [
                'branch_name'=>$branchName,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Branch Updated successfully'
            ], 200 );

        } catch ( \Throwable $th ) {
            return response()->json( [ 'error', 'error creating Branch', 400 ] );
            Log::error( $th );
        }
    }

    // EMPLOYEE

    public function employeecreate( EmployeeDataTable $dataTable ) {
        try {
            $roles = Role::all();
            $employees = Employee::all();
            $designations = Designation::all();
            $branches = Branch::all();
            $countries = Country::all();
            $states = State::all();
            $districts = District::all();
            return $dataTable->render( 'pages.masters.employee.employee', compact( 'designations', 'branches', 'countries', 'states', 'districts', 'employees', 'roles' ) );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( 'cant open page', $th );
        }
    }

    public function fetchstate( Request $request ) {
        try {
            $countryId = $request->country_id;
            $states = State::where( 'country_id', $countryId )->get();
            return response()->json( [
                'status' => 200,
                'message' => 'States Fetched successfully',
                'data'=>$states,
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error creating Employee', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function fetchDistrict( Request $request ) {
        try {
            $stateId = $request->state_id;
            $districts = District::where( 'state_id', $stateId )->get();
            return response()->json( [
                'status' => 200,
                'message' => 'Districts fetched successfully',
                'data'=>$districts,
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error creating Employee', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function employeestore( Request $request ) {
        try {
            $empName = $request->empName;
            $empcode = $request->empcode;
            $empDesignation = $request->empDesignation;
            $empDepartment = $request->empDepartment;
            $empMobile = $request->empMobile;
            $empEmail = $request->empEmail;
            $empAddress = $request->empAddress;
            $empDOB = $request->empDOB;
            $empDOJ = $request->empDOJ;
            $empBranch = $request->empBranch;
            $empReportsto = $request->empReportsto;
            $empRole = $request->empRole;
            $empCountry = $request->empCountry;
            $empState = $request->empState;
            $empDistrict = $request->empDistrict;
            $empBaseDistrict = $request->empBaseDistrict;
            $empHomeDistrict = $request->empHomeDistrict;

            $emp_login_id = $request->emp_login_id;
            $emp_password = $request->emp_password;
            $emp_confirm_password = $request->emp_confirm_password;

            $employee = Employee::create( [
                'emp_name'=>$empName,
                'emp_code'=>$empcode,
                'designation'=>$empDesignation,
                'department'=>$empDepartment,
                'mobile_number'=>$empMobile,
                'emp_address'=>$empAddress,
                'emp_dob'=>$empDOB,
                'emp_doj'=>$empDOJ,
                'branch_id'=>$empBranch,
                'reports_to'=>$empReportsto,
                'role_id'=>$empRole,
                'country_id'=>$empCountry,
                'state_id'=>$empState,
                'district_id'=>$empDistrict,
                'base_district_id'=>$empBaseDistrict,
                'home_district_id'=>$empHomeDistrict,
                'emp_login_id'=>$emp_login_id,
                'emp_login_password'=>password_hash( $emp_password, PASSWORD_BCRYPT ),
            ] );

            $role = Role::find( $empRole );

            $user = User::create( [
                'name'=>$empName,
                'email'=>$empEmail,
                'password'=>password_hash( $emp_password, PASSWORD_BCRYPT ),
            ] );

            $user->syncRoles( $role->name );

            return response()->json( [
                'status' => 201,
                'message' => 'Employee Created successfully'
            ], 201 );
        } catch ( \Throwable $th ) {
            // return response()->json( [ 'error', $th, 400 ] );
            // Log::error( 'cant open page', $th );

            Log::error( 'Error creating Employee', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    // ROLE

    public function rolecreate( RoleDataTable $dataTable ) {
        try {
            // return view( 'pages.masters.employee.role' );
            $permissions = Permission::get();
            return $dataTable->render( 'pages.masters.employee.role', compact( 'permissions' ) );
        } catch ( \Throwable $th ) {
            return redirect()->back()->with( 'error', 'something went wrong' );
            Log::error( $th );
        }
    }

    public function rolepermissionfetch( Request $request ) {
        try {
            $roleId = $request->roleId;
            $role = ModelsRole::findById( $roleId );

            if ( !$role ) {
                return redirect()->back()->with( 'error', 'Role not found' );
            }

            // Get all permissions
            $permissions = Permission::all();

            // Get permissions assigned to the role
            $assignedPermissions = $role->permissions->pluck( 'id' )->toArray();

            return response()->json( [
                'status' => 200,
                'message' => 'Role Created successfully',
                'data'=>$assignedPermissions,
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error creating role', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function roleStore( Request $request ) {
        try {
            // Validate the input to ensure 'roleName' is present and a string
            $validated = $request->validate( [
                'roleName' => 'required|string|max:255',
            ] );

            // Get the validated role name
            $roleName = $validated[ 'roleName' ];

            // Create a new Role instance and save it
            $role = new Role();
            $role->name = $roleName;
            $role->guard_name = 'web';
            $role->save();

            return response()->json( [
                'status' => 201,
                'message' => 'Role Created successfully'
            ], 201 );

        } catch ( \Throwable $th ) {
            // Log the error for debugging purposes
            Log::error( 'Error creating role', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function roleupdate( Request $request ) {
        try {
            $roleName = $request->roleName;
            $roleid = $request->roleID;

            // dd( $roleName );

            $role = Role::find( $roleid );

            $role->update( [
                'name'=>$roleName,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Role Updated successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating role', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function roleassignpermission( Request $request ) {
        try {
            $roleId = $request->roleID;
            $permissionIds = $request->permissionId;

            $role = ModelsRole::find( $roleId );

            if ( !$role ) {
                return response()->json( [
                    'status' => 404,
                    'message' => 'Role not found',
                ], 404 );
            }

            $permissions = Permission::whereIn( 'id', $permissionIds )->get();

            if ( $permissions->isEmpty() ) {
                return response()->json( [
                    'status' => 404,
                    'message' => 'Permissions not found',
                ], 404 );
            }

            $role->syncPermissions( $permissions );

            return response()->json( [
                'status' => 200,
                'message' => 'Permissions assigned successfully',
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating role', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json( [
                'status' => 400,
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ], 400 );
        }
    }

    // PERMISSION

    public function permissionindex( PermissionDataTable $dataTable ) {
        try {
            return $dataTable->render( 'pages.masters.employee.permission' );
        } catch ( \Throwable $th ) {
            Log::error( 'Error creating role', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function permissionassignindex() {
        try {
            $roles = Role::all();
            $permissions = Permission::all();
            return view( 'pages.masters.employee.permissionassign', compact( 'roles', 'permissions' ) );
        } catch ( \Throwable $th ) {
            Log::error( 'Error creating role', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400 // This is the status code
            );
        }
    }

    public function permissionstore( Request $request ) {
        try {
            $permissionName = $request->permissionName;

            Permission::create( [
                'name'=>$permissionName,
                'guard_name'=>'web',
            ] );

            return response()->json( [
                'status' => 201,
                'message' => 'Permission Created successfully'
            ], 201 );

        } catch ( \Throwable $th ) {
            Log::error( 'Error creating Permission', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function permissionupdate( Request $request ) {
        try {
            $permissionName = $request->permissionName;
            $permissionId = $request->permissionID;

            $permission = Permission::find( $permissionId );

            $permission->update( [
                'name'=>$permissionName,
            ] );

            return response()->json( [
                'status' => 200,
                'message' => 'Permission Updated successfully'
            ], 200 );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating Permission', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    // ===  == DEALER ===  == //

    public function dealercreate( DealerDataTable $dataTable ) {
        try {
            $roles = Role::all();
            $employees = Employee::all();
            $designations = Designation::all();
            $branches = Branch::all();
            $countries = Country::all();
            $states = State::all();
            $districts = District::all();
            return $dataTable->render( 'pages.masters.employee.dealer', compact( 'designations', 'branches', 'countries', 'states', 'districts', 'employees', 'roles' ) );
        } catch ( \Throwable $th ) {
            Log::error( 'Error updating Permission', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    public function dealerstore( Request $request ) {
        try {
            $dealerName = $request->dealerName;
            $dealercode = $request->dealercode;
            $dealerDesignation = $request->dealerDesignation;
            $dealerDepartment = $request->dealerDepartment;
            $dealerMobile = $request->dealerMobile;
            $dealerEmail = $request->dealerEmail;
            $dealerAddress = $request->dealerAddress;
            $dealerDOB = $request->dealerDOB;
            $dealerDOJ = $request->dealerDOJ;
            $dealerBranch = $request->dealerBranch;
            $dealerReportsto = $request->dealerReportsto;
            $dealerCountry = $request->dealerCountry;
            $dealerState = $request->dealerState;
            $dealerDistrict = $request->dealerDistrict;
            $dealerBaseDistrict = $request->dealerBaseDistrict;
            $dealerHomeDistrict = $request->dealerHomeDistrict;

            $dealer_login_id = $request->dealer_login_id;
            $dealer_password = $request->dealer_password;
            $dealer_confirm_password = $request->dealer_confirm_password;

            $dealer = Dealer::create( [
                'dealer_name'=>$dealerName,
                'dealer_code'=>$dealercode,
                // 'designation'=>$dealerDesignation,
                'department'=>$dealerDepartment,
                'mobile_number'=>$dealerMobile,
                'dealer_address'=>$dealerAddress,
                'dealer_dob'=>$dealerDOB,
                'dealer_doj'=>$dealerDOJ,
                'branch_id'=>$dealerBranch,
                'reports_to'=>$dealerReportsto,
                'role_id'=>$dealerDesignation,
                'country_id'=>$dealerCountry,
                'state_id'=>$dealerState,
                'district_id'=>$dealerDistrict,
                'base_district_id'=>$dealerBaseDistrict,
                'home_district_id'=>$dealerHomeDistrict,
                'dealer_login_id'=>$dealer_login_id,
                'dealer_login_password'=>password_hash( $dealer_password, PASSWORD_BCRYPT ),
            ] );

            $role = Role::find( $dealerDesignation );

            $user = User::create( [
                'name'=>$dealerName,
                'email'=>$dealerEmail,
                'password'=>password_hash( $dealer_password, PASSWORD_BCRYPT ),
            ] );

            $user->syncRoles( $role->name );

            return response()->json( [
                'status' => 201,
                'message' => 'Dealer Created successfully'
            ], 201 );
        } catch ( \Throwable $th ) {

            Log::error( 'Error creating Employee', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    // ORDER INDEX

    public function orderindex() {
        try {
            return view( 'pages.masters.employee.orders' );
        } catch ( \Throwable $th ) {
            Log::error( 'Error opening orders', [
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString(),
            ] );

            return response()->json(
                [
                    'error' => $th->getMessage(),
                    'trace' => $th->getTraceAsString()
                ],
                400
            );
        }
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}