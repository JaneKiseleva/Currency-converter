<?php

namespace App\Http\Controllers;

use CommandsOfCurrency;
use Illuminate\Support\Facades\DB;
use TelegramBot\Api\Client;


class TelegramBotController extends Controller
{

//    public function handle()
//    {
//        $botman = app('botman');
//        $botman->listen();
//    }
//
//
//
//    //положила в переменную токен из телеграмма
//    protected $token = "2073572091:AAFoFTAAIB1-pp-UBuhGF382nQ8HnaywA7Y";
//    //создала нового бота
//    protected $bot = new Client($token);
//    //привязыем бота через метод setWebhook бота к приложению, для этого строим ссылку, где https://localhost/bot.php - ссылка на файл-обработчик
//    protected $url = "https://api.telegram.org/bot{2073572091:AAFoFTAAIB1-pp-UBuhGF382nQ8HnaywA7Y/setWebhook?url=https://localhost/bot.php";
//
//
//    //Метод для приветствия при запуске бота
//    public function sendMessage()
//    {
//        $this->bot->command('start', function ($message) use ($bot) {
//            $answer = 'Добро пожаловать!';
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
//    }
}


//
//
//    //положила в переменную токен из телеграмма
//    protected $token = "2073572091:AAFoFTAAIB1-pp-UBuhGF382nQ8HnaywA7Y";
//    //создала нового бота
//    protected $bot = new Client($token);
//    //привязыем бота через метод setWebhook бота к приложению, для этого строим ссылку, где https://localhost/bot.php - ссылка на файл-обработчик
//    protected $url = "https://api.telegram.org/bot{2073572091:AAFoFTAAIB1-pp-UBuhGF382nQ8HnaywA7Y/setWebhook?url=https://localhost/bot.php";
//
//
//    //Метод для приветствия при запуске бота
//    public function sendMessage()
//    {
//        $this->bot->command('start', function ($message) use ($bot) {
//            $answer = 'Добро пожаловать!';
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
//    }
//
//    //Метод, который выводит короткое сообщение о боте и список команд
//    public function help()
//    {
//        $this->bot->command('help', function ($message) use ($bot) {
//            $answer = 'Команды:/help - вывод справки';
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
//        $bot->run();
//    }
//
//    //конструктор сервисного класса
//    protected CommandsOfCurrency $commandsOfCurrency;
//
//    public function __construct(CommandsOfCurrency $commandsOfCurrency)
//    {
//        $this->commandsOfCurrency=$commandsOfCurrency;
//    }
//
//    //запускаем команду и отправляем данные пользователю (когда shedulers, то просто вынимаем из базы)
//    public function doUpdateCurrency() {
//        $this->bot->command('currency', function ($message) use ($bot) {
//            $text = $message->getText();
//            $param = str_replace('/currency ', '', $text);
//            $answer = 'Command not found';
//            if (empty($param)) {
//                $bot->sendMessage($message->getChat()->getId(), $answer);
//            } else {
//                $queryDBCurrency = DB::table('currency')->get();
//                $arrayOfCurrency = [];
//                foreach ($queryDBCurrency as $currency) {
//                    $arrayOfCurrency[$currency->name] = $currency->value;
//                }
//                $bot->sendMessage($message->getChat()->getId(), $arrayOfCurrency);
//            }
//        });
//    }
//
//    //Метод для конвертации валют
//    public function convertCurrency()
//    {
//        $this->bot->command('convert', function ($message) use ($bot) {
//            $text = $message->getText();
//            $param = str_replace('/convert ', '', $text);
//
//            if (!empty($param)) {
//                //отправляем сообщение, чтобы понять какую валюту пользователь хочет конвертировать.
//                $answer = 'Choose currency';
//                $bot->sendMessage($message->getChat()->getId(), $answer);
//            }
//
//            $text = $message->getText();
//            $param = str_replace('/convert ', '', $text);
//            if (!empty($param)) {
//                //проверяем есть ли совпаления введенного текста с валютой, которая есть в базе
//                $queryDBCurrency = DB::table('currency')->get();
//                foreach ($queryDBCurrency as $currency) {
//                    if ($currency->name == $param)
//                        $currencyValue = $currency->value;
//                }
//                // в случае успеха, отправляем сообщение c вопросом, в какую валюту пользователь хочет конвертировать.
//                $answer = 'What currency do you want to convert';
//            } else {
//                // иначе, просим снова попробовать ввести значение
//                $answer = 'Currency not found. Try again.';
//            }
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//
//            $text = $message->getText();
//            $param = str_replace('/convert ', '', $text);
//            if (!empty($param)) {
//                //проверяем есть ли совпаления введенного текста со второй валютой, которая есть в базе
//                $queryDBCurrency = DB::table('currency')->get();
//                foreach ($queryDBCurrency as $currency) {
//                    if ($currency->name == $param)
//                        $currencyValue = $currency->value;
//                }
//                //в случае успеха, отправляем сообщение, с вопросом, какую сумму пользователеь хочет конвертировать.
//                $answer = 'How many you want to convert?';
//            } else {
//                // иначе, просим снова попробовать ввести значение
//                $answer = 'Currency not found. Try again.';
//            }
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//
//            $text = $message->getText();
//            $param = str_replace('/convert ', '', $text);
//            if (!empty($param)) {
//                $convertCurrencyValue = //[Сумма в валюте конвертации]=[Курс]*[Сумма в базовой валюте]/[Кратность] //формула
//                $answer = "Всего {$convertCurrencyValue}";// ответ
//            } else {
//                $answer = 'Enter correct value';
//            }
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
//    }
//}








//    //положила в переменную токен из телеграмма
//    protected $token = "2073572091:AAFoFTAAIB1-pp-UBuhGF382nQ8HnaywA7Y";
//привязыем бота через метод setWebhook бота к приложению, для этого строим ссылку
////    protected $url = "https://api.telegram.org/bot""{$token}""/setWebhook?url=https://localhost/bot.php";
//protected $bot = new BotApi($token)



//    //построила ссылку
//    protected $url = 'https://api.telegram.org/bot'.$token.'/';
//    define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

//https: //api.telegram.org/bot~token~/setWebhook?url=https: //example.ru/path
//    protected $bot = new BotApi($token);
//
//    public function start()
//    {
//        $bot->command('start', function ($message) use ($bot) {
//            $answer = 'Добро пожаловать!';
//            $bot->sendMessage($message->getChat()->getId(), $answer);
//        });
//    }



//$bot = new \TelegramBot\Api\BotApi('YOUR_BOT_API_TOKEN');
//
//$bot->sendMessage($chatId, $messageText);




//$token = "токен";
//$bot = new \TelegramBot\Api\Client($token);
//// команда для start
//$bot->command('start', function ($message) use ($bot) {
//    $answer = 'Добро пожаловать!';
//    $bot->sendMessage($message->getChat()->getId(), $answer);
//});
//
//// команда для помощи
//$bot->command('help', function ($message) use ($bot) {
//    $answer = 'Команды:
///help - вывод справки';
//    $bot->sendMessage($message->getChat()->getId(), $answer);
//});
//
//$bot->run();
