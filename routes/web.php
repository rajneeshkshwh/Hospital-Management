<?php

Route::get('/', function () {
    return view('login');
});
/****Default Login*****/
//Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

/*******************Website Pages Details********************/
Route::get('/','WebsiteController@home');
Route::get('about','WebsiteController@about');
Route::get('department/{UniqueId}','WebsiteController@department');
Route::get('overview','WebsiteController@overview');
Route::get('doctor','WebsiteController@doctor');
Route::get('portfolio','WebsiteController@portfolio');

Route::get('blog','WebsiteController@blog');
Route::post('blog/{UniqueId}','WebsiteController@blog');
Route::get('blogsingle/{UniqueId}','WebsiteController@blogsingle');

Route::get('user_login','WebsiteController@login');
Route::post('user_register','WebsiteController@register');
Route::get('user_dashboard','WebsiteController@user_dashboard');



Route::get('contact','WebsiteController@contact');
Route::post('search','WebsiteController@search');


Route::post('send','MailController@send');
Route::post('sendappoinment','MailController@sendappoinment');
Route::post('subscribesend','MailController@subscribesend');
Route::post('feedbacksend','MailController@feedbacksend');


/*****Login Page******/
Route::get('login','AdminController@login');

//Route::get('/dashboard','AdminController@dashboard');

Route::match(['get','post'],'/admin','AdminController@login');
Route::get('dashboard','AdminController@dashboard');
Route::get('admin/dataval','AdminController@val');
Route::get('admin/settings','AdminController@settings');

Route::get('admin/edit_company/{UniqueId}','AdminController@edit');
Route::post('admin/edit_company/{UniqueId}','AdminController@edit');

Route::get('checkpassword','AdminController@checkpassword');
Route::match(['get','post'],'admin/updatepassword','AdminController@updatePassword');
Route::get('/logout','AdminController@logout');




/*******************User Master Details********************/
Route::get('admin/newuser','UserController@addnew');

Route::get('admin/user','UserController@index');
Route::post('admin/add_user','UserController@insert');
Route::get('admin/edit_user/{UniqueId}','UserController@edit');
Route::post('admin/edit_user/{UniqueId}','UserController@edit');
Route::get('admin/delete_user/{UniqueId}','UserController@delete');


/*******************User rights Master Details********************/


Route::get('admin/newuserrights','UserRightsController@addnew');

Route::get('admin/rights','UserRightsController@index');
Route::post('admin/add_rights','UserRightsController@insert');
Route::get('admin/edit_rights/{UniqueId}','UserRightsController@edit');
Route::post('admin/edit_rights/{UniqueId}','UserRightsController@edit');
Route::get('admin/delete_rights/{UniqueId}','UserRightsController@delete');





/*******************Website Setting  Details********************/
Route::get('admin/websitesetting','WebsitesettingController@index');
Route::post('admin/add_api','WebsitesettingController@insert');
Route::get('admin/edit_websetting/{UniqueId}','WebsitesettingController@edit');
Route::post('admin/edit_websetting/{UniqueId}','WebsitesettingController@edit');
Route::get('admin/delete_api/{UniqueId}','WebsitesettingController@delete');

/*******************Product Category Master Details********************/
Route::get('admin/category','CategoryController@index');

Route::get('admin/addnewcategory','CategoryController@addnew');
Route::post('admin/add_category','CategoryController@insert');
Route::get('admin/edit_category/{UniqueId}','CategoryController@edit');
Route::post('admin/edit_category/{UniqueId}','CategoryController@edit');
Route::get('admin/delete_category/{UniqueId}','CategoryController@delete');

/*******************Product Master Details********************/
Route::get('admin/product','ProductController@index');

Route::get('admin/addnewproduct','ProductController@addnew');
Route::post('admin/add_product','ProductController@insert');
Route::get('admin/edit_product/{UniqueId}','ProductController@edit');
Route::post('admin/edit_product/{UniqueId}','ProductController@edit');
Route::get('admin/delete_product/{UniqueId}','ProductController@delete');

/*******************Banner Master Details********************/
Route::get('admin/banner','BannerController@index');

Route::get('admin/addnewbanner','BannerController@addnew');
Route::post('admin/add_banner','BannerController@insert');
Route::get('admin/edit_banner/{UniqueId}','BannerController@edit');
Route::post('admin/edit_banner/{UniqueId}','BannerController@edit');
Route::get('admin/delete_banner/{UniqueId}','BannerController@delete');

