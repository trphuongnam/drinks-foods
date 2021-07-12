@extends('admin.layouts.master_layout')
@section('title', 'Dashboard')
@section('content_title', 'Dashboard')
@section('content')

<div id="chart_div"></div>
@include('admin.layouts.elements.chart_js')     

{{-- Statistic orders in month--}}
<form action="{{url('/admin')}}" method="GET">
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('chart_lang.date') }}</label>
                <select class="form-control" name="date">
                    {!!showOptionSelectDate(request()->date)!!}
                </select> 
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label>{{ trans('chart_lang.month') }}</label>
                <select class="form-control" name="month">
                    {!!showOptionSelectMonth(request()->month)!!}
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-app button_header"><i class="fas fa-search"></i>{{ trans('message.search') }}</button>
    </div>
    <a href="{{url('/admin/export/statistics?date='.request()->date.'&month='.request()->month)}}" class="btn btn-block btn-success col-2"><i class="fas fa-download">&nbsp;</i>Export Excel</a>
</form>
<div id="donutchart" style="width: 900px; height: 500px;"></div>
@include('admin.layouts.elements.chart_order_month_js')
@endsection