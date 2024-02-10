<div x-data="{ showOrder: @entangle('showOrder') }">
    <div class="d-flex">
        <h2 class="h5 text-uppercase mb-4">{{ __('panel.f_orders') }}</h2>
    </div>


    <div class="my-4">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('panel.f_order_ref') }}</th>
                        <th>{{ __('panel.f_order_total') }}</th>
                        <th>{{ __('panel.status') }}</th>
                        <th>{{ __('panel.created_at') }}</th>
                        <th class="col-2">{{ __('panel.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr wire:key="{{ $order->id }}">
                            <td>{{ $order->ref_id }}</td>
                            <td>{{ $order->currency() . ' ' . $order->total }}</td>
                            <td>{!! $order->statusWithLabel() !!}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td class="text-right">
                                <button type="button" wire:click="displayOrder('{{ $order->id }}')"
                                    x-on:click="showOrder = true" class="btn btn-success btn-sm">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <p class="text-center">{{ __('panel.f_no_orders_yet') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div x-show="showOrder" x-on:click.away="showOrder=false" class="border rounded shadow p-4">
            <div class="table-responsive mb-4">
                <table class="table">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"><strong
                                    class="text-small text-uppercase">{{ __('panel.f_order_card') }}</strong></th>
                            <th class="border-0" scope="col"><strong
                                    class="text-small text-uppercase">{{ __('panel.f_order_price') }}</strong>
                            </th>
                            <th class="border-0" scope="col"><strong
                                    class="text-small text-uppercase">{{ __('panel.f_order_quantity') }}</strong></th>
                            <th class="border-0" scope="col"><strong
                                    class="text-small text-uppercase">{{ __('panel.f_total') }}</strong>
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @if ($order_show)
                            @foreach ($order_show->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $order->currency() . ' ' . number_format($product->price, 2) }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $order->currency() . ' ' . number_format($product->price * $product->pivot->quantity, 2) }}
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="3" style="text-align: right"><strong>{{ __('panel.total') }}</strong>
                                </td>
                                <td>{{ $order->currency() . ' ' . number_format($order_show->subtotal, 2) }}</td>
                            </tr>
                            @if (!is_null($order->discount_code))
                                <tr>
                                    <td colspan="3" style="text-align: right"><strong>{{ __('panel.f_discount') }}
                                            ({{ $order->discount_code }})</strong> </td>
                                    <td>{{ $order->currency() . ' ' . number_format($order_show->discount, 2) }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="3" style="text-align: right"><strong>{{ __('panel.f_tax') }}</strong>
                                </td>
                                <td>{{ $order->currency() . ' ' . number_format($order_show->tax, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right">
                                    <strong>{{ __('panel.f_order_total') }}</strong>
                                </td>
                                <td>{{ $order->currency() . ' ' . number_format($order_show->total, 2) }}</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>

            <!-- Transactions Table  -->
            <h2 class="h5 text-uppercase">{{ __('panel.f_order_proccess') }}</h2>

            <div class="table-responsive mb-4">
                <table class="table">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0" scope="col"><strong
                                    class="text-small text-uppercase">{{ __('panel.f_order_transaction') }}</strong>
                            </th>
                            <th class="border-0" scope="col"><strong
                                    class="text-small text-uppercase">{{ __('panel.created_at') }}</strong>
                            </th>
                            {{-- <th class="border-0" scope="col"><strong class="text-small text-uppercase">Days</strong></th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- check if order_show is set before click or not  --}}
                        @if ($order_show)
                            @foreach ($order_show->transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->status($transaction->transaction) }}</td>
                                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                    {{-- <td>{{ \Carbon\Carbon::now()->addDays(5)->diffInDays($transaction->created_at->format('Y-m-d')) }}</td> --}}
                                    <td>
                                        @if (
                                            $loop->last &&
                                                $transaction->transaction == \App\Models\OrderTransaction::FINISHED &&
                                                \Carbon\Carbon::now()->addDays(5)->diffInDays($transaction->created_at->format('Y-m-d')) != 0)
                                            <button type="button"
                                                wire:click="requestReturnOrder('{{ $order->id }}')"
                                                class="btn btn-link text-right">
                                                {{ __('panel.f_you_can_return_order_with_in') }}
                                                {{ 5 - $transaction->created_at->diffInDays() }}
                                                {{ __('panel.f_days') }}
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
