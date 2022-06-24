@extends('layouts.app')

@php
    $title = 'Edit customer';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.customer.__fields')
    </x-main-card>
@endsection