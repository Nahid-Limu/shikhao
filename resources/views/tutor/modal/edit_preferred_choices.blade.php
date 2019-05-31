<div class="modal" id="editPreferredChoices" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row animated bounceIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <i class="fa fa-edit"></i><b> Preferred Choices</b></h4>
            </div>
            {!! Form::open(['method'=>'patch','action'=>['TutorController@storePreferredChoices',$tutor->id]]) !!}
            <div class="modal-body custom-modal">
                <div class="form-group"><label for="preferred_medium_id" class="col-md-4 control-label">Medium <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="preferred_medium_id" name="preferred_medium_id" required class="form-control">
                            <option value="">Select Medium</option>
                            @if(isset($tutoring_preference))
                                @foreach($medium as $m)
                                        <option @if($m->id==$tutoring_preference->preferred_medium_id) selected @endif value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            @else
                                @foreach($medium as $m)
                                    <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <br/>
                <div class="form-group"><label for="preferred_curriculum_id" class="col-md-4 control-label">Curriculum </label>

                    <div class="col-md-8" id="curriculum_section">
                        <div class="input-icon">
                            <select id="preferred_curriculum_section" name="preferred_curriculum_id" class="form-control">
                                @if(isset($tutoring_preference))
                                    <option value="{{$tutoring_preference->preferred_curriculum_id}}">{{$tutoring_preference->curriculum_name}}</option>
                                @else
                                    <option value="">Select Medium First</option>
                                @endif
                            </select>

                        </div>
                    </div>
                </div>

                <br/>

                <div class="form-group"><label for="class_id" class="col-md-4 control-label">Preferred Class/Grade <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="class_id_section" multiple="multiple" style="width: 100%;" name="class_id[]" required class="form-control">
                            @foreach($class as $c)
                                <?php
                                    $k=0;
                                ?>
                                @foreach($tutoring_class as $tc)
                                    @if($c->id==$tc->class_id)

                                        <option  selected value="{{$c->id}}">{{$c->name}}</option>
                                        <?php
                                            $k=1;
                                        ?>
                                    @endif
                                @endforeach
                                @if($k==0)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>

                <div class="form-group"><label for="subject_id" class="col-md-4 control-label">Preferred Subject <span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="subject_id_section" style="width: 100%" name="subject_id[]" multiple required class="form-control">
{{--                            <option value="0">All</option>--}}
                            @foreach($subject as $s)
                                <?php
                                $k=0;
                                ?>
                                @foreach($tutoring_subject as $ts)
                                    @if($s->id==$ts->subject_id)

                                        <option  selected value="{{$s->id}}">{{$s->name}}</option>
                                        <?php
                                        $k=1;
                                        ?>
                                    @endif
                                @endforeach
                                @if($k==0)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>
                <div class="form-group"><label for="preferred_service_area_id" class="col-md-4 control-label">Preferred Service Area<span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="preferred_service_area_id" name="preferred_service_area_id" required class="form-control">
                            <option value="">Select Area</option>
                            @foreach($service_area as $s)
                                <option @if(isset($tutoring_location[0])) @if($s->id==$tutoring_location[0]->service_area_id) selected @endif @endif value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br/>
                <div class="form-group"><label for="preferred_location_id" class="col-md-4 control-label">Location<span class='require'>*</span></label>

                    <div class="col-md-8">
                        <select id="preferred_location_id" multiple name="preferred_location_id[]" style="width: 100%" required class="form-control">
                            @foreach($tutoring_location as $tl)
                                <option selected value="{{$tl->location_id}}">{{$tl->location_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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