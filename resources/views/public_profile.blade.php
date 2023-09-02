<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Profile</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-color: #ecf1f2;
    }

    .box {
        min-height: 380px;
        width: 350px;
        border-radius: 10px;
        box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        display: flex;
        flex-direction: column;
        text-align: center;
        align-items: center;
        padding: 30px 30px;
    }

    .upper-icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        gap: 250px;
    }

    .upper-icons svg:hover {
        opacity: 0.8;
        cursor: pointer;
    }

    .profile-circle {
        margin-top: 2px;
        height: 120px;
        width: 120px;
        border-radius: 10px;
        box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    img {
        width: 100px;
        border-radius: 50%;
    }

    .profile-info {
        height: 50px;
        width: 100%;
        margin: 10px 0px;
        line-height: 25px;
    }

    .profile-info p {
        color: #7c8293;
        font-size: 14px;
    }

    .social-icon {
        width: 70%;
        display: flex;
        justify-content: space-between;
    }

    .fb,
    .insta,
    .twitt,
    .uTube {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        cursor: pointer;
    }

    .btns {
        padding: 30px;
        display: flex;
        justify-content: center;
        gap: 10px;
        align-items: center;
        height: 80px;
        width: 100%;
    }

    .btns button {
        background: none;
        border: none;
        outline: none;
        height: 35px;
        width: 100%;
        border-radius: 4px;
        box-shadow: -3px -3px 7px #ffffff, 3px 3px 5px #ceced1;
        cursor: pointer;
    }

    .btns button:hover {
        background: none;
        border: none;
        background: #ecf0f3;
        outline: none;
        height: 35px;
        width: 100%;
        border-radius: 4px;
        box-shadow: inset -2px -2px 3px #ffffff, inset 2px 2px 3px #ceced1;
    }

    .extra-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        width: 100%;
        padding: 0px 25px;
        margin-top: 15px;
    }

    .fb,
    .insta,
    .uTube,
    .twitt {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .fb:hover,
    .insta:hover,
    .uTube:hover,
    .twitt:hover {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    box-shadow: inset -2px -2px 3px #ffffff, inset 2px 2px 3px #ceced1;
    }

    </style>
</head>
<body>
    <div class="box">

        <div class="upper-icons">

          <svg color="#696D7A" xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 24 24">
            <path fill="currentColor" d="m10 18l-6-6l6-6l1.4 1.45L7.85 11H20v2H7.85l3.55 3.55L10 18Z" />
          </svg>

          <svg color="#696D7A" xmlns="http://www.w3.org/2000/svg" height="18" width="18px" viewBox="0 0 256 256">
            <path fill="currentColor" d="M156 128a28 28 0 1 1-28-28a28 28 0 0 1 28 28Zm-28-52a28 28 0 1 0-28-28a28 28 0 0 0 28 28Zm0 104a28 28 0 1 0 28 28a28 28 0 0 0-28-28Z" />
          </svg>

        </div>

        <div class="profile-circle">
          @if ($user->profile)
            {{--  --}}
          @else
            @if ($user->gender == 0)
                <img src="{{ asset("app/users/student_boy.png") }}" alt="">
            @else
                <img src="{{ asset("app/users/student.png") }}" alt="">
            @endif
          @endif
        </div>

        <div class="profile-info">
          <h4>{{ $user->name }}</h4>
          <p> {{ $user->grade_name }}</p>
        </div>


        <div class="btns">
          <button>Message</button>
          <button>Subscribe</button>
        </div>

        <div class="extra-stats">

          <div style="display: flex; align-items: center; gap: 1px;">
            <svg height="23px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>
            <p>20.4k</p>
          </div>

          <div style="display: flex; align-items: center; gap: 1px;">
            <svg height="22px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
              </path>
            </svg>
            <p>14.3k</p>
          </div>

          <div style="display: flex; align-items: center; gap: 1px;">
            <?xml version="1.0" encoding="utf-8"?>
            <!-- Svg Vector Icons : http://www.onlinewebfonts.com/icon -->
            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
            <svg height="22px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve">
              <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
              <g>
                <g>
                  <path fill="#000000" d="M32.7,177.4" />
                  <path fill="#000000" d="M243.3,109l-95.6-78.5c-2.2-1.8-5.3-2.1-7.8-0.9c-2.6,1.2-4.2,3.8-4.2,6.7l-0.2,41.4c-42.9,1.4-76,15.1-97.5,40.3c-35,41-27.2,100.5-26.8,103c0.6,3.6,3.2,6.3,6.8,6.3c0.1,0,0.2,0,0.3,0c3.7-0.1,6.1-3,6.4-6.7c0.2-2.7,7.6-68.9,110.9-68.8l0.2,42.3c0,2.8,1.6,5.4,4.2,6.7c2.6,1.2,5.6,0.8,7.8-1l95.6-79.2c1.7-1.4,2.7-3.5,2.7-5.7C246,112.5,245,110.4,243.3,109z M150.4,178.3v-34.2c0-1.9-0.8-3.8-2.2-5.2c-1.4-1.4-3.3-2.1-5.2-2.1h0c-73.8,0-102,25-118.1,47c2.4-17.6,9.2-38.9,24.2-56.2C69,104.4,101,92.2,143,92.2c4.1,0,7.4-3.3,7.4-7.4V51.7l76.6,63L150.4,178.3z" />
                </g>
              </g>
            </svg>
            <p>12.8k</p>
          </div>
        </div>
      </div>
    <script src="{{ asset("assets/js/bootstrap.bundle.min.js") }}"></script>
</body>
</html>
