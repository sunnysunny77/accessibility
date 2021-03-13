function loadDoc(event) {
  event.preventDefault();

  const form = document.getElementById("form");
  const sub = document.getElementById("sub");
  const sent = document.getElementById("sent");
  const formData = new FormData(form);
  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      form.reset();
      sub.style.display = "none";
      sent.style.display = "block";
      sent.innerHTML = this.responseText;
      setTimeout(function () {
        sent.style.display = "none";
        sub.style.display = "block";
      }, 5000);
    }
  };

  xhttp.open("POST", "cont.php", true);
  xhttp.send(formData);
}

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
}

function addEvent(obj, type, fn) {
  if (obj && obj.addEventListener) {
    obj.addEventListener(type, fn, false);
  } else if (obj && obj.attachEvent) {
    obj.attachEvent("on" + type, fn);
  }
}

