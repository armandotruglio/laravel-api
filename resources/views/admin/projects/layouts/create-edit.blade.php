@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="@yield("form-action")" method="POST" enctype="multipart/form-data">
                @yield("form-method")
                @csrf

                <div class="mb-3">
                    <h1 class="text-center fw-bold">
                        @yield("form-title")
                    </h1>
                </div>

                <div class="mb-3">
                    <label for="project-title" class="form-label">Project Title:</label>
                    <input type="text" name="title" id="project-title" class="form-control" value="{{ old("title", $project->title) }}">
                    @error("title")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="project-type_id" class="form-label">Type:</label>
                    <select name="type_id" id="project-type_id" class="form-control">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                    @if($type->id == old("type_id", $project->type_id))
                                        selected
                                    @endif
                                >
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>

                    @error("category_id")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3 ">
                    <label for="project-technologies" class="form-label">Technologies:</label>
                    @foreach ( $technologies as $technology )
                        <div class="form-check">
                            <input type="checkbox" name="technologies[]" id="project-technologies" class="form-check-input" value="{{ $technology->id }}"
                                    @checked(in_array($technology->id, old("technologies", $project->technologies->pluck("id")->toArray())))
                                >
                            <label type="checkbox" name="technologies[]" id="project-technologies" class="form-check-label">
                                {{ $technology->name  }}
                            </label>
                        </div>
                    @endforeach


                    @error("technologies")
                        @include("partials.single-name-error-message")
                    @enderror

                    @error("technologies.*")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" name="image" id="project-image" class="form-control">

                    @error("image")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="project-date" class="form-label">Project date:</label>
                    <input type="text" name="date" id="project-date" class="form-control" value="{{ old("date", $project->date) }}">
                    @error("date")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="project-description" class="form-label">Description:</label>
                    <textarea name="description" id="project-description" cols="30" rows="10" class="form-control">{{ old("description", $project->description) }}</textarea>
                    @error("description")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-primary">@yield("form-title")</button>
                <button type="reset" class="btn btn-lg btn-warning">Reset fields</button>
            </form>
        </div>
    </div>
</div>
@endsection
