/*global Modernizr */
/*jslint browser:true */

(function() {
  /*
  *   This content is licensed according to the W3C Software License at
  *   https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
  *
  *   Simple accordion pattern example
  */

  'use strict';

  document.addEventListener('DOMContentLoaded', function(){
    Array.prototype.slice.call(document.querySelectorAll('.Accordion')).forEach(function (accordion) {

      // Allow for multiple accordion sections to be expanded at the same time
      var allowMultiple = accordion.hasAttribute('data-allow-multiple');
      // Allow for each toggle to both open and close individually
      var allowToggle = (allowMultiple) ? allowMultiple : accordion.hasAttribute('data-allow-toggle');

      // Create the array of toggle elements for the accordion group
      var triggers = Array.prototype.slice.call(accordion.querySelectorAll('.Accordion-trigger'));
      var panels = Array.prototype.slice.call(accordion.querySelectorAll('.Accordion-panel'));


      accordion.addEventListener('click', function (event) {
        var target = event.target;

        if (target.classList.contains('Accordion-trigger')) {
          // Check if the current toggle is expanded.
          var isExpanded = target.getAttribute('aria-expanded') == 'true';
          var active = accordion.querySelector('[aria-expanded="true"]');

          // without allowMultiple, close the open accordion
          if (!allowMultiple && active && active !== target) {
            // Set the expanded state on the triggering element
            active.setAttribute('aria-expanded', 'false');
            // Hide the accordion sections, using aria-controls to specify the desired section
            document.getElementById(active.getAttribute('aria-controls')).setAttribute('hidden', '');

            // When toggling is not allowed, clean up disabled state
            if (!allowToggle) {
              active.removeAttribute('aria-disabled');
            }
          }

          if (!isExpanded) {
            // Set the expanded state on the triggering element
            target.setAttribute('aria-expanded', 'true');
            // Hide the accordion sections, using aria-controls to specify the desired section
            document.getElementById(target.getAttribute('aria-controls')).removeAttribute('hidden');

            // If toggling is not allowed, set disabled state on trigger
            if (!allowToggle) {
              target.setAttribute('aria-disabled', 'true');
            }
          }
          else if (allowToggle && isExpanded) {
            // Set the expanded state on the triggering element
            target.setAttribute('aria-expanded', 'false');
            // Hide the accordion sections, using aria-controls to specify the desired section
            document.getElementById(target.getAttribute('aria-controls')).setAttribute('hidden', '');
          }

          event.preventDefault();
        }
      });

      // Bind keyboard behaviors on the main accordion container
      accordion.addEventListener('keydown', function (event) {
        var target = event.target;
        var key = event.which.toString();

        var isExpanded = target.getAttribute('aria-expanded') == 'true';
        var allowToggle = (allowMultiple) ? allowMultiple : accordion.hasAttribute('data-allow-toggle');

        // 33 = Page Up, 34 = Page Down
        var ctrlModifier = (event.ctrlKey && key.match(/33|34/));

        // Is this coming from an accordion header?
        if (target.classList.contains('Accordion-trigger')) {
          // Up/ Down arrow and Control + Page Up/ Page Down keyboard operations
          // 38 = Up, 40 = Down
          if (key.match(/38|40/) || ctrlModifier) {
            var index = triggers.indexOf(target);
            var direction = (key.match(/34|40/)) ? 1 : -1;
            var length = triggers.length;
            var newIndex = (index + length + direction) % length;

            triggers[newIndex].focus();

            event.preventDefault();
          }
          else if (key.match(/35|36/)) {
            // 35 = End, 36 = Home keyboard operations
            switch (key) {
              // Go to first accordion
              case '36':
                triggers[0].focus();
                break;
                // Go to last accordion
              case '35':
                triggers[triggers.length - 1].focus();
                break;
            }
            event.preventDefault();

          }

        }
      });

      // These are used to style the accordion when one of the buttons has focus
      accordion.querySelectorAll('.Accordion-trigger').forEach(function (trigger) {

        trigger.addEventListener('focus', function (event) {
          accordion.classList.add('focus');
        });

        trigger.addEventListener('blur', function (event) {
          accordion.classList.remove('focus');
        });

      });

      // Minor setup: will set disabled state, via aria-disabled, to an
      // expanded/ active accordion which is not allowed to be toggled close
      if (!allowToggle) {
        // Get the first expanded/ active accordion
        var expanded = accordion.querySelector('[aria-expanded="true"]');

        // If an expanded/ active accordion is found, disable
        if (expanded) {
          expanded.setAttribute('aria-disabled', 'true');
        }
      }

    });

    /* Query Now Playing */
    function nowPlaying() {
      var nowPlayingRequest = new XMLHttpRequest();
      nowPlayingRequest.open('GET', 'https://api.dubbletrack.com/api/v1/stations/koop/now_playing.json', true);
      nowPlayingRequest.setRequestHeader('X-API-KEY', 'dt_c3iXID0tPL5Nenyc_TQkiQ');
      nowPlayingRequest.setRequestHeader('X-API-SECRET', 'dts_wmcB-B4fWfkj7ysg8vCbkw');

      nowPlayingRequest.onload = function() {
        if (this.status >= 200 && this.status < 400) {
          var nowPlayingData = JSON.parse(this.response);
          //console.log('results: ', nowPlayingData.data[0]);

          var currentShowContainer = document.querySelector('.js-currentShow');
          currentShowContainer.innerHTML = nowPlayingData.data[0].show.title;

          var currentTrackContainer = document.querySelector('.js-currentTrack');
          var currentTracks = nowPlayingData.data[0].tracks;

          if (currentTracks && currentTracks.length > 0) {
            var currentTrack = currentTracks[0];
            currentTrackContainer.innerHTML = currentTrack.artist_name + ' - ' + currentTrack.title;
          } else {
            var startTime = moment(nowPlayingData.data[0].starts_at).format('dddd h:mma');
            var endTime = moment(nowPlayingData.data[0].ends_at).format('h:mma');
            currentTrackContainer.innerHTML = startTime + ' - ' + endTime;
          }
        } else {
          console.log('status error: ', this);
        }
      };

      nowPlayingRequest.onerror = function() {
        console.log('connection error: ', nowPlayingRequest);
      };

      nowPlayingRequest.send();
    }

    nowPlaying();
    var nowplayingInterval = window.setInterval(nowPlaying, 120000);

    /* Query Program's Playlist */
    function programsPlaylist(programID) {
      var playlistRequest = new XMLHttpRequest();
      playlistRequest.open('GET', 'https://api.dubbletrack.com/api/v1/stations/koop/shows/' + programID + '/airings.json?include=tracks', true);
      playlistRequest.setRequestHeader('X-API-KEY', 'dt_c3iXID0tPL5Nenyc_TQkiQ');
      playlistRequest.setRequestHeader('X-API-SECRET', 'dts_wmcB-B4fWfkj7ysg8vCbkw');

      playlistRequest.onload = function() {
        if (this.status >= 200 && this.status < 400) {
          var playlistData = JSON.parse(this.response);
          //console.log('results: ', playlistData.data[0]);
          var playlistTracks = playlistData.data[0].tracks;
          var playlistTitle = document.querySelector('.js-programPlaylistTitle');
          var playlistContainer = document.querySelector('.js-programPlaylist');

          var showDatetime = moment(playlistData.data[0].starts_at).format('MMMM DD, YYYY');
          playlistTitle.innerHTML = 'Playlist for ' + showDatetime;

          var tracksList = '';
          playlistTracks.forEach(function(item, i) {
            var trackPlayedAt = moment(item.played_at).format('HH:mm a');
            tracksList += '<li><strong>' + item.artist_name + '</strong> - ' + item.title + ' (' + trackPlayedAt + ')</li>';
          });

          playlistContainer.innerHTML = tracksList;
        } else {
          console.log('status error: ', this);
        }
      };

      playlistRequest.onerror = function() {
        console.log('connection error: ', playlistRequest);
      };

      playlistRequest.send();
    }

    if(programDoubletrackID !== undefined && programDoubletrackID !== null) {
      programsPlaylist(programDoubletrackID);
    }
  }, false);
}());
