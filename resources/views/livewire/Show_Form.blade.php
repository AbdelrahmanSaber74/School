@extends('layouts.master')
@section('css')

@livewireStyles

@endsection

@section('title')
    {{ __('Parent_trans.title_page') }}
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @livewire('add-parent')

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@livewireScripts



@endsection
