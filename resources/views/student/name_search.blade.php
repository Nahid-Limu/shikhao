<table id="example" class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Shikhao ID</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Institute</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($students))
        @foreach($students as $key=>$student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->shikhao_id}}</td>
                <td>{{$student->contact_number}}</td>
                <td>
                    @if($student->gender==1)
                        Male
                    @elseif($student->gender==2)
                        Female
                    @elseif($student->gender==0)
                        Others
                    @endif
                </td>

                <td>{{$student->institute_name}}</td>

                <td style="padding: 5px; text-align: center;">
                    <a class="" href="{{route('student.profile', base64_encode($student->id))}}" target="_blank"><button type="button" class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="View Student"><i class="fa fa-eye"></i></button></a>
                </td>
            </tr>

        @endforeach
    @else
        <tr><td align="center" colspan="6">No Matching Data Found</td></tr>
    @endif
    </tbody>
</table>

<div id="pagination">
    <center>
        {{ $students->links() }}
    </center>
</div>

<script>
    $('.page-link').click(function (event) {
        event.preventDefault();
        if($(this).parent('.active').length){
            return false;
        }
        var url=$(this).attr('href');
        $.ajax({
            url:url,
            method:'get',
            success:function (response) {
                $('#table').html(response);
                $('html,body').animate({
                        scrollTop: $("#table").offset().top},
                    'slow');

            }
        });

    })
</script>