@extends('layouts.app')
<br>
<nav aria-label="breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/measurement') }}">International System of Unit Categories</a></li>
        <li class="breadcrumb-item">Conversion</li>
    </ul>
</nav>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                <h3 class="purple">Conversion</h3>
            </div>
                <form action="/convert" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity"  name="quantity" value="{{ old('quantity') }}">
                    </div>
                    <div class="form-group">
                        <label for="from">From</label>
                        <select class="form-control" id="from" name="from">
                        <option value=''></option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(old('from') == $category->id) selected @endif>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="to">To</label>
                        <select class="form-control" id="to" name="to">
                        <option value=''></option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(old('to') == $category->id) selected @endif>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Convert</button>
                    @if (Session::has('result'))
                        <div class="mt-2">
                            <div class="alert alert-success">
                                {{ Session::get('result') }}
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

