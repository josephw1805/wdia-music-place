@extends('admin.album.album-module.album-app')

@section('tab_content')
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="dashboard_add_course_finish">
            <form action="#" class="more_info_form">
                @csrf
                <input type="hidden" name="id" value="{{ @$album->id }}">
                <input type="hidden" name="current_step" value="4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="add_course_more_info_input">
                            <label for="#">Message for Reviewer</label>
                            <textarea rows="7" class="form-control" style="resize: none; text-align: start; height: 59.6px;"
                                placeholder="Message for Reviewer" name="message">{!! @$album->message_for_reviewer !!}</textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_more_info_input">
                            <label for="#">Status</label>
                            <select class="form-select" required name="status">
                                <option value=""> Please Select </option>
                                <option @selected(@$album->status == 'active') value="active">Publish</option>
                                <option @selected(@$album->status == 'inactive') value="inactive">Unpublish</option>
                                <option @selected(@$album->status == 'draft') value="draft">Draft</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">save</button>
            </form>
        </div>
    </div>
@endsection
