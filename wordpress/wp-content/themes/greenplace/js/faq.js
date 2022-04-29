document.addEventListener("DOMContentLoaded", function() {


  var accordion_category = document.getElementsByClassName("question__link__category");
  var panel_category = document.getElementsByClassName("question__answer__category");



  for (var i = 0; i < accordion_category.length; i++) {


    accordion_category[i].onclick = function(event) {

      let class_img =  !this.parentElement.parentElement.children.item(0).classList.contains("question__bu__active");

      // if(class_img){
      //
      //   this.parentElement.parentElement.children.item(0).classList.remove("question__bu");
      //   this.parentElement.parentElement.children.item(0).classList.toggle("question__bu__active");
      // }else{
      //   this.parentElement.parentElement.children.item(0).classList.remove("question__bu__active");
      //   this.parentElement.parentElement.children.item(0).classList.toggle("question__bu");
      // }



      event.preventDefault();

      var setClasses = !this.classList.contains("is-active");

      setClass(accordion_category, "is-active", "remove");
      setClass(panel_category, "is-show", "remove");

      if (setClasses) {
        this.classList.toggle("is-active");
        this.parentElement.nextElementSibling.classList.toggle("is-show");
      }
    };
  }

  var accordion = document.getElementsByClassName("question__link");
  var panel = document.getElementsByClassName("question__answer");

  for (var i = 0; i < accordion.length; i++) {
    accordion[i].onclick = function(event) {
      event.preventDefault();


      let class_img =  !this.parentElement.parentElement.children.item(0).classList.contains("question__bu__active");

      // if(class_img){
      //
      //   this.parentElement.parentElement.children.item(0).classList.remove("question__bu");
      //   this.parentElement.parentElement.children.item(0).classList.toggle("question__bu__active");
      // }else{
      //   this.parentElement.parentElement.children.item(0).classList.remove("question__bu__active");
      //   this.parentElement.parentElement.children.item(0).classList.toggle("question__bu");
      // }


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

    console.log(els);
    console.log(className);
    console.log(fnName);
    for (var i = 0; i < els.length; i++) {
      els[i].classList[fnName](className);
    }
  }
});
