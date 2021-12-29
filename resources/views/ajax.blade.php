@extends('master')
@section('content')

<div class="container">
    <h2>Ajax</h2>
    <div class="row">
        <div class="col-md-6 m-auto">
        <form action="" method="POST" id="searchForm">
            <input type="text" name="search" class="form-control" placeholder="search"/>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        </div>
    </div>

</div>

<script>

$(document).ready(function() {
    $("#searchForm").submit(function(e) {
        e.preventDefault();

        const search = $("input[name=search]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "search",
            data: {
                search: search
            },
            success:function(result) {
                alert(`State: ${result?.data?.state?.name}`);
                const cities = [];

                result?.data?.cities.forEach(function(city, index){
                    cities.push(city?.name);
                });
                alert(`Cities: ${cities}`);
            }
        });
    })
})
    </script>
@endsection