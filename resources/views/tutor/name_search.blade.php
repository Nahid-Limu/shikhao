<table id="example" class="table table-hover table-bordered">
    <thead>
    <tr style="background: #e9f5ff;">
        <th>Name</th>
        <th>Shikhao ID</th>
        <th>Phone</th>
        <th>Occupation</th>
        <th>Gender</th>
        <th>Location</th>
        <th>Curriculum</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody id="table-body">
    @if(count($tutor))
        @foreach($tutor as $t)
            <tr>
                <td>{{$t->name}}</td>
                <td>{{$t->shikhao_id}}</td>
                <td>{{$t->contact_number}}</td>
                <td>{{$t->occupation_name}}</td>
                <td>
                    @if($t->gender==1)
                        Male
                    @else
                        Female
                    @endif
                </td>
                <td>{{$t->location_name}}</td>
                <td>{{$t->curriculum_name}}</td>
                <td style="padding: 5px; text-align: center;">
                    <a target="_blank" title="View Details" href="{{route('tutor.show',base64_encode($t->id))}}" class="btn btn-default btn-sm"><i class="fa fa-eye fa-lg"></i></a>
                </td>

            </tr>
        @endforeach
    @else
        <tr><td align="center" colspan="8">No Matching Data Found</td></tr>

    @endif
    </tbody>
</table>
<div id="pagination">
    <center>
        {{ $tutor->links() }}
    </center>
</div>

<script>
    $('.page-link').click(function (event) {
        event.preventDefault()

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