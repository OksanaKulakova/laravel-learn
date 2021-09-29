<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Statistics as Stat;

class Statistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Statistics';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Stat $statistics)
    {
        $this->table(
            ['Статистика', 'Результат'],
            $statistics->get()
        );
    }
}
