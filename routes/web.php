<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\FAQController;

// Public Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');

// Form Submissions
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/reviews/submit', [ReviewController::class, 'store'])->name('reviews.submit');
Route::post('/reviews/{id}/helpful', [ReviewController::class, 'markHelpful'])->name('reviews.helpful');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/callback/request', [CallbackController::class, 'request'])->name('callback.request');

// Admin Authentication handled by Filament

// Additional endpoints
Route::get('/projects/featured', [PortfolioController::class, 'featured']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/faqs/api', [FAQController::class, 'index']);
Route::get('/reviews/featured', [ReviewController::class, 'getFeatured']);
