@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
@section('body_message', __('The login session has expired or the CSRF Token does not exist when submitting the form.'))
