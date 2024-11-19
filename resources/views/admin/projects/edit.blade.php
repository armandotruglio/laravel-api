@extends("admin.projects.layouts.create-edit")

@section("form-action")
    {{ route("admin.projects.update", $project) }}
@endsection

@section("form-method")
    @method("PUT")
@endsection

@section("form-title")
    Update project
@endsection
