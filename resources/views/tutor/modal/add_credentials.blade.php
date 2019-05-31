<style>
        .form-group{
            padding: 12px;
        }
        
</style>

<!-- Modal -->
    <div id="add_credentials" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content animated bounceIn">
        <form action="{{route('tutor.add_credentials')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Credentials</h4>
        </div>
        <div class="modal-body">
        
            <input type="hidden" name="tutor_id" value="{{$tutor->id}}">

            <div class="form-group">
                <label for="title" class="col-md-3 control-label" style=" font-size: 20px;">Title </label>  
                <div class="col-md-9">
                    <input id="title" name="title" type="text" placeholder="certificate name" class="form-control"/>

                </div>
                
            </div>

            <br/>
            <div class="form-group">
                <label for="certificate" class="col-md-3 control-label" style=" font-size: 20px;">Certificate </label>  
                <div class="col-md-9">
                        <input id="attachment" name="attachment" type="file" class="form-control"/>
                </div>
                
            </div>

            <br/>

        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-md btn-red pull-left">Reset</button>
            <button type="submit" class="btn btn-md btn-blue" ><i class="fa fa-plus"> Add</i></button>
        </div>
        </form>
        </div>

    </div>
    </div>
    