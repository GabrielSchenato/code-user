<?php

namespace CodePress\CodeUser\Listener;

use Illuminate\Mail\Mailer;
use CodePress\CodeUser\Event\UserCreatedEvent;

/**
 * 
 *
 * @author gabriel
 */
class EmailCreatedAccountListener
{

    private $mailer;

    function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(UserCreatedEvent $event)
    {
        $user = $event->getUser();
        $plainPassword = $event->getPlainPassword();
        return $this->mailer->send('email.registration', [
                    'username' => $user->email,
                    'password' => $plainPassword
                        ], function ($message) use ($user) {
                    $message->to($user->email, $user->name)
                            ->subject("{$user->name}, sua conta foi criada!");
        });
    }

}
