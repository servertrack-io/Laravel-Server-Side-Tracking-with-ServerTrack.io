@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col">
    {{-- Simple Navigation --}}
    <nav class="py-6 px-8 border-b border-slate-100 flex justify-between items-center bg-white sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <span class="text-xl font-bold text-darkGreen ">ServerTrack<span class="text-green-600">.io</span></span>
        </div>
        <div class="hidden md:flex gap-8 text-sm font-semibold text-slate-600">
            <a href="https://servertrack.io/" class="hover:text-darkGreen transition-colors" target="_blank">Visit Website</a>
            <a href="https://servertrack.io/documentation" class="hover:text-darkGreen transition-colors">Documentation</a>
            <a href="https://github.com/ServerTrack-Official" class="text-darkGreen border-b-2 border-green-600">GitHub</a>
        </div>
    </nav>

    {{-- Hero Branding --}}
    <section class="flex-grow flex items-center justify-center bg-slate-50 px-4 py-20">
        <div class="max-w-7xl text-center">
            <div class="inline-block px-4 py-1.5 mb-6 rounded-full bg-green-100 border border-green-400 text-green-600 bg-green-100 text-xs font-bold uppercase ">
                Event Triggered: <span class="text-green-700">PageView</span> 
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold text-darkGreen leading-tight mb-6">
                Laravel <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-darkGreen to-green-600">Server-Side Tracking.</span>
            </h1>
            <p class="text-lg text-slate-600 mb-10 leading-relaxed max-w-2xl mx-auto">
                This is a live demo of the ServerTrack.io Vanilla JS implementation in a Laravel Website. 
                Open your browser's <strong>Network Tab</strong> (filter by WS) to see the WebSocket payload firing automatically.
            </p>

            {{-- Navigation to other Mock Pages --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="/product" class="group flex flex-col justify-center items-center p-6 bg-white border border-slate-200  rounded-2xl hover:border-green-600 hover:shadow-xl hover:shadow-green-600/5 transition-all">
                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-100 transition-colors">
                        <svg class="w-6 h-6 text-darkGreen" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="font-bold text-darkGreen mb-1">View Product</h3>
                    <p class="text-xs text-slate-400">Triggers ViewContent and AddToCart Event</p>
                </a>

                <a href="/checkout" class="group flex flex-col justify-center items-center p-6 bg-white border border-slate-200 rounded-2xl hover:border-green-600 hover:shadow-xl hover:shadow-green-600/5 transition-all">
                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-100 transition-colors">
                        <svg class="w-6 h-6 text-darkGreen" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-darkGreen mb-1">Go to Checkout</h3>
                    <p class="text-xs text-slate-400">Triggers InitiateCheckout Event</p>
                </a>

                <a href="/success" class="group flex flex-col justify-center items-center p-6 bg-white border border-slate-200 rounded-2xl hover:border-green-600 hover:shadow-xl hover:shadow-green-600/5 transition-all">
                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-100 transition-colors">
                        <svg class="w-6 h-6 text-darkGreen" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-bold text-darkGreen mb-1">Success Page</h3>
                    <p class="text-xs text-slate-400">Triggers Purchase Event</p>
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-10 border-t border-slate-100 text-center">
        <p class="text-slate-400 text-sm">Built for <a href="https://servertrack.io" class="text-green-900 hover:underline">ServerTrack.io</a> Laravel Community</p>
    </footer>
</div>

@endsection
