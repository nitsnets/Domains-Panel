<?php declare(strict_types=1);

namespace App\Domains\Domain\Action;

use App\Domains\Domain\Model\Domain as Model;
use App\Services\Command\Artisan;

class CheckUrlAll extends ActionAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->iterate();
    }

    /**
     * @return void
     */
    protected function iterate(): void
    {
        foreach (Model::enabled()->get() as $each) {
            Artisan::exec(sprintf('domain:check:url --id=%s', $each->id));
        }
    }
}
