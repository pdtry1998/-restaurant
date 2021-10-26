<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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



Route::get('/',[HomeController::class,"index"]);//หน้าแรก + ฟังก์ชันแสดงเมนู

Route::get('/users',[AdminController::class,"user"]); //หน้าแสดงข้อมูล user ในส่วน admin

Route::get('/deletemenu/{id}',[AdminController::class,"deletemenu"]);// ลบข้อมูลเมนูอาหาร

Route::get('/updateview/{id}',[AdminController::class,"updateview"]);// ดึงข้อมูลเดิมมาเพื่อแก้ไขการอัพเดท

Route::post('/updatefood/{id}',[AdminController::class,"updatefood"]);// ปุ่มอัพเดทข้อมูลพร้อมบันทึกข้อมูลใหม่

Route::get('/foodmenu',[AdminController::class,"foodmenu"]);// ดึงข้อมูลเมนูไปแสดง

Route::post('/uploadfood',[AdminController::class,"upload"]);// form upload food ในส่วนของ admim

Route::get('/deleteuser/{id}',[AdminController::class,"deleteuser"]);//ลบ user ออกจากระบบ

Route::get('/redirects',[HomeController::class,"redirects"]);// ไว้เช็คกรณี user กับ admin login เข้ามาจะ route ไปหน้าที่ต่างกันตามเงื่อนไข

Route::post('/reservation',[AdminController::class,"reservation"]);// ตัวฟอร์มบันทึกการจองไปฐานข้อมูล

Route::get('/viewreservation',[AdminController::class,"viewreservation"]); //ดึงข้อมูลการจองในฐานข้อมูลมาแสดง

Route::get('/viewchef',[AdminController::class,"viewchef"]); //ไว้ลิ้งส่งข้อมูลไปหน้า chefs ส่วนของ admin 

Route::post('/uploadchef',[AdminController::class,"uploadchef"]); // form upload chef ในส่วนของ admim

Route::get('/updatechef/{id}',[AdminController::class,"updatechef"]);// ดึงข้อมูลเดิมมาเพื่อแก้ไขการอัพเดท

Route::post('/updateinfochef/{id}',[AdminController::class,"updateinfochef"]);// ปุ่มอัพเดทข้อมูลพร้อมบันทึกข้อมูลใหม่

Route::get('/deletechef/{id}',[AdminController::class,"deletechef"]);// ลบข้อมูลเชฟ

Route::post('/addcart/{id}',[HomeController::class,"addcart"]);// ไว้เช็คเวลากด addcart ว่าได้ loginมั้ย ถ้าไม่ให้ทำตามเงื่อนไข

Route::get('/showcart/{id}',[HomeController::class,"showcart"]); //แสดงข้อมูลการสั่งอาหารของ user แต่ละคน

Route::get('/remove/{id}',[HomeController::class,"remove"]); //ลบเมนูที่กดสั่ง

Route::post('/orderconfirm',[HomeController::class,"orderconfirm"]); //ไว้confirm orderที่ทำการเพิ่มใหม่ใน form

Route::get('/orders',[AdminController::class,"orders"]); //ไว้ลิ้งส่งข้อมูล order ไปแสดง order ส่วน admin

Route::get('/search',[AdminController::class,"search"]); //ไว้ค้นหา order ส่วน admin

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
