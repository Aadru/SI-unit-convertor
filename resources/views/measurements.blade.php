@extends('layouts.app')
<br>
<nav aria-label="breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">International System of Unit Categories</li>
        <li class="breadcrumb-item"><a href="{{ url('/unit') }}">Add unit</a></li>
    </ul>
</nav>
<div class="container">
    <div class="card">
        <div class="row">
            <div class="card-body" >
                <div class="col-md-12" id="treeview">
                    <h3>International System of Unit Categories</h3>
                    @if($errors->any())
                    <div class="alert alert-success">
                        {{$errors->first()}}
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <hr />
                    <div class="row">
                        @foreach($product as $category)
                        @if($category->parent_id == null)
                        <div class="col-md-4 parent">
                            <h4>{{ $category->category_name }}</h4>
                                <hr />
                                <div>  
                                    <a href="/convert/{{$category->id}}" class="square-btn">Convert unit</a>                                           
                                        @foreach($product as $unit)
                                        <div class="d-flex"> 
                                            @if($unit->parent_id == $category->id)
                                                <h5>{{$unit->category_name}}</h5> 
                                                <a href="/edit/{{$unit->id}}">
                                                    Edit
                                                </a>
                                                <a href="/delete/{{$unit->id}}" class="red">
                                                    Delete
                                                </a>
                                            @endif
                                        </div>
                                        @endforeach
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
