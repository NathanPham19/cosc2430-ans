function displayTime() {
  // current date/time
  var d = new Date();

  // assign to the div
  document.querySelector("#current_time").innerHTML = d;
}

setInterval(displayTime, 1000);

let most_recent = "most_recent";

let time = localStorage.getItem(most_recent);

if (time === null) {
  document.querySelector("#recent_message").innerHTML = "This is your first-time visit to this page";
} else {
  document.querySelector("#recent_message").innerHTML = "Your most recent visit to this page is " + time;
}

localStorage.setItem(most_recent, new Date());
