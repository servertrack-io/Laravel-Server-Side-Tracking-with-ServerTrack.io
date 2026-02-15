@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-20 px-4">
    @php
        // Mocking Laravel Model Data for testing
        $data = (object) [
            'id' => 101,
            'title' => 'ServerTrack Premium Package',
            'price' => 5000,
            'offer_price' => 4500,
        ];
        $firstcat = 'Software';
    @endphp

    <div class="flex flex-col md:flex-row gap-10">
        <div class="md:w-1/2 bg-slate-100 aspect-square rounded-2xl flex items-center justify-center">
             <span class="text-slate-400">Product Image</span>
        </div>
        
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold text-green-600">{{ $data->title }}</h1>
            <p class="text-2xl text-mintTeal font-bold mt-4">{{ $data->offer_price }} BDT</p>
            <p class="text-slate-500 line-through">{{ $data->price }} BDT</p>
            
            <div class="mt-8">
                <p class="text-slate-600 mb-6">High-performance server-side tracking for Laravel. Easy to install, impossible to block.</p>
                
                {{-- Add To Cart Button --}}
                <button 
                    onclick="addToCartEvent('{{$data->id}}', '{{$data->title}}', {{$data->offer_price}}, {{$data->price}})"
                    class="bg-green-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-opacity-90 transition-all">
                    Add to Cart
                </button>

                <a href="/checkout" class="ml-4 inline-block bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-opacity-90 transition-all">
                    Go to Checkout
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // 1. Track ViewContent
    document.addEventListener('DOMContentLoaded', () => {
        st('track', 'ViewContent', {
            content_ids: ['{{$data->id}}'],
            content_type: 'product',
            content_name: '{{$data->title}}',
            content_category: '{{$firstcat}}',
            value: {{$data->offer_price}}, 
            currency: 'BDT',
            price: {{$data->price}},
            discount: {{$data->price - $data->offer_price}},
            content_list: 'Related Products'
        });
    });

    // 2. Track AddToCart Function
    function addToCartEvent(productId, productName, price, defprice) {
        st('track', 'AddToCart', {
            content_ids: [productId],
            content_type: 'product',
            content_name: productName,
            value: price, 
            currency: 'BDT',
            content_list: 'Shopping Cart',
            num_items: 1,
            price: defprice, 
            discount: defprice - price 
        });
    }
</script>
@endpush