
@extends('layout.user')

@section('aktif1')
class="active"
@endsection
@section('content')


<select id="one">
    <option value="01:00">01:00</option>
    <option value="01:30">01:30</option>
    <option value="02:00">02:00</option>
    <option value="02:30">02:30</option>
    <option value="03:00">03:00</option>
    <option value="03:30">03:30</option>
</select>

<select id="two"></select>

<script type="text/javascript">
    $(function () {
        $("#one").change(function (e) {
            $("#two").empty();

            var options = 
            $("#one option").filter(function(e){
                return $(this).attr("value") > $("#one option:selected").val();
            }).clone();

            $("#two").append(options);
        });
    });
</script>
@endsection