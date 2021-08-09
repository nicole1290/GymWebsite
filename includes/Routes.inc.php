<?php

//Routing for the defauly Page
Route::set("index.php",function(){
    
});

//set(nameintheurl)
//createview(nameinViews)
Route::set('newMember',function(){
    Controller::CreateView('newMember');
});

Route::set('registerNewMember',function(){
    Controller::openController('Member');
});
