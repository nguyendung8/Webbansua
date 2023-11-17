@extends('frontend.master')
@section('title', 'Đổi thông tin')
@section('main')
<style>
    .form-changepass {
        width: 433px;
        margin: auto;
        margin-top: 25px;
        padding: 22px;
        border: 1px solid #ddd;
    }
    .form-title {
        text-align: center;
    }
</style>
	<div id="wrap-inner">
        <form class="form-changepass" method="POST">
            @csrf
            @include('errors.note')
            <h1 class="form-title">Đổi Email</h1>
            <div class="form-group">
                <label for="">Email mới: </label>
                <input type="email" name="email" class="form-control">
            </div>
            <input style="display: flex; cursor: pointer;" type="submit" class="btn btn-primary m-auto" value="Đổi email">
        </form>

	</div>
@stop
