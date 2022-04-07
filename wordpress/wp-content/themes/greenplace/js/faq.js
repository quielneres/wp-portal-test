document.addEventListener("DOMContentLoaded", function() {
  var accordion = document.getElementsByClassName("question__link");
  var panel = document.getElementsByClassName("question__answer");

  for (var i = 0; i < accordion.length; i++) {
    accordion[i].onclick = function(event) {
      event.preventDefault();

      var setClasses = !this.classList.contains("is-active");

      setClass(accordion, "is-active", "remove");
      setClass(panel, "is-show", "remove");

      if (setClasses) {
        this.classList.toggle("is-active");
        this.parentElement.nextElementSibling.classList.toggle("is-show");
      }
    };
  }

  function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
      els[i].classList[fnName](className);
    }
  }
});
