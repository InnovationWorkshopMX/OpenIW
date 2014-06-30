Python Oembed Consumer
======================

This module uses Python-oembed (https://github.com/abarmat/python-oembed) to provide a simple consumer wich supports several Oembed providers.

Additionally, the module will return a dictionary for any url provided, similar to embedly, this way you can obtain a response for any url and get a facebook like embed response.

Currently the following oEmbed providers are supported:

* http://app.net - link
* http://wordpress.com - link
* http://deviantart.com - photo
* http://geo-en.hlipp.de - photo
* http://geograph.org.gg - photo
* http://geograph.org.uk - photo
* http://gmep.org - photo
* http://instagr.am - photo
* http://smugmug.com - photo
* http://www.23hq.com - photo
* http://www.flickr.com - photo
* http://www.mobypicture.com - photo
* http://ifttt.com - rich
* http://cacoo.com - rich
* http://chirb.it - rich
* http://crowdranking.com - rich
* http://huffduffer.com - rich
* http://meetup.com - rich
* http://official.fm - rich
* http://rdio.com - rich
* http://roomshare.jp - rich
* http://shoudio.com - rich
* http://sketchfab.com - rich
* http://soundcloud.com - rich
* http://speakerdeck.com - rich
* http://twitter.com - rich
* http://www.circuitlab.com - rich
* http://www.dailymile.com - rich
* http://www.dipity.com - rich
* http://www.ifixit.com - rich
* http://www.kickstarter.com - rich
* http://www.mixcloud.com - rich
* http://www.polleverywhere.com - rich
* http://www.slideshare.net - rich
* http://animoto.com - video
* http://aol.com - video
* http://blip.tv - video
* http://dotsub.com - video
* http://justin.tv - video
* http://revision3.com - video
* http://sapo.pt - video
* http://ted.com - video
* http://ustream.tv - video
* http://vimeo.com - video
* http://wordpress.tv - video
* http://www.collegehumor.com - video
* http://www.dailymotion.com - video
* http://www.funnyordie.com - video
* http://www.hulu.com - video
* http://www.jest.com - video
* http://www.nfb.ca - video
* http://www.screenr.com - video
* http://www.viddler.com - video
* http://www.videojug.com - video
* http://www.youtube.com - video
* http://yandex.ru - video


Installation
------------

This module requires python-oembed and Beautiful Soup 4:

    pip install python-oembed
    pip install beautifulsoup4
    
Then simply download or clone this repo and import the module:

    from python_oembed_consumer import Consumer
    
    consumer = Consumer()
    url = 'https://soundcloud.com/devolverdigital/sets/hotline-miami-official'
    #This returns a dict with the oembed data
    embed = consumer.get_oembed(url)
    print embed
    
