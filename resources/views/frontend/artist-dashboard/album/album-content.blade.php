@extends('frontend.artist-dashboard.album.album-app')
@section('album_content')
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="add_course_content">
            <form action="" class="more_info_form album-form">
                @csrf
                <input type="hidden" name="id" value="{{ request()?->id }}">
                <input type="hidden" name="current_step" value="3">
                <input type="hidden" name="next_step" value="4">
            </form>
            <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
                <div class="common_btn dynamic-modal-btn" data-id="{{ $albumId }}">Add New Chapter</div>
                <div class="common_btn sort_chapter_btn" data-id="{{ $albumId }}">Sort Chapter</div>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach ($chapters as $chapter)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $chapter->id }}" aria-expanded="false"
                                aria-controls="collapse-{{ $chapter->id }}">
                                <span>{{ $chapter->title }}</span>
                            </button>
                            <div class="add_course_content_action_btn">
                                <div class="dropdown">
                                    <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="far fa-plus"></i>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="add_track" data-chapter-id="{{ $chapter->id }}"
                                            data-album-id="{{ $chapter->album_id }}">
                                            <a class="dropdown-item" href="javascript:;">Add Track</a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="edit edit_chapter" data-album-id="{{ $chapter->album_id }}"
                                    data-chapter-id="{{ $chapter->id }}" href="javascript:;"><i
                                        class="far fa-edit"></i></a>
                                <a class="del delete-item"
                                    href="{{ route('artist.album-content.destroy-chapter', $chapter->id) }}"><i
                                        class="fas fa-trash-alt"></i></a>
                            </div>
                        </h2>
                        <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="item_list sortable_list">
                                    @foreach ($chapter->tracks ?? [] as $track)
                                        <li data-track-id="{{ $track->id }}" data-chapter-id="{{ $chapter->id }}">
                                            <span>{{ $track->title }}</span>
                                            <div class="add_course_content_action_btn">
                                                <a class="edit edit_track" data-track-id="{{ $track->id }}"
                                                    data-chapter-id="{{ $chapter->id }}"
                                                    data-album-id="{{ $chapter->album_id }}" href="javascript:;"><i
                                                        class="far fa-edit"></i></a>
                                                <a class="del delete-item"
                                                    href="{{ route('artist.album-content.destroy-track', $track->id) }}"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                <a class="arrow dragger" href="javascript:;"><i
                                                        class="fas fa-arrows-alt"></i></a>
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