/*******************About Us Master Details********************/
Route::get('admin/about','AboutController@index');

Route::get('admin/addnewabout','AboutController@addnew');
Route::post('admin/add_about','AboutController@insert');
Route::get('admin/edit_about/{UniqueId}','AboutController@edit');
Route::post('admin/edit_about/{UniqueId}','AboutController@edit');
Route::get('admin/delete_about/{UniqueId}','AboutController@delete');

/*******************Principles Master Details********************/
Route::get('admin/principle','PrincipleController@index');

Route::get('admin/addnewprinciple','PrincipleController@addnew');
Route::post('admin/add_principle','PrincipleController@insert');
Route::get('admin/edit_principle/{UniqueId}','PrincipleController@edit');
Route::post('admin/edit_principle/{UniqueId}','PrincipleController@edit');
Route::get('admin/delete_principle/{UniqueId}','PrincipleController@delete');

/*******************Service Master Details********************/
Route::get('admin/service','ServiceController@index');

Route::get('admin/addnewservice','ServiceController@addnew');
Route::post('admin/add_service','ServiceController@insert');
Route::get('admin/edit_service/{UniqueId}','ServiceController@edit');
Route::post('admin/edit_service/{UniqueId}','ServiceController@edit');
Route::get('admin/delete_service/{UniqueId}','ServiceController@delete');

/*******************Overview Master Details********************/
Route::get('admin/overview','OverviewController@index');

Route::get('admin/addnewoverview','OverviewController@addnew');
Route::post('admin/add_overview','OverviewController@insert');
Route::get('admin/edit_overview/{UniqueId}','OverviewController@edit');
Route::post('admin/edit_overview/{UniqueId}','OverviewController@edit');
Route::get('admin/delete_overview/{UniqueId}','OverviewController@delete');

/*******************Doctor Master Details********************/
Route::get('admin/doctor','DoctorController@index');

Route::get('admin/addnewdoctor','DoctorController@addnew');
Route::post('admin/add_doctor','DoctorController@insert');
Route::get('admin/edit_doctor/{UniqueId}','DoctorController@edit');
Route::post('admin/edit_doctor/{UniqueId}','DoctorController@edit');
Route::get('admin/delete_doctor/{UniqueId}','DoctorController@delete');

/*******************clients Master Details********************/
Route::get('admin/clients','ClientsController@index');

Route::get('admin/addnewclients','ClientsController@addnew');
Route::post('admin/add_clients','ClientsController@insert');
Route::get('admin/edit_clients/{UniqueId}','ClientsController@edit');
Route::post('admin/edit_clients/{UniqueId}','ClientsController@edit');
Route::get('admin/delete_clients/{UniqueId}','ClientsController@delete');

/*******************Leadership Master Details********************/
Route::get('admin/leadership','LeadershipController@index');

Route::get('admin/addnewleadership','LeadershipController@addnew');
Route::post('admin/add_leadership','LeadershipController@insert');
Route::get('admin/edit_leadership/{UniqueId}','LeadershipController@edit');
Route::post('admin/edit_leadership/{UniqueId}','LeadershipController@edit');
Route::get('admin/delete_leadership/{UniqueId}','LeadershipController@delete');

/*******************parent Master Details********************/
Route::get('admin/parent','ParentController@index');

Route::get('admin/addnewparent','ParentController@addnew');
Route::post('admin/add_parent','ParentController@insert');
Route::get('admin/edit_parent/{UniqueId}','ParentController@edit');
Route::post('admin/edit_parent/{UniqueId}','ParentController@edit');
Route::get('admin/delete_parent/{UniqueId}','ParentController@delete');

/*******************Fellowship Master Details********************/
Route::get('admin/fellowship','FellowshipController@index');

Route::get('admin/addnewfellowship','FellowshipController@addnew');
Route::post('admin/add_fellowship','FellowshipController@insert');
Route::get('admin/edit_fellowship/{UniqueId}','FellowshipController@edit');
Route::post('admin/edit_fellowship/{UniqueId}','FellowshipController@edit');
Route::get('admin/delete_fellowship/{UniqueId}','FellowshipController@delete');

/*******************Department Master Details********************/
Route::get('admin/department','DepartmentController@index');

Route::get('admin/addnewdepartment','DepartmentController@addnew');
Route::post('admin/add_department','DepartmentController@insert');
Route::get('admin/edit_department/{UniqueId}','DepartmentController@edit');
Route::post('admin/edit_department/{UniqueId}','DepartmentController@edit');
Route::get('admin/delete_department/{UniqueId}','DepartmentController@delete');

