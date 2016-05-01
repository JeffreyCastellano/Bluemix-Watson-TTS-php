Watson TTS service for Heroku php with FFMPEG buildpack 
=======================

This is an example of how to use PHP with bluemix services (in this case Text to Speech) and converting the output file into an MP3 or audio format needed.

Caution
-----

This is a simple example file. Not for use in production.


To Use w/ Heroku
-----

You'll need the FFMPEG buildpack here https://github.com/ManicCharm/heroku-buildpack-ffmpeg-lameenabled . Add to your buildpack multi or setting on your Heroku app. 

    $ ls
    .buildpacks
    ...
    
    $ cat .buildpacks
    https://github.com/ManicCharm/heroku-buildpack-ffmpeg-lameenabled
    https://github.com/heroku/heroku-buildpack-play

    $ heroku create --buildpack https://github.com/ddollar/heroku-buildpack-multi

    $ git push heroku master
    ...

You can verify installing ffmpeg after by following command.

    $ heroku run "ffmpeg -version"
