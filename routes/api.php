<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// For recent articles
Route::get('/recent-articles/{journal_id}', [ApiController::class, 'recentArticles']);

// For Past Article List
Route::get('/past-articles/{journal_id}', [ApiController::class, 'pastArticles']);

// For specific Past Article via url
Route::get('/past-article-diujahs/{volume_number}/{issue}', [ApiController::class, 'pastArticleDIUJAHS']);

Route::get('/past-article-diujbe/{volume_number}/{issue}', [ApiController::class, 'pastArticleDIUJBE']);

Route::get('/past-article-diujhss/{volume_number}/{issue}', [ApiController::class, 'pastArticleDIUJHSS']);

Route::get('/past-article-diujst/{volume_number}/{issue}', [ApiController::class, 'pastArticleDIUJST']);

Route::get('/article/{slug}', [ApiController::class, 'article_details']);