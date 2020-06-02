@extends('layouts.app')
<br>
<nav aria-label="breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/measurement') }}">International System of Unit Categories</a></li>
        <li class="breadcrumb-item">@if(empty($unit)) Add @else Edit @endif unit</li>
    </ul>
</nav>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="purple">@if(empty($unit)) Add @else Edit @endif unit</h3>
                </div>
                <form action="@if(empty($unit)){{'/add-unit'}}@else{{'/update-unit'}}@endif" method="post">
                <input type="hidden" name="unit_id" value="{{(isset($unit->id)) ? $unit->id : ''}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="category">Category Name</label>
                        <select class="form-control" id="category" name="category">
                        <option value=''></option>
                            @foreach($categories as $category)
                            <option value='{{$category->id}}' @if((old('category') == $category->id && empty($unit)) || ((!empty($unit) && $unit->parent_id == $category->id) )) selected @endif>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit_name">Unit name</label>
                        <input type="text" class="form-control" id="unit_name"  name="unit_name" value="@if(empty($unit)){{ old('unit_name') }}@elseif(!empty($unit->category_name)){{ $unit->category_name }}@else{{''}}@endif">
                    </div>
                    <div class="form-group">
                        <label for="coefficient">Conversion coefficient according to basic unit </label>
                        <input type="text" class="form-control" id="coefficient"  name="coefficient" value="@if(empty($unit)){{ old('coefficient') }}@elseif(!empty($unit->category_name)){{ $unit->conversion_coefficient }}@else{{''}}@endif">
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
                    <button type="submit" class="btn btn-primary">@if(empty($unit)) Submit @else Update @endif</button>
                </form>
            </div>
        </div>
    </div>
</div>
