@extends('layout')
@section('title')
    {{ $title }}
@endsection

@section('content')
<h2>AJAX Check</h2>
<hr/>
<div class="container-fluid">
    <form class="form-horizontal">
        <fieldset>
            <div class="form-group">
                <label for="inputId" class="col-lg-2 control-label">Forex ID</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="forexid" id="forexid" placeholder="Forex ID">
                </div>
                <div class="col-lg-2">
                    <a href="#" class="btn btn-success" id="getrate">Get Rate</a>
                </div>
            </div>
        </fieldset>
    </form>
    <div class="row">
        <div class="col-lg-2"></div>        
        <div class="col-lg-8" id="div1"></div>        
        <div class="col-lg-2"></div>        
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#getrate").click(function() {
            datastring=$("form").serialize();
           $.ajax({
               url: "/ajaxreturn",
               type: "POST",
               data: datastring,
               success: function(result) {
                   //console.log(result);
                   var jsonresult=$.parseJSON(result);
                   var jsoncurrency=jsonresult['currency'];
                   var jsoncurrencyrate=jsonresult['currencyrate'];
                   $("#div1").html("<p>The values are <b>" + jsoncurrency + "</b> " + jsoncurrencyrate + "</p>");
               }
           }) 
        });
        
        $("#forexid").keyup(function() {
            if($("#forexid").val().length === 3) {
            datastring=$("form").serialize();
           $.ajax({
               url: "/ajaxreturn",
               type: "POST",
               data: datastring,
               success: function(result) {
                   //console.log(result);
                   var jsonresult=$.parseJSON(result);
                   var jsoncurrency=jsonresult['currency'];
                   var jsoncurrencyrate=jsonresult['currencyrate'];
                   $("#div1").html("<p>The values are <b>" + jsoncurrency + "</b> " + jsoncurrencyrate + "</p>");
               }
           }) 
            }
        });
    });
</script>
@endsection