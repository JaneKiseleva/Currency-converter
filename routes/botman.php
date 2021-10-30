<?php

use App\Http\Controllers\TelegramBotController;

$botman = resolve('botman');

$botman->hears('Hello', function ($bot) {
    $bot->reply('I am here');
});

$botman->hears('/start', function ($bot) {
    $bot->startConversation(TelegramBotController::class);
});
