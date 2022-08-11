@extends('layouts.main')
@section('title', "Email Sender")
@section('content')
<div class="card">
    <div class="card-header">
        <h4> Email Sender</h4> 
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
        @if(Session::get('errors'))
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            {{Session::get('errors')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
                
    </div>
    <div class="card-body">
        <form action="{{route('send-email')}}" method="POST" class="needs-validation" novalidate="" >
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">@lang('Emails') (comma separated)</label>
                <textarea class="form-control" name="emails" id="emails" required rows="3" placeholder="Enter Email Address"></textarea>
                <div class="invalid-feedback">
                    @lang('Email is invalid')
                </div>
            </div>              
            <div class="form-group">
                <label class="form-label" for="subject">{{__('Email subject')}}</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Write your Email Subject" required>
                <div class="invalid-feedback">
                    @lang('Subject is required')
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">{{__('Email Body')}}</label>
                <textarea class="form-control" name="content" id="content" rows="6" required placeholder="Write your email Content"></textarea>
                <div class="invalid-feedback">
                    @lang('Email content is required')
                </div>
            </div>
            <div class="form-group mb-0 text-end">
                <button class="btn btn-primary" type="submit">{{__('Send Email')}}</button>
            </div>        
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
@endsection