<?php declare(strict_types=1);

namespace App\Domains\Check\Action;

use Exception;
use App\Domains\Check\Model\Check as Model;

class ClearOld extends ActionAbstract
{
    /**
     * @return void
     */
    public function handle(): void
    {
        $this->check();
        $this->data();
        $this->save();
    }

    /**
     * @return void
     */
    protected function check(): void
    {
        if ($this->data['days'] < 5) {
            throw new Exception(__('check-clear-old.error.days', ['days' => $this->data['days']]));
        }
    }

    /**
     * @return void
     */
    protected function data(): void
    {
        $this->data['datetime'] = date('Y-m-d H:i:s', strtotime('-'.$this->data['days'].' days'));
    }

    /**
     * @return void
     */
    protected function save(): void
    {
        Model::where('created_at', '<=', $this->data['datetime'])->delete();
    }
}
