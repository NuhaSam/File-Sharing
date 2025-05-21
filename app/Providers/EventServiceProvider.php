<?php

namespace App\Providers;

use App\Models\File;
use App\Models\filedownload;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Request;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
    
        Event::listen('file.downloaded', function($id){
            $file = File::find($id);
            $file->update([
                'count' => ++$file->count,
            ]);
        //    $created =  $file->update([
        //         'file_id' => $file->id,
        //         'ip' => $ip,
        //         'user_agent' => $user_agent,
        //         'count' => ++$count,
        //     ]);
            // dd($created);
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
