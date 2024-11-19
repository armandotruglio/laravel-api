@extends("admin.projects.layouts.create-edit")

@section("form-action")
    {{ route("admin.projects.store") }}
@endsection

@section("form-method")
    @method("POST")
@endsection

@section("form-title")
    Create new project
@endsection
