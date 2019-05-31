{{--  Edit Personal Information  --}}
<div class="modal fade-scale" id="editPersonalInfo" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content animated fadeInUp">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            <i class="fa fa-edit"></i> Personal Information</h4>
        </div>
        <div class="modal-body">
                <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name <span class='require'>*</span></label>  
                        <div class="col-md-8">
                            <input id="name" name="name" type="text" value="{{$student->name}}" required class="form-control"/>
                        </div>
                        
                    </div>

                    <br/>
                    <div class="form-group">
                        <label for="guardian_name" class="col-md-4 control-label">Guardian Name <span class='require'>*</span></label>
                        <div class="col-md-8">
                            <input id="guardian_name" name="guardian_name" type="text" value="{{$student->guardian_name}}" required class="form-control"/></div>
                    </div>

                    <br/>
                    <div class="form-group">
                        <label for="contact_number" class="col-md-4 control-label">Phone <span class='require'>*</span></label>
                        <div class="col-md-8">
                            <input id="contact_number" name="contact_number" type="tel" value="{{$student->contact_number}}" required placeholder="Phone Number" class="form-control"/></div>
                    </div>

                    <br/>
                    <div class="form-group">
                        <label for="additional_contact_number" class="col-md-4 control-label">Additional Contact <span class='require'>*</span></label>
                        <div class="col-md-8">
                            <input id="additional_contact_number" name="additional_contact_number" type="tel" value="{{$student->additional_contact_number}}" required placeholder="Additional Contact  Number" class="form-control"/>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group"><label for="gender" class="col-md-4 control-label">Gender <span class='require'>*</span></label>

                        <div class="col-md-8">
                            <select id="gender" name="gender" required class="form-control">
                        
                                <option value="1"  @if ($student->gender == 1) selected @endif >Male</option>
                                <option value="2" @if ($student->gender == 2) selected @endif>Female</option>
                                <option value="0" @if ($student->gender == 0) selected @endif>Others</option>
                                
                                
                            </select>
                        </div>
                    </div>

                    <br/>
                    
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" data-dismiss="modal" id="updateInfo"><i class="fa fa-refresh"></i> Update</button>
        </div>
    </div>
    
    </div>
</div>