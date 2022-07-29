<?php
namespace App\Traits;

use Carbon\Carbon;

trait WithFilter
{
    public function startDate($d)
    {
        $this->s_date = $d;
    }

    public function endDate($d)
    {
        $this->e_date = $d;
    }

    public function resetSE()
    {
        $this->reset([
            's_date',
            'e_date',
            'date',
            'filter'
        ]);
    }

    public function filterDate($date = null)
    {
        if (!empty($this->s_date) || !empty($this->e_date)) {
            $this->resetSE();
        }
        switch ($date) {
            case 'today':
                $this->date = Carbon::now()->format('Y-m-d');
                break;
            case 'yesterday':
                $this->date = Carbon::yesterday()->format('Y-m-d');
                $this->gotoPage(1);
                break;
            case 'thisweek':
                $this->date = [Carbon::now()->subWeek()->format('Y-m-d'), Carbon::now()->format('Y-m-d')];
                $this->gotoPage(1);
                break;
            case 'lastweek':
                $this->date = [Carbon::now()->subWeek()->subWeeks(1)->format('Y-m-d'), Carbon::now()->subWeek()->format('Y-m-d')];
                $this->gotoPage(1);
                break;
            case 'thismonth':
                $this->date = [Carbon::now()->subMonth()->format('Y-m-d'), Carbon::now()->format('Y-m-d')];
                $this->gotoPage(1);
                break;
            case 'lastmonth':
                $this->date = [Carbon::now()->subMonth()->subMonths(1)->format('Y-m-d'), Carbon::now()->subMonth()->format('Y-m-d')];
                $this->gotoPage(1);
                break;
            default:
                $this->date = null;
                $this->gotoPage(1);
                break;
        }
    }
}
