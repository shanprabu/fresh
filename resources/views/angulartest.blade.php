@extends('layout')
@section('title')
    {{ $title }}
@endsection

@section('content')
<h2>Angular.js Check</h2>
<hr/>
<div class="container-fluid">
    <div ng-controller="SearchCtrl">
        <form class="well form-search">
            <label>Search:</label>
            <input type="text" ng-model="keywords" class="input-medium search-query" placeholder="Keywords...">
            <button type="submit" class="btn" ng-click="search()">Search</button>
            <p class="help-block">Try for example: "php" or "angularjs" or "asdfg"</p>		
        </form>
        <pre ng-model="result" ng-bind="result">
        
        </pre>
    </div>
</div>
@endsection