@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
@section('body_message', __('The server is temporarily unable to handle requests or access.'))
