{{--  Admin Approved Student   --}}
<div class="modal fade" id="approvedStudent" role="dialog">
    <div class="modal-dialog modal-md">
        
        <!-- Modal content-->
        <div class="modal-content animated bounceIn">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
                <i class="fa fa-edit"></i><b> Account Status</b></h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="account_status"  class="col-md-4 control-label">Student Status </label>
                        <div class="col-md-8">
                            
                            <label class="radio-inline"><input type="radio" id="account_status" name="account_status" value="1" @if ($student->account_status == 1) checked @endif > Approved</label>
                            <label class="radio-inline"><input type="radio" id="account_status" name="account_status" value="0" @if ($student->account_status == 0) checked @endif> Pending</label> 
                            <label class="radio-inline"><input type="radio" id="account_status" name="account_status" value="2" @if ($student->account_status == 2) checked @endif> Blocked</label> 
                                
                        </div>
                        
                    </div>      
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="updateStudentStatus"><i class="fa fa-refresh"></i> Update</button>
            
            </div>
        </div>
        
    </div>
</div>
