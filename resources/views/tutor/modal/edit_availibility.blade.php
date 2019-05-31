<div class="modal" id="editAvailability" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Preferred Choices</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storeAvailability',$tutor->id]]) !!}
            <div class="modal-body custom-modal">
                <div class="form-group"><label for="minimum_salary" class="col-md-4 control-label">Salary (TAKA)  <i class="fa fa-info-circle" data-toggle="tooltip" title="Minimum Salary." aria-hidden="true"></i></label>

                    <div class="col-md-8"><input id="minimum_salary" value="{{$tutor->minimum_salary}}" name="minimum_salary" type="number" placeholder="Minimum Salary" class="form-control"/></div>
                </div>

                <br/>
                <div class="form-group"><label for="number_days_week" class="col-md-4 control-label">Tutoring Days <i class="fa fa-info-circle" data-toggle="tooltip" title="Number of days want to tutor in a week. " aria-hidden="true"></i>
                    </label>

                    <div class="col-md-8"><input id="number_days_week" name="number_days_week" value="{{$tutor->number_days_week}}" type="text" placeholder="Tutoring Days In a Week" class="form-control"/></div>
                </div>

                <br/>


                <div class="form-group">
                    <label for="day"  class="col-md-4 control-label">Preferred Day</label>

{{--                    <label for="day"  class="col-md-8 control-label">(Sunday, Monday)</label><br/>--}}
                    <div class="col-md-8">
                        <select id="day" name="day[]" style="width: 100%" multiple class="form-control combobox">
                            @foreach($all_days as $ad)
                                <?php
                                    $k=0;
                                ?>
                                @foreach($days as $d)

                                    @if($ad['id']==$d->day_id)
                                        <option  selected value="{{$ad['id']}}">{{$ad['day_name']}}</option>
                                        <?php
                                            $k=1;
                                        ?>
                                    @endif

                                @endforeach
                                @if($k==0)
                                    <option value="{{$ad['id']}}">{{$ad['day_name']}}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                </div>
                <br/>

                <div class="form-group">
                    <label for="time" class="col-md-4 control-label ">Preferred Time<span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="time" name="time[]" style="width: 100%" multiple required class="form-control combobox">
                            @foreach($all_times as $ad)
                                <?php
                                $k=0;
                                ?>
                                @foreach($time as $t)

                                    @if($ad['id']==$t->time_id)
                                        <option  selected value="{{$ad['id']}}">{{$ad['time_name']}}</option>
                                        <?php
                                        $k=1;
                                        ?>
                                    @endif

                                @endforeach
                                @if($k==0)
                                    <option value="{{$ad['id']}}">{{$ad['time_name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <br/>
                <br/>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Update</button>
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>