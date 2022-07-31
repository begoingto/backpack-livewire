<?php
namespace App\Http\Livewire;

use Livewire\Component;

class LoanMoney extends Component
{
    public $loan = 0;
    public $rate = 0;
    public $months = 0;
    public $installment = 0;
    public $debt = 0;
    public $principal = 0;
    public $interest = 0;
    public $totalInterest = 0;
    public $totalInstallment = 0;
    public $totalPrinciple = 0;
    public $totaldebt = 0;

    // protected $queryString = [
    //     'loan' => ['except' => 0],
    //     'rate' => ['except' => 0],
    //     'months' => ['except' => 0],
    // ];

    public function updatedRate()
    {
        $this->rate /= 100;
    }

    public function updatedLoan()
    {
        $this->debt = $this->loan;
    }

    public function updatedMonths()
    {
        if ($this->months > 0 && $this->loan > 0 && $this->rate > 0) {
            $this->installment = ($this->loan * $this->rate) / (1 - (pow(1 + $this->rate, -$this->months)));
        }
    }

    public function render()
    {
        return view('livewire.loan-money');
    }
}
