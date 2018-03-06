<?php

namespace App\Http\Controllers;

use App\Article;
use App\Episode;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function telegram()
    {

        return Telegram::setWebhook(['url' => 'https://8c8d2b65.ngrok.io//396603472:AAGLckyApu-oMnURzd59DgNXbsCqFhgPjHA/webhook']);


//        Telegram::sendMessage([
//            'chat_id' => '108204645',
//            'text' => 'به ربات تلگرام راکت خوش آمدید',
//        ]);
//        return Telegram::getUpdates();
    }

    public function webhook()
    {
        Telegram::commandsHandler(true);

        switch (request('messages.php.text')) {
            case 'آخرین مقالات سایت':
                return $this->lastArticles();
                break;
            case 'آخرین ویدیوهای سایت':
                return $this->lastEpisodes();
                break;
            case 'راهنمای استفاده از ربات راکت':
                return $this->guide();
                break;
        }
    }

    private function lastArticles()
    {
        $articles = Article::latest()->take(5)->get();
        if($articles) {
            $text = '';

            foreach ($articles as $article) {
                $text .= $article->title . "\n";
                $text .= url()->to($article->path()) . "\n";
            }
        } else {
            $text = 'مقاله ای برای نمایش وجود ندارد';
        }

        Telegram::sendMessage([
            'chat_id' => request('messages.php.chat.id'),
            'text' => $text,
        ]);
    }

    private function lastEpisodes()
    {
        $episodes = Episode::latest()->take(5)->get();
        if($episodes) {
            $text = '';

            foreach ($episodes as $episode) {
                $text .= $episode->title . "\n";
                $text .= url()->to($episode->path()) . "\n";
            }
        } else {
            $text = 'ویدیوی برای نمایش وجود ندارد';
        }

        Telegram::sendMessage([
            'chat_id' => request('messages.php.chat.id'),
            'text' => $text,
        ]);
    }

    private function guide()
    {
    }
}
