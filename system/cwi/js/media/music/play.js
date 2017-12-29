	$.extend({
			"get_page":function(id){

				$_url = window.location.search;
				$_url_ary = $_url.split("&");
				$_url_list = {};
				$.each($_url_ary,function(index,val){
					$_url_list[ val.split("=")[0] ]= val.split("=")[1];
				})

				$.ajax({type:"POST",url:"libraries/update.php",data:{"tname":$_url_list['?pg'],"sub_id":$_url_list['sub_id'],"view":id}});

			}
		})

    $.fn.ttwMusicPlayer = function (playlist, userOptions) {

        var $self = this,
            defaultOptions,
            options, cssSelector,
            appMgr,
            playlistMgr,
            interfaceMgr,
            ratingsMgr,
            playlist,
            layout,
            ratings,
            myPlaylist,
            current;

        cssSelector = {
            jPlayer: "#jquery_jplayer",
            jPlayerInterface: '.jp-interface',
            playerPrevious: ".jp-interface .jp-previous",
            playerNext: ".jp-interface .jp-next",
            trackList: '.tracklist',
            tracks: '.tracks',
            track: '.track',
            trackRating: '.rating-bar',
            trackInfo: '.track-info',
            rating: '.rating',
            ratingLevel: '.rating-level',
            ratingLevelOn: '.on',
            rating_succes: '.rating-succes',
            title: '.title',
            duration: '.duration',
            buy: '.buy',
            buyNotActive: '.not-active',
            playing: '.playing',
            moreButton: '.more',
            player: '.player',
            artist: '.artist',
            artistOuter: '.artist-outer',
            albumCover: '.img',
            description: '.description',
            descriptionShowing: '.showing'
        };

        defaultOptions = {
            ratingCallback: null,
            currencySymbol: '$',
            buyText: 'BUY',
            tracksToShow: 5,
            autoplay: false,
            jPlayer: {}
        };

        options = $.extend(true, {}, defaultOptions, userOptions);

        myPlaylist = playlist;

        current = 0;



        playlistMgr = function () {

            var playing = false,
                markup,
                $myJplayer = {},
                $tracks, showHeight = 0,
                remainingHeight = 0,
                $tracksWrapper,
                $more;

            markup = {
                listItem: '<li class="track">' + '<span class="title"></span>' + '<span class="duration"></span>' + '<a href="#" class="buy not-active" target="_blank"></a>' + '</li>',
                ratingBar: '<span class="rating-level rating-bar"></span>'
            };

            function init(playlistOptions) {

                $myJplayer = $('.ttw-music-player .jPlayer-container');


                var jPlayerDefaults,
                    jPlayerOptions;

                jPlayerDefaults = {
                    swfPath: "jquery-jplayer",
                    supplied: "mp3, oga",
                    solution: 'html, flash',
                    cssSelectorAncestor: cssSelector.jPlayerInterface,
                    errorAlerts: false,
                    warningAlerts: false
                };


                jPlayerOptions = $.extend(true, {}, jPlayerDefaults, playlistOptions);

                $myJplayer.bind($.jPlayer.event.ready, function () {


                    $myJplayer.bind($.jPlayer.event.ended, function (event) {
                        playlistNext();
                    });

                    $myJplayer.bind($.jPlayer.event.play, function (event) {

						$.get_page(myPlaylist[current].id);

						$self.find(cssSelector.description).html(myPlaylist[current].description).addClass(attr(cssSelector.descriptionShowing)).slideDown();

                        $myJplayer.jPlayer("pauseOthers");
                        $tracks.eq(current).addClass(attr(cssSelector.playing)).siblings().removeClass(attr(cssSelector.playing));
                    });

                    $myJplayer.bind($.jPlayer.event.playing, function (event) {
                        playing = true;
                    });

                    $myJplayer.bind($.jPlayer.event.pause, function (event) {
                        playing = false;
                    });


                    $(cssSelector.playerPrevious).click(function () {

						$.get_page(myPlaylist[current].id);
                        playlistPrev();
                        $(this).blur();
                        return false;
                    });

                    $(cssSelector.playerNext).click(function () {

						$.get_page(myPlaylist[current].id);
                        playlistNext();
                        $(this).blur();
                        return false;
                    });

            

                    buildPlaylist();


                    $self.trigger('mbPlaylistLoaded');

                    playlistInit(options.autoplay);
                });


                $myJplayer.jPlayer(jPlayerOptions);
            }

            function playlistInit(autoplay) {
                current = 0;

                if (autoplay) {
                    playlistAdvance(current);
                } else {
                    playlistConfig(current);
                    $self.trigger('mbPlaylistInit');
                }
            }

            function playlistAdvance(index) {

                playlistConfig(index);

                if (index >= options.tracksToShow)
                    showMore();

                $self.trigger('mbPlaylistAdvance');
                $myJplayer.jPlayer("play");
            }

            function playlistNext() {
                var index = (current + 1 < myPlaylist.length) ? current + 1 : 0;
                playlistAdvance(index);
            }

            function playlistPrev() {
                var index = (current - 1 >= 0) ? current - 1 : myPlaylist.length - 1;
                playlistAdvance(index);
            }

            function togglePlay() {
                if (!playing)
                    $myJplayer.jPlayer("play");
                else
                    $myJplayer.jPlayer("pause");
            }


            function playlistConfig(index) {
                current = index;
                $myJplayer.jPlayer("setMedia", myPlaylist[current]);
            }

            function buildPlaylist() {
                var $ratings = $();

                $tracksWrapper = $self.find(cssSelector.tracks);


                for (var i = 0; i < myPlaylist.length; i++)
                    $ratings = $ratings.add(markup.ratingBar);

                for (var j = 0; j < myPlaylist.length; j++) {
                    var $track = $(markup.listItem);


                    $track.find(cssSelector.rating).html($ratings.clone());

                    $track.find(cssSelector.title).html(trackName(j));

                    $track.find(cssSelector.duration).html(duration(j));

                    setRating('track', $track, j);

                    setBuyLink($track, j);

                    $track.data('index', j);

                    $tracksWrapper.append($track);
                }

                $tracks = $(cssSelector.track);

                $tracks.slice(0, options.tracksToShow).each(function () {
                    showHeight += $(this).outerHeight();
                });

                $tracks.slice(options.tracksToShow, myPlaylist.length).each(function () {
                    remainingHeight += $(this).outerHeight();
                });

                if (remainingHeight > 0) {

                    var $trackList = $(cssSelector.trackList);

                    $tracksWrapper.height(showHeight);
                    $trackList.addClass('show-more-button');

                    $trackList.find(cssSelector.moreButton).click(function () {

                        $more = $(this);

                        showMore();
                    });
                }

                $tracks.find('.title').click(function () {
                    playlistAdvance($(this).parents('li').data('index'));
                });
            }

            function showMore() {
                if (isUndefined($more))
                    $more = $self.find(cssSelector.moreButton);

                $tracksWrapper.animate({
                    height: showHeight + remainingHeight
                }, function () {
                    $more.animate({
                        opacity: 0
                    }, function () {
                        $more.slideUp(function () {
                            $more.parents(cssSelector.trackList).removeClass('show-more-button');
                            $more.remove();
                        });
                    });
                });
            }

            function duration(index) {
                return !isUndefined(myPlaylist[index].duration) ? myPlaylist[index].duration : '-';
            }

            function setBuyLink($track, index) {
                if (!isUndefined(myPlaylist[index].buy)) {
                    $track.find(cssSelector.buy).removeClass(attr(cssSelector.buyNotActive)).attr('href', myPlaylist[index].buy).html(buyText(index));
                }
            }

            function buyText(index) {
                return (!isUndefined(myPlaylist[index].price) ? options.currencySymbol + myPlaylist[index].price : '') + ' ' + options.buyText;
            }

            return {
                init: init,
                playlistInit: playlistInit,
                playlistAdvance: playlistAdvance,
                playlistNext: playlistNext,
                playlistPrev: playlistPrev,
                togglePlay: togglePlay,
                $myJplayer: $myJplayer
            };

        };





        interfaceMgr = function () {

            var $player,
                $title,
                $artist,
                $albumCover;


            function init() {

                $player = $(cssSelector.player),
                $title = $player.find(cssSelector.title),
                $artist = $player.find(cssSelector.artist),
                $albumCover = $player.find(cssSelector.albumCover);


				if (!isUndefined(options.description))
                    $self.find(cssSelector.description).html(options.description).addClass(attr(cssSelector.descriptionShowing)).slideDown();

                $self.bind('mbPlaylistAdvance mbPlaylistInit', function () {

                    $title.html(trackName(current));

                    if (isUndefined(myPlaylist[current].artist))
						$artist.parent(cssSelector.artistOuter).animate({
							opacity: 0
						}, 'fast');
					else {
						$artist.html(myPlaylist[current].artist).parent(cssSelector.artistOuter).animate({
							opacity: 1
						}, 'fast');
					}

                    setRating('current', null, current);

                    $albumCover.animate({
						opacity: 0
					}, 'fast', function () {
						if (!isUndefined(myPlaylist[current].cover)) {
							var now = current;

							$('<img src="' + myPlaylist[current].cover + '" alt="album cover" />').imagesLoaded(function () {
								if (now == current)
									$albumCover.html($(this)).animate({
										opacity: 1
									})
							});
						}
					});

                });
            }

            function buildInterface() {

                var markup, $interface;

                markup =	'<div class="ttw-music-player">' +
							'	<div class="player jp-interface">' +
							'		<div class="album-cover">' +
							'			<span class="img"></span>' +
							'			<span class="highlight"></span>' +
							'		</div>' +
							'		<div class="track-info">' +
							'			<p class="title"></p>' +
							'			<p class="artist-outer">By <span class="artist"></span></p>' +
							'			<div class="rating">' +
							'				<span class="rating-level rating-star on"></span>' +
							'				<span class="rating-level rating-star on"></span>' +
							'				<span class="rating-level rating-star on"></span>' +
							'				<span class="rating-level rating-star on"></span>' +
							'				<span class="rating-level rating-star"></span>' +
							'				<span class="rating-succes">Already rated</span>' +
							'			</div>' +
							'		</div>' +
							'		<div class="player-controls" >' +
							'			<div class="main">' +
							'				<div class="previous jp-previous"></div>' +
							'				<div class="play jp-play"></div>' +
							'				<div class="pause jp-pause"></div>' +
							'				<div class="next jp-next"></div>' +
							
							'			</div>' +
							'			<div class="progress-wrapper">' +
							'				<div class="progress jp-seek-bar">' +
							'					<div class="elapsed jp-play-bar"></div>' +
							'				</div>' +
							'			</div>' +
							'		</div>' +
							
							'	</div>' +
							'	<p class="description"></p>' +
							'	<div class="tracklist">' +
							'		<ol class="tracks"> </ol>' +
							'		<div class="more">View More...</div>' +
							'	</div>' +
							'	<div class="jPlayer-container"></div>' +
							'</div>';

                $interface = $(markup).css({
                    display: 'none',
                    opacity: 0
                }).appendTo($self).slideDown('slow', function () {

                    $interface.animate({
                        opacity: 1
                    });
                    $self.trigger('mbInterfaceBuilt');
                });
            }


            return {
                buildInterface: buildInterface,
                init: init
            }

        };




		ratingsMgr = function () {

			var $tracks = $self.find(cssSelector.track);

			$(cssSelector.rating).find(cssSelector.ratingLevel).hover(function () {
				$(this).addClass('hover').prevAll().addClass('hover').end().nextAll().removeClass('hover');
			});

			$(cssSelector.rating).mouseleave(function () {
				$(this).find(cssSelector.ratingLevel).removeClass('hover');
			});

			$(cssSelector.rating_succes).css('display', 'none');

		};











		playlist = new playlistMgr();

		layout = new interfaceMgr();

		layout.buildInterface();

		playlist.init(options.jPlayer);

		$self.bind('mbPlaylistLoaded', function () {

			$self.bind('mbInterfaceBuilt', function () {
				ratings = new ratingsMgr();
			});
			
			layout.init();

		});


        /** Common Functions **/

        function trackName(index) {

            if (!isUndefined(myPlaylist[index].title))
                return myPlaylist[index].title;
            else if (!isUndefined(myPlaylist[index].mp3))
                return fileName(myPlaylist[index].mp3);
            else if (!isUndefined(myPlaylist[index].oga))
                return fileName(myPlaylist[index].oga);
            else
                return '';
        }

        function fileName(path) {
            path = path.split('/');
            return path[path.length - 1];
        }

        function setRating(type, $track, index) {

            if (type == 'track') {
                if (!isUndefined(myPlaylist[index].rating)) {
                    applyTrackRating($track, myPlaylist[index].rating);
                }
            } else {
                //if the rating isn't set, use 0
                var rating = !isUndefined(myPlaylist[index].rating) ? Math.ceil(myPlaylist[index].rating) : 0;
                applyCurrentlyPlayingRating(rating);
            }
        }

        function applyCurrentlyPlayingRating(rating) {

            //reset the rating to 0, then set the rating defined above
            $self.find(cssSelector.trackInfo).find(cssSelector.ratingLevel).removeClass(attr(cssSelector.ratingLevelOn)).slice(0, rating).addClass(attr(cssSelector.ratingLevelOn));

        }

        function applyTrackRating($track, rating) {

            //multiply rating by 2 since the list ratings have 10 levels rather than 5
            $track.find(cssSelector.ratingLevel).removeClass(attr(cssSelector.ratingLevelOn)).slice(0, rating * 2).addClass(attr(cssSelector.ratingLevelOn));

        }


        /** Utility Functions **/

        function attr(selector) {
            return selector.substr(1);
        }

        function runCallback(callback) {
            var functionArgs = Array.prototype.slice.call(arguments, 1);

            if ($.isFunction(callback)) {
                callback.apply(this, functionArgs);
            }
        }

        function isUndefined(value) {
            return typeof value == 'undefined';
        }


    };




    $.fn.imagesLoaded = function (callback) {
        var elems = this.filter('img'),
            len = elems.length;

        elems.bind('load', function () {

            if (--len <= 0)
                callback.call(elems, this);
        })
		elems.trigger("load");
    };

