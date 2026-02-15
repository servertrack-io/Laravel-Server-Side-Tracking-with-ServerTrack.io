@extends('layouts.app')

@section('content')
@php
    // --- MOCKING DATA FOR TESTING ---
    $fireEvent = true;
    $data = (object) [
        'id' => 'ORD-9982',
        'email' => 'customer@example.com',
        'phone' => '01700000000',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'city' => 'Dhaka',
        'state' => 'Dhaka',
        'country' => 'bd',
        'zip' => '1212',
        'total_amount' => 6200,
        'shipping_cost' => 100
    ];

    // Mocking the Order Details Table
    $orderdetails = collect([
        (object)['product_id' => 101, 'quantity' => 1, 'price' => 6100]
    ]);

    // Mocking the Product/Category relationship
    $mockProduct = (object)[
        'id' => 101,
        'title' => 'ServerTrack Pro Plan',
        'price' => 7000, // Original price for discount calculation
        'category_name' => 'Software'
    ];
@endphp

<div class="max-w-3xl mx-auto py-20 px-4">
    <div class="bg-white border border-slate-100 shadow-2xl shadow-slate-200/60 rounded-3xl overflow-hidden">
        {{-- Success Header --}}
        <div class="bg-slate-50/50 px-8 py-12 text-center border-b border-slate-100 relative">
            {{-- Success Icon with Pulse Effect --}}
            <div class="relative w-24 h-24 mx-auto mb-6">
                <div class="absolute inset-0 bg-blue-600 rounded-full animate-ping opacity-20"></div>
                <div class="relative w-24 h-24 bg-gradient-to-tr from-green-600 to-blue-600 text-white rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            <h1 class="text-4xl font-extrabold text-green-600">Purchase Complete!</h1>
            <p class="text-slate-500 mt-3 text-lg">
                Awesome, <span class="text-green-600 font-semibold">{{ $data->first_name }} {{ $data->last_name }}</span>! 
                Your tracking is now firing on all cylinders.
            </p>
            
            {{-- Tracking Status Badge --}}
            <div class="mt-6 inline-flex items-center gap-2 bg-blue-600/10 text-blue-600 px-4 py-1.5 rounded-full text-xs font-bold uppercase border border-blue-600/20">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-600 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                </span>
                Purchase Event Dispatched
            </div>
        </div>

        {{-- Order Details Mini-Card --}}
        <div class="p-8 md:p-12">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                <div class="text-center md:text-left">
                    <span class="text-slate-400 text-xs uppercase font-bold ">Order Number</span>
                    <p class="text-xl font-mono font-bold text-green-600">#{{ $data->id }}</p>
                </div>
                <div class="h-px w-full md:h-12 md:w-px bg-slate-200"></div>
                <div class="text-center md:text-left">
                    <span class="text-slate-400 text-xs uppercase font-bold ">Amount Paid</span>
                    <p class="text-xl font-bold text-green-600">{{ number_format($data->total_amount, 2) }} BDT</p>
                </div>
                <div class="h-px w-full md:h-12 md:w-px bg-slate-200"></div>
                <div class="text-center md:text-left">
                    <span class="text-slate-400 text-xs uppercase font-bold ">Status</span>
                    <p class="text-sm font-bold text-blue-600 bg-blue-600/10 px-3 py-1 rounded-lg">Processing</p>
                </div>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/" class="w-full sm:w-auto text-center bg-green-600 text-white px-10 py-4 rounded-2xl font-bold shadow-xl shadow-green-600/20 hover:scale-105 transition-all">
                    Back to Home
                </a>
                <a href="https://servertrack.io/pricing" class="w-full sm:w-auto text-center bg-blue-600 text-white px-10 py-4 rounded-2xl font-bold shadow-xl shadow-green-600/20 hover:scale-105 transition-all">
                    Upgrade Plan
                </a>
            </div>
        </div>
    </div>
    
    <p class="text-center mt-8 text-slate-400 text-sm italic">
        A confirmation email has been sent to {{ $data->email }}
    </p>
</div>
@endsection

@push('scripts')
@if($fireEvent)
<script>
    // Advanced Matching User Data
    var userData = {
        em: "{{ $data->email }}",
        ph: "{{ $data->phone }}",
        fn: "{{ $data->first_name }}", 
        ln: "{{ $data->last_name }}",
        ct: "{{ $data->city }}",
        st: "{{ $data->state }}",
        zp: "{{ $data->zip }}",
        country: "{{ $data->country }}",
    };

    document.addEventListener('DOMContentLoaded', () => {
        st('track', 'Purchase', {
            currency: "BDT",
            value: {{ $data->total_amount }},
            transaction_id: "{{ $data->id }}",
            shipping: {{ $data->shipping_cost }},
            content_type: 'product',
            
            content_ids: [
                @foreach($orderdetails as $detail)
                    "{{ $detail->product_id }}",
                @endforeach
            ],
            
            contents: [
                @foreach($orderdetails as $detail)
                {
                    id: "{{ $detail->product_id }}",
                    quantity: {{ $detail->quantity }},
                    item_price: {{ $detail->price }}
                },
                @endforeach
            ],

            items: [
                @foreach($orderdetails as $detail)
                {
                    item_id: "{{ $mockProduct->id }}",
                    item_name: "{{ $mockProduct->title }}",
                    item_category: "{{ $mockProduct->category_name }}",
                    price: {{ $detail->price }},
                    quantity: {{ $detail->quantity }},
                    discount: {{ $mockProduct->price - $detail->price }}
                },
                @endforeach
            ]
        }, userData);
    });
</script>
@endif
@endpush