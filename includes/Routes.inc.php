<?php

//Routing for the defauly Page
Route::set("index.php",function(){
    registerclient::CreateView("registerclient");
});

//set(nameintheurl)
//createview(nameinViews)
Route::set('newMember',function(){
    Controller::CreateView('newMember');
});

Route::set('MemberController',function(){
    Controller::openController('Member');
});
