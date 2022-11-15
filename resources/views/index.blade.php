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
      <form action="{{route('city_date')}}" method="post">
        <fieldset>
          <legend>Namaz Vakti</legend>

        </fieldset>
          @csrf
        <div class="inner-form">
          <div class="input-field first-wrap">
              <select class="form-control" id="country" style="height: 100%;" name="country">
              <option selected >Ülke Seçiniz</option>
              </select>
          </div>
          <div class="input-field second-wrap">
              <select class="form-control" id="city" style="height: 100%;" name="cities">

              </select>
          </div>
            <div class="input-field second-wrap">
                <select class="form-control" id="district" style="height: 100%;" name="districtes">

                </select>
            </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit">Ara</button>
          </div>
        </div>
      </form>
    </div>



    <script>


        $.ajax({
            url: "{{route('country_data')}}",
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                $.each(res ,function(key,value){
                    $("#country").append('<option value="'+value.UlkeID+'">'+value.UlkeAdi+'</option>');
                });
            }
        });

        $(document).ready(function() {
            $('#country').on('change', function() {
                var id = this.value;
                $("#city").html('');
                $.ajax({
                    url:"{{route('city_data')}}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType : 'json',
                    success: function(res){
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+value.SehirID+'">'+value.SehirAdi+'</option>');
                        });
                    }
                });
            });

        });
        $(document).ready(function() {
            $('#city').on('change', function() {
                var id = this.value;
                $("#district").html('');
                $.ajax({
                    url:"{{route('district_data')}}",
                    type: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    dataType : 'json',
                    success: function(res){
                        $.each(res,function(key,value){
                            $("#district").append('<option value="'+value.IlceID+'">'+value.IlceAdi+'</option>');
                        });
                    }
                });
            });

        });
    </script>
  </body>
</html>
