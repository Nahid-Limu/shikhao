<div class="modal" id="editPassword" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Update Password</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storePassword',$tutor->id]]) !!}
            <div class="modal-body custom-modal">
                <br/>
                <div class="form-group"><label for="password" class="col-md-4 control-label">Password <span class='require'>*</span></label>

                    <div class="col-md-8"><input id="password" required name="password" type="text" placeholder="Password" class="form-control"/></div>

                </div>

                <br/>
                <br/>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Update</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>