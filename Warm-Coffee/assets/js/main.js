let mixer = mixitup(".box-card", {
  selectors: {
    target: ".cover-card",
  },
  animation: {
    duration: 300,
  },
});

const linkWork = document.querySelectorAll(".nav-item");

function acctiveWork() {
  linkWork.forEach((l) => l.classList.remove("acctive"));
  this.classList.add("acctive");
}

linkWork.forEach((l) => l.addEventListener("click", acctiveWork));
