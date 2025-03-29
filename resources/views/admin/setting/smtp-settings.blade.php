@extends('admin.setting.layout')
@section('setting-content')
    <div class="col-12 col-md-9 d-flex flex-column">
        <div class="card-body">
            <h3 class="card-title mt-4">SMTP Settings</h3>
            <form action="{{ route('admin.smtp-settings.update') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <x-input-block name="sender_email" label='Sender Email'
                            value="{{ config('settings.sender_email') }}" />
                    </div>
                    <div class="col-md-6">
                        <x-input-block name="receiver_email" label='Receiver Email'
                            value="{{ config('settings.receiver_email') }}" />
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
