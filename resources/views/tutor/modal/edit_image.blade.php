<div class="modal" id="editPhoto" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Update Image</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storePhoto',$tutor->id],'files'=>true]) !!}
            <div class="modal-body custom-modal">
                <br/>
                <div class="form-group"><label for="image" class="col-md-4 control-label">Photo</label>

                    <div class="col-md-8"><input id="image" required name="image" type="file" class="form-control"/></div>

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