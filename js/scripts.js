function loadDoc(event) {
  event.preventDefault();

  const form = document.getElementById("form");
  const sub = document.getElementById("sub");
  const sent = document.getElementById("sent");
  const formData = new FormData(form);
  
  let myPromise = new Promise(function(myResolve, myReject) {
  let req = new XMLHttpRequest();
  req.open("POST", "cont.php", true);
  req.onload = function() {
    if (req.status == 200) {
      myResolve(req.responseText);
    } else {
      myReject("File not Found");
    }
  };
  req.send(formData);
  });
  myPromise.then(
    function(value) {
      form.reset();
      sub.style.display = "none";
      sent.style.display = "block";
      sent.innerHTML = value;
      setTimeout(function () {
        sent.style.display = "none";
        sent.innerHTML = "";
        sub.style.display = "block";
      }, 5000);
    },
    function(error) {
      form.reset();
      sub.style.display = "none";
      sent.style.display = "block";
      sent.innerHTML = error;
      setTimeout(function () {
        sent.style.display = "none";
        sent.innerHTML = "";
        sub.style.display = "block";
      }, 5000);
    }
  );
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
};

function addEvent(obj, type, fn) {
  if (obj && obj.addEventListener) {
    obj.addEventListener(type, fn, false);
  } else if (obj && obj.attachEvent) {
    obj.attachEvent("on" + type, fn);
  }
};

