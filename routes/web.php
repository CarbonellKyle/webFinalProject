<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('dashboard');
Route::get('/adminDashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDashboard');

//Suppliers Routes
Route::get('/suppliers', [SupplierController::class, 'viewSuppliers'])->name('supplier.index');
Route::get('/supplier/add', [SupplierController::class, 'addSupplier'])->name('supplier.add');
Route::post('/suplier/add', [SupplierController::class, 'addSupplierSubmit'])->name('supplier.addSubmit');
Route::get('/supplier/delete/{id}', [SupplierController::class, 'deleteSupplier'])->name('supplier.delete');
Route::get('/supplier/edit/{id}', [SupplierController::class, 'editSupplier'])->name('supplier.edit');
Route::post('/supplier/update', [SupplierController::class, 'updateSupplier'])->name('supplier.update');

//Product Routes
Route::get('/products', [ProductController::class, 'allProducts'])->name('product.index');
Route::get('/product/add', [ProductController::class, 'addProduct'])->name('product.add');
Route::post('/product/add', [ProductController::class, 'addProductSubmit'])->name('product.addSubmit');
Route::get('/product/view/{id}', [ProductController::class, 'getProductById'])->name('product.view');
Route::get('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'updateProduct'])->name('product.update');

//Category Routes
Route::get('/categories', [CategoryController::class, 'viewCategories'])->name('category.index');
Route::get('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');
Route::post('/category/add', [CategoryController::class, 'addCategorySubmit'])->name('category.addSubmit');
Route::get('/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
Route::post('/category/update', [CategoryController::class, 'updateCategory'])->name('category.update');

//Job Routes
Route::get('jobs', [JobController::class, 'viewJobs'])->name('job.index');
Route::get('/job/add', [JobController::class, 'addJob'])->name('job.add');
Route::post('/job/add', [JobController::class, 'addJobSubmit'])->name('job.addSubmit');
Route::get('/job/delete/{id}', [JobController::class, 'deleteJob'])->name('job.delete');
Route::get('/job/edit/{id}', [JobController::class, 'editJob'])->name('job.edit');
Route::post('/job/update', [JobController::class, 'updateJob'])->name('job.update');

//Employee Routes
Route::get('employees', [EmployeeController::class, 'allEmployees'])->name('employee.index');
Route::get('/employee/add', [EmployeeController::class, 'addEmployee'])->name('employee.add');
Route::post('/employee/add', [EmployeeController::class, 'addEmployeeSubmit'])->name('employee.addSubmit');
Route::get('/employee/view/{id}', [EmployeeController::class, 'getEmployeeById'])->name('employee.view');
Route::get('/employee/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');
Route::get('/employee/edit/{id}', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
Route::post('/employee/update', [EmployeeController::class, 'updateEmployee'])->name('employee.update');

//Transaction Routes
Route::post('/transaction/add', [TransactionController::class, 'addTransactionSubmit'])->name('transaction.addSubmit');
Route::get('/view/daily', [TransactionController::class, 'viewDaily'])->name('transaction.daily');
Route::get('/view/weekly', [TransactionController::class, 'viewWeekly'])->name('transaction.weekly');

//Order Routes
Route::get('/pos', [OrderController::class, 'index'])->name('order.index');
Route::get('/order/add', [OrderController::class, 'addOrder'])->name('order.add');
Route::post('/order/add', [OrderController::class, 'addOrderSubmit'])->name('order.addSubmit');

//SaleRoutes
Route::get('/sale/daily', [SaleController::class, 'saleDaily'])->name('sale.daily');
Route::get('/sale/monthly', [SaleController::class, 'saleMonthly'])->name('sale.monthly');