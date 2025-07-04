<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\rendezvous;
use App\Notifications\RappelRdvNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class EnvoyerRappelRdv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:envoyer-rappel-rdv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie un rappel aux clients 2 jours avant leur rendez-vous';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateRappel = Carbon::now()->addDays(2)->toDateString();

        $rendezvouss = rendezvous::where('date-rendez-vous', $dateRappel)->get();

        foreach ($rendezvouss as $rdv) {
            $user = $rdv->user;
            if ($user) {
                Notification::send($user, new RappelRdvNotification($rdv));
            }
        }

        $this->info('Rappels envoyés pour les rendez-vous du ' . $dateRappel);
    }
}
