<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPN</title>
    <!-- javascripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
<body>
  <div style="position:relative;width:100%;height:100vh;" class="video_container">
    <video id="video" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover" autoplay muted>
      <source src="{{ asset('/img/cpn_media.mp4') }}" type="video/mp4">
    </video>
  </div>
  <div style="overflow:hidden;padding:10px 0;position:absolute; bottom:0; left:0;width:100%;display:flex;justify-content: center;" class="button">
    <a href="/home" style="text-decoration:none; transform:translate(0,100px);border:none;background:red;padding:10px;border-radius:5px;color:white;margin-bottom: 30px;" id="goToWebsite">Accéder au site</a>
  </div>
  <script>
        var goToWebsite = document.getElementById("goToWebsite");
        var aud = document.getElementById('video');
        aud.ontimeupdate = function(){getVideoTimer()};
        function getVideoTimer(){
            console.log(aud.currentTime);
            if(aud.currentTime == aud.duration){
              goToWebsite.style.transition = ".3s";
              goToWebsite.style.transform = "translate(0px,0px)";
            }
           /*  document.getElementById('current').innerHTML = aud.currentTime;
            if (aud.currentTime == 5.0){
                console.log('Hello!');
            } */
        };
  </script>

</body>
</html>
