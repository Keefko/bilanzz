@extends('master')
@section('title','Hlavná stránka')


@section('content')

    @include('includes/header')
    @include('includes/service')
    @include('includes/about')
    @include('includes/price')
    @include('includes/footer')
@endsection
