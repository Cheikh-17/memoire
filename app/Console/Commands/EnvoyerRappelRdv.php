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
    protected $description = 'Envoie un rappel aux clients 1 heure avant leur rendez-vous';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $twoDaysLater = Carbon::now()->addDays(2);

        $rendezvouss = rendezvous::where('date-rendez-vous', $twoDaysLater->toDateString())
            ->get();

        foreach ($rendezvouss as $rdv) {
            $user = $rdv->user;
            if ($user) {
                Notification::send($user, new RappelRdvNotification($rdv));
            }
        }

        $this->info('Rappels envoyés pour les rendez-vous du ' . $twoDaysLater->toDateString());
    }
}
