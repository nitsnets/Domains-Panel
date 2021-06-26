<?php declare(strict_types=1);

namespace App\Domains\Domain\Command;

class CheckUrl extends CommandAbstract
{
    /**
     * @var string
     */
    protected $signature = 'domain:check:url {--id=}';

    /**
     * @var string
     */
    protected $description = 'Check Domain Url by {--id=}';

    /**
     * @return void
     */
    public function handle()
    {
        $this->row();
        $this->factory()->action()->checkUrl();
    }
}
