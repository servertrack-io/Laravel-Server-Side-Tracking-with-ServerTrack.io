@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-20 px-4">
    @php
        // --- MOCKING DATA FOR TESTING ---
        $items = collect([
            (object)[
                'name' => 'ServerTrack Premium',
                'quantity' => 1,
                'price' => 5000,
                'associatedModel' => (object)['id' => 'ST-101', 'price' => 5000]
            ],
            (object)[
                'name' => 'API Support Add-on',
                'quantity' => 2,
                'price' => 1200,
                'associatedModel' => (object)['id' => 'ST-202', 'price' => 1200]
            ]
        ]);
        $total = 7400; // 5000 + (1200 * 2)
    @endphp

    <h1 class="text-3xl font-bold mb-6 text-darkGreen">Checkout</h1>
    
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="p-6 bg-slate-50 border-b border-slate-200">
            <h2 class="font-bold">Your Order Summary</h2>
        </div>
        <div class="p-6 space-y-4">
            @foreach($items as $item)
                <div class="flex justify-between items-center">
                    <span>{{ $item->name }} <span class="text-slate-400">x{{ $item->quantity }}</span></span>
                    <span class="font-semibold">{{ $item->price * $item->quantity }} BDT</span>
                </div>
            @endforeach
            <div class="pt-4 border-t border-slate-200 flex justify-between text-xl font-bold text-darkGreen">
                <span>Total</span>
                <span>{{ $total }} BDT</span>
            </div>
        </div>
        <div class="p-6 bg-slate-50 border-t border-slate-200 text-right">
             <a href="/success" class="ml-4 inline-block bg-green-600 text-white text-end px-8 py-4 rounded-xl font-bold hover:bg-opacity-90 transition-all">
                Confirm Purchase
            </a>
        </div>
       
    </div>
</div>
@endsection

@push('scripts')
@if(count($items) > 0)
<script>
    document.addEventListener('DOMContentLoaded', () => {
        st('track', 'InitiateCheckout', {
            value: {{ (float) $total }},
            currency: 'BDT',
            content_type: 'product',
            num_items: {{ count($items) }},
            content_list: 'Related Products',
            content_ids: [
                @foreach($items as $item)
                    '{{ $item->associatedModel->id }}'@if(!$loop->last),@endif
                @endforeach
            ],
            contents: [
                @foreach($items as $item)
                {
                    id: '{{ $item->associatedModel->id }}',
                    quantity: {{ (int) $item->quantity }},
                    item_price: {{ (float) $item->associatedModel->price }}
                }@if(!$loop->last),@endif
                @endforeach
            ]
        });
    });
</script>
@endif
@endpush