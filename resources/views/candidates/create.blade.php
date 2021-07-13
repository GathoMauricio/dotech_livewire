@extends('layouts.app')
@section('content')
    <h4 class="title_page">Agregar aspirante</h4>
    <br>
    <form action="{{ route('candidates_store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="location_user_id" class="font-weight-bold color-primary-sys">
                            Localidad
                        </label>
                        <select name="location_user_id" class="custom-select">
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold color-primary-sys">
                            Nombre*
                        </label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                        @if($errors->has('name'))
                            <small style="color:#d30035">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="middle_name" class="font-weight-bold color-primary-sys">
                            A. paterno*
                        </label>
                        <input name="middle_name" value="{{ old('middle_name') }}"  type="text" class="form-control" required>
                        @if($errors->has('middle_name'))
                            <small style="color:#d30035">{{ $errors->first('middle_name') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name" class="font-weight-bold color-primary-sys">
                            A. Materno
                        </label>
                        <input name="last_name" value="{{ old('last_name') }}"  type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="font-weight-bold color-primary-sys">
                            Teléfono*
                        </label>
                        <input name="phone" value="{{ old('phone') }}"  type="text" class="form-control" required>
                        @if($errors->has('phone'))
                            <small style="color:#d30035">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="emergency_phone" class="font-weight-bold color-primary-sys">
                            Teléfono de emergencia
                        </label>
                        <input name="emergency_phone" value="{{ old('emergency_phone') }}"  type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="font-weight-bold color-primary-sys">
                            Email*
                        </label>
                        <input name="email" value="{{ old('email') }}"  type="email" class="form-control" required>
                        @if($errors->has('email'))
                            <small style="color:#d30035">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" class="font-weight-bold color-primary-sys">
                            Dirección
                        </label>
                        <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image" value="{{ old('image') }}"  class="font-weight-bold color-primary-sys">
                            Foto
                        </label>
                        <input name="image" type="file" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
