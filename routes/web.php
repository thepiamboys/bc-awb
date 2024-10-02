<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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


	Route::get('', 'AwblabelController@index')->name('awblabel.index');
	Route::get('home', 'HomeController@index')->name('home');




/* routes for Awblabel Controller */
	Route::get('awblabel', 'AwblabelController@index')->name('awblabel.index');
	Route::get('awblabel/index/{filter?}/{filtervalue?}', 'AwblabelController@index')->name('awblabel.index');
	Route::post('awblabel/importdata', 'AwblabelController@importdata');
	Route::get('awblabel/view/{rec_id}', 'AwblabelController@view')->name('awblabel.view');
	Route::get('awblabel/add', 'AwblabelController@add')->name('awblabel.add');
	Route::post('awblabel/add', 'AwblabelController@store')->name('awblabel.store');

	Route::any('awblabel/edit/{rec_id}', 'AwblabelController@edit')->name('awblabel.edit');
	Route::get('awblabel/delete/{rec_id}', 'AwblabelController@delete');

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {


});




Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');
