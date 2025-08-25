@extends('backend.app')
@section('title', 'Hero Section')


@section('content')
    <div class="main-content-container overflow-hidden">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <h3 class="mb-0">CMS Hero Section</h3>
        </div>

        <div class="card bg-white border-0 rounded-3 mb-4">
            <div class="card-body p-4">

                <div class="mb-4">
                    <h4 class="fs-20 mb-1">CMS Hero Section</h4>
                    <p class="fs-15">Update Hero Section and site details here.</p>
                </div>

                <form action="{{ route('cms.home_page.hero_section.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Title Field -->
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="label text-secondary">Title<span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <input type="text"
                                        class="form-control text-dark ps-5 h-55 @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title', $data->title ?? '') }}" required
                                        placeholder="Enter Title here">
                                </div>
                                @error('title')
                                    <div id="title-error" class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap gap-3">
                        <button type="submit" class="btn btn-primary py-2 px-4 fw-medium fs-16"> <i
                                class="ri-check-line text-white fw-medium"></i> Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection


