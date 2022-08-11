@extends('layouts.main')
@section('title', "Settings")
@section('content')
<div class="card">
    <div class="card-header">
        <h4> General Settings</h4> 
        {{-- sessions --}}
        @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            {{Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            {{Session::get('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{route('setting')}}" method="POST" class="">
            @csrf
            <div class="form-group row">
                <input type="hidden" name="types[]" value="APP_NAME">
                <div class="col-lg-4">
                    <label class="form-label">{{__('Website Name')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="APP_NAME" value="{{  env('APP_NAME') }}" placeholder="Website Name">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_HOST">
                <div class="col-lg-4">
                    <label class="form-label">{{__('MAIL HOST')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_HOST" value="{{  env('MAIL_HOST') }}" placeholder="MAIL HOST">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_PORT">
                <div class="col-lg-4">
                    <label class="form-label">{{__('MAIL PORT')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_PORT" value="{{  env('MAIL_PORT') }}" placeholder="MAIL PORT">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_USERNAME">
                <div class="col-lg-4">
                    <label class="form-label">{{__('MAIL USERNAME')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_USERNAME" value="{{  env('MAIL_USERNAME') }}" placeholder="MAIL USERNAME">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                <div class="col-lg-4    ">
                    <label class="form-label">{{__('MAIL PASSWORD')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{  env('MAIL_PASSWORD') }}" placeholder="MAIL PASSWORD">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                <div class="col-lg-4">
                    <label class="form-label">{{__('MAIL ENCRYPTION')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{  env('MAIL_ENCRYPTION') }}" placeholder="MAIL ENCRYPTION">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                <div class="col-lg-4">
                    <label class="form-label">{{__('MAIL FROM ADDRESS')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{  env('MAIL_FROM_ADDRESS') }}" placeholder="MAIL FROM ADDRESS">
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="types[]" value="MAIL_FROM_NAME">
                <div class="col-lg-4">
                    <label class="form-label">{{__('MAIL FROM NAME')}}</label>
                </div>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{  env('MAIL_FROM_NAME') }}" placeholder="MAIL FROM NAME">
                </div>
            </div>
            <div class="form-group mb-0 text-end">
                <button class="btn btn-primary" type="submit">{{__('Save')}}</button>
            </div>
        
        </form>
   
    </div>
</div>
@endsection