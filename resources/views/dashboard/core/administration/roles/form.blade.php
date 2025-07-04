<?php
$name = 'name_' . app()->getLocale();
?>
@extends('dashboard.layout.layout')


@section('sub-header')
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 py-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">{{ __('dash.home')
                                    }}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('dashboard.core.administration.roles.index') }}">{{ __('dash.roles')
                                    }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ isset($model) ? __('dash.edit') : __('dash.create') }}</li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
    </header>
</div>
@endsection

@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        @if (session()->has('success'))
        <div class="alert alert-success col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <form method="post"
                    action="{{ isset($model) ? route('dashboard.core.administration.roles.update', $model) : route('dashboard.core.administration.roles.store') }}">
                    @csrf
                    @if (!isset($model) || !in_array($model->name, ['super', 'admin']))
                    <x-forms.input :type="'text'" :value="isset($model) ? $model->name : ''" :name="'name'"
                        :class="'form-control'" :label="__('dash.name')" />
                    @endif
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="inputState">{{ __('dash.permissions') }}</label>
                            <label class="new-control new-checkbox new-checkbox-text checkbox-success mx-5">
                                <input type="checkbox" class="new-control-input check-all">
                                <span class="new-control-indicator"></span><span class="new-chk-content">{{
                                    __('dash.check_all') }}</span>
                            </label>

                            <div class="widget-content widget-content-area">
                                <div class="row">
                                    <div class="col-md-12 col-12 row">

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-admins">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{ __('dash.admins')
                                                            }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[0]->id }}]"
                                                                class="new-control-input perm-check perm-check-admins"
                                                                {{ isset($model) ? (in_array($permissions[0]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[0]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[1]->id }}]"
                                                                class="new-control-input perm-check perm-check-admins"
                                                                {{ isset($model) ? (in_array($permissions[1]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[1]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[2]->id }}]"
                                                                class="new-control-input perm-check perm-check-admins"
                                                                {{ isset($model) ? (in_array($permissions[2]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[2]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[3]->id }}]"
                                                                class="new-control-input perm-check perm-check-admins"
                                                                {{ isset($model) ? (in_array($permissions[3]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[3]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-roles">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{ __('dash.roles')
                                                            }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[4]->id }}]"
                                                                class="new-control-input perm-check perm-check-roles" {{
                                                                isset($model) ? (in_array($permissions[4]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[4]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[5]->id }}]"
                                                                class="new-control-input perm-check perm-check-roles" {{
                                                                isset($model) ? (in_array($permissions[5]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[5]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[6]->id }}]"
                                                                class="new-control-input perm-check perm-check-roles" {{
                                                                isset($model) ? (in_array($permissions[6]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[6]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[7]->id }}]"
                                                                class="new-control-input perm-check perm-check-roles" {{
                                                                isset($model) ? (in_array($permissions[7]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[7]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-core">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{ __('dash.core')
                                                            }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[8]->id }}]"
                                                                class="new-control-input perm-check perm-check-core" {{
                                                                isset($model) ? (in_array($permissions[8]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[8]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[9]->id }}]"
                                                                class="new-control-input perm-check perm-check-core" {{
                                                                isset($model) ? (in_array($permissions[9]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[9]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[10]->id }}]"
                                                                class="new-control-input perm-check perm-check-core" {{
                                                                isset($model) ? (in_array($permissions[10]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[10]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-visits">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الزيارات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[12]->id }}]"
                                                                class="new-control-input perm-check perm-check-visits"
                                                                {{ isset($model) ? (in_array($permissions[12]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[12]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[13]->id }}]"
                                                                class="new-control-input perm-check perm-check-visits"
                                                                {{ isset($model) ? (in_array($permissions[13]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[13]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[14]->id }}]"
                                                                class="new-control-input perm-check perm-check-visits"
                                                                {{ isset($model) ? (in_array($permissions[14]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[14]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[15]->id }}]"
                                                                class="new-control-input perm-check perm-check-visits"
                                                                {{ isset($model) ? (in_array($permissions[15]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[15]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-packages">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>التقاول</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[17]->id }}]"
                                                                class="new-control-input perm-check perm-check-packages"
                                                                {{ isset($model) ? (in_array($permissions[17]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[17]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[18]->id }}]"
                                                                class="new-control-input perm-check perm-check-packages"
                                                                {{ isset($model) ? (in_array($permissions[18]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[18]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[19]->id }}]"
                                                                class="new-control-input perm-check perm-check-packages"
                                                                {{ isset($model) ? (in_array($permissions[19]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[19]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[20]->id }}]"
                                                                class="new-control-input perm-check perm-check-packages"
                                                                {{ isset($model) ? (in_array($permissions[20]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[20]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-orders">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الطلبات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[22]->id }}]"
                                                                class="new-control-input perm-check perm-check-orders"
                                                                {{ isset($model) ? (in_array($permissions[22]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[22]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[23]->id }}]"
                                                                class="new-control-input perm-check perm-check-orders"
                                                                {{ isset($model) ? (in_array($permissions[23]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[23]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[24]->id }}]"
                                                                class="new-control-input perm-check perm-check-orders"
                                                                {{ isset($model) ? (in_array($permissions[24]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[24]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[25]->id }}]"
                                                                class="new-control-input perm-check perm-check-orders"
                                                                {{ isset($model) ? (in_array($permissions[25]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[25]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- business order --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-business_orders">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{
                                                            __('dash.business_orders') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[112]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders"
                                                                {{ isset($model) ? (in_array($permissions[112]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[112]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[110]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders"
                                                                {{ isset($model) ? (in_array($permissions[110]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[110]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[111]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders"
                                                                {{ isset($model) ? (in_array($permissions[111]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[111]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[109]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders"
                                                                {{ isset($model) ? (in_array($permissions[109]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[109]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- End business order --}}

                                        {{-- business order projects --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-business_orders_projects">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>
                                                            {{__('dash.business_orders_projects') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[114]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_projects"
                                                                {{ isset($model) ? (in_array($permissions[114]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[114]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[115]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_projects"
                                                                {{ isset($model) ? (in_array($permissions[115]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[115]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[116]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_projects"
                                                                {{ isset($model) ? (in_array($permissions[116]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[116]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[117]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_projects"
                                                                {{ isset($model) ? (in_array($permissions[117]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[117]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- End business order projects --}}


                                        {{-- business order branchess --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-business_orders_branches">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>
                                                            {{__('dash.business_orders_branches') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[119]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_branches"
                                                                {{ isset($model) ? (in_array($permissions[119]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[119]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[120]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_branches"
                                                                {{ isset($model) ? (in_array($permissions[120]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[120]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[121]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_branches"
                                                                {{ isset($model) ? (in_array($permissions[121]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[121]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[122]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_branches"
                                                                {{ isset($model) ? (in_array($permissions[122]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[122]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- End business order branches --}}

                                        {{-- business order floors --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-business_orders_floors">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>
                                                            {{__('dash.business_orders_floors') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[125]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_floors"
                                                                {{ isset($model) ? (in_array($permissions[125]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[125]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[124]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_floors"
                                                                {{ isset($model) ? (in_array($permissions[124]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[124]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[126]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_floors"
                                                                {{ isset($model) ? (in_array($permissions[126]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[126]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[127]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_floors"
                                                                {{ isset($model) ? (in_array($permissions[127]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[127]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- End business order branches --}}


                                        {{-- Change Team --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-business_orders_change_team">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>
                                                            {{ __('dash.business_orders_change_team') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[132]->id }}]"
                                                                class="new-control-input perm-check perm-check-business_orders_change_team"
                                                                {{ isset($model) ? (in_array($permissions[132]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[132]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-bookings">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{ __('dash.bookings')
                                                            }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[27]->id }}]"
                                                                class="new-control-input perm-check perm-check-bookings"
                                                                {{ isset($model) ? (in_array($permissions[27]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[27]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[28]->id }}]"
                                                                class="new-control-input perm-check perm-check-bookings"
                                                                {{ isset($model) ? (in_array($permissions[28]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[28]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[29]->id }}]"
                                                                class="new-control-input perm-check perm-check-bookings"
                                                                {{ isset($model) ? (in_array($permissions[29]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[29]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[30]->id }}]"
                                                                class="new-control-input perm-check perm-check-bookings"
                                                                {{ isset($model) ? (in_array($permissions[30]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[30]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-cats">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الأقسام</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[32]->id }}]"
                                                                class="new-control-input perm-check perm-check-cats" {{
                                                                isset($model) ? (in_array($permissions[32]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[32]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[33]->id }}]"
                                                                class="new-control-input perm-check perm-check-cats" {{
                                                                isset($model) ? (in_array($permissions[33]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[33]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[34]->id }}]"
                                                                class="new-control-input perm-check perm-check-cats" {{
                                                                isset($model) ? (in_array($permissions[34]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[34]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[35]->id }}]"
                                                                class="new-control-input perm-check perm-check-cats" {{
                                                                isset($model) ? (in_array($permissions[35]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[35]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        {{-- Tech Orders --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-tech-orders">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>عرض طلبات
                                                            الفنيين</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[79]->id }}]"
                                                                class="new-control-input perm-check perm-check-tech-orders"
                                                                {{ isset($model) ? (in_array($permissions[79]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[79]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[80]->id }}]"
                                                                class="new-control-input perm-check perm-check-tech-orders"
                                                                {{ isset($model) ? (in_array($permissions[80]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[80]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[81]->id }}]"
                                                                class="new-control-input perm-check perm-check-tech-orders"
                                                                {{ isset($model) ? (in_array($permissions[81]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[81]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[82]->id }}]"
                                                                class="new-control-input perm-check perm-check-tech-orders"
                                                                {{ isset($model) ? (in_array($permissions[82]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[82]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- End Tech Orders --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-services">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الحدمات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[37]->id }}]"
                                                                class="new-control-input perm-check perm-check-services"
                                                                {{ isset($model) ? (in_array($permissions[37]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[37]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[38]->id }}]"
                                                                class="new-control-input perm-check perm-check-services"
                                                                {{ isset($model) ? (in_array($permissions[38]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[38]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[39]->id }}]"
                                                                class="new-control-input perm-check perm-check-services"
                                                                {{ isset($model) ? (in_array($permissions[39]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[39]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[40]->id }}]"
                                                                class="new-control-input perm-check perm-check-services"
                                                                {{ isset($model) ? (in_array($permissions[40]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[40]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-techs">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الفنيين</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[42]->id }}]"
                                                                class="new-control-input perm-check perm-check-techs" {{
                                                                isset($model) ? (in_array($permissions[42]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[42]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[43]->id }}]"
                                                                class="new-control-input perm-check perm-check-techs" {{
                                                                isset($model) ? (in_array($permissions[43]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[43]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[44]->id }}]"
                                                                class="new-control-input perm-check perm-check-techs" {{
                                                                isset($model) ? (in_array($permissions[44]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[44]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[45]->id }}]"
                                                                class="new-control-input perm-check perm-check-techs" {{
                                                                isset($model) ? (in_array($permissions[45]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[45]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- trainees --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-trainee">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>المتدربيّن</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[67]->id }}]"
                                                                class="new-control-input perm-check perm-check-trainee"
                                                                {{ isset($model) ? (in_array($permissions[67]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[67]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[68]->id }}]"
                                                                class="new-control-input perm-check perm-check-trainee"
                                                                {{ isset($model) ? (in_array($permissions[68]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[68]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[68]->id }}]"
                                                                class="new-control-input perm-check perm-check-trainee"
                                                                {{ isset($model) ? (in_array($permissions[68]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[68]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[69]->id }}]"
                                                                class="new-control-input perm-check perm-check-trainee"
                                                                {{ isset($model) ? (in_array($permissions[69]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[69]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Start Supplier --}}

                                        @if(isset($permissions[72]) || isset($permissions[73]) ||
                                        isset($permissions[74]) || isset($permissions[75]))
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-supplier">
                                                    <span class="new-control-indicator"></span>
                                                    <span class="new-chk-content text-primary"><b>الموردين</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    @if(isset($permissions[72]))
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[72]->id }}]"
                                                                class="new-control-input perm-check perm-check-supplier"
                                                                {{ isset($model) && in_array($permissions[72]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '' }}>
                                                            <span class="new-control-indicator"></span>
                                                            <span class="new-chk-content"><b>{{ $permissions[72]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    @endif

                                                    @if(isset($permissions[73]))
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[73]->id }}]"
                                                                class="new-control-input perm-check perm-check-supplier"
                                                                {{ isset($model) && in_array($permissions[73]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '' }}>
                                                            <span class="new-control-indicator"></span>
                                                            <span class="new-chk-content"><b>{{ $permissions[73]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    @endif

                                                    @if(isset($permissions[74]))
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[74]->id }}]"
                                                                class="new-control-input perm-check perm-check-supplier"
                                                                {{ isset($model) && in_array($permissions[74]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '' }}>
                                                            <span class="new-control-indicator"></span>
                                                            <span class="new-chk-content"><b>{{ $permissions[74]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    @endif

                                                    @if(isset($permissions[75]))
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[75]->id }}]"
                                                                class="new-control-input perm-check perm-check-supplier"
                                                                {{ isset($model) && in_array($permissions[75]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '' }}>
                                                            <span class="new-control-indicator"></span>
                                                            <span class="new-chk-content"><b>{{ $permissions[75]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endif


                                        {{-- End Supplier --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-customers">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>العملاء</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[48]->id }}]"
                                                                class="new-control-input perm-check perm-check-customers"
                                                                {{ isset($model) ? (in_array($permissions[48]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[48]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[49]->id }}]"
                                                                class="new-control-input perm-check perm-check-customers"
                                                                {{ isset($model) ? (in_array($permissions[49]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[49]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[50]->id }}]"
                                                                class="new-control-input perm-check perm-check-customers"
                                                                {{ isset($model) ? (in_array($permissions[50]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[50]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[51]->id }}]"
                                                                class="new-control-input perm-check perm-check-customers"
                                                                {{ isset($model) ? (in_array($permissions[51]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[51]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-coupons">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الكوبونات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[54]->id }}]"
                                                                class="new-control-input perm-check perm-check-coupons"
                                                                {{ isset($model) ? (in_array($permissions[54]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[54]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[55]->id }}]"
                                                                class="new-control-input perm-check perm-check-coupons"
                                                                {{ isset($model) ? (in_array($permissions[55]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[55]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[56]->id }}]"
                                                                class="new-control-input perm-check perm-check-coupons"
                                                                {{ isset($model) ? (in_array($permissions[56]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[56]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[57]->id }}]"
                                                                class="new-control-input perm-check perm-check-coupons"
                                                                {{ isset($model) ? (in_array($permissions[57]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[57]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-notifications">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>الإشعارات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[60]->id }}]"
                                                                class="new-control-input perm-check perm-check-notifications"
                                                                {{ isset($model) ? (in_array($permissions[60]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[60]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[61]->id }}]"
                                                                class="new-control-input perm-check perm-check-notifications"
                                                                {{ isset($model) ? (in_array($permissions[61]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[61]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[62]->id }}]"
                                                                class="new-control-input perm-check perm-check-notifications"
                                                                {{ isset($model) ? (in_array($permissions[62]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[62]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[63]->id }}]"
                                                                class="new-control-input perm-check perm-check-notifications"
                                                                {{ isset($model) ? (in_array($permissions[63]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[63]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-complaint-type">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{
                                                            __('dash.complaint_type') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[102]->id }}]"
                                                                class="new-control-input perm-check perm-check-complaint-type"
                                                                {{ isset($model) ? (in_array($permissions[102]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[102]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[100]->id }}]"
                                                                class="new-control-input perm-check perm-check-complaint-type"
                                                                {{ isset($model) ? (in_array($permissions[100]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[100]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[101]->id }}]"
                                                                class="new-control-input perm-check perm-check-complaint-type"
                                                                {{ isset($model) ? (in_array($permissions[101]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[101]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[99]->id }}]"
                                                                class="new-control-input perm-check perm-check-complaint-type"
                                                                {{ isset($model) ? (in_array($permissions[99]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[99]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Start Shifts --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-shift_settings">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{
                                                            __('dash.shift_settings') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[108]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[108]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[108]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[107]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[107]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[107]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[106]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[106]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[106]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[105]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[105]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[105]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Shifts --}}

                                        {{-- companys_services_management --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-shift_settings">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{
                                                            __('dash.companys_services_management') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[93]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[93]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[93]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[92]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[92]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[92]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[90]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[90]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[90]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[91]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[91]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[91]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        {{-- End companys services management --}}

                                        {{-- START COMPANY ORDERS --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-shift_settings">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>{{
                                                            __('dash.services_requests') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[94]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[94]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[94]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[95]->id }}]"
                                                                class="new-control-input perm-check perm-check-shift_settings"
                                                                {{ isset($model) ? (in_array($permissions[95]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[95]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        {{-- END COMPANY ORDERS --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-wallets">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>المحافظ</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[46]->id }}]"
                                                                class="new-control-input perm-check perm-check-wallets"
                                                                {{ isset($model) ? (in_array($permissions[46]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[46]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-rates">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>التقييمات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[52]->id }}]"
                                                                class="new-control-input perm-check perm-check-rates" {{
                                                                isset($model) ? (in_array($permissions[52]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[52]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-regions">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>المناطق</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[64]->id }}]"
                                                                class="new-control-input perm-check perm-check-regions"
                                                                {{ isset($model) ? (in_array($permissions[64]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[64]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- reSchedule Order --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-reschedule">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>جدولة الطلبات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[103]->id }}]"
                                                                class="new-control-input perm-check perm-check-reschedule"
                                                                {{ isset($model) ? (in_array($permissions[103]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[103]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Refund Booking --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-refund_booking">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>
                                                            استعادة مبلغ الحجز </b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[131]->id }}]"
                                                                class="new-control-input perm-check perm-check-refund_booking"
                                                                {{ isset($model) ? (in_array($permissions[131]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[131]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-change_booking_status">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>تغيير حالة
                                                            الحجز</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[129]->id }}]"
                                                                class="new-control-input perm-check perm-check-change_booking_status"
                                                                {{ isset($model) ? (in_array($permissions[129]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[129]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-apply_coupon">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>
                                                            تفعيل كوبونات الخصم في الحجوزات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[130]->id }}]"
                                                                class="new-control-input perm-check perm-check-apply_coupon"
                                                                {{ isset($model) ? (in_array($permissions[130]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[130]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox" class="new-control-input check-all-banners">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b>البنرات</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[65]->id }}]"
                                                                class="new-control-input perm-check perm-check-banners"
                                                                {{ isset($model) ? (in_array($permissions[65]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[65]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Start Financial reports --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-financial_reports">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b> {{
                                                            __('dash.financial_reports') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[76]->id }}]"
                                                                class="new-control-input perm-check perm-check-financial_reports"
                                                                {{ isset($model) ? (in_array($permissions[76]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[76]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Financial reports --}}



                                        {{-- Start customer complaints --}}
                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-customer_complaints">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b> {{
                                                            __('dash.view_customer_complaints') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[77]->id }}]"
                                                                class="new-control-input perm-check perm-check-customer_complaints"
                                                                {{ isset($model) ? (in_array($permissions[77]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[77]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End customer complaints --}}

                                        <div class="card component-card_2 col-md-12 px-0">
                                            <div class="form-group h-50 mb-0 px-3 pt-2"
                                                style="background-color: #0072ff42;">
                                                <label
                                                    class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                    <input type="checkbox"
                                                        class="new-control-input check-all-appointment_settings_manage">
                                                    <span class="new-control-indicator"></span><span
                                                        class="new-chk-content text-primary"><b> {{
                                                            __('dash.appointment_settings') }}</b></span>
                                                </label>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="n-chk col-md-3 form-row">
                                                        <label
                                                            class="new-control new-checkbox new-checkbox-text checkbox-success">
                                                            <input type="checkbox"
                                                                name="permissions[{{ $permissions[104]->id }}]"
                                                                class="new-control-input perm-check perm-check-appointment_settings_manage"
                                                                {{ isset($model) ? (in_array($permissions[104]->id,
                                                            $model->permissions->pluck('id')->toArray()) ? 'checked' :
                                                            '') : '' }}>
                                                            <span class="new-control-indicator"></span><span
                                                                class="new-chk-content"><b>{{ $permissions[104]->$name
                                                                    }}</b></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">{{ __('dash.submit') }}</button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection


@push('script')
<script>
    $(document).ready(function() {
            let matches = $("input.perm-check:checkbox:not(:checked)");
            let matches_admins = $("input.perm-check-admins:checkbox:not(:checked)");

            let matches_roles = $("input.perm-check-roles:checkbox:not(:checked)");

            let matches_core = $("input.perm-check-core:checkbox:not(:checked)");

            let matches_packages = $("input.perm-check-packages:checkbox:not(:checked)");

            let matches_homesections = $("input.perm-check-homesections:checkbox:not(:checked)");

            let matches_profile = $("input.perm-check-profile:checkbox:not(:checked)");

            checkViewAll(matches)
            checkViewType(matches_admins, 'admins')
            checkViewType(matches_roles, 'roles')
            checkViewType(matches_core, 'core')
            checkViewType(matches_packages, 'packages')
            checkViewType(matches_homesections, 'homesections')
            checkViewType(matches_profile, 'profile')
        })
        $(".perm-check").click(function() {
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".perm-check-admins").click(function() {
            let matches = $("input.perm-check-admins:checkbox:not(:checked)");
            checkViewType(matches, 'admins')
        });
        $(".perm-check-roles").click(function() {
            let matches = $("input.perm-check-roles:checkbox:not(:checked)");
            checkViewType(matches, 'roles')
        });
        $(".perm-check-core").click(function() {
            let matches = $("input.perm-check-core:checkbox:not(:checked)");
            checkViewType(matches, 'core')
        });
        $(".perm-check-packages").click(function() {
            let matches = $("input.perm-check-packages:checkbox:not(:checked)");
            checkViewType(matches, 'packages')
        });
        $(".perm-check-homesections").click(function() {
            let matches = $("input.perm-check-homesections:checkbox:not(:checked)");
            checkViewType(matches, 'homesections')
        });
        $(".perm-check-profile").click(function() {
            let matches = $("input.perm-check-profile:checkbox:not(:checked)");
            checkViewType(matches, 'profile')
        });

        function checkViewAll(boxes) {
            if (boxes.length > 0) {
                $(".check-all").prop('checked', false)
            } else {
                $(".check-all").prop('checked', true)
            }
        }

        function checkViewType(boxes, type) {
            if (boxes.length > 0) {
                $(".check-all-" + type).prop('checked', false)
            } else {
                $(".check-all-" + type).prop('checked', true)
            }
        }
        $(".check-all").click(function() {
            let boxes = $('.perm-check');
            let box_admins = $('.check-all-admins');
            let box_roles = $('.check-all-roles');
            let box_packages = $('.check-all-packages');
            let box_core = $('.check-all-core');
            let box_homesections = $('.check-all-homesections');
            let box_profile = $('.check-all-profile');
            boxes.prop('checked', this.checked);
            box_admins.prop('checked', this.checked);
            box_roles.prop('checked', this.checked);
            box_packages.prop('checked', this.checked);
            box_core.prop('checked', this.checked);
            box_homesections.prop('checked', this.checked);
            box_profile.prop('checked', this.checked);
        });
        $(".check-all-admins").click(function() {
            let boxes = $('.perm-check-admins');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-roles").click(function() {
            let boxes = $('.perm-check-roles');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-core").click(function() {
            let boxes = $('.perm-check-core');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-packages").click(function() {
            let boxes = $('.perm-check-packages');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-orders").click(function() {
            let boxes = $('.perm-check-orders');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        //business_orders
        $(".check-all-business_orders").click(function() {
            let boxes = $('.perm-check-business_orders');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        // business_orders_projects 

        $(".check-all-business_orders_projects").click(function() {
            let boxes = $('.perm-check-business_orders_projects');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        // business_orders_branches 

        $(".check-all-business_orders_branches").click(function() {
            let boxes = $('.perm-check-business_orders_branches');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        // business_orders_floors  
        $(".check-all-business_orders_floors").click(function() {
            let boxes = $('.perm-check-business_orders_floors');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-visits").click(function() {
            let boxes = $('.perm-check-visits');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-bookings").click(function() {
            let boxes = $('.perm-check-bookings');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-cats").click(function() {
            let boxes = $('.perm-check-cats');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-services").click(function() {
            let boxes = $('.perm-check-services');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-techs").click(function() {
            let boxes = $('.perm-check-techs');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-trainee").click(function() {
            let boxes = $('.perm-check-trainee');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-supplier").click(function() {
            let boxes = $('.perm-check-supplier');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        
        $(".check-all-customers").click(function() {
            let boxes = $('.perm-check-customers');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-coupons").click(function() {
            let boxes = $('.perm-check-coupons');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-notifications").click(function() {
            let boxes = $('.perm-check-notifications');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-wallets").click(function() {
            let boxes = $('.perm-check-wallets');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-rates").click(function() {
            let boxes = $('.perm-check-rates');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-regions").click(function() {
            let boxes = $('.perm-check-regions');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-banners").click(function() {
            let boxes = $('.perm-check-banners');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-financial_reports").click(function() {
            let boxes = $('.perm-check-financial_reports');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-customer_complaints").click(function() {
            let boxes = $('.perm-check-customer_complaints');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-complaint-type").click(function() {
            let boxes = $('.perm-check-complaint-type');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-reschedule").click(function() {
            let boxes = $('.perm-check-reschedule');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        $(".check-all-change_status").click(function() {
            let boxes = $('.perm-check-change_status');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

         $(".check-all-change_booking_status").click(function() {
            let boxes = $('.perm-check-change_booking_status');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });


        $(".check-all-apply_coupon").click(function() {
            let boxes = $('.perm-check-apply_coupon');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        // refund_booking


         $(".check-all-refund_booking").click(function() {
            let boxes = $('.perm-check-refund_booking');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        

        

        

        $(".check-all-tech-orders").click(function() {
            let boxes = $('.perm-check-tech-orders');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-appointment_settings_manage").click(function() {
            let boxes = $('.perm-check-appointment_settings_manage');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-shift_settings").click(function() {
            let boxes = $('.perm-check-shift_settings');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        $(".check-all-companys_services_management").click(function() {
            let boxes = $('.perm-check-companys_services_management');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });

        // Change Team
        $(".check-all-business_orders_change_team").click(function() {
            let boxes = $('.perm-check-business_orders_change_team');
            boxes.prop('checked', this.checked);
            let matches = $("input.perm-check:checkbox:not(:checked)");
            checkViewAll(matches)
        });
        

      

        


        

     


        


        


        

        
</script>

<script>
    let secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endpush