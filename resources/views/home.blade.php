<html>
<form id="form">
    {{csrf_field()}}
    <input type="text" id="name">
    <input type="file" id="pic">
    <button type="submit">Send</button>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#form').on('submit',function (e) {
            e.preventDefault();

            var name=$('#name').val();
            var pic=$('#pic')[0].files[0];
            var _token=$('input[name="_token"]').val();

            var formData=new  FormData();
            formData.append('name',name);
            formData.append('pic',pic);
            console.log(formData);
            $.ajax({
                method: 'POST',
                url: '/getdata',
                data: formData,
                contentType : false,
                processData: false,
                headers: {
                    'X_CSRF-TOKEN': _token
                }
            }).done(function (msg) {
                console.log(msg);
//                if(msg == '')
//                    alert("Uploaded :)");
//                else
//                    alert("Not Uploaded :(");

            })

        })
    })
</script>

</html>