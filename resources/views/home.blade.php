<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 22/05/2016
 * Time: 7:59 PM
 */
?>
@extends('layouts.neat')
@section('title')
    ICL KB - Home
@stop
@section('content')

    {!! Auth::user()->roles !!}

    Test page

@stop