<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="s01">
    <form>
        <fieldset id="date">
            <legend>Namaz Vakti</legend>
            <br>
        </fieldset>
        <div class="inner-form">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">İmsak</th>
                    <th scope="col">Güneş</th>
                    <th scope="col">Öğle</th>
                    <th scope="col">İkindi</th>
                    <th scope="col">Akşam</th>
                    <th scope="col">Yatsı</th>
                </tr>
                </thead>
                <tbody>
                <tr id="country">

                </tr>
                </tbody>
            </table>


        </div>
    </form>
</div>

<script>
    $.ajax({
        url: "{{route('filter_data')}}",
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            $("#date").append('' + '<legend style="font-size: 28px;" value="'+res[0]['MiladiTarihUzun']+'">'+res[0]['MiladiTarihUzun']+'</legend>');
            $("#country").append('' + '<td value="'+res[0]['Imsak']+'">'+res[0]['Imsak']+'</td>');
            $("#country").append('' + '<td value="'+res[0]['Gunes']+'">'+res[0]['Gunes']+'</td>');
            $("#country").append('' + '<td value="'+res[0]['Ogle']+'">'+res[0]['Ogle']+'</td>');
            $("#country").append('' + '<td value="'+res[0]['Ikindi']+'">'+res[0]['Ikindi']+'</td>');
            $("#country").append('' + '<td value="'+res[0]['Aksam']+'">'+res[0]['Aksam']+'</td>');
            $("#country").append('' + '<td value="'+res[0]['Yatsi']+'">'+res[0]['Yatsi']+'</td>');
        }
    });
</script>
</body>
</html>
