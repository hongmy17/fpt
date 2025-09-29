let video = document.querySelector("video");

function playPause() {
  if (video.paused) video.play();
  else stop();
}

function stop() {
  video.pause();
}

function replay() {
  video.currentTime = 0;
  video.play();
}

function increase() {
  if (video.volume < 1) video.volume = Number((video.volume + 0.1).toFixed(1));
}

function decrease() {
  if (video.volume > 0) video.volume = Number((video.volume - 0.1).toFixed(1));
}

function muteOrNot() {
  if (!video.muted || !video.volume) video.muted = true;
  else video.muted = false;
}
