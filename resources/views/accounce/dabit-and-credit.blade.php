@extends('layout.master')

@section('credit-account')
    <div class="row mb-md-3 mb-2">

        {{-- Debit part --}}
        <div class="col-md-6">
            <form action="{{ route('debit-store') }}" method="POST">
                @csrf
                <h2> Debit </h2>

                @if (session('successDebit'))
                    <h3 class="text-success"> {{ session('successDebit') }} </h3>
                @endif

                <div class="bg-light p-2">

                    <div class="d-flex">

                        <div class="w-75 me-md-3 me-1">

                            <label for="debitTitle" class="form-label"> Title </label>
                            <input type="text" name="debit_title" value="{{ old('debit_title') }}"
                                class="mb-md-2 mb-1 form-control border-@if ($errors->has('debit_title')) {{ 'white' }} @endif"
                                id="debitTitle" />

                            @if ($errors->has('debit_title'))
                                <span class="text-danger d-block mb-md-2 mb-1"> {{ $errors->first('debit_title') }} </span>
                            @endif
                        </div>

                        <div class="w-25">
                            <label for="debitAmout" class="form-label text-white"> Debit Amount </label>
                            <input type="number" name="debit_amount" value="{{ old('debit_amount') }}"
                                class="mb-md-2 mb-1 form-control border-@if ($errors->has('debit_amount')) {{ 'white' }} @endif"
                                id="debitAmout" />

                            @if ($errors->has('debit_amount'))
                                <span class="text-danger d-block mb-md-2 mb-1"> {{ $errors->first('debit_amount') }} </span>
                            @endif
                        </div>

                    </div>

                    <!-- Date of Birth start -->
                    <label for="creditDate" class="form-label border-secondary d-block"> Debate Date </label>
                    <input type="date" name="credit_date" value="{{ old('creditDate') }}" id="creditDate"
                        class="form-control mb-md-2 mb-1" />

                    <div class="d-flex justify-content-end mt-md-3 mt-1">
                        <button type="submit" class="btn btn-primary me-md-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Credii part --}}
        <div class="col-md-6">
            <form action="{{ route('store-credit') }}" method="POST">
                @csrf
                <h2> Credit </h2>

                @if (session('successCredit'))
                    <h3 class="text-success"> {{ session('successCredit') }} </h3>
                @endif

                <div class="bg-light p-2">

                    <label for="credit" class="form-label "> Credit Amount </label>
                    <input type="number" name="credit" value="{{ old('credit') }}"
                        class="mb-md-2 mb-1 form-control border-@if ($errors->has('credit')) {{ 'danger' }} @endif"
                        id="credit" />

                    @if ($errors->has('credit'))
                        <span class="text-danger"> {{ $errors->first('credit') }} </span>
                    @endif

                    <!-- Date of Birth start -->
                    <label for="creditDate" class="form-label border-secondary d-block "> Credite Date </label>
                    <input type="date" name="credit_date" value="{{ old('dob') }}" id="creditDate"
                        class="form-control mb-md-3 mb-1" />

                    <div class="d-flex justify-content-end mt-md-3 mt-1">
                        <button type="submit" class="btn btn-primary me-md-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 mx-auto">
            <table class="table table-striped">
                <thead class="table-primary text-dark">
                    <td class="text-center"> SL </td>
                    <td class="text-center"> Date </td>
                    <td class="text-center"> Title </td>
                    <td class="text-end"> Debit </td>
                    <td class="text-end"> Credit </td>
                    <td class="text-end"> Balace </td>
                </thead>
                <tbody>
                    @foreach ($totalCreditAmountCollection as $totalCreditAmountItem)
                        <tr>
                            <td> {{ $totalCreditAmountItem->id }} </td>
                            <td>
                                @if (empty($totalCreditAmountItem->debit_date))
                                    {{ $currentDate }}
                                @else
                                    {{ $totalCreditAmountItem->debit_date }}
                                @endif
                            </td>

                            <td> {{ $totalCreditAmountItem->title }} </td>
                            <td class="text-end"> </td>
                            <td class="text-end"> {{ $totalCreditAmountItem->credit }} </td>

                            <td class="text-end">  </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot class="table-primary text-dark">
                    <td> 0 </td>
                    <td> 0 </td>
                    <td> 0 </td>
                    <td class="text-end"> Total Debit <span class="fw-bold"> {{ $totalDebitAmount }} </span> </td>
                    <td class="text-end"> Total Credit <span class="fw-bold"> {{ $totalcreditAmount }} </span> </td>
                    <td class="text-end"> Balance <span class="fw-bold"> {{ $totalcreditAmount - $totalDebitAmount }} </span> </td>

                </tfoot>
            </table>
        </div>
    </div>
@endsection
