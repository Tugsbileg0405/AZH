<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsRemind extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $news;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ардчилсан залуучуудын холбоо')->view('email.news')->with([
                        'news' => $this->news,
                    ]);
    }
}
