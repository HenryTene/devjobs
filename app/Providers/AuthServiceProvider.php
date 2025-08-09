<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject(__('Verifica tu dirección de correo electrónico'))
                ->line(__('Gracias por registrarte! Antes de empezar, por favor verifica tu dirección de correo electrónico haciendo clic en el siguiente enlace:'))
                ->action(__('Verificar correo electrónico'), $url)
                ->line(__('Si no has recibido el correo electrónico, te enviaremos otro con mucho gusto.'));
        });
    }
}
