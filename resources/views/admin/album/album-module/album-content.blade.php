@extends('admin.album.album-module.album-app')
@section('tab_content')
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="add_course_content">
            <form action="" class="more_info_form album-form">
                @csrf
                <input type="hidden" name="id" value="{{ request()?->id }}">
                <input type="hidden" name="current_step" value="3">
                <input type="hidden" name="next_step" value="4">
            </form>
            <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between mb-3">
                <div class="btn btn-primary dynamic-modal-btn" data-id="{{ $albumId }}">Add New Chapter</div>
                <div class="btn btn-primary sort_chapter_btn" data-id="{{ $albumId }}">Sort Chapter</div>
            </div>
            <div class="accordion" id="accordion-default">
                @foreach ($chapters as $chapter)
                    <div class="accordion-item">
                        <button class="accordion-header collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $chapter->id }}" aria-controls="collapse-{{ $chapter->id }}"
                            aria-expanded="false">
                            <h2 class="accordion-header-text">
                                <span>{{ $chapter->title }}</span>
                                <div class="add_course_content_action_btn">
                                    <div class="dropdown">
                                        <div class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-plus"></i>
                                        </div>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li class="add_track" data-chapter-id="{{ $chapter->id }}"
                                                data-album-id="{{ $chapter->album_id }}">
                                                <a class="dropdown-item" href="javascript:;">Add Track</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <a class="btn btn-info edit_chapter" data-album-id="{{ $chapter->album_id }}"
                                        data-chapter-id="{{ $chapter->id }}" href="javascript:;"><i
                                            class="ti ti-edit"></i></a>
                                    <a class="btn btn-danger delete-item"
                                        href="{{ route('admin.album-content.destroy-chapter', $chapter->id) }}"><i
                                            class="ti ti-trash"></i></a>
                                </div>
                            </h2>
                            <div class="accordion-header-toggle">
                                <i class="ti ti-chevron-down"></i>
                            </div>
                        </button>
                        <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordion-default">
                            <div class="accordion-body">
                                <ul class="item_list sortable_list">
                                    @foreach ($chapter->tracks ?? [] as $track)
                                        <li data-track-id="{{ $track->id }}" data-chapter-id="{{ $chapter->id }}">
                                            <span>{{ $track->title }}</span>
                                            <div class="add_course_content_action_btn">
                                                <a class="edit edit_track" data-track-id="{{ $track->id }}"
                                                    data-chapter-id="{{ $chapter->id }}"
                                                    data-album-id="{{ $chapter->album_id }}" href="javascript:;"><i
                                                        class="ti ti-edit"></i></a>
                                                <a class="del delete-item"
                                                    href="{{ route('admin.album-content.destroy-track', $track->id) }}"><i
                                                        class="ti ti-trash"></i></a>
                                                <a class="arrow dragger" href="javascript:;"><i
                                                        class="ti ti-arrows-maximize"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
