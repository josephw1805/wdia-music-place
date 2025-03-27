@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-name">Latest Album Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.latest-album.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label">Category One</label>
                                <select class="select2 form-select" name="category_one" aria-label="Category select">
                                    <option disabled selected> Please Select </option>
                                    @foreach ($categories as $category)
                                        @if ($category->subCategories->isNotEmpty())
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestAlbum->category_one == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Category Two</label>
                                <select class="select2 form-select" name="category_two" aria-label="Category select">
                                    <option disabled selected> Please Select </option>
                                    @foreach ($categories as $category)
                                        @if ($category->subCategories->isNotEmpty())
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestAlbum->category_two == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Category Three</label>
                                <select class="select2 form-select" name="category_three" aria-label="Category select">
                                    <option disabled selected> Please Select </option>
                                    @foreach ($categories as $category)
                                        @if ($category->subCategories->isNotEmpty())
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestAlbum->category_three == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Category Four</label>
                                <select class="select2 form-select" name="category_four" aria-label="Category select">
                                    <option disabled selected> Please Select </option>
                                    @foreach ($categories as $category)
                                        @if ($category->subCategories->isNotEmpty())
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <option @selected($latestAlbum->category_four == $subCategory->id) value="{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            <i class="ti ti-device-floppy"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
