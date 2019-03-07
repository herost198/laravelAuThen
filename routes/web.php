<?php

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
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){

    /*
     * --------------- admin Authencation ---------
     */
//    URL: authen/admin
    Route::get('/','adminController@index')->name('admin.dashboard');
    /*
    url : authen/admin/dashboard
    */
    Route::get('/dashboard','adminController@index')->name('admin.dashboard');
    /*
        url : authen/admin/register
        Route: trả về view đăng kí  tài khoản admin
    */
    Route::get('register','adminController@create')->name('admin.register');
    /*
        url : authen/admin/register
        Trả về phương thức POST
        Route dùng để đăng kí 1 admin
    */
    Route::post('register','adminController@store')->name('admin.register.store');

    /*
     * Route tra về đăng nhập admin
     * Method: Get
     * */
    Route::get('/login','Auth\Admin\LoginController@login')->name('admin.auth.login');
    /*
     * Route: xử lý quá trình đăng nhập admin
     * Method: Post
     * */

    Route::post('/login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    /*
     * Route: dùng để đăng xuất
     * url : admin/logout
     * */
    Route::post('/logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');


    /*
     * -------------------- Route Admin SHOP-----------
     * ------------------------------------------------
     * ------------------------------------------------
     */
    Route::get('/shop/category','Admin\ShopCategoryController@index');
    Route::get('/shop/category/create','Admin\ShopCategoryController@create');
    Route::get('/shop/category/{id}/edit','Admin\ShopCategoryController@edit');
    Route::get('/shop/category/{id}/delete','Admin\ShopCategoryController@delete');

    Route::post('/shop/category','Admin\ShopCategoryController@store');
    Route::post('/shop/category/{id}','Admin\ShopCategoryController@update');
    Route::post('/shop/category/{id}/delete','Admin\ShopCategoryController@destroy');

        /*
         * -------------------- Route Admin SHOPPING PRODUCT-----------
         * ------------------------------------------------
         * ------------------------------------------------
         */

    Route::get('/shop/product','Admin\ShopProductController@index')->middleware();
    Route::get('/shop/product/create','Admin\ShopProductController@create');
    Route::get('/shop/product/{id}/edit','Admin\ShopProductController@edit');
    Route::get('/shop/product/{id}/delete','Admin\ShopProductController@delete');

    Route::post('/shop/product','Admin\ShopProductController@store');
    Route::post('/shop/product/{id}','Admin\ShopProductController@update');
    Route::post('/shop/product/{id}/delete','Admin\ShopProductController@destroy');





    Route::get('/shop/order', function(){
        return view('admin.content.shop.order.index');
    });
    Route::get('/shop/customer', function(){
        return view('admin.content.shop.customer.index');
    });
    Route::get('/shop/brand', function(){
        return view('admin.content.shop.brand.index');
    });
    Route::get('/shop/statistic', function(){
        return view('admin.content.shop.statistic.index');
    });

    /*
    * -------------------- Route Admin Nội Dung-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */


    Route::get('/content/category','Admin\ContentCategoryController@index')->middleware();
    Route::get('/content/category/create','Admin\ContentCategoryController@create');
    Route::get('/content/category/{id}/edit','Admin\ContentCategoryController@edit');
    Route::get('/content/category/{id}/delete','Admin\ContentCategoryController@delete');

    Route::post('/content/category','Admin\ContentCategoryController@store');
    Route::post('/content/category/{id}','Admin\ContentCategoryController@update');
    Route::post('/content/category/{id}/delete','Admin\ContentCategoryController@destroy');


//    Route::get('/content/page', function(){
//        return view('admin.content.content.page.index');
//    });


    Route::get('/content/page','Admin\ContentPageController@index')->middleware();
    Route::get('/content/page/create','Admin\ContentPageController@create');
    Route::get('/content/page/{id}/edit','Admin\ContentPageController@edit');
    Route::get('/content/page/{id}/delete','Admin\ContentPageController@delete');

    Route::post('/content/page','Admin\ContentPageController@store');
    Route::post('/content/page/{id}','Admin\ContentPageController@update');
    Route::post('/content/page/{id}/delete','Admin\ContentPageController@destroy');



    Route::get('/content/post', function(){
        return view('admin.content.content.post.index');
    });

    /*
    * -------------------- Route Administrator User-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */
    Route::get('/users', function(){
        return view('admin.content.users.index');
    });

    /*
    * -------------------- Route Admin banner-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/banner', function(){
        return view('admin.content.banner.index');
    });
    /*
    * -------------------- Route Admin contact-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/contact', function(){
        return view('admin.content..contact.index');
    });

    /*
    * -------------------- Route Admin Newletters-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/newletters', function(){
        return view('admin.content.newletter.index');
    });
    /*
    * -------------------- Route Admin email-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/email/draft', function(){
        return view('admin.content.email.draft.index');
    });
    Route::get('/email/inbox', function(){
        return view('admin.content.email.inbox.index');
    });
    Route::get('/email/send', function(){
        return view('admin.content.email.send.index');
    });

    /*
    * -------------------- Route Admin Global setting-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/config', function(){
        return view('admin.content.config.index');
    });

    /*
    * -------------------- Route Admin media manager-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/media', function(){
        return view('admin.content.media.index');
    });

    /*
    * -------------------- Route Admin menu-----------
    * ------------------------------------------------
    * ------------------------------------------------
    */

    Route::get('/menu', function(){
        return view('admin.content.menu.menu.index');
    });
    Route::get('/menuitems', function(){
        return view('admin.content.menu.menuitem.index');
    });
});


/*
 * Route cho nhà cung cấp sản phẩm
 */
Route::prefix('seller')->group(function(){
    /*
     * URL: authen/seller*/
    Route::get('/','SellerController@index')->name('seller.dashboard');

    /*
     * URL:  authen/seller/dashboard
     * Route đăng nhập
     */
    Route::get('/dashboard','SellerController@index')->name('seller.dashboard');

    /*
           url : authen/seller/register
           Route: trả về view đăng kí  tài khoản seller
       */
    Route::get('register','SellerController@create')->name('seller.register');
    /*
        url : authen/seller/register
        Trả về phương thức POST
        Route dùng để đăng kí 1 seller
    */
    Route::post('register','SellerController@store')->name('seller.register.store');

    /*
     * Route tra về đăng nhập admin
     * Method: Get
     * */
    Route::get('/login','Auth\Seller\LoginController@login')->name('seller.auth.login');
    /*
     * Route: xử lý quá trình đăng nhập admin
     * Method: Post
     * */

    Route::post('/login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');
    /*
     * Route: dùng để đăng xuất
     * url : admin/logout
     * */
    Route::post('/logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');

});

/*
 * Route cho nhà cung cấp sản phẩm
 */
Route::prefix('shipper')->group(function(){
    /*
     * URL: authen/seller*/
    Route::get('/','ShipperController@index')->name('shipper.dashboard');

    /*
     * URL:  authen/seller/dashboard
     * Route đăng nhập
     */
    Route::get('/dashboard','ShipperController@index')->name('shipper.dashboard');

    /*
           url : authen/seller/register
           Route: trả về view đăng kí  tài khoản seller
       */
    Route::get('register','ShipperController@create')->name('shipper.register');
    /*
        url : authen/seller/register
        Trả về phương thức POST
        Route dùng để đăng kí 1 seller
    */
    Route::post('register','ShipperController@store')->name('shipper.register.store');

    /*
     * Route tra về đăng nhập admin
     * Method: Get
     * */
    Route::get('/login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');
    /*
     * Route: xử lý quá trình đăng nhập admin
     * Method: Post
     * */

    Route::post('/login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');
    /*
     * Route: dùng để đăng xuất
     * url : admin/logout
     * */
    Route::post('/logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');

});