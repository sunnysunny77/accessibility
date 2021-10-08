

function transcript() {
  const transcript = document.getElementById("transcript");
  const vTranscript = document.getElementById("vTranscript");

  if (transcript.style.display == "none") {
    vTranscript.setAttribute("aria-expanded", true);
    transcript.style.display = "block";
    return;
  } else if (transcript.style.display == "block") {
    vTranscript.setAttribute("aria-expanded", false);
    transcript.style.display = "none";
    return;
  }
};

function addEvent(obj, type, fn) {
  if (obj && obj.addEventListener) {
    obj.addEventListener(type, fn, false);
  } else if (obj && obj.attachEvent) {
    obj.attachEvent("on" + type, fn);
  }
};

