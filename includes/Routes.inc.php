<?php

//Routing for the defauly Page
Route::set("index.php",function(){

});

Route::set('newMember',function(){

    Controller::CreateView('newMember');

});

Route::set('registerNewMember',function(){

    Controller::openController('Member');

});

Route::set("sendMail",function(){

    Controller::CreateView('send_email_html');

});

Route::set('registerConfirmation',function(){

    Controller::openController('Member');

});

Route::set('RegistrationNewPassword',function(){

    Controller::CreateView('PasswordForm');

});

Route::set('PasswordSubmit',function(){

    Controller::openController('Member');

});

Route::set('Login',function(){

    Controller::CreateView('login');
    
});

Route::set('LoginSubmit',function(){

    Controller::openController('Accounts');

});

Route::set('newMembership',function(){

    Controller::CreateView('newMembership');

});

Route::set('registrationMembership',function(){

    Controller::openController('Membership');

});

Route::set('NewBundle',function(){

    //TODO: Add Restriction for the access of the Page
    Controller::CreateView('NewBundle');

});

Route::set('bundleController',function(){

    Controller::openController('Bundle');

});

Route::set('dashboard',function(){

    Controller::CreateView('dashboard');
  
});