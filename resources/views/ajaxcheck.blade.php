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
                    <a href="#" class="btn btn-default" id="getrate">Get Rate</a>
                </div>
            </div>
        </fieldset>
    </form>
    <div class="row" id="div1">
        
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#getrate").click(function() {
            /*datastring='base=USD';*/
            datastring=$("form").serialize();
           $.ajax({
               url: "/ajaxreturn",
               type: "GET",
               data: datastring,
               success: function(result) {
                   console.log(result);
                   $("#div1").html(result);
               }
           }) 
        });
    });
</script>
@endsection