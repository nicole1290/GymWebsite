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