/*******************Portfolio Master Details********************/
Route::get('admin/portfolio','PortfolioController@index');

Route::get('admin/addnewportfolio','PortfolioController@addnew');
Route::post('admin/add_portfolio','PortfolioController@insert');
Route::get('admin/edit_portfolio/{UniqueId}','PortfolioController@edit');
Route::post('admin/edit_portfolio/{UniqueId}','PortfolioController@edit');
Route::get('admin/delete_portfolio/{UniqueId}','portfolioController@delete');

/*******************Rules Master Details********************/
Route::get('admin/rules','RulesController@index');

Route::get('admin/addnewrules','RulesController@addnew');
Route::post('admin/add_rules','RulesController@insert');
Route::get('admin/edit_rules/{UniqueId}','RulesController@edit');
Route::post('admin/edit_rules/{UniqueId}','RulesController@edit');
Route::get('admin/delete_rules/{UniqueId}','RulesController@delete');

/*******************News Master Details********************/
Route::get('admin/news','NewsController@index');

Route::get('admin/addnewnews','NewsController@addnew');
Route::post('admin/add_news','NewsController@insert');
Route::get('admin/edit_news/{UniqueId}','NewsController@edit');
Route::post('admin/edit_news/{UniqueId}','NewsController@edit');
Route::get('admin/delete_news/{UniqueId}','NewsController@delete');

/*******************Chapter Master Details********************/
Route::get('admin/chapter','ChapterController@index');

Route::get('admin/addnewchapter','ChapterController@addnew');
Route::post('admin/add_chapter','ChapterController@insert');
Route::get('admin/edit_chapter/{UniqueId}','ChapterController@edit');
Route::post('admin/edit_chapter/{UniqueId}','ChapterController@edit');
Route::get('admin/delete_chapter/{UniqueId}','ChapterController@delete');

/*******************Blog Us Master Details********************/
Route::get('admin/blog','BlogController@index');

Route::get('admin/addnewblog','BlogController@addnew');
Route::post('admin/add_blog','BlogController@insert');
Route::get('admin/edit_blog/{UniqueId}','BlogController@edit');
Route::post('admin/edit_blog/{UniqueId}','BlogController@edit');
Route::get('admin/delete_blog/{UniqueId}','BlogController@delete');

/*******************subscribe Master Details********************/
Route::get('admin/subscribe','SubscribeController@index');

Route::get('admin/addnewsubscribe','SubscribeController@addnew');
Route::post('admin/add_subscribe','SubscribeController@insert');
Route::get('admin/edit_subscribe/{UniqueId}','SubscribeController@edit');
Route::post('admin/edit_subscribe/{UniqueId}','SubscribeController@edit');
Route::get('admin/delete_subscribe/{UniqueId}','SubscribeController@delete');

/*******************Feedback Master Details********************/
Route::get('admin/feedback','FeedbackController@index');

Route::get('admin/addnewfeedback','FeedbackController@addnew');
Route::post('admin/add_feedback','FeedbackController@insert');
Route::get('admin/edit_feedback/{UniqueId}','FeedbackController@edit');
Route::post('admin/edit_feedback/{UniqueId}','FeedbackController@edit');
Route::get('admin/delete_feedback/{UniqueId}','FeedbackController@delete');

/*******************advert Master Details********************/
Route::get('admin/advert','AdvertController@index');

Route::get('admin/addnewadvert','AdvertController@addnew');
Route::post('admin/add_advert','AdvertController@insert');
Route::get('admin/edit_advert/{UniqueId}','AdvertController@edit');
Route::post('admin/edit_advert/{UniqueId}','AdvertController@edit');
Route::get('admin/delete_advert/{UniqueId}','AdvertController@delete');


Route::post('sendder','MailController@sendder');

/*******************Report Details********************/
// //One
// Route::get('admin/customerreport','ReportController@index');
// Route::post('admin/customerreport','ReportController@customerreport');
// //Two
// Route::get('admin/supplierreport','ReportController@supplierindex');
// Route::post('admin/supplierreport','ReportController@supplierreport');
// //Three
// Route::get('admin/employeereport','ReportController@employeeindex');
// Route::post('admin/employeereport','ReportController@employeereport');
// //Four
// Route::get('admin/smsreport','ReportController@smsindex');
// Route::post('admin/smsreport','ReportController@smsreport');