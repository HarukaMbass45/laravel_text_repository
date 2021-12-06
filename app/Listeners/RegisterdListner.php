<?php

declare(strict_type=1);

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Mail\Mailer;
use App\Models\User;

class RegisterdListner
{
    private $mailer;
    private $eloquent;

    public function __construct(Mailer $mailer, User $eloquent)
    {
        $this->mailer = $mailer;
        $this->eloquent = $eloquent;
    }

    public function handle(Registered $event)
    {
        $user = $this->eloquent->findOrFail($event->user->getAuthIdentifier());
        $this->mailer->raw('登録完了しました', function ($message) use ($user) {
            $message->subject('登録完了メール')->to($user->email);
        });
    }
}
