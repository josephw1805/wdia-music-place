@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Counter</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.counter.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-block name="counter_one" label="Counter One" value='{{ @$counter->counter_one }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_one" label="Title One"
                                    value='{{ @$counter->title_one }}' />
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <x-input-block name="counter_two" label="Counter Two" value='{{ @$counter->counter_two }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_two" label="Title Two"
                                    value='{{ @$counter->title_two }}' />
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <x-input-block name="counter_three" label="Counter Three"
                                    value='{{ @$counter->counter_three }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_three" label="Title Three"
                                    value='{{ @$counter->title_three }}' />
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <x-input-block name="counter_four" label="Counter Four"
                                    value='{{ @$counter->counter_four }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_four" label="Title Four"
                                    value='{{ @$counter->title_four }}' />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
