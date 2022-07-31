<div>
    <div class="card">
        <div class="card-header">
            <form class="row" action="#">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="money">Money Loan</label>
                        <input type="number" wire:model.debounce.500ms="loan" min="0" id="money" class="form-control"
                            placeholder="Enter money loan">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="money">Interest Rate</label>
                        <input type="number" wire:model.debounce.500ms="rate" min="0" id="money" class="form-control"
                            placeholder="Enter inerest rate">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="money">Months</label>
                        <input type="number" wire:model.debounce.500ms="months" min="0" id="money" class="form-control"
                            placeholder="Enter months" @disabled(empty($loan) && empty($loan))>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Month</th>
                    <th>Installment</th>
                    <th>Principle</th>
                    <th>Interest</th>
                    <th>Depreciation</th>
                </thead>
                <tbody>
                    @if ($months > 0)
                        {{-- @php
                            $debt=$loan;
                        @endphp --}}
                        @for ($i = 1; $i <= $months; $i++)
                            @php
                                $interest =$debt *$rate;
                                $principal = $installment - $interest;
                                $debt-=$principal;
                                if ($i==$months) {
                                    $interest=round($installment,2)-round($principal,2);
                                }
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td class="text-primary"><sup>$</sup>{{number_format($installment, 2, '.', ',')}}</td>
                                <td class="text-danger"><sup>$</sup>{{number_format($principal, 2, '.', ',')}}</td>
                                <td class="text-danger"><sup>$</sup>{{number_format($interest, 2, '.', ',')}}</td>
                                <td class="text-success"><sup>$</sup>{{number_format($debt, 2, '.', ',')}}</td>
                            </tr>
                            @php
                                $totalInterest+=$interest;
                                $totalInstallment+=$installment;
                                $totalPrinciple+=$principal;
                                $totaldebt=$debt;
                            @endphp
                        @endfor
                        <tr>
                            <td>Total</td>
                            <td>{{ number_format($totalInstallment,2,'.',',') }}</td>
                            <td>{{ number_format($totalPrinciple,2,'.',',') }}</td>
                            <td>{{ number_format($totalInterest,2,'.',',') }}</td>
                            <td>{{ number_format($totaldebt,2,'.',',') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
