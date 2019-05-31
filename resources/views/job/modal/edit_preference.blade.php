<style>
        .rating-container .empty-stars .star i{
            font-size: 25px;
        }
        .rating-container .filled-stars:hover i{
            font-size: 25px;
        }
        .rating-container .filled-stars i{
            font-size: 25px;
        }
</style>

<!-- Modal -->
    <div id="edit_Preference_Details" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content animated bounceIn">
        <form action="{{route('job.update_Preference_Details')}}" method="get">
            @csrf
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update Preference Details</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="tutor_student_job_id" value="{{base64_encode($tutor_student_job->id)}}">
            <input type="hidden" name="job_id" value="{{base64_encode($job->id)}}">
            <div class="control-group">
                <label for="tutor_rating" class="control-label">Tutor Rating:</label>
                <div class="controls">
                        <input id="tutor_rating" name="tutor_rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{$tutor_student_job->tutor_rating}}" data-size="xs">
                </div>
            </div>
            <div class="control-group">
                <label for="student_rating" class="control-label">Student Rating:</label>
                <div class="controls">
                    <input id="student_rating" name="student_rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{$tutor_student_job->student_rating}}" data-size="xs">
                </div>
            </div>
            <div class="control-group">
                <label for="selection_method" class="control-label">Selection Procedure:</label>
                <div class="controls">
                    <select name="selection_method" id="selection_method" class="form-control">
                            
                            @if ($tutor_student_job->selection_method == 1)
                                <option value="1">Assigned By Admin</option>
                            @elseif ($tutor_student_job->selection_method == 2)
                            <option value="2">Student Choice</option>
                            @elseif ($tutor_student_job->selection_method == 3)
                            <option value="3">Assigned By System</option>
                            @endif
                            <option value="1">Assigned By Admin</option>
                            <option value="2">Student Choice</option>
                            <option value="3">Assigned By System</option>
                    </select>
                   
                </div>
            </div>
            <div class="control-group">
                <label for="joining_date" class="control-label">Joining Date:</label>
                <div class="controls">
                    <input type="date" class="form-control" id="joining_date" name="joining_date" value = "{{ $job->joining_date}}" />
                </div>
            </div>
            <div class="control-group">
                <label for="salary" class="control-label">Salary:</label>
                <div class="controls">
                        <input type="number" class="form-control" id="salary" name="salary" value = "{{$tutor_student_job->salary}}" />
                </div>
            </div>
            
            
            
        
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-md btn-red pull-left">Reset</button>
            <button type="submit" class="btn btn-md btn-blue" ><i class="fa fa-refresh"> Update</i></button>
        </div>
        </form>
        </div>

    </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